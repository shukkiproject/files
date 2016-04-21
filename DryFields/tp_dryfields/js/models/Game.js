function Game(){
  EventEmitter.call(this);
  this._fields = [];
  this._score = 0;
  this._tank = 5;
  this._money = 50;
  this._waterPrice = 1;
}

Game.prototype = Object.create(EventEmitter.prototype);
Game.prototype.constructor = Game;

// send score to server (AJAX!)
Game.prototype.sendScore = function(){
  $.ajax({
    url: 'http://127.0.0.1:3000/scores', // server url... Should be in variables
    method: 'POST', // Method (POST, GET, PUT, ...)
    data: 'name=Gabriel&score=' + this._score, // data to send
    dataType: 'json' // how to parse response (optionnal)
  }).done(function(data){
    console.log('Server response: ', data);
    this.emit('SCORE_SAVED'); // currently not listened by any view
  }.bind(this)).fail(function(){
    //TODO: Pretty stuff
    console.log('Server offline.'); // server offline!
  });
};

Game.prototype.start = function(){
  this._started = true;
  // start each fields
  this._fields.forEach(function(field){
    field.start();
  });
};

Game.prototype.stop = function(){
  this._started = false;
  // stop each fields
  this._fields.forEach(function(field){
    field.stop();
  });
};

Game.prototype.isStarted = function(){
  return !!this._started; // !undefined === true; !!undefined === false;
};

// Game over?
Game.prototype.end = function(){
  var over = true;
  // check if a field still grows
  for(var ii = 0; ii < this._fields.length; ii++){
    if(this._fields[ii].getGrowth() !== 0){ // OMG it GROWS!!
      over = false;
      break; // no need to search more
    }
  }
  if(over){ // You loose...
    //TODO: Pretty stuff
    console.log('Game Over.');
    console.log('Score : ' + this.getScore());
    this.sendScore(this.getScore());
  }
};

Game.prototype.buy = function(nb){
  var price = nb * this._waterPrice;
  // Need money to buy stuff!
  if(this.getMoney() >= price){
    this.setMoney(this.getMoney() - price);
    this.setTank(this.getTank() + nb);
    //TODO: increment water price! Damn inflation...
  }
};

Game.prototype.getFields = function(){
  return this._fields;
};

Game.prototype.getField = function(nb){
  return this._fields[nb];
};

Game.prototype.addField = function(field){
  this._fields.push(field);
  return this;
};

Game.prototype.getScore = function(){
  return this._score;
};

Game.prototype.setScore = function(score){
  this._score = score;
  this.emit('SCORE_CHANGED'); // emit event!
  return this;
};

Game.prototype.getTank = function(){
  return this._tank;
};

Game.prototype.setTank = function(tank){
  this._tank = tank;
  this.emit('TANK_CHANGED'); // emit event!
  return this;
};

Game.prototype.getMoney = function(){
  return this._money;
};

Game.prototype.setMoney = function(money){
  this._money = money;
  this.emit('MONEY_CHANGED'); // emit event!
  return this;
};
