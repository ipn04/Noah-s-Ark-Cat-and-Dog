$(document).ready(function() {
    $(function() {
        $('#region').on('change', function(){

            var selected_region = $("#region option:selected").text();

            $('input[name=selected_region]').val(selected_region);
        }).ph_locations('fetch_list');

        $('#province').on('change', function(){

            var selected_province = $("#province option:selected").text();

            $('input[name=selected_province]').val(selected_province);

        }).ph_locations('fetch_list');

        $('#city').on('change', function(){

            var selected_city = $("#city option:selected").text();

            $('input[name=selected_city]').val(selected_city);

        }).ph_locations('fetch_list');

        $('#barangay').on('change', function(){

            var selected_barangay = $("#barangay option:selected").text();

            $('input[name=selected_barangay]').val(selected_barangay);

        }).ph_locations('fetch_list');
    });

    $('#underline_select, #availability').change(function() {
        var selectedPetType = $('#underline_select').val().toLowerCase();
        var selectedAvailability = $('#availability').val().toLowerCase();

        $('.pet-lists').each(function() {
            var petType = $(this).data('type');
            var adoptionStatus = $(this).data('adoption');

            // Check if data attributes exist before using them
            if (petType !== undefined && adoptionStatus !== undefined) {
                petType = petType.toLowerCase();
                adoptionStatus = adoptionStatus.toLowerCase();

                var petTypeMatch = (selectedPetType === 'all' || petType === selectedPetType);
                var availabilityMatch = (selectedAvailability === 'all' || adoptionStatus === selectedAvailability);

                if (petTypeMatch && availabilityMatch) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            } else {
                // Handle cases where data attributes are missing
                console.error("Data attributes 'data-type' or 'data-adoption' are missing.");
            }
        });
    }).trigger('change'); 
       
    // JavaScript code to filter based on selected stages and pet types
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const checkedStages = Array.from(document.querySelectorAll('#category-body input[type="checkbox"]:checked'))
                .map(checkbox => checkbox.value);
            
            const checkedPetTypes = Array.from(document.querySelectorAll('#gender-body input[type="checkbox"]:checked'))
                .map(checkbox => checkbox.value);
            
            const allRows = document.querySelectorAll('#adoptionDataContainer[data-stage][data-pet]');
            
            allRows.forEach(row => {
                const stageValue = row.getAttribute('data-stage');
                const petType = row.getAttribute('data-pet');
                
                const stageMatch = checkedStages.length === 0 || checkedStages.includes(stageValue);
                const petTypeMatch = checkedPetTypes.length === 0 || checkedPetTypes.includes(petType);
                
                if (stageMatch && petTypeMatch) {
                    row.style.display = 'table-row'; // Show rows that match the selected stages and pet types
                } else {
                    row.style.display = 'none'; // Hide rows that don't match the selected stages and pet types
                }
            });
        });
    });
    initializeAdoptionTabs();
    initializeVolunteerTabs();
    initializedUserApplication();
    initializeScheduleTabs();
    initializeScheduleAcceptedTabs();
});
// admin adoption tab filter 
function initializeAdoptionTabs() {
    console.log('Initializing Adoption Tabs');
    ['all', 'pending', 'approved', 'rejected', 'cancelled'].forEach(tab => {
        const link = document.getElementById(`${tab}Link`);

        link.addEventListener('click', function(event) {
            event.preventDefault();

            const selectedTab = tab;
            const tabs = ['all', 'pending', 'approved', 'rejected', 'cancelled'];

            tabs.forEach(item => {
                const tabLink = document.getElementById(`${item}Link`);
                const tabContent = document.getElementById(item);

                if (item === selectedTab) {
                    tabLink.classList.remove('text-gray-600')
                    tabLink.classList.add('border-b-2', 'border-red-600','text-red-500');
                    tabContent.classList.remove('hidden');
                } else {
                    tabLink.classList.remove('border-b-2', 'border-red-600','text-red-500');
                    tabContent.classList.add('hidden');
                }
            });

            const allRows = document.querySelectorAll('#adoptionDataContainer[data-stage]');

            allRows.forEach(row => {
                const stage = row.getAttribute('data-stage');

                if (
                    selectedTab === 'all' ||
                    (selectedTab === 'pending' && stage >= '0' && stage <= '8' && stage != '10' && stage != '11') ||
                    (selectedTab === 'approved' && stage === '9') ||
                    (selectedTab === 'rejected' && stage === '10') ||
                    (selectedTab === 'cancelled' && stage === '11')
                ) {
                    row.style.display = ''; 
                } else {
                    row.style.display = 'none'; 
                }
            });

            console.log(`Selected Tab: ${selectedTab}`);
            console.log(`Filtered Rows: ${allRows}`);
        });
    });   
}
// admin volunteer tab filter
function initializeVolunteerTabs() {
    console.log('Initializing volunteer Tabs');
    ['all', 'pending', 'approved', 'rejected'].forEach(tab => {
        const link = document.getElementById(`${tab}Volunteer`);
    
        link.addEventListener('click', function(event) {
            event.preventDefault();

            const selectedTab = tab;
            const tabs = ['all', 'pending', 'approved', 'rejected'];

            tabs.forEach(item => {
                const tabLink = document.getElementById(`${item}Volunteer`);
                const tabContent = document.getElementById(item);
     
                if (item === selectedTab) {
                    tabLink.classList.remove('text-gray-600')
                    tabLink.classList.add('border-b-2', 'border-red-600','text-red-500');
                    tabContent.classList.remove('hidden');
                } else {
                    tabLink.classList.remove('border-b-2', 'border-red-600','text-red-500');
                    tabContent.classList.add('hidden');
                }
            });

            const allRows = document.querySelectorAll('#volunteerData[data-stage]');

            allRows.forEach(row => {
                const stage = row.getAttribute('data-stage');

                if (
                    selectedTab === 'all' ||
                    (selectedTab === 'pending' && stage >= '0' && stage <= '4' && stage != '10' ) ||
                    (selectedTab === 'rejected' && stage === '10') ||
                    (selectedTab === 'approved' && stage === '5') 
                ) {
                    row.style.display = ''; 
                } else {
                    row.style.display = 'none'; 
                }
            });

            console.log(`Selected Tab: ${selectedTab}`);
            console.log(`Filtered Rows: ${allRows}`);
        });
    });   
}

