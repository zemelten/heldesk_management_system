/* login.js */

// When the document is ready
$(document).ready(function() {
    // Add event listener for the login form submission
    $('.login-form').on('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting

        // Get the form data
        var email = $('#email').val();
        var password = $('#password').val();
        var remember = $('#remember').is(':checked');

        // Send an AJAX request to the login route
        $.ajax({
            type: 'POST',
            url: '/login',
            data: {
                email: email,
                password: password,
                remember: remember
            },
            success: function(response) {
                window.location.href = response.redirect; // Redirect the user to the dashboard
            },
            error: function(response) {
                $('.alert').remove(); // Remove any existing alerts

                // Add an error alert to the form
                $('.login-form').prepend('<div class="alert alert-danger">' + response.responseJSON.message + '</div>');
            }
        });
    });
});
