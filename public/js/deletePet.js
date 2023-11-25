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


