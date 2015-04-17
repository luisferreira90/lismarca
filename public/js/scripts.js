var menu;
var hamburger;
var menu_state;
var mq;

window.onload = function(){
	menu_state = 0;
	mq = window.matchMedia( "(min-width: 980px)" );
};

jQuery(document).ready(function($) {
    var $body = $(document);
    $body.bind('scroll', function() {
        // "Disable" the horizontal scroll.
        if ($body.scrollLeft() !== 0) {
            $body.scrollLeft(0);
        }
    });
});

function ConfirmDelete() {
  var x = confirm("Tem a certeza que deseja apagar?");
  if (x)
    return true;
  else
    return false;
}

function showMenu() {
	if(menu_state) {

		document.getElementById('main-menu').style.transform = "translate(250px, 0px)";
		document.getElementById('main-menu').style.webkitTransform = "translate(250px, 0px)";
		document.getElementById('main-menu').style.msTransform = "translate(250px, 0px)";

		document.getElementById('hamburger').style.transform = "translate(0px, 0px)";
		document.getElementById('hamburger').style.webkitTransform = "translate(0px, 0px)";
		document.getElementById('hamburger').style.msTransform = "translate(0px, 0px)";

		menu_state = 0;
	}
	else {
		document.getElementById('main-menu').style.transform = "translate(50px, 0px)";
		document.getElementById('main-menu').style.webkitTransform = "translate(50px, 0px)";
		document.getElementById('main-menu').style.msTransform = "translate(50px, 0px)";

		document.getElementById('hamburger').style.transform = "translate(-199px, 0px)";
		document.getElementById('hamburger').style.webkitTransform = "translate(-199px, 0px)";
		document.getElementById('hamburger').style.msTransform = "translate(-199px, 0px)";
		menu_state = 1;
	}
}



// media query event handler
if (matchMedia) {
	var mq = window.matchMedia("(min-width: 980px)");
	mq.addListener(WidthChange);
	WidthChange(mq);
}

// media query change
function WidthChange(mq) {

	if (mq.matches) {
		document.getElementById('main-menu').style.transform = "translate(0px, 0px)";
		document.getElementById('main-menu').style.webkitTransform = "translate(0px, 0px)";
		document.getElementById('main-menu').style.msTransform = "translate(0px, 0px)";

		document.getElementById('hamburger').style.transform = "translate(0px, 0px)";
		document.getElementById('hamburger').style.webkitTransform = "translate(0px, 0px)";
		document.getElementById('hamburger').style.msTransform = "translate(0px, 0px)";
	}
	else {
		menu_state = 1;
		showMenu();
	}


}