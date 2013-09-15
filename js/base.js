/*
Author: mg12
Update: 2008/08/08
Author URI: http://www.neoease.com/
*/
(function() {

function setStyleDisplay(id, status) {
	document.getElementById(id).style.display = status;
}

function goTop(a, t) {
	a = a || 0.1;
	t = t || 16;

	var x1 = 0;
	var y1 = 0;
	var x2 = 0;
	var y2 = 0;
	var x3 = 0;
	var y3 = 0;

	if (document.documentElement) {
		x1 = document.documentElement.scrollLeft || 0;
		y1 = document.documentElement.scrollTop || 0;
	}
	if (document.body) {
		x2 = document.body.scrollLeft || 0;
		y2 = document.body.scrollTop || 0;
	}
	var x3 = window.scrollX || 0;
	var y3 = window.scrollY || 0;

	var x = Math.max(x1, Math.max(x2, x3));
	var y = Math.max(y1, Math.max(y2, y3));

	var speed = 1 + a;
	window.scrollTo(Math.floor(x / speed), Math.floor(y / speed));
	if(x > 0 || y > 0) {
		var f = "MGJS.goTop(" + a + ", " + t + ")";
		window.setTimeout(f, t);
	}
}

window['MGJS'] = {};
window['MGJS']['setStyleDisplay'] = setStyleDisplay;
window['MGJS']['goTop'] = goTop;

})();
