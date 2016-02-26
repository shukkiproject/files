var imageTab = ["totoro1.jpg", "totoro2.jpg", "totoro3.jpg", "cat.jpg", "cat2.jpg", "cat3.jpg", "pig.jpg"];
var i=0;

//htmlImg.src = imageTab[i];

var img=document.createElement("img");
img.height=200;
img.src= imageTab[i];
document.getElementById("slider").appendChild(img);

function next(){
		i++;
		if (i===imageTab.length) {
			i=0;
		};
		img.src= imageTab[i];
		}

function previous(){
	i--;
	if (i<0) {
		i=imageTab.length-1;
	};
	img.src= imageTab[i];
	
}

document.getElementById("next").addEventListener('click', next);

document.getElementById("previous").addEventListener('click', previous);

var animate=0;
function start(){
	if (animate==0) {
		animate=window.setInterval(next, 2000);
	};
}

document.getElementById("start").addEventListener('click', start);

function stop(){
	clearInterval(animate);
}

document.getElementById("stop").addEventListener('click', stop);








