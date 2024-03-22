$(document).ready(function(){
    $('#login-form').submit(function(e){
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            dataType: 'json',
            data: {email: email, password: password},
            success: function(response){
                if(response.success) {
                    localStorage.setItem('userid', response.userData.id);
                    localStorage.setItem('username', response.userData.name);
                    localStorage.setItem('useremail', response.userData.email);
                    window.location.href = 'profile.html';
                } else {
                    $('#message').text(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
