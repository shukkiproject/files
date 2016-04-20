function FieldController(model, view){ //initialisations de notre controleur
  this._model = model;
  this._view=view;
  this._bindActions();
};

FieldController.prototype._bindActions = function(){
  this._view.on('irrigate', this._irrigate.bind(this));
  this._view.on('harvestAction', this._harvestAction.bind(this));
};

// What to do when the view triggers an event?

FieldController.prototype._irrigate = function(){
  this._model.irrigate();
};

FieldController.prototype._harvestAction = function(){
  this._model.harvestAction();
};

