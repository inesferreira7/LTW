function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#photo')
          .attr('src', e.target.result);

    };

    reader.readAsDataURL(input.files[0]);
  }

}

function readURL1(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#photoR')
          .attr('src', e.target.result);

    };

    reader.readAsDataURL(input.files[0]);
  }

}

$( document ).ready(function() {
$("#next").click(function(){
      $('html, body').animate({scrollLeft: $("#lol").offset().left},2000);
      return false;
   });

   $("#sub").click(function(){
     if(!checkR())
         $('html, body').animate({scrollLeft: $("#lol2").offset().left},2000);
      });

 });


 function checkR(){
   var firstname = document.getElementById("firstnameR");
   var lastname = document.getElementById("lastnameR");
   var email = document.getElementById("emailR");
   var username = document.getElementById("usernameR");
   var password = document.getElementById("passwordR");

   if(firstname.value == ""){
     firstname.style.borderColor = 'red';
     firstname.style.backgroundColor = '#DC143C';
     return false;
   }

   if(lastname.value == ""){
     lastname.style.borderColor = 'red';
     lastname.style.backgroundColor = '#DC143C';
     return false;
   }

   if(email.value == ""){
     email.style.borderColor = 'red';
     email.style.backgroundColor = '#DC143C';
     return false;
   }

   if(username.value == "" || strlen(username.value) < 3){
     username.style.borderColor = 'red';
     username.style.backgroundColor = '#DC143C';
   }

   if(password.value == "" || strlen(password.value) < 7){
     password.style.borderColor = 'red';
     password.style.backgroundColor = '#DC143C';
     return false;
   }

   return true;
 }
