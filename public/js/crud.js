// home pet page filter
$(document).ready(function() {
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
    }).trigger('change'); // Trigger the change event initially to show all pets
});

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

// admin page search
$(document).ready(function() {
    $('#simple-search').on('input', function() {
        let value = $(this).val().toLowerCase();  
        
        $('.pet-container').each(function () {
            let petName = $(this).attr('data-name'); // Get the attribute value
            if (petName !== undefined) { // Check if the attribute exists
                petName = petName.toLowerCase(); // Convert to lowercase if it exists
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


function deletePet(petId) {
    fetch(`/pets/${petId}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
    .then(response => {
        if (response.ok) {
            // Pet was successfully deleted
            response.json().then(data => {
                console.log(data.message); // Log the success message
                // Redirect or reload the page after deletion
                window.location.reload(); // Or navigate to another URL

            });
        } else {
            console.error('Failed to delete pet');
        }
    })
    .catch(error => {
        console.error('Error deleting pet:', error);
    });
    
}

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

// // FOR ADDING PICTURE UPDATE

//  const uploadInput = document.getElementById('dropzone_file');
//   const filenameLabel = document.getElementById('filename');
//   const imagePreview = document.getElementById('image-preview');
//   const closemodal = document.getElementById('addclose');
//   const discardb = document.getElementById('dcdc');

 
//   // Check if the event listener has been added before
//   let isEventListenerAdded = false;


 
//   uploadInput.addEventListener('change', (event) => {
//     const file = event.target.files[0];

//     if (file) {
//       filenameLabel.textContent = file.name;
//       const reader = new FileReader();
//       reader.onload = (e) => {
//         imagePreview.innerHTML =
//           `<img src="${e.target.result}" class=" max-w-xs object-fill rounded-lg mx-auto" style = "max-height: 14em;" alt="Image preview" />`;
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
//         ` <input id="dropzone_file" name="dropzone_file" type="file" class="hidden" accept="image/*" />
//         <label for="dropzone_file" class="cursor-pointer">
//           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
//             <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
//           </svg>
//           <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
//           <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
//           <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
//           <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
//         </label>`;
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

//   closemodal.addEventListener('click', (event) => {
//     imagePreview.innerHTML =
//     ` <input id="dropzone_file" name="dropzone_file" type="file" class="hidden" accept="image/*" />
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
//     ` <input id="dropzone_file" name="dropzone_file" type="file" class="hidden" accept="image/*" />
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








