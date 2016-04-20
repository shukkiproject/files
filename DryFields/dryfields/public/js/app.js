var game = new Game();
var field = new Field();
  game.addField(field);
  field.setGame(game);

// Views
var gameView = new GameView(game);
var buyView = new BuyView();
var fieldView = new FieldView(field);

// // Controllers
var fieldCtrl = new FieldController(field, fieldView);
  // console.log('test');

var gameCtrl = new GameController(game, gameView, buyView);



// // Fields
// for(var ii = 0; ii < 1; ii++){
// };



// var fieldCtrl = new FieldController(fieldView, field);
