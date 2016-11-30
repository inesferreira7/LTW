$(document).ready(function() {

  $('input:radio[value="user"]').change(function(){
    if ($(this).is(':checked') == true) {
      if($('form').length != 0){ //Impede que quando voltamos a carregar crie outro abaixo
        $('form').remove();
      }
      $form = $('<form id="form" method="post" action="signupR.php"></form>');
      $form.append('<label> First name <input type="text" class ="preenche" name="firstname"></label><br>'); //Primeiro nome
      $form.append('<label> Last name<input type="text" class ="preenche" name="lastname"></label><br>'); //Ultimo nome
      $form.append('<label> Email <input type="e-mail" class ="preenche" name="email"></label><br>'); //Email
      $form.append('<div id="un"><label> Username <input type="text" class ="preenche" name="username"></label><img class="u" src ="info.png" alt="inf" width="25" height="25"></div><br>'); //Username
      $form.append('<div id="pw"><label> Password <input type="password" class ="preenche" name="password"></label><img class="p" src ="info.png" alt="inf" width="25" height="25"></div><br>'); //Password
      $form.append('<input type="file" name="image" id="uploadInput">');
      $form.append('<button type="submit" class="button"> Register! </button>');

      $('body').append($form);

        $( "img[class='u']" ).mouseover(function() {
          $( "#un" ).append( "<p> Username needs to be at least 3 characters long.</p>" );
        });

        $( "img[class='u']" ).mouseout(function() {
          $( "p" ).remove();
        });

        $( "img[class='p']" ).mouseover(function() {
          $( "#pw" ).append( "<p> Password needs to be at least 7 characters long.</p>" );
        });

        $( "img[class='p']" ).mouseout(function() {
          $( "p" ).remove();
        });

    }
  });

  $('input:radio[value="owner"]').change(function(){
    if ($(this).is(':checked') == true) {
      if($('form').length != 0){
        $('form').remove();
      }
      $form = $("<form ></form>");
      $form.append('<label> First name <input type="text" class ="preenche" name="firstname"></label><br>'); //Primeiro nome
      $form.append('<label> Last name<input type="text" class ="preenche" name="lastname"></label><br>'); //Ultimo nome
      $form.append('<label> Email <input type="e-mail" class ="preenche" name="email"></label><br>'); //Email
      $form.append('<label> Username <input type="text" class ="preenche" name="username"></label><br>'); //Username
      $form.append('<label> Password <input type="password" class ="preenche" name="password"></label><br>'); //Password
      $form.append('<button type="button" class="button"> Register! </button');

      $('body').append($form);
    }
  });

  });

function check(){
  var username = document.getElementById("loginUsername");
  var password = document.getElementById("loginPassword");

  if(username.value == ""){
    username.style.borderColor = 'red';
    username.style.backgroundColor = '#F4A460';
  }
  else{
    username.style.backgroundColor = 'white';
  }

  if(password.value == ""){
    password.style.borderColor = 'red';
    password.style.backgroundColor = '#F4A460';
  }
  else{
    password.style.backgroundColor  ='white';
  }

  if(username.value == "" || password.value == "")
    return false;

  return true;
}
