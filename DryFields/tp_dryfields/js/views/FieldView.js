function FieldView(field){
  EventEmitter.call(this);
  this._field = field;
  this.init();
  this.bindListeners();
  this.listen();
}

FieldView.prototype = Object.create(EventEmitter.prototype);
FieldView.prototype.constructor = FieldView;

// DOM creation & insertion
FieldView.prototype.init = function(){
  this._waterElement = $('<span>');
  this._growthElement = $('<progress max="20" value="0">');
  this._irrigateElement = $('<button>Irriguer</button>');
  this._harvestElement = $('<button>Récolter</button>');

  $('#fieldContainer')
    .append(this._waterElement).append(' Litres')
    .append(this._growthElement)
    .append(this._irrigateElement)
    .append(this._harvestElement).append('<hr/>');

  this.displayWater(); // initialize DOM value
};

// DOM Buttons listeners
FieldView.prototype.bindListeners = function(){
  this._irrigateElement.on('click', function(e){
    this.emit('IRRIGATE');
  }.bind(this));

  this._harvestElement.on('click', function(e){
    this.emit('HARVEST');
  }.bind(this));
};

FieldView.prototype.listen = function(){
  this._field.on('WATER_CHANGED', this.displayWater.bind(this));

  this._field.on('GROWTH_CHANGED', function(e){
    this._growthElement.val(this._field.getGrowth()); // Change DOM
  }.bind(this));
};

FieldView.prototype.displayWater = function(e){
  this._waterElement.html(this._field.getWater()); // Change DOM
};
