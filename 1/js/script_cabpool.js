function open_menu(){
    var menu = document.getElementsByClassName("side-menu")[0];
    menu.style.display = "flex";
    menu.style.width = "100%";
}

function close_menu(){
    var menu = document.getElementsByClassName("side-menu")[0];
    menu.style.display = "none";
    menu.style.width = "0%";
}

function open_modal(){
    var modal_wrap = document.getElementsByClassName("modal-wrap")[0];
    modal_wrap.style.display = "flex";
}

function close_modal(){
    var modal_wrap = document.getElementsByClassName("modal-wrap")[0];
    modal_wrap.style.display = "none";
}




var dtt = document.getElementById('txtbox')
dtt.onfocus = function (event) {
      this.type = 'datetime-local';
      this.focus();
}




function open_image_modal(){
    var modal_wrap = document.getElementsByClassName("image-modal-wrap")[0];
    modal_wrap.style.display = "flex";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    var modal_wrap = document.getElementsByClassName("image-modal-wrap")[0];
    if (event.target == modal_wrap) {
        modal_wrap.style.display = "none";
    }
}