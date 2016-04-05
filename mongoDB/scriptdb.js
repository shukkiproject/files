// load('script2.js');

var conn = new Mongo();
var db = conn.getDB('dbTP');

//create a db must create a collection
// db = db.getSiblingDB('pizzaDb');
// db.createCollection('colPizza');
// printjson(db.adminCommand('listDatabases'));
// var collections=db.getCollectionNames();

// db.colPizza.insert(
//    {
//       "Pizza" : "Hawaianne", "Prix" : {
//          "solo" : 7,
//          "medium" : 11,
//          "géant" : 13.5
//       }
//    }
// );

//function(val){return val.match(defaultParams.db)}; same as=>() function anonymes;
//match : we can pur regex or text...
//pop first element of a table
// var selectionCollectionName = collections.filter((val)=>val.match(defaultParams.db)).pop();

// printjson(selectionCollectionName);
// db[selectCollectionName] is an object accessing the collection
//var selectionCollection=db[selectCollectionName];

// var cursor=db.colPizza.find();

// while(cursor.hasNext()){
// 	// printjson(cursor);
// // print the current item
// 	printjson(cursor.next());
// }

// printjson(db.stats());

// db.restaurants.remove({
// 	name:{type: 'string', $regex: /^name/}
// });

// var coutTestDocument = (typeof numberOfTestDocument !=='undefined')?numberOfTestDocument : defaultParams.numberOfTestDocument;
// var pizzaTab = [];
// 	print(coutTestDocument);
// 	for (var i = 1; i < coutTestDocument; i++) {
// 		db.pizza.insert({'Pizza':""+Math.floor(Math.random()*10)})
// 	}

// var cursor=db.restaurants.find();

// while(cursor.hasNext()){
// 	// printjson(cursor);
// //print the current item
// 	printjson(cursor.next());
// }

// map reduce example

// var mapFucntion = function (){emit(this.cust_id, this.price)};
// var reducFunction = function(keyId, prices){return Array.sum(prices);};

// db.first.mapReduce(mapFucntion, reducFunction, {out: {inline:1}, query : {cust_id:cust2}});

// var finalize = function(key, finalValue){
// 	return finalValue*2;
// };

// db.first.mapReduce(mapFucntion, reducFunction, {out: {inline:1}, finalize : finalize});


// //1
// var mapFucntion = function (){emit(this.title, this.authors.length)};
// var reducFunction = function(title, authors){
// 	return authors;
// };
// //out in a new collection
// db.livre.mapReduce(mapFucntion, reducFunction, {out: "result"});

// //2
// var mapFucntion = function (){emit(this.year, 1)};
// var reducFunction = function(year, title){
// 	return title.length;
// };
// //out in a new collection
// db.livre.mapReduce(mapFucntion, reducFunction, {out: "result", query : {publisher : "Springer"},'sort': {value : 1}});

// //3
// var mapFunction = function (){emit(this.year, 1)};
// var reducFunction = function(year, title){
// 	return title.length;
// };
// //out in a new collection
// db.livre.mapReduce(mapFunction, reducFunction, {out: "result", query : {authors : "Toru Ishida"},'sort': {value : 1}});

//4
var mapFunction = function (){emit(1, this.pages.end-this.pages.start)};
var reducFunction = function(title, diff){
	return Array.avg(diff);
};
//out in a new collection
db.livre.mapReduce(mapFunction, reducFunction, {out: "result", query : {authors : "Toru Ishida"},'sort': {value : 1}});