function initializedUserApplication() {
    console.log('Initializing application Tabs');
    ['all', 'pending', 'approved', 'rejected'].forEach(tab => {
        const link = document.getElementById(`${tab}Link`);
    
        link.addEventListener('click', function(event) {
            event.preventDefault();

            const selectedTab = tab;
            const tabs = ['all', 'pending', 'approved', 'rejected'];

            tabs.forEach(item => {
                const tabLink = document.getElementById(`${item}Link`);
                const tabContent = document.getElementById(item);
     
                if (item === selectedTab) {
                    tabLink.classList.remove('text-gray-600')
                    tabLink.classList.add('border-b-2', 'border-red-600','text-red-500');
                    tabContent.classList.remove('hidden');
                } else {
                    tabLink.classList.remove('border-b-2', 'border-red-600','text-red-500');
                    tabContent.classList.add('hidden');
                }
            });

            const allRows = document.querySelectorAll('#applicaton-container[data-stage]');
            const volRows = document.querySelectorAll('#volunteer-container[data-stage]');

            allRows.forEach(row => {
                const stage = row.getAttribute('data-stage');

                if (
                    selectedTab === 'all' ||
                    (selectedTab === 'pending' && stage >= '0' && stage <= '8' && stage != '10' ) ||
                    (selectedTab === 'rejected' && stage === '10') ||
                    (selectedTab === 'approved' && stage === '9') 
                ) {
                    row.style.display = ''; 
                } else {
                    row.style.display = 'none'; 
                }
            });

            volRows.forEach(row => {
                const stage = row.getAttribute('data-stage');

                if (
                    selectedTab === 'all' ||
                    (selectedTab === 'pending' && stage >= '0' && stage <= '4' && stage != '10' ) ||
                    (selectedTab === 'rejected' && stage === '10') ||
                    (selectedTab === 'approved' && stage === '5') 
                ) {
                    row.style.display = ''; 
                } else {
                    row.style.display = 'none'; 
                }
            });

            console.log(`Selected Tab: ${selectedTab}`);
            console.log(`Filtered Rows: ${allRows}`);
        });
    });   
}

