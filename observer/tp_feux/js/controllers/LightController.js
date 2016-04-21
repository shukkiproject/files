// function FieldController(game){
//   this._game = game; // game model
//   this._views = []; // field views
// }

// FieldController.prototype.addFieldView = function(view){
//   this._views.push(view);
//   var id = this._views.length-1;

//   // bind listeners on views
//   // IRRIGATE event
//   view.on('IRRIGATE', function(e){
//     this._game.getField(id).irrigate();
//   }.bind(this));

//   // HARVEST event
//   view.on('HARVEST', function(e){
//     this._game.getField(id).harvest();
//   }.bind(this));
// };
