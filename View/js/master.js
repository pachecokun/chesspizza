var nav = document.getElementById("nav-icon");
var list = document.getElementById("navbar-list");
nav.addEventListener("click", function(){
	if(nav.className=="close"){
		nav.className="open";
		list.style.height = "auto";
	}
	else{
		nav.className = "close";
		list.style.height = "0";
	}
})