function initializeScheduleAcceptedTabs() {
    console.log('has been initialized');
    ['all', 'pending', 'approved', 'rejected'].forEach(tab => {
        const link = document.getElementById(`${tab}Link`);

        link.addEventListener('click', function(event) {
            event.preventDefault();

            const selectedTab = tab;
            const tabs = ['all', 'pending', 'approved', 'rejected'];

            tabs.forEach(item => {
                const tabLink = document.getElementById(`${item}Link`);
                const tabContent = document.getElementById(item);

                if (item === selectedTab) {
                    tabLink.classList.remove('text-gray-600')
                    tabLink.classList.add('border-b-2', 'border-red-600','text-red-500');
                    tabContent.classList.remove('hidden');
                } else {
                    tabLink.classList.remove('border-b-2', 'border-red-600','text-red-500');
                    tabContent.classList.add('hidden');
                }
            });

            const allRows = document.querySelectorAll('#acceptedSchedule[data-stage]');

            allRows.forEach(row => {
                const stage = row.getAttribute('data-stage');

                if (
                    selectedTab === 'all' ||
                    (selectedTab === 'pending' && stage === 'Interview' ) ||
                    (selectedTab === 'approved' && stage === 'Visit') ||
                    (selectedTab === 'rejected' && stage === 'Pickup')
                ) {
                    row.style.display = ''; 
                } else {
                    row.style.display = 'none'; 
                }
            });

            console.log(`Selected Tab: ${selectedTab}`);
            console.log(`Filtered Rows: ${allRows}`);
        });
    });   
}

function initializeScheduleTabs() {
    console.log('Schedule has been initialized');
    ['all', 'interview', 'visit', 'pickup'].forEach(tab => {
        const link = document.getElementById(`${tab}Schedule`);

        link.addEventListener('click', function(event) {
            event.preventDefault();

            const selectedTab = tab;
            const tabs = ['all', 'pickup', 'interview', 'visit'];

            tabs.forEach(item => {
                const tabLink = document.getElementById(`${item}Schedule`);
                const tabContent = document.getElementById(item);
                
                if (item === selectedTab) {
                    tabLink.classList.remove('text-gray-600');
                    tabLink.classList.add('border-b-2', 'border-red-600', 'text-red-500');
                    tabContent.classList.remove('hidden');
                } else {
                    tabLink.classList.remove('border-b-2', 'border-red-600', 'text-red-500');
                    tabContent.classList.add('hidden');
                }
                tabContent.classList.toggle('hidden', item !== selectedTab);
            });

            const allRows = document.querySelectorAll('#pendingSchedule[data-stage]');

            allRows.forEach(row => {
                const stage = row.getAttribute('data-stage');

                if (
                    selectedTab === 'all' ||
                    (selectedTab === 'interview' && stage === 'Interview' ) ||
                    (selectedTab === 'visit' && stage === 'Visit') ||
                    (selectedTab === 'pickup' && stage === 'Pickup')
                ) {
                    row.style.display = ''; 
                } else {
                    row.style.display = 'none'; 
                }
            });

            console.log(`Selected Tab: ${selectedTab}`);
            
        });
    });
}

