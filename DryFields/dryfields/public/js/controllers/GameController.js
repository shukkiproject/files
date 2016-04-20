function GameController(model, view){ //initialisations de notre controleur
  this._model = model;
	this._view = view;

  this._bindActions();
};

GameController.prototype._bindActions = function(){
  this._view.on('irrigate', this._irrigate.bind(this));

};

// What to do when the view triggers an event?

GameController.prototype._irrigate = function(){
  this._model.setGlobalWater();
};

