// Wait for the document to be ready before executing the jQuery code
jQuery(document).ready(function ($) {

    // Attach a submit event listener to the form with the ID 'userRegister'
    $('#userRegister').on('submit', function (e) {
        // Prevent the default form submission behavior
        e.preventDefault();

        // Get the values of the userName and userFamily input fields
        let userName = $('#userName').val();
        let userFamily = $('#userFamily').val();

        // Get the value of the nonce field for security purposes
        let _nonce = $('#add_users_nonce').val();

        // Use AJAX to asynchronously send data to the server
        $.ajax({

            // Specify the URL to send the request to
            url: '/wp-admin/admin-ajax.php',

            // Specify the type of request (POST in this case)
            type: 'post',

            // Provide the data to be sent to the server
            data: {
                action: 'add_user',  // The action to perform on the server
                userName: userName,  // User's name
                userFamily: userFamily,  // User's family name
                _nonce: _nonce  // Nonce for security
            },
            // Define a callback function to handle a successful response
            success: function (response) {
                // Log the response to the console
                console.log(response);
            },

            // Define a callback function to handle an error response
            error: function (error) {
                // Log the error to the console
                console.log(error);
            },
        })

    })
});
