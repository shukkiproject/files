function FieldView(model){
  EventEmitter.call(this);
  this._model = model;
  // All the DOM elements to get
  this._elements = ['tankWater'];
  this._clickElements = ['irrigate', 'harvestAction'];
  this._getElements();
  this._init();
  this._bindActions();
};

FieldView.prototype = Object.create(EventEmitter.prototype);
FieldView.prototype.constructor = FieldView;

//init is equal to go
FieldView.prototype._init = function(){
  // les buttons.....
  //field
  this._redraw();
};

// Get all the DOM elements and bind emit
// Basically, it transforms DOM event into View event
FieldView.prototype._getElements = function(){
  this._elements.forEach(function(el){ // ['hour', ... ]
    this['_' + el] = document.getElementById(el); // ex: this._hour = document.getElementById('hour');
  }, this);
  this._clickElements.forEach(function(el){ // ['hPlus', ...]
    this['_' + el] = document.getElementById(el); // ex: this._hPlus = document.getElementById('hPlus');
    this['_' + el].addEventListener('click', this.emit.bind(this, el)); // ex: this._hPlus.addEventListener('click', this.emit.bind(this, 'hPlus'));
  }, this);
};

// What must I do when model changes?
FieldView.prototype._bindActions = function(){
  this._model.on('tankWaterChange', this._drawIrrigate.bind(this));
  // this._model.on('globalWaterChange', this._drawGlobalWater.bind(this));
  // this._model.on('moneyChange', this._drawMoney.bind(this));
};

// Redraw the clock
FieldView.prototype._redraw = function(){

  this._drawIrrigate();
  // this._drawGlobalWater();
  // this._drawMoney();

};

// Set hour to model value
FieldView.prototype._drawIrrigate = function(){
  var tankWater = this._model.getTankWater();
  this._tankWater.innerHTML = tankWater;
};

// // Set minute to model value
// GameView.prototype._drawGlobalWater = function(){
//   var globalWater = this._model.getGlobalWater();
//   this._globalWater.innerHTML = globalWater;
// };

// // Set second to model value
// GameView.prototype._drawMoney = function(){
//   var money = this._model.getMoney();
//   this._money.innerHTML = money;
// };
