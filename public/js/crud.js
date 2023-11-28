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
                '.pet_description': petData.description
            };

            for (const selector in elementsMap) {
                updateElementContent(selector, elementsMap[selector]);
            }
        })
        .catch(error => {
            console.error('Error fetching pet details:', error);
        });
}



