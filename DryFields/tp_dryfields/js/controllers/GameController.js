function GameController(game, gameView, buyView){
  this._game = game;
  this._gameView = gameView;
  this._buyView = buyView;
  this.listen();
}

GameController.prototype.listen = function(){
  // START event
  this._gameView.on('START', function(e){
    this._game.start();
  }.bind(this));

  // BUY_MENU event
  this._gameView.on('BUY_MENU', function(e){
    this._buyView.show(); // show view
    this._game.stop(); // pause game
  }.bind(this));

  // BUY event
  this._buyView.on('BUY', function(e){
    this._game.buy(e.amount);
    this._game.start(); // restart game
  }.bind(this));
};
