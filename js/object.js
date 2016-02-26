var objet = new Object();

objet.nom = "manuel44";

objet.afficheNom = function  () {
	document.write(this.nom);
};

objet.afficheNom();

//only in anonylous object that the separator is a coma!!!
objetA={
	nom : "le nom de la personne" ,
	afficheNom : function  () {
		document.write(this.nom);
	}
};

objetA.afficheNom();

Personne = function(nom){
	//private variable
	var nom = nom;
	//this.nom = nom public
	this.afficheNom=function(){
		console.log(nom);
	}
};

personne = new Personne("nom");

personne.afficheNom();


var expression = new String("2 + 2");
console.log(eval(expression.toString()));

PrivateObj = function(){
	var nom="a very private name";
	var func=function() {
		console.log(nom);
	}
};

obj = new PrivateObj();

try {
	if (obj) {
		document.write(obj.func());
	}else{
		throw "erreur";
	};

}catch (ex) {
	alert('Opération Impossible');
}

var monTableau = ["element1", "element2", "element3", "element4", "element5"];

for(var i = 0; i < 3; i++) 
{   
	window.setTimeout( function() { 
	alert(monTableau[i]) },1000);
}
