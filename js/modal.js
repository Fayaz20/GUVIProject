$(document).ready(function() {
   
    function loadUpdateProfileForm() {
        $.ajax({
            url: 'updateProfileForm.html', 
            type: 'GET',
            success: function(response) {
                $('#updateProfileFormContainer').html(response); 
            },
            error: function(xhr, status, error) {
                console.error('Failed to load update profile form:', error);
            }
        });
    }

    var modal = document.getElementById("updateProfileModal");

    var btn = document.getElementById("updateProfileBtn");

    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
        loadUpdateProfileForm(); 
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
