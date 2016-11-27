$(document).ready(function() {

  $('input:radio[name="type"]').change(function(){
        if ($(this).is(':checked') == true) {
            $('#header').append('<div>hello world</div>');
        }
      });

  });
