function GameController(model, gameView, buyView){ //initialisations de notre controleur
  	this._model = model;
	this._gameView = gameView;
	this._buyView = buyView;
};

GameController.prototype._bindActions = function(){
  this._buyView.on('buy', this._buy.bind(this));
};

GameController.prototype._quantity = function(){

};

GameController.prototype._buy = function(quantity){
  this._model.buy(quantity);
};
