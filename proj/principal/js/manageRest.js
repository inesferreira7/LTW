function openEdit() {
    if($('form').length != 0){ //Impede que quando voltamos a carregar crie outro abaixo
        $('form').remove();
    }
    $form = $('<form id="form" method="post" action="../pages/updateRestaurant.php"></form>');
    $form.append('<label> Name of restaurant <input type="text" class ="preenche" name="name"></label><br>'); //Name of restaurant
    $form.append('<label> Description  <input type="text" class ="preenche" name="description"></label><br>'); //Description
    $form.append('<label> Address      <input type="text" class ="preenche" name="address" id="email"></label><br>'); //Address
    $form.append('<button type="submit" class="button"> Update </button>');

    $('body').append($form);
}
