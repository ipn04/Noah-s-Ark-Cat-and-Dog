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
            const petName = document.querySelector('.pet_name');// Removed '#' from the selector
            const petType = document.querySelector('.pet_type'); // Corrected the selector
            const petBreed = document.querySelector('.pet_breed');// Removed '#' from the selector
            const petAge = document.querySelector('.pet_age'); // Corrected the selector
            const petColor = document.querySelector('.pet_color');// Removed '#' from the selector
            const petGender = document.querySelector('.pet_gender'); // Corrected the selector
            const petWeight = document.querySelector('.pet_weight');// Removed '#' from the selector
            const petSize = document.querySelector('.pet_size'); // Corrected the selector
            const petBehaviour = document.querySelector('.pet_behaviour');// Removed '#' from the selector
            const adoptionStatus = document.querySelector('.adoptionS_status'); // Corrected the selector
            const vaccinationStatus = document.querySelector('.vaccination_status');// Removed '#' from the selector
            const petDescription = document.querySelector('.pet_description'); // Corrected the selector

            petName.textContent = petData.pet_name;
            petType.textContent = petData.pet_type;  
            petBreed.textContent = petData.breed; 
            petAge.textContent = petData.age; 
            petColor.textContent = petData.color; 
            petGender.textContent = petData.gender;
            petWeight.textContent = petData.weight;
            petSize.textContent = petData.size;
            petBehaviour.textContent = petData.behaviour;
            adoptionStatus.textContent = petData.adoption_status;
            vaccinationStatus.textContent = petData.vaccination_status;
            petDescription.textContent = petData.description;
        })
        .catch(error => {
            console.error('Error fetching pet details:', error);
        });
}



