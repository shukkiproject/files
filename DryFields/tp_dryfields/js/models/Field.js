function Field(){
  EventEmitter.call(this);
  this._water = 3;
  this._growth = 0;
}

Field.prototype = Object.create(EventEmitter.prototype);
Field.prototype.constructor = Field;

Field.MAX_GROWTH = 20; // Max growth of a field

// Start interval
Field.prototype.start = function(){
  if(!this._interval){ // prevent interval from being restarted
      this._interval = setInterval(function(){
        // if there is water and you can still grow
        if(this.getWater() > 0 && this.getGrowth() < Field.MAX_GROWTH){
          this.setWater(this.getWater()-1); // sink water
          this.setGrowth(this.getGrowth()+1); // grow
        }
        else if(this.getWater() <= 0){ // no more water
          this.setGrowth(0); // DIIIEEEE !!
          this.stop(); // stop interval
          this._game.end(); // check if game ended
        }
        else if(this.getGrowth() >= Field.MAX_GROWTH){ // Max growth
          this.stop(); // stop interval
        }
      }.bind(this), 1000);
  }
};

// Stop interval
Field.prototype.stop = function(){
  if(this._interval){
    clearInterval(this._interval);
    this._interval = null; // clear value
  }
};

Field.prototype.harvest = function(){
  // if field is at max growth
  if(this.getGrowth() === Field.MAX_GROWTH){
    this.setGrowth(0); // reset growth
    this._game.setMoney(this._game.getMoney() + 40); // Moneeeeyyyy ! :D
    this._game.setScore(this._game.getScore() + 1); // Score!
    this.start(); // restart growth
  }
}

Field.prototype.irrigate = function(){
  var tank = this._game.getTank();
  // if there is water in global tank & game is started, you can irrigate
  if(tank > 0 && this._game.isStarted()){
    if(!this._interval) this.start(); // restart
    this.setWater(this.getWater()+1); // add water to field
    this._game.setTank(tank - 1); // remove water to global tank
  }
  return this;
};

Field.prototype.setGame = function(game){
  this._game = game;
};

Field.prototype.getGrowth = function(){
  return this._growth;
};

Field.prototype.setGrowth = function(growth){
  this._growth = growth;
  this.emit('GROWTH_CHANGED'); // emit to view!
  return this;
};

Field.prototype.getWater = function(){
  return this._water;
};

Field.prototype.setWater = function(water){
  this._water = water;
  this.emit('WATER_CHANGED'); // emit to view!
  return this;
};
