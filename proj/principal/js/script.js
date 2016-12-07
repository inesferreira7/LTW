


$(document).ready(function() {

  $('input:radio[value="user"]').change(function(){
    if ($(this).is(':checked') == true) {
      if($('form').length != 0){ //Impede que quando voltamos a carregar crie outro abaixo
        $('form').remove();
      }
      $form = $('<form id="form" method="post" action="../pages/signupR.php"></form>');
      $form.append('<label> First name <input type="text" class ="preenche" name="firstname"></label><br>'); //Primeiro nome
      $form.append('<label> Last name<input type="text" class ="preenche" name="lastname"></label><br>'); //Ultimo nome
      $form.append('<label> Email <input type="e-mail" class ="preenche" name="email"></label><br>'); //Email
      $form.append('<div id="un"><label> Username <input type="text" class ="preenche" name="username"></label><img class="u" src ="../res/images/info.png" alt="inf" width="25" height="25"></div><br>'); //Username
      $form.append('<div id="pw"><label> Password <input type="password" class ="preenche" name="password"></label><img class="p" src ="../res/images/info.png" alt="inf" width="25" height="25"></div><br>'); //Password
      $form.append('<button type="submit" class="button"> Register! </button>');

      $('body').append($form);

        $( "img[class='u']" ).mouseover(function() {
          $( "#un" ).append( "<h5 id='userParagraph' > Username needs to be at least 3 characters long.</h5>" );
        });

        $( "img[class='u']" ).mouseout(function() {
          $( "h5" ).remove();
        });

        $( "img[class='p']" ).mouseover(function() {
          $( "#pw" ).append( "<h5 id='passParagraph'> Password needs to be at least 7 characters long.</h5>" );
        });

        $( "img[class='p']" ).mouseout(function() {
          $( "h5" ).remove();
        });

    }
  });

  $('input:radio[value="owner"]').change(function(){
    if ($(this).is(':checked') == true) {
      if($('form').length != 0){
        $('form').remove();
      }
      $form = $('<form id="form" method="post" action="../pages/signupO.php"></form>');
      $form.append('<label> First name <input type="text" class ="preenche" name="firstname"></label><br>'); //Primeiro nome
      $form.append('<label> Last name<input type="text" class ="preenche" name="lastname"></label><br>'); //Ultimo nome
      $form.append('<label> Email <input type="e-mail" class ="preenche" name="email"></label><br>'); //Email
      $form.append('<div id="un"><label> Username <input type="text" class ="preenche" name="username"></label><img class="u" src ="../res/images/info.png" alt="inf" width="25" height="25"></div><br>'); //Username
      $form.append('<div id="pw"><label> Password <input type="password" class ="preenche" name="password"></label><img class="p" src ="../res/images/info.png" alt="inf" width="25" height="25"></div><br>'); //Password
      $form.append('<label> Name <input type="text" class ="preenche" name="r_name"></label><br>'); //Name of restaurant
      $form.append('<label> Description <input type="text" class ="preenche" name="description"></label><br>'); //Description
      $form.append('<label> Address <input type="text" class ="preenche" name="address"></label><br>'); //Address
      $form.append('<button type="submit" class="button"> Register! </button>');

      $('body').append($form);

        $( "img[class='u']" ).mouseover(function() {
          $( "#un" ).append( "<h5 id='userParagraph' > Username needs to be at least 3 characters long.</h5>" );
        });

        $( "img[class='u']" ).mouseout(function() {
          $( "h5" ).remove();
        });

        $( "img[class='p']" ).mouseover(function() {
          $( "#pw" ).append( "<h5 id='passParagraph'> Password needs to be at least 7 characters long.</h5>" );
        });

        $( "img[class='p']" ).mouseout(function() {
          $( "h5" ).remove();
        });
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