// user pet page search
$(document).ready(function() {
    $('#user-pet-search').on('input', function() {
        let value = $(this).val().toLowerCase();  
        
        $('.user-pet-lists').each(function () {
            let petName = $(this).attr('data-name');
            if (petName) {
                petName = petName.toLowerCase();
                if (petName.indexOf(value) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            }
        });
    });
});

// home pet page search
$(document).ready(function() {
    $('#pet-search').on('input', function() {
        let value = $(this).val().toLowerCase();  
        
        $('.pet-lists').each(function () {
            let petName = $(this).attr('data-name');
            if (petName) {
                petName = petName.toLowerCase();
                if (petName.indexOf(value) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            }
        });
    });
});

// initial page pets search
$(document).ready(function() {
    $('#initial-pet-search').on('input', function() {
        let value = $(this).val().toLowerCase();  
        
        $('.pet-container').each(function () {
            let petName = $(this).attr('data-name'); 
            if (petName !== undefined) { 
                petName = petName.toLowerCase();
                if (petName.indexOf(value) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            }
        });
    });
});

// admin page search
$(document).ready(function() {
    $('#pending-user-search').on('input', function() {
        let value = $(this).val().toLowerCase();  
        
        $('.schedule-user-pending').each(function () {
            let username = $(this).attr('data-name'); 
            if (username !== undefined) { 
                username = username.toLowerCase(); 
                if (username.indexOf(value) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            }
        });
    });
});

$(document).ready(function() {
    $('#accepted-user-search').on('input', function() {
        let value = $(this).val().toLowerCase();  
        
        $('.schedule-user').each(function () {
            let username = $(this).attr('data-name'); 
            if (username !== undefined) { 
                username = username.toLowerCase(); 
                if (username.indexOf(value) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            }
        });
    });
});

$(document).ready(function() {
    $('#registered-user').on('input', function() {
        let value = $(this).val().toLowerCase();  
        
        $('.registeredUser').each(function () {
            let username = $(this).attr('data-name'); 
            if (username !== undefined) { 
                username = username.toLowerCase(); 
                if (username.indexOf(value) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            }
        });
    });
});
// admin adoption search
$(document).ready(function() {
    $('#adoption-search').on('input', function() {
        let value = $(this).val().toLowerCase();  
        
        $('.user-container').each(function () {
            let userName = $(this).attr('data-name'); 
            let userLastName = $(this).attr('data-lastname');
            if (userName !== undefined && userLastName !== undefined) {
                userName = userName.toLowerCase();
                userLastName = userLastName.toLowerCase();
                if (userName.indexOf(value) === -1 && userLastName.indexOf(value) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            }
        });
    });
});

$(document).ready(function() {
    $('#simple-search').on('input', function() {
        let value = $(this).val().toLowerCase();  
        
        $('.pet-container').each(function () {
            let petName = $(this).attr('data-name'); 
            if (petName !== undefined) { 
                petName = petName.toLowerCase(); 
                if (petName.indexOf(value) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            }
        });
    });
});

$(document).ready(function() {
    $('input[type=checkbox]').change(function() {
        // Hide all rows
        $('.pet-container').hide();

        // Get all selected values for each filter
        var petTypes = $('#category-body input[type=checkbox]:checked').map(function() {
            return this.value;
        }).get();

        var adoptionStatus = $('#adoption-body input[type=checkbox]:checked').map(function() {
            return this.value;
        }).get();

        var petGender = $('#gender-body input[type=checkbox]:checked').map(function() {
            return this.value;
        }).get();

        var petVacStatus = $('#vacStatus-body input[type=checkbox]:checked').map(function() {
            return this.value;
        }).get();

        var petSize = $('#size-body input[type=checkbox]:checked').map(function() {
            return this.value;
        }).get();

        // Filter elements based on all selected criteria
        $('.pet-container').filter(function() {
            var typeMatch = petTypes.length === 0 || petTypes.includes($(this).data('type'));
            var adoptionMatch = adoptionStatus.length === 0 || adoptionStatus.includes($(this).data('adoption'));
            var genderMatch = petGender.length === 0 || petGender.includes($(this).data('gender'));
            var petVacStatusMatch = petVacStatus.length === 0 || petVacStatus.includes($(this).data('vaccination'));
            var petSizeMatch = petSize.length === 0 || petSize.includes($(this).data('size'));

            return typeMatch && adoptionMatch && genderMatch && petVacStatusMatch && petSizeMatch;
        }).show();

        // If no checkboxes are selected, show all rows
        if ($('input[type=checkbox]:checked').length === 0) {
            $('.pet-container').show();
        }
    });
});



// profile image for registration
var loadFile = function(event) {
            
    var input = event.target;
    var file = input.files[0];
    var type = file.type;

   var output = document.getElementById('preview_img');


    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
    }
};


// function deletePet(petId) {
//     fetch(`/pets/${petId}`, {
//         method: 'DELETE',
//         headers: {
//             'Content-Type': 'application/json',
//             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//         },
//     })
//     .then(response => {
//         if (response.ok) {
//             // Pet was successfully deleted
//             response.json().then(data => {
//                 console.log(data.message); // Log the success message
//                 // Redirect or reload the page after deletion
//                 window.location.reload(); // Or navigate to another URL

//             });
//         } else {
//             console.error('Failed to delete pet');
//         }
//     })
//     .catch(error => {
//         console.error('Error deleting pet:', error);
//     });
    
// }

function updateElementContent(selector, content) {
    const element = document.querySelector(selector);
    if (element) {
        element.textContent = content;
    }
}

function previewPetDetails(petId) {
    fetch(`/pets/${petId}`)
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Failed to fetch pet details');
        })
        .then(data => {
            console.log(data);
            const petData = data.pet;

            const elementsMap = {
                '.pet_name': petData.pet_name,
                '.pet_type': petData.pet_type,
                '.pet_breed': petData.breed,
                '.pet_age': petData.age,
                '.pet_color': petData.color,
                '.pet_gender': petData.gender,
                '.pet_weight': petData.weight,
                '.pet_size': petData.size,
                '.pet_behaviour': petData.behaviour,
                '.adoption_status': petData.adoption_status,
                '.vaccination_status': petData.vaccination_status,
                '.pet_description': petData.description,
            };

            for (const selector in elementsMap) {
                updateElementContent(selector, elementsMap[selector]);
            }

            const petImage = document.querySelector('.pet_image'); // Assuming '.pet_image' represents an <img> tag
            if (petImage && petData.dropzone_file) {
                petImage.src = `/storage/images/${petData.dropzone_file}`;
            } else {
                petImage.style.display = 'none'; // Hide the image if there's no valid image file
            }
        })
        .catch(error => {
            console.error('Error fetching pet details:', error);
        });
}

function showSection(currentSection, nextSection) {
    document.getElementById(`section${currentSection}`).classList.add('hidden');
    document.getElementById(`section${nextSection}`).classList.remove('hidden');
}

document.addEventListener('DOMContentLoaded', function () {
    const uploadInput = document.getElementById('dropzone_file');
    const imgArea = document.querySelector('.img-area');
    const previewImage = document.getElementById('previewImage');

    uploadInput.addEventListener('change', (event) => {
      const file = event.target.files[0];

      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
          imgArea.classList.add('relative');
          previewImage.src = e.target.result;
          previewImage.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
      } else {
        imgArea.classList.remove('relative');
        previewImage.classList.add('hidden');
      }
    });

    const selectImageButton = document.querySelector('.select-image');
    selectImageButton.addEventListener('click', () => {
      uploadInput.click();
    });
  });

// document.addEventListener('DOMContentLoaded', function () {
//     const uploadInput = document.getElementById('dropzone_file');
//     const filenameLabel = document.getElementById('filename');
//     const imagePreview = document.getElementById('image-preview');
  
//     uploadInput.addEventListener('change', (event) => {
//       const file = event.target.files[0];
  
//       if (file) {
//         filenameLabel.textContent = file.name;
//         const reader = new FileReader();
//         reader.onload = (e) => {
//           imagePreview.innerHTML =
//             `<input name="dropzone_file" id="dropzone_file" type="file" class="hidden" accept="image/*" />
//             <img src="${e.target.result}" class="max-w-xs object-fill rounded-lg mx-auto" style="max-height: 14em;" alt="Image preview" />`;
//           imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');
//         };
//         reader.readAsDataURL(file);
//       } else {
//         filenameLabel.textContent = '';
//         imagePreview.innerHTML =
//           `<input name="dropzone_file" id="dropzone_file" type="file" class="hidden" accept="image/*" />
//           <label for="dropzone_file" class="cursor-pointer">
//             <!-- Your existing label content -->
//           </label>`;
//         imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');
//       }
//     });
  
//     uploadInput.addEventListener('click', (event) => {
//       event.stopPropagation();
//     });
//     });

//   closemodal.addEventListener('click', (event) => {
//     imagePreview.innerHTML =
//     ` <input name="dropzone_file" id="dropzone_file" type="file" class="hidden" accept="image/*" />
//     <label for="dropzone_file" class="cursor-pointer">
//       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
//         <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
//       </svg>
//       <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
//       <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
//       <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
//       <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
//     </label>`;
//   imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');

//  });
  
//  discardb.addEventListener('click', (event) => {
//     imagePreview.innerHTML =
//     ` <input name="dropzone_file" id="dropzone_file" type="file" class="hidden" accept="image/*" />
//     <label for="dropzone_file" class="cursor-pointer">
//       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
//         <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
//       </svg>
//       <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
//       <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
//       <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
//       <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
//     </label>`;
//   imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');

//  });



// const uploadInput = document.getElementById('upload');
//   const filenameLabel = document.getElementById('filename');
//   const imagePreview = document.getElementById('image-preview');

//   // Check if the event listener has been added before
//   let isEventListenerAdded = false;

//   uploadInput.addEventListener('change', (event) => {
//     const file = event.target.files[0];

//     if (file) {
//       filenameLabel.textContent = file.name;

//       const reader = new FileReader();
//       reader.onload = (e) => {
//         imagePreview.innerHTML =
//           `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
//         imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');

//         // Add event listener for image preview only once
//         if (!isEventListenerAdded) {
//           imagePreview.addEventListener('click', () => {
//             uploadInput.click();
//           });

//           isEventListenerAdded = true;
//         }
//       };
//       reader.readAsDataURL(file);
//     } else {
//       filenameLabel.textContent = '';
//       imagePreview.innerHTML =
//         `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
//       imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');

//       // Remove the event listener when there's no image
//       imagePreview.removeEventListener('click', () => {
//         uploadInput.click();
//       });

//       isEventListenerAdded = false;
//     }
//   });

//   uploadInput.addEventListener('click', (event) => {
//     event.stopPropagation();
//   });



//   const uploadInput2 = document.getElementById('upload2');
//   const filenameLabel2 = document.getElementById('filename2');
//   const imagePreview2 = document.getElementById('image-preview2');

//   // Check if the event listener has been added before
//   let isEventListenerAdded2 = false;

//   uploadInput2.addEventListener('change', (event) => {
//     const file = event.target.files[0];

//     if (file) {
//       filenameLabel2.textContent = file.name;

//       const reader = new FileReader();
//       reader.onload = (e) => {
//         imagePreview2.innerHTML =
//           `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
//         imagePreview2.classList.remove('border-dashed', 'border-2', 'border-gray-400');

//         // Add event listener for image preview only once
//         if (!isEventListenerAdded2) {
//           imagePreview2.addEventListener('click', () => {
//             uploadInput2.click();
//           });

//           isEventListenerAdded2 = true;
//         }
//       };
//       reader.readAsDataURL(file);
//     } else {
//       filenameLabel2.textContent = '';
//       imagePreview2.innerHTML =
//         `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
//       imagePreview2.classList.add('border-dashed', 'border-2', 'border-gray-400');

//       // Remove the event listener when there's no image
//       imagePreview2.removeEventListener('click', () => {
//         uploadInput2.click();
//       });

//       isEventListenerAdded2 = false;
//     }
//   });

//   uploadInput.addEventListener('click', (event) => {
//     event.stopPropagation();
//   });

var animation = document.getElementsByClassName("animation");

window.onscroll = function() {
    for(let i = 0; i<animation.length; i++) {
       var topElm = animation[i].offsetTop;
       var btElm = animation[i].offsetTop + animation[i].clientHeight;
       var topScreen = window.scrollY;
       var btmScreen = window.scrollY + window.innerHeight;

       if (btmScreen > topElm && topScreen < btElm) {
           animation[i].classList.add("animation-opacity");

        } else{
            animation[i].classList.remove("animation-opacity");
        }
    }
}

