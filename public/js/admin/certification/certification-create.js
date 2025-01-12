$(document).ready(function(){
    const base_url = window.location.origin;

    // When the form is submitted
    $(document).on("click", "#submit", function(e){
        e.preventDefault();
        $("#certificationForm").submit();  // Trigger the form submission
    });

    // Handle form submission using AJAX
    $("#certificationForm").on("submit", function(e){
        e.preventDefault();
        $(".invalid-feedback").remove();  // Clear previous error messages

        let formData = new FormData(this);  // Get form data

        $.ajax({
            url: base_url + "/admin/certification/store",  // Endpoint to submit data to
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // CSRF token for security
            },
            beforeSend: function(){
                $("#submit").html('<em>Submitting...</em>');  // Change button text to indicate submission
            },
            success: function(response){
                if(response.status == 201){
                    alert(response.message);  // Show success message in a simple alert
                    window.location.href = '/admin/certification';
                } else {
                    alert(response.message);  // Show error message in a simple alert
                }
            },
            error: function(response){
                if(response.status === 422){
                    let errors = response.responseJSON.errors;
                    $.each(errors, function(key, value){
                        $("#" + key).addClass('is-invalid');
                        $('<div class="invalid-feedback">' + value + '</div>').insertAfter("#" + key);
                    });
                }
            },
            complete: function(response){
                $("#submit").html('Submit');  // Reset button text after submission
            }
        });
    });
});
