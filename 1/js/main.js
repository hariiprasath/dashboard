// Open and close functions for side menu

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





// Open and close functions for modal

var newpost_modal_wrap = document.getElementsByClassName("newpost-modal-wrap")[0];
var all_modal_wrap = document.getElementById("modal-wrap");

function open_modal() {
    newpost_modal_wrap.style.display = "flex";
}

function close_modal() { 
    newpost_modal_wrap.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == newpost_modal_wrap) {
        newpost_modal_wrap.style.display = "none";
    }
}

// When the user presses the esc key, close it
$(document).keydown(function(key) {
    if (key.keyCode === 27 ) {
        all_modal_wrap.style.display = "none";
    }
});




// Change textbox to time input on focus

var dtt = document.getElementById('eventTime');
dtt.onfocus = function (event) {
      this.type = 'datetime-local';
      this.focus(); 
}




// Show selected filename in span next to label

$('#imgFile').bind('change', function(){ 
    var fileName = '';
    fileName = $(this).val();
//    $('#file-selected').html(fileName);
    $('#file-selected').html(fileName.replace(/^.*\\/, ""));
})






var img_div = document.getElementsByClassName("jumbotron")[0];
var style = img_div.currentStyle || window.getComputedStyle(img_div, false);
var bi = style.backgroundImage.slice(4, -1).replace(/"/g, "");

console.log(bi);

var img_new = new Image();
img_new.src = bi;

console.log(img_new);

var g_swatches;

var new_post_btn = document.getElementsByClassName("new-post-btn")[0];

img_new.addEventListener('load', function() {
    var vibrant = new Vibrant(img_new);
    var swatches = vibrant.swatches();    

    for (var swatch in swatches)
        if (swatches.hasOwnProperty(swatch) && swatches[swatch])
            console.log(swatch, swatches[swatch].getHex())

    g_swatches = swatches;
    var vib_rgb = g_swatches["Vibrant"].getRgb();
    var dark_vib_rgb = g_swatches["DarkVibrant"].getRgb();

    img_div.style.boxShadow = "0 5px 40px rgba(" + vib_rgb[0] + "," + vib_rgb[1] + "," + vib_rgb[2] + ",0.5)";
    new_post_btn.style.backgroundColor = "rgba(" + dark_vib_rgb[0] + "," + dark_vib_rgb[1] + "," + dark_vib_rgb[2] + ",1)";
});

