function openEdit(x) {

    if($('#formE').length != 0)
      $('#formE').remove();

    $formE = $('<form id="formE" method="post" action="../pages/updateRestaurant.php" enctype="multipart/form-data"></form>');
    $formE.append('<input name="token" type="hidden" value="' + x + '">');
    $formE.append('<label> Name of restaurant <input type="text" class ="preenche" name="name"></label><br>'); //Name of restaurant
    $formE.append('<label> Description  <input type="text" class ="preenche" name="description"></label><br>'); //Description
    $formE.append('<label> Address      <input type="text" class ="preenche" name="address" id="email"></label><br>'); //Address
    $formE.append('<input type="file" onchange="readURL(this);" name="image" />');
    $formE.append('<button type="submit" class="button"> Update </button>');
    $formE.append('<input type="hidden" name="MAX_FILE_SIZE" value="512000" />');

    $('#righter').append($formE);
}

function openAdd() {
    $('#form').append('<label> Name of restaurant <input type="text" class ="preenche" name="name"></label><br>'); //Name of restaurant
    $('#form').append('<label> Description  <input type="text" class ="preenche" name="description"></label><br>'); //Description
    $('#form').append('<label> Address      <input type="text" class ="preenche" name="address" id="email"></label><br>'); //Address
    $('#form').append('<input type="file" onchange="readURL(this);" name="image" />');
    $('#form').append('<button type="submit" class="button"> Add restaurant </button>');
    $('#form').append('<input type="hidden" name="MAX_FILE_SIZE" value="512000" />');
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }

}
