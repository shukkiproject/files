var newLink = document.getElementsByTagName("a");

for (var i = 0; i <=2; i++) {
	newLink[i].href="http://www.imie.fr";

	newLink[i].innerHTML= "link" + (i+1);
};

var div= document.createElement("div");
div.id="Exercice 2";
document.body.appendChild(div);

var p=document.createElement("p");
p.innerHTML = "Liste des cours :";
div.appendChild(p);

var ul=document.createElement("ul");
ul.class="li-menu";
div.appendChild(ul);

var tab=["JS", "Symfony", "Magento", "PhoneGap"];

for (key in tab) {
	var li= document.createElement("li");
	li.innerHTML=tab[key];
	ul.appendChild(li);

};

function reverse(){

for (var j = 3; j >=0; j--) {
	var li= document.createElement("li");
	li.innerHTML=tab[j];
	ul.appendChild(li);
};

}

reverse();

//exo 4

tabObj = [{nom:"JavaScript", date: "1995"}, {nom:"Symfony", date: "1998"}, {nom:"Magento", date: "2000"}, {nom:"PhoneGap", date: "2003"}];

function display(id, tabObj){

	var table=document.createElement("table");

	document.getElementById(id).appendChild(table);

	var tr=document.createElement("tr");
	table.appendChild(tr);

	for (key in tabObj[0]) {
		var th=document.createElement("th");
		th.innerHTML = key;
		tr.appendChild(th);
	};

	for (var i = 0; i < tabObj.length; i++) {
		var tr=document.createElement("tr");
		table.appendChild(tr);

		for (key in tabObj[i]) {
			var td=document.createElement("td");
			td.innerHTML = tabObj[i][key];
			tr.appendChild(td);
		};

	};
	
};

display("div1", tabObj);

function display1(id, tabObj){

	var table=document.createElement("table");

	document.getElementById(id).appendChild(table);

	for (i in tabObj) {
		

		for (key in tabObj[i]) {
			var tr=document.createElement("tr");
			table.appendChild(tr);
			var th=document.createElement("th");
			th.innerHTML = key;
			tr.appendChild(th);

			var td=document.createElement("td");
			td.innerHTML = tabObj[i][key];
			tr.appendChild(td);
		};

	};
	
};

var tabDoc = [document];
//display1("div3", tabDoc);

//exo1 
var vie=100;

if (vie>=100) {
	document.write('En bonne santé.');
} else if (vie>=50 && vie<100) {
	document.write('Blessé...');
} else if (vie>0 && vie<50) {
	document.write('En danger');
} else {
	document.write('KO');
}

var nbPhotocop = 35;
var prix=0;
if (nbPhotocop<=10){

	prix=nbPhotocop*0.1;
} else if (nbPhotocop<=30){
	prix=10*0.1+(nbPhotocop-10)*0.08;
} else {
	prix=10*0.1+20*0.08+(nbPhotocop-30)*0.05;
} 

document.write(prix);

var br=document.createElement("br");
document.body.appendChild(br);

function fact(nb){
	if (nb===1) {
		return nb;
	};
	return nb*fact(nb-1);
}

document.write(fact(5));

var tabNum = [5, 4, 6, 8, 3, 7];
var total=0;
for (nb in tabNum) {
	total+= tabNum[nb];
};

document.write("<br/>");

document.write(total/(tabNum.length));

document.write("<br/>");

var tabTri =[5,2,100,77,66,27,35,44];
var isSorted=false;

do{
	for (var j = 0; j < tabTri.length-1; j++) {
		for (var i = 0; i < tabTri.length-1; i++) {
			if (tabTri[i]>tabTri[i+1]) {
				var temp=tabTri[i];
				tabTri[i]=tabTri[i+1];
				tabTri[i+1]=temp;
			};
		};


		if (tabTri[j]<tabTri[j+1]) {
				isSorted = true;
			} else { 
				isSorted = false;
				continue;
			};	
	};

} while(isSorted==false);

document.write(tabTri.toString() + "<br/>");

var tabTri2 =[1,55,36,669,58,25,100];
function tri(a,b){return a-b;};
tabTri2.sort(tri);

document.write(tabTri2.toString() + "<br/>");

console.log(tabTri2);

//exo 7

function showTab(tab){
	document.write(tab.toString() + "<br/>");
}

function TriABull(tabTri, showTab){
	var isSorted=false;
	do{
		for (var j = 0; j < tabTri.length-1; j++) {
			for (var i = 0; i < tabTri.length-1; i++) {
				if (tabTri[i]>tabTri[i+1]) {
					var temp=tabTri[i];
					tabTri[i]=tabTri[i+1];
					tabTri[i+1]=temp;
				};
			};

			showTab(tabTri);

			if (tabTri[j]<tabTri[j+1]) {
					isSorted = true;
				} else { 
					isSorted = false;
					continue;
				};	
		};

	} while(isSorted==false);
}

tabTri3 =[156,586,225,22,0,65,89,45,-36,-78];

TriABull(tabTri3, showTab);

//exo 8
var tab8 =[{nom : "Processeur", prix : 154.99}, {nom : "Carte Graphique", prix : 249.99}, {nom : "Carte Mère", prix : 140.99},];

function triPrix(a, b){return a.prix - b.prix;};

tab8.sort(triPrix);

display("div4", tab8);

var tab9 =[{nom : "Processeur 2", prix : 154.99}, {nom : "Carte Graphique", prix : 249.99}, {nom : "Carte Mère", prix : 140.99},];

function triChoix(choix){

	return function(a, b){
		a=a[choix];
		b=a[choix];
		return ((a > b) - (b > a));

	}
}

tab9.sort(triChoix("nom"));

display("div2", tab9);