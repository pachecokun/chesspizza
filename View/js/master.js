var nav = document.getElementById("nav-icon");
var list = document.getElementById("navbar-list");
nav.addEventListener("click", function(){
	if(nav.className=="close"){
		nav.className="open";
		list.style.display = "block";
	}
	else{
		nav.className = "close";
		list.style.display = "none";
	}
})