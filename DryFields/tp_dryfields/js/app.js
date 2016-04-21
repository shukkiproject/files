var game = new Game();

// Views
var gameView = new GameView(game);
var buyView = new BuyView();

// Controllers
var fieldCtrl = new FieldController(game);
var gameCtrl = new GameController(game, gameView, buyView);

// Fields
for(var ii = 0; ii < 3; ii++){
  var field = new Field();
  var fieldView = new FieldView(field);
 
  fieldCtrl.addFieldView(fieldView);
  game.addField(field);
  field.setGame(game);
}
