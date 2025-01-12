document.addEventListener('DOMContentLoaded', function () {
    // Handle form submission for editing experience
    const form = document.getElementById('edit-experience-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 201) {
                // Handle success
                alert('Experience updated successfully');
                window.location.href = '/admin/experience'; // Redirect to experience list
            } else {
                // Handle failure
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error updating the experience.');
        });
    });

    // Handle delete action
    const deleteBtn = document.getElementById('delete-experience-btn');
    if (deleteBtn) {
        deleteBtn.addEventListener('click', function () {
            const confirmation = confirm('Are you sure you want to delete this experience?');
            if (confirmation) {
                const form = document.getElementById('delete-experience-form');
                form.submit(); // Perform delete action
            }
        });
    }
});
