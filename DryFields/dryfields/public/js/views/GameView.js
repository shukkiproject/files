function GameView(model){
  EventEmitter.call(this);
  this._model = model;
  // All the DOM elements to get
  this._elements = ['harvest', 'globalWater', 'money'];
  this._clickElements = ['go', 'buyWater'];
  this._getElements();
  this._init();
  this._bindActions();
};

GameView.prototype = Object.create(EventEmitter.prototype);
GameView.prototype.constructor = GameView;

//init is equal to go
GameView.prototype._init = function(){

  this._redraw();
};

// Get all the DOM elements and bind emit
// Basically, it transforms DOM event into View event
GameView.prototype._getElements = function(){
  this._elements.forEach(function(el){ // ['hour', ... ]
    this['_' + el] = document.getElementById(el); // ex: this._hour = document.getElementById('hour');
  }, this);
  this._clickElements.forEach(function(el){ // ['hPlus', ...]
    this['_' + el] = document.getElementById(el); // ex: this._hPlus = document.getElementById('hPlus');
    this['_' + el].addEventListener('click', this.emit.bind(this, el)); // ex: this._hPlus.addEventListener('click', this.emit.bind(this, 'hPlus'));
  }, this);
};

// What must I do when model changes?
GameView.prototype._bindActions = function(){
  this._model.on('harvestChange', this._drawHarvest.bind(this));
  this._model.on('globalWaterChange', this._drawGlobalWater.bind(this));
  this._model.on('moneyChange', this._drawMoney.bind(this));
};

// Redraw the clock
GameView.prototype._redraw = function(){

  this._drawHarvest();
  this._drawGlobalWater();
  this._drawMoney();

};

// Set hour to model value
GameView.prototype._drawHarvest = function(){
  var harvest = this._model.getHarvest();
  this._harvest.innerHTML = harvest;
};

// Set minute to model value
GameView.prototype._drawGlobalWater = function(){
  var globalWater = this._model.getGlobalWater();
  this._globalWater.innerHTML = globalWater;
};

// Set second to model value
GameView.prototype._drawMoney = function(){
  var money = this._model.getMoney();
  this._money.innerHTML = money;
};
