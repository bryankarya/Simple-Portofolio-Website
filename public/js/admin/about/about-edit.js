document.addEventListener('DOMContentLoaded', function () {
    // Select the form
    const form = document.getElementById('edit-about-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission (page reload)

        // Gather the form data
        const formData = new FormData(form);

        // Show loading state (optional)
        // You can show a loading spinner or something similar here

        // Send the AJAX request
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
        })
        .then(response => response.json())
        .then(data => {
            // Handle success
            if (data.status === 'success') {
                // Display success message
                alert(data.message); // You can replace this with your success message container
                  window.location.href = '/admin/about'
                // Optionally, update the form or some parts of the page without reloading
            } else {
                // Handle error (show errors on the form)
                alert(data.message); // You can replace this with your error handling
            }
        })
        .catch(error => {
            // Handle any AJAX errors
            console.error('Error:', error);
            alert('There was an error while updating the About section.');
        });
    });
});
