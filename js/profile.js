$(document).ready(function () {

    function fetchProfileInfo(userid) {
        $.ajax({
            url: 'php/getProfile.php',
            type: 'GET',
            dataType: 'json',
            data: { userid: userid },
            success: function (response) {
                if (response.success) {
                    document.getElementById('age').innerHTML = "Age : "+response.age;
                    document.getElementById('dob').innerHTML = "Dob : "+response.dob;
                    document.getElementById('contact').innerHTML = "Contact : "+response.contact;
                    document.getElementById('address').innerHTML = "Address : "+response.address;

                } else {
                    alert(response.message);
                    console.error(response.message);
                }
            },
            error: function (xhr, status, error) {
                alert("Unknown error");
                console.error("An error occurred while fetching user profile info.");
                console.error(xhr.responseText);
            }
        });
    }

    var userid = localStorage.getItem('userid');
    fetchProfileInfo(userid);
});
