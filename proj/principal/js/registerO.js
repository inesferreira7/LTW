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

$( document ).ready(function() {
$("#next").click(function(){
      $('html, body').animate({scrollLeft: $("#rest").offset().left},'slow');
      return false;
   });

 });s
