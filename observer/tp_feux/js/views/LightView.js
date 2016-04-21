function LightView(){
  EventEmitter.call(this);
  this._trafficLight = trafficLight;
  this._bicheight =bicheLight;
  this.init();
  this.bindListeners();
  this.listen();
}

LightView.prototype = Object.create(EventEmitter.prototype);
LightView.prototype.constructor = LightView;

// DOM creation & insertion
LightView.prototype.init = function(){
  this._trafficElement = $('<div class="circle" id="g-t"></div><div class="circle" id="o-t"></div><div class="circle" id="r-t"></div>');
  this._bicheElement = $('<div class="circle" id="r-b"></div><div class="circle" id="o-b"></div>');
  this._buttonElement = $('<button>button</button>');

  $('#trafficLight')
    .append(this._trafficElement);

   $('#bicheLight')
    .append(this._bicheElement)
    .append(this._buttonElement);

};

// DOM Buttons listeners
LightView.prototype.bindListeners = function(){
  this._buttonElement.on('click', function(e){
    this.emit('lightChange');
  }.bind(this));

};

LightView.prototype.listen = function(){


  // this._field.on('GROWTH_CHANGED', function(e){
  //   this._growthElement.val(this._field.getGrowth()); // Change DOM
  // }.bind(this));
};
