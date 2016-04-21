function Game() {
  EventEmitter.call(this); 
  this.harvest=0;
  this.globalWater=3;
  this.money=50;
  this.currentStock=10000;
  this.currentPrice=1;
  this.fields=[];
};

Game.prototype = Object.create(EventEmitter.prototype);
Game.prototype.constructor = Game;

Game.prototype.addField = function(field) {
    this.fields.push(field);
};

Game.prototype.getHarvest = function() {
  return this.harvest;
};

Game.prototype.getGlobalWater = function() {
  return this.globalWater;
};

Game.prototype.getMoney = function() {
  return this.money;
};

Game.prototype.setHarvest = function() {
    this.harvest++;
    this.emit('harvestChange');
    return this;
};

Game.prototype.setGlobalWater = function() {
    this.globalWater--;
    this.emit('globalWaterChange');
    return this;
};

Game.prototype.setMoney = function() {
    this.money+=40;
    this.emit('moneyChange');
    return this;
};

Game.prototype.setCurrentStock = function(quantity) {
    this.currentStock-=quantity;
    return this;
};

Game.prototype.buy = function(quantity) {
    this.money-=(this.currentPrice*quantity);
    this.currentStock-=quantity;
    this.globaWater+=quantity;
    this.emit('globalWaterChange');
    this.emit('moneyChange');
    return this;
};

// this.getStock = function() {
//     $ajax({
//       type: 'get',
//       url: 'http://127.0.0.1:3000/sales/stock',
//       succes: ,
//       error: function(error) {
//         console.log(error);
//       }
//     });
//   };
