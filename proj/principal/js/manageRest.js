function openEdit() {

    if($('#each #formE').length != 0)
      $('#each #formE').remove();

    $formE = $('<form id="formE" method="post" action="../pages/updateRestaurant.php" enctype="multipart/form-data"></form>');
    $formE.append('<label> Name of restaurant <input type="text" class ="preenche" name="name"></label><br>'); //Name of restaurant
    $formE.append('<label> Description  <input type="text" class ="preenche" name="description"></label><br>'); //Description
    $formE.append('<label> Address      <input type="text" class ="preenche" name="address" id="email"></label><br>'); //Address
    $formE.append('<input type="file" onchange="readURL(this);" name="image" />');
    $formE.append('<button type="submit" class="button"> Update </button>');
    $formE.append('<input type="hidden" name="MAX_FILE_SIZE" value="512000" />');

    $('#righter').append($formE);
}

function openAdd() {

  if($('#form').length != 0)
    $('#form').remove();

    $div = $('<div id="addForm"></div>');
    $left = $('<div id="left"></div>');
    $right = $('<div id="right1"></div>');
    $form = $('<form id="form" method="post" action="../pages/addRestaurant.php" enctype="multipart/form-data"></form>');
    $left.append('<label> Name of restaurant <input type="text" class ="preenche" placeholder="Enter name of restaurant" name="name"></label><br>'); //Name of restaurant
    $left.append('<label> Description  <input type="text" class ="preenche" placeholder="Enter description" name="description"></label><br>'); //Description
    $left.append('<label> Address      <input type="text" class ="preenche" placeholder="Enter address" name="address" id="email"></label><br>'); //Address
    $right.append('<img id="photo" class= "setPhoto" src="#" onerror="this.src=\'../res/images/defaultUser.png\'"  />');
    $right.append('<input type="file" id="choose" onchange="readURL1(this);" name="image" />');
    $right.append('<button id="addS" type="submit" class="button"> Add restaurant</button>');
    $right.append('<input type="hidden" name="MAX_FILE_SIZE" value="512000" />');
    $form.append($left);
    $form.append($right);
    $div.append($form);
    $('body').append($div);
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageR')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }

}

function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#photo')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }

}
