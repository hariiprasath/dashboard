function open_menu() {
    var menu = document.getElementsByClassName("side-menu")[0];
    menu.style.display = "flex";
    menu.style.width = "100%";
}

function close_menu() {
    var menu = document.getElementsByClassName("side-menu")[0];
    menu.style.display = "none";
    menu.style.width = "0%";
}



var newpost_modal_wrap = document.getElementsByClassName("newpost-modal-wrap")[0];

function open_modal() {
    // var modal_wrap = document.getElementsByClassName("modal-wrap")[0];
    newpost_modal_wrap.style.display = "flex";
}

function close_modal() { 
    // var modal_wrap = document.getElementsByClassName("modal-wrap")[0];
    newpost_modal_wrap.style.display = "none";
}




var dtt = document.getElementById('txtbox')
dtt.onfocus = function (event) {
      this.type = 'datetime-local';
      this.focus(); 
}




var image_modal_wrap = document.getElementsByClassName("image-modal-wrap")[0];

function open_image_modal(i) {
    // var modal_wrap = document.getElementsByClassName("modal-wrap")[1];
    var alt = i.getAttribute("alt");
    $("#image-in-modal").attr('src',alt);
    image_modal_wrap.style.display = "flex";

}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == image_modal_wrap) {
        image_modal_wrap.style.display = "none";
    }
    if (event.target == newpost_modal_wrap) {
        newpost_modal_wrap.style.display = "none";
    }
}

$(document).keydown(function(key) {
    if (key.keyCode === 27 ) {
        image_modal_wrap.style.display = "none";
        newpost_modal_wrap.style.display = "none";
    }
});