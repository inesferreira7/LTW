$(document).ready(function() {

  $('input:radio[value="user"]').change(function(){
    if ($(this).is(':checked') == true) {
      if($('form').length != 0){ //Impede que quando voltamos a carregar crie outro abaixo
        $('form').remove();
      }
      $form = $('<form id="form" method="post" action="login.php"></form>');
      $form.append('<label> First name <input type="text" class ="preenche" name="firstname"></label><br>'); //Primeiro nome
      $form.append('<label> Last name<input type="text" class ="preenche" name="lastname"></label><br>'); //Ultimo nome
      $form.append('<label> Email <input type="e-mail" class ="preenche" name="email"></label><br>'); //Email
      $form.append('<label> Username <input type="text" class ="preenche" name="username"></label><br>'); //Username
      $form.append('<label> Password <input type="password" class ="preenche" name="password"></label><br>'); //Password
      $form.append('<button type="button" class="button"> Register! </button');

      $('body').append($form);
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

console.log(document.childNodes);

document.getElementById('login').onclick = function(){
  console.log("merda");
  var username = document.getElementById('loginUsername');
  var password = document.getElementById('loginPassword');

  var elements = [username, password];

  for(index in elements){
    if(elements[index].value == ''){
      onError(elements[index]);
      return false;
    }else{
      onOk(elements[index]);
    }
  }
  var script = $.post("getUsers.php", {username: username.value, password: password.value});

  script.done(function(data) {

   if(data == 'true') {
         var login = document.getElementById('login');
         login.submit();
         return true;
   }

   console.log("Oops...");
});

script.fail(function() {
  console.log("Oops...");
});

return false;
}

function onError(element) {
	element.style.borderColor = 'red';
	element.style.backgroundColor = '#FFDEDE';
}

function onOk(element) {
	element.style.borderColor = '#E2E2E2';
	element.style.backgroundColor = 'white';
}
