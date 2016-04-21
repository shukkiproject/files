function BuyView(){
  EventEmitter.call(this);
  this.init();
  this.bindListeners();
  this.hide();

  // this view does not need a model
}

BuyView.prototype = Object.create(EventEmitter.prototype);
BuyView.prototype.constructor = BuyView;

// DOM creation & insertion
BuyView.prototype.init = function(){
  this._inputElement = $('<input type="text" />');
  this._buyElement = $('<button>Acheter</button>');
  this._container = $('#buyContainer');

  this._container.append(this._inputElement)
    .append(this._buyElement);
};

// DOM buttons listeners
BuyView.prototype.bindListeners = function(){
  this._buyElement.on('click', function(){
    this.emit('BUY', {amount: +this._inputElement.val()}); // parse value in integer
    this.hide(); // hide window
  }.bind(this));
};

BuyView.prototype.show = function(){
  this._container.show();
};

BuyView.prototype.hide = function(){
  this._container.hide();
};
