

$(document).ready(function(){
 

    $('#reg-but').click(function(){
      let name = $('#name').val();
      let email = $('#email').val();
      let password = $('#password').val();
      let regex = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/;
    

      if (name === '' || !regex.test(email) || password === '') {
        alert('Please enter valid data');
        return; 
      }
    
      $.ajax({
        url: "php/register.php",
        type: "post",
        dataType: 'json',
        data: {
          name: name,
          email: email,
          password: password
        },
        success: function(response){
          if(response.success) {
            console.log(response.message);
            alert('Registration successful try login now!');
            window.location.href = 'index.html';
          
          } else {
     
            alert(response.message);
            console.error(response.message);
            window.location.href = 'index.html';
          }
        },
        error: function(xhr, status, error) {
       
          alert("unknown error occurred");
          window.location.href = 'index.html';
          console.error(xhr.responseText);
        }
      });
    });
  });
  