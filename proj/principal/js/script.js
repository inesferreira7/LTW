


$(document).ready(function() {

  $('input:radio[value="user"]').change(function(){
    if ($(this).is(':checked') == true) {
      if($('form').length != 0){ //Impede que quando voltamos a carregar crie outro abaixo
        $('form').remove();
      }
      $defaultPhoto = '../res/images/defaultUser.png';
      $form = $('<form id="form" method="post" action="../pages/signupR.php" onsubmit="return checkR();" enctype="multipart/form-data"></form>');
      $form.append('<label> First name <input type="text" class ="preenche" name="firstname" id="firstnameR"></label><br>'); //Primeiro nome
      $form.append('<label> Last name<input type="text" class ="preenche" name="lastname" id="lastnameR"></label><br>'); //Ultimo nome
      $form.append('<label> Email <input type="e-mail" class ="preenche" name="email" id="emailR"></label><br>'); //Email
      $form.append('<div id="un"><label> Username <input type="text" class ="preenche" name="username" id="usernameR"></label><img class="u" src ="../res/images/info.png" alt="inf" width="25" height="25"></div><br>'); //Username
      $form.append('<div id="pw"><label> Password <input type="password" class ="preenche" name="password" id="passwordR"></label><img class="p" src ="../res/images/info.png" alt="inf" width="25" height="25"></div><br>'); //Password
      $form.append('<img id="photo" class= "setPhoto" src="#" onerror="this.src=$defaultPhoto"  />' );
      $form.append('<input type="file" onchange="readURL(this);" name="userfile" />');
      $form.append('<input type="hidden" name="MAX_FILE_SIZE" value="512000" />');
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
      $defaultPhoto = '../res/images/defaultUser.png';
      $form = $('<form id="form" method="post" action="../pages/signupO.php" onsubmit="return checkO();" enctype="multipart/form-data"></form>');
      $divL = $('<div id="left" style="display:inline-block; margin-right:60px">');
      $divL.append('<label> First name <input type="text" class ="preenche" name="firstname" id="firstnameO"></label><br>'); //Primeiro nome
      $divL.append('<label> Last name<input type="text" class ="preenche" name="lastname" id="lastnameO"></label><br>'); //Ultimo nome
      $divL.append('<label> Email <input type="e-mail" class ="preenche" name="email" id="emailO"></label><br>'); //Email
      $divL.append('<div id="un"><label> Username <input type="text" class ="preenche" name="username" id="usernameO"></label><img class="u" src ="../res/images/info.png" alt="inf" width="25" height="25"></div><br>'); //Username
      $divL.append('<div id="pw"><label> Password <input type="password" class ="preenche" name="password" id="passwordO"></label><img class="p" src ="../res/images/info.png" alt="inf" width="25" height="25"></div><br>'); //Password
      $form.append($divL);
      $divR =$('<div id="right" style="display:inline-block">');
      $divR.append('<p id="rest"> Register your restaurant</p>');
      $divR.append('<label> Name <input type="text" class ="preenche" name="r_name" id="r_nameO"></label><br>'); //Name of restaurant
      $divR.append('<label> Description <input type="text" class ="preenche" name="description" id="descriptionO"></label><br>'); //Description
      $divR.append('<label> Address <input type="text" class ="preenche" name="address" id="addressO"></label><br>'); //Address
      $form.append($divR);

      $divP =$('<div id="photosO" style="display:inline-block">');
      $divP.append('<p id="phototextO"> User photo</p>');
      $divP.append('<img id="ownerPhoto" class= "oPhoto" src="#" onerror="this.src=$defaultPhoto"  />' );
      $divP.append('<input id="submitO" type="file" onchange="readURL1(this);" name="OPS"  />');
      $divP.append('<input type="hidden" name="MAX_FILE_SIZE" value="512000" />');
      $form.append($divP);

      $divPR =$('<div id="photosR" style="display:inline-block">');
      $divPR.append('<p id="phototextR"> Restaurant photo</p>');
      $divPR.append('<img id="restaurantPhoto" class= "rPhoto" src="#" onerror="this.src=$defaultPhoto"  />' );
      $divPR.append('<input  id="submitR" type="file" onchange="readURL2(this);" name="RPS"/>');
      $divPR.append('<input type="hidden" name="MAX_FILE_SIZE" value="512000" />');
      $form.append($divPR);


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

function checkLogin(){
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
      $('#ownerPhoto')
          .attr('src', e.target.result);

    };

    reader.readAsDataURL(input.files[0]);
  }


}

function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#restaurantPhoto')
          .attr('src', e.target.result);

    };

    reader.readAsDataURL(input.files[0]);
  }


}

function checkR(){
  var firstname = document.getElementById("firstnameR");
  var lastname = document.getElementById("lastnameR");
  var email = document.getElementById("emailR");
  var username = document.getElementById("usernameR");
  var password = document.getElementById("passwordR");

  if(firstname.value == ""){
    firstname.style.borderColor = 'red';
    firstname.style.backgroundColor = '#F4A460';
    return false;
  }

  if(lastname.value == ""){
    lastname.style.borderColor = 'red';
    lastname.style.backgroundColor = '#F4A460';
    return false;
  }

  if(email.value == ""){
    email.style.borderColor = 'red';
    email.style.backgroundColor = '#F4A460';
    return false;
  }

  if(username.value == "" || strlen(username.value) < 3){
    username.style.borderColor = 'red';
    username.style.backgroundColor = '#F4A460';
  }

  if(password.value == "" || strlen(password.value) < 7){
    password.style.borderColor = 'red';
    password.style.backgroundColor = '#F4A460';
    return false;
  }

  return true;
}

function checkO(){
  var firstname = document.getElementById("firstnameO");
  var lastname = document.getElementById("lastnameO");
  var email = document.getElementById("emailO");
  var username = document.getElementById("usernameO");
  var password = document.getElementById("passwordO");
  var r_name = document.getElementById("r_nameO");
  var description = document.getElementById("descriptionO");
  var address = document.getElementById("addressO");

  if(firstname.value == ""){
    firstname.style.borderColor = 'red';
    firstname.style.backgroundColor = '#F4A460';
    return false;
  }

  if(lastname.value == ""){
    lastname.style.borderColor = 'red';
    lastname.style.backgroundColor = '#F4A460';
    return false;
  }

  if(email.value == ""){
    email.style.borderColor = 'red';
    email.style.backgroundColor = '#F4A460';
    return false;
  }

  if(username.value == "" || strlen(username.value) < 3){
    username.style.borderColor = 'red';
    username.style.backgroundColor = '#F4A460';
    return false;
  }

  if(password.value == "" || strlen(password.value) < 7){
    password.style.borderColor = 'red';
    password.style.backgroundColor = '#F4A460';
    return false;
  }

  if(r_name.value == ""){
    r_name.style.borderColor = 'red';
    r_name.style.backgroundColor = '#F4A460';
    return false;
  }

  if(description.value == ""){
    description.style.borderColor = 'red';
    description.style.backgroundColor = '#F4A460';
    return false;
  }

  if(address.value == ""){
    address.style.borderColor = 'red';
    address.style.backgroundColor = '#F4A460';
    return false;
  }

  return true;
}
