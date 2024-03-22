$(document).ready(function(){

    $('#logoutBtn').click(function(){
      
        localStorage.removeItem('userid');
        localStorage.removeItem('username');
        localStorage.removeItem('useremail');

    
        $.ajax({
            success: function(response){
               
                window.location.href = 'index.html';
            },
            error: function(xhr, status, error) {
                console.error('Logout failed:', xhr.responseText);
            }
        });
    });
});