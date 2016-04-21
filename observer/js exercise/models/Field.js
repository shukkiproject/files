function Field() {
	EventEmitter.call(this); 

  this.tankWater=3;
  this.game;
  // this.consumptionLv=1;
  // this.maturity=false;
  this.maturityLv=0;
  // this.consumptionWater=true;
};

Field.prototype = Object.create(EventEmitter.prototype);
Field.prototype.constructor = EventEmitter;

Field.prototype.setGame = function(game) {
 	this.game=game;
};

Field.prototype.irrigate = function() {
    this.tankWater++;
    this.game.setGlobalWater();
    this.emit('tankWaterChange');
    return this;
};

Field.prototype.harvestAction = function() {

    this.game.setHarvest();
    this.game.setMoney();
    return this;
};

Field.prototype.getTankWater = function() {
    return this.tankWater;
};

// Field.prototype.consumptionLv = function() {
// 	if(this.consumption>2){
// 		this.consumption=2;
// 	}
// };

// //increase water consum
// Field.prototype.updateConsumpLv = function() {
// 	setInterval(function(){
// 		this.comsumption*=1.1;
// 	}.bind(this),60000);
// };

// Field.prototype.maturity = function() {

//   if(!this._interval){
//     this._interval = setInterval(function(){ 
//       this.maturityLv++;
//       if (maturityLv==20) {
//       	this.maturity=true;
//       }
//     }.bind(this), 1000);
//   }
// };

// Field.prototype.consumptionWater = function() {

//   if(maturity){
//   	this.consumptionWater=false;
//   	//window.clearInterval(id??!!);
//   }
//     setInterval(function(){ 
//       this.tankWater--;
//     }.bind(this), 1000);
// };

