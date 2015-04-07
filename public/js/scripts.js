var menu;
var hamburger;
var menu_state;

window.onload = function(){
	menu_state = 0;
};

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
		document.getElementById('main-menu').style.transform = "translate(0px, -21px)";
		document.getElementById('main-menu').style.webkitTransform = "translate(0px, -21px)";
		document.getElementById('main-menu').style.msTransform = "translate(0px, -21px)";

		document.getElementById('hamburger').style.transform = "translate(-199px, 0px)";
		document.getElementById('hamburger').style.webkitTransform = "translate(-199px, 0px)";
		document.getElementById('hamburger').style.msTransform = "translate(-199px, 0px)";
		menu_state = 1;
	}
}