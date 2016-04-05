load('script2.js');

var conn = new Mongo();
var db = conn.getDB('test');
// print('hello');

// printjson(db.adminCommand('listDatabases'));

// printjson(db.getCollectionNames());

// printjson(db.getUsers());

db = db.getSiblingDB('newdb');
var collections=db.getCollectionNames();

//function(val){return val.match(defaultParams.db)}; same as=>() function anonymes;
//match : we can pur regex or text...
//pop first element of a table
// var selectionCollectionName = collections.filter((val)=>val.match(defaultParams.db)).pop();

// printjson(selectionCollectionName);
// db[selectCollectionName] is an object accessing the collection
//var selectionCollection=db[selectCollectionName];

// var cursor=db.collect1.find();

// while(cursor.hasNext()){
// 	// printjson(cursor);
//print the current item
// 	printjson(cursor.next());
// }

printjson(db.stats());

db.restaurants.remove({
	name:{type: 'string', $regex: /^name/}
});

var coutTestDocument = (typeof numberOfTestDocument !=='undefined')?numberOfTestDocument : defaultParams.numberOfTestDocument;

	print(coutTestDocument);
	for (var i = 1; i < coutTestDocument; i++) {
		db.restaurants.insert({'name':"name "+Math.floor(Math.random()*10)})
	}

var cursor=db.restaurants.find();

while(cursor.hasNext()){
	// printjson(cursor);
//print the current item
	printjson(cursor.next());
}

