function openEdit() {
    if($('form').length != 0){ //Impede que quando voltamos a carregar crie outro abaixo
        $('form').remove();
    }
    $form = $('<form id="form" method="post" action="../pages/updateUser.php" onsubmit="return check();"></form>');
    $form.append('<label> First name <input type="text" class ="preenche" name="firstname"></label><br>'); //Primeiro nome
    $form.append('<label> Last name  <input type="text" class ="preenche" name="lastname" id="lastname"></label><br>'); //Ultimo nome
    $form.append('<label> Email      <input type="text" class ="preenche" name="email" id="email"></label><br>'); //Email
    $form.append('<label> Username   <input type="text" class ="preenche" name="username" id="username"></label><br>'); //Username
    $form.append('<input type="file" onchange="readURL(this);" name="inputImg" />');
    $form.append('<button type="submit" class="button"> Update </button>');


    $('body').append($form);
}

function changePassword(){
    if($('form').length != 0){ //Impede que quando voltamos a carregar crie outro abaixo
        $('form').remove();
    }
    $form = $('<form id="form1" method="post" action="../pages/signup.php"></form>');
    $form.append('<label> Current Password<input type="password" class ="preenche" name="currPassword"></label><br>'); //Pass atual
    $form.append('<label> New Password <input type="password" class ="preenche" name="newPassword"></label><br>'); //Nova pass
    $form.append('<button type="submit" class="button"> Update </button>');

    $('body').append($form);

}

/*function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#currentPhoto')
                .attr('src', e.target.result);
            $('#bigImage1')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}*/