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

 });
