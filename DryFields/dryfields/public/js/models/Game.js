function Game() {
  EventEmitter.call(this); 
  this.harvest=0;
  this.globalWater=3;
  this.money=50;
  // this.harvestPrice=40;
  // this.currentStock;
  // this.currentPrice=1;
  this.field;
};

Game.prototype = Object.create(EventEmitter.prototype);
Game.prototype.constructor = Game;

Game.prototype.addField = function(field) {
    this.field=field;
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

Game.prototype.setMoney = function(price, quantity) {
    this.money+=40;
    this.emit('moneyChange');
    return this;
};

Game.prototype.buyWater = function(price, quantity) {
    this.money-=(price*quantity);
    this.emit('moneyChange');
    return this;
};

Game.prototype.buyGlobalWater = function(quantity) {
    this.globaWater+=quantity;
    this.emit('buyGlobalWater');
    return this;
};
// Game.prototype.updateHarvest = function() {
//   if (maturity==20) {
//     //when clicked in view
//     harvest++;
//     this.money+=40;
//   }
// };

// Game.prototype.updateStock = function(quantity) {
//     this.currentStock-=quantity;
//     return this.currentStock;
// };

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
