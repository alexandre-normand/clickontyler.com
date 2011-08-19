var a = null;
var g = null;
var p = null;
window.onload = function() {
	g = document.getElementById("grid");
	b = g.getElementsByTagName("td");
	for(i = 0; i < b.length; i++) b[i].onclick = bc;
	p = document.getElementById("pad");
	pp = p.getElementsByTagName("td");
	for(i = 0; i < pp.length; i++) if(pp[i].className == "") pp[i].onclick = pc;
	document.getElementById("cancel").onclick = function() { p.style.display = "none"; }
	document.getElementById("clear").onclick = function() {
		a.innerHTML = "";
		p.style.display = "none";
	}
}		
function bc() {
	if(this.className.match(/p/)) return;
	a = this;
	p.style.display = "block";
}
function pc() {
	a.innerHTML = this.innerHTML;
	a.className = a.className.replace(/x/, "");
	p.style.display = "none";

	if(document.getElementById("help").checked == false) return;

	x = a.id.charAt(1);
	y = a.id.charAt(2);

	// Grid
	gx = Math.floor(x / 3) * 3;
	gy = Math.floor(y / 3) * 3;
	for(iy = gy; iy < gy + 3; iy++) {
		for(ix = gx; ix < gx + 3; ix++) {
			if(ix != x || iy != y) {
				if(document.getElementById("c" + ix + iy).innerHTML == a.innerHTML) {
					a.className += " x";
					return;
				}
			}
		}
	}

	// Row
	for(i = 0; i < 9; i++) {
		if((x != i) && (document.getElementById("c" + i + y).innerHTML == a.innerHTML)) {
			a.className += " x";
			return;
		}
	}
	
	// Column
	for(i = 0; i < 9; i++) {
		if((y != i) && (document.getElementById("c" + x + i).innerHTML == a.innerHTML)) {
			a.className += " x";
			return;
		}
	}
}