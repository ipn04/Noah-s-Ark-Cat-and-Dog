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
// function updateDrawer(petId) {

    // const form = document.getElementById(`drawer-update-product-${petId}`);
    
    // fetch(`/pets/${petId}`)
    
    //     .then(response => {
    //         if (response.ok) {
    //             return response.json();
    //         }
    //         throw new Error('Failed to fetch pet details');
    //     })
    //     .then(data => {
    //         console.log(data);
    //         console.log('edit button is clicked')
    //         const petData = data.pet;
    //         const currentName = document.querySelector('.update-name');
    //         const currentBreed = document.querySelector('.update-breed');
    //         const currentAge = document.querySelector('.update-age');
    //         const currentColor = document.querySelector('.update-color');
    //         const currentWeight = document.querySelector('.update-weight');
    //         const currentDescription = document.querySelector('.update-description');
            
    //         currentName.value = petData.pet_name;
    //         currentBreed.value = petData.breed;
    //         currentAge.value = petData.age;
    //         currentColor.value = petData.color;
    //         currentWeight.value = petData.weight;
    //         currentDescription.value = petData.description;
            
    //         const currentType = document.querySelector('.update-type');
    //         const currentAdoptionStatus = document.querySelector('.update-adoption-status');
    //         const currentGender = document.querySelector('.update-gender');
    //         const currentVaccinationStatus = document.querySelector('.update-vaccination-status');
    //         const updateSize = document.querySelector('.update-size');
    //         const currentBehaviour = document.querySelector('.update-behaviour');

    //         if (currentType) {
    //             Array.from(currentType.options).forEach(option => {
    //                 if (option.value === petData.pet_type) {
    //                     option.selected = true;
    //                 }
    //             });
    //         }
    //         if (currentAdoptionStatus) {
    //             Array.from(currentAdoptionStatus.options).forEach(option => {
    //                 if (option.value === petData.adoption_status) {
    //                     option.selected = true;
    //                 }
    //             });
    //         }
    //         if (currentGender) {
    //             Array.from(currentGender.options).forEach(option => {
    //                 if (option.value === petData.gender) {
    //                     option.selected = true;
    //                 }
    //             });
    //         }
    //         if (currentVaccinationStatus) {
    //             Array.from(currentVaccinationStatus.options).forEach(option => {
    //                 if (option.value === petData.vaccination_status) {
    //                     option.selected = true;
    //                 }
    //             });
    //         }
    //         if (updateSize) {
    //             Array.from(updateSize.options).forEach(option => {
    //                 if (option.value === petData.size) {
    //                     option.selected = true;
    //                 }
    //             });
    //         }
    //         if (currentBehaviour) {
    //             Array.from(currentBehaviour.options).forEach(option => {
    //                 if (option.value === petData.behaviour) {
    //                     option.selected = true;
    //                 }
    //             });
    //         }
    //         const update_img = document.querySelector('.update_pet_image'); 
    //         if (update_img && petData.dropzone_file) {
    //             update_img.src = `/storage/images/${petData.dropzone_file}`;
    //         } else {
    //             update_img.style.display = 'none'; // Hide the image if there's no valid image file
    //         }
    //     })
    //     .catch(error => {
    //         console.error('Error fetching pet details:', error);
    //     });
// }




