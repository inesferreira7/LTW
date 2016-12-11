// Get the modal
var modal = document.getElementById('formContainer');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function showDiv() {
    var x = document.getElementById('registerOptions');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}

$(function () {
    $(".showMenu").click(function () {
        $(this).next(".menu").fadeToggle(400);
    });
});
