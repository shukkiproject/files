function BuyView(){
  EventEmitter.call(this);
  this.init();
  this.bindListeners();
 
};

BuyView.prototype = Object.create(EventEmitter.prototype);
BuyView.prototype.constructor = BuyView;

// DOM creation & insertion
BuyView.prototype.init = function(){
  this._quantityElement = $('<input type="number" id="quantity" min="1" max="50"/>');
  this._buyElement = $('<button>buy</button>');

  $('#buyContainer')
    .append(this._quantityElement).append(' Litres')
    .append(this._buyElement);
};

// DOM Buttons listeners
BuyView.prototype.bindListeners = function(){
  this._quantityElement.on('click', function(e){
    this.emit('quantity');
  }.bind(this));
  this._buyElement.on('click', function(e){
    this.emit('buy');
  }.bind(this));

};


