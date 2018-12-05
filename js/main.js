//change the icons, so when it's clicked, it turns from grey to orange
console.log("connected");


var image = document.getElementsByClassName("image");
for (var i = 0; i < image.length; i++) {
	image[i].addEventListener("click", load, false);
}


function load(e) {
	var src = e.target.getAttribute("src");
	// look for the string grey.png in the src
	var index = src.indexOf("grey.png");

	// if grey.png is not found (index = -1), set the image to orange image, otherwise set it to grey image
	if (index > -1) {
		e.target.setAttribute("src", src.substring(0 , index -1) + ".png");
	}
	else {
		// look for the dot in the src
		var index = src.indexOf(".");
		e.target.setAttribute("src", src.substring(0 , index) + "-grey.png");
	}
}


