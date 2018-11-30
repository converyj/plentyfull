//change the icons, so when it's clicked, it turns from grey to orange
console.log("connected");

// var checkboxes = document.getElementsByClassName("checkbox");
// console.log(checkboxes);
// for (var i = 0; i < checkboxes.length; i++) {
// 	//console.log(allDiet[i]);
// 	checkboxes[i].addEventListener("click", load, false);
// }

var image = document.getElementsByClassName("image");
console.log(image);
for (var i = 0; i < image.length; i++) {
	//console.log(allDiet[i]);
	image[i].addEventListener("click", load, false);
}




function load(e) {
// 	var checkbox = document.getElementsByClassName("checkbox"); 
// 	for (var i = 0; i < checkbox.length; i++) {
// 	//console.log(allDiet[i]);
// 	var value = checkbox[i].id;
// 	console.log(value);

// }

 console.log(e.target); 
 var src = e.target.getAttribute("src"); 
 	var checkboxes = document.getElementsByClassName("checkbox");
console.log(checkboxes);
for (var i = 0; i < checkboxes.length; i++) {
	//console.log(allDiet[i]);
	//if (checkboxes[i].checked == 0) {
	// alert('My id is' + value);
	console.log("not");
	//console.log(checkboxes[i]);
	// console.log(e.target);
	
		console.log(src);
		var index = src.indexOf("-"); 
		console.log(src.substring(0 , index));
		var sub = src.substring(0 , index);
	e.target.setAttribute("src", src.substring(0 , index) + ".png"); 
	// if (e.target.checked == true) {
	// 	console.log("true");
	// 	console.log(e.target);
		
	// 	//pics.setAttribute("src","images/vegetarian.png");
	// 	// this.setAttribute("image", "images/vegetarian.png");
		
	// } else { 
	// 	//pics.setAttribute("src","images/vegetarian-grey.png");
	// }
if (checkboxes[i].checked == 1) {
	console.log("Else");
	var sub = src.substring(0 , index);
	e.target.setAttribute("src", src + "-grey.png"); 
}
}
};

// function load() {
// 	if (all_checkbox_divs.checked == true) {
// 		icon.setAttribute("src","images/<?php echo($row['greyImage']); ?>");
// 		// this.setAttribute("image", "images/vegetarian.png");
		
// 	} else { 
// 		icon.setAttribute("src","images/<?php echo($row['image']); ?>");
// 	}
// };