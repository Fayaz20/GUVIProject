$(document).ready(function(){
    $('#submitBtn').click(function(){
        let age = $('#age1').val();
        let dob = $('#dob1').val();
        let contact = $('#contact1').val();
        let address = $('#address1').val();

        if (age === '' || dob === '' || contact === '' || address === '') {
            console.log("data : "+age, dob, contact, address);
            alert('Please enter valid data');
            return;
        }
        $.ajax({
            url: "php/updateProfileForm.php",
            type: 'POST',
            dataType: 'json',
            data: {
                id: localStorage.getItem('userid'),
                age: age,
                dob: dob,
                contact: contact,
                address: address
            },
            success: function(response) {
                alert(response.message);
                window.location.href = 'profile.html';
            },
            error: function(xhr, status, error) {
                alert("An error occurred while processing your request.");
                console.error(xhr.responseText);
            }
        });
    });
});
