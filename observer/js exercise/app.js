var game = new Game();

// Views
var buyView = new BuyView();

// // Controllers
  // console.log('test');
var gameView = new GameView(game);

var gameCtrl = new GameController(game, gameView, buyView);



// Fields
for(var ii = 0; ii < 1; ii++){
var field = new Field();
var fieldView = new FieldView(field);
  game.addField(field);
  field.setGame(game);
var fieldCtrl = new FieldController(field, fieldView);

};




