function Menu() {
	var x = document.getElementById("menu");
	if (x.style.width == "0vw" || x.style.width == "") {
		if (screen.width < 768) {
			x.style.width = "100vw";
		} else {
			x.style.width = "25rem";
			//x.style.minWidth = "max-content";
		}
	} else {
		x.style.width = "0vw";
		x.style.minWidth = "0vw";
	}
}

/*
function Menu() {
	var x = document.getElementById("menu");
	if (x.style.display === "none") {
		x.style.display = "block";
	} else {
		x.style.display = "none";
	}
}
*/