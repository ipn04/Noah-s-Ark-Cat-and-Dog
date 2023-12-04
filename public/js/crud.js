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
function updateDrawer(petId) {
    fetch(`/pets/${petId}`)
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            throw new Error('Failed to fetch pet details');
        })
        .then(data => {
            console.log(data);
            console.log('edit button is clicked')
            const petData = data.pet;
            const currentName = document.querySelector('.update-name');
            const currentBreed = document.querySelector('.update-breed');
            const currentAge = document.querySelector('.update-age');
            const currentColor = document.querySelector('.update-color');
            const currentWeight = document.querySelector('.update-weight');
            const currentDescription = document.querySelector('.update-description');
            
            currentName.value = petData.pet_name;
            currentBreed.value = petData.breed;
            currentAge.value = petData.age;
            currentColor.value = petData.color;
            currentWeight.value = petData.weight;
            currentDescription.value = petData.description;
            
            const currentType = document.querySelector('.update-type');
            const currentAdoptionStatus = document.querySelector('.update-adoption-status');
            const currentGender = document.querySelector('.update-gender');
            const currentVaccinationStatus = document.querySelector('.update-vaccination-status');
            const updateSize = document.querySelector('.update-size');
            const currentBehaviour = document.querySelector('.update-behaviour');

            if (currentType) {
                Array.from(currentType.options).forEach(option => {
                    if (option.value === petData.pet_type) {
                        option.selected = true;
                    }
                });
            }
            if (currentAdoptionStatus) {
                Array.from(currentAdoptionStatus.options).forEach(option => {
                    if (option.value === petData.adoption_status) {
                        option.selected = true;
                    }
                });
            }
            if (currentGender) {
                Array.from(currentGender.options).forEach(option => {
                    if (option.value === petData.gender) {
                        option.selected = true;
                    }
                });
            }
            if (currentVaccinationStatus) {
                Array.from(currentVaccinationStatus.options).forEach(option => {
                    if (option.value === petData.vaccination_status) {
                        option.selected = true;
                    }
                });
            }
            if (updateSize) {
                Array.from(updateSize.options).forEach(option => {
                    if (option.value === petData.size) {
                        option.selected = true;
                    }
                });
            }
            if (currentBehaviour) {
                Array.from(currentBehaviour.options).forEach(option => {
                    if (option.value === petData.behaviour) {
                        option.selected = true;
                    }
                });
            }
        })
        .catch(error => {
            console.error('Error fetching pet details:', error);
        });
}




