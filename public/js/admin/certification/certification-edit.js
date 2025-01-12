document.addEventListener('DOMContentLoaded', function () {
    // Handle form submission for editing certification
    const form = document.getElementById('edit-certification-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        // Collect form data
        const formData = new FormData(form);
        
        // Example: Send the form data to update the certification
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 201) {
                alert('Certification updated successfully');
                window.location.href = '/admin/certification'; // Redirect to certification list
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error updating the certification.');
        });
    });

    // Additional JS for dynamic behavior (validation, input handling, etc.)
    // Example: Confirm delete action
    const deleteBtn = document.getElementById('delete-certification-btn');
    if (deleteBtn) {
        deleteBtn.addEventListener('click', function () {
            const confirmation = confirm('Are you sure you want to delete this certification?');
            if (confirmation) {
                // Perform delete action (you can use AJAX or standard form submission)
                const form = document.getElementById('delete-certification-form');
                form.submit();
            }
        });
    }
});
