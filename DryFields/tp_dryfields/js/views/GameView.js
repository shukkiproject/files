function GameView(game){
  EventEmitter.call(this);
  this._game = game;
  this.init();
  this.bindListeners();
  this.listen();
}

GameView.prototype = Object.create(EventEmitter.prototype);
GameView.prototype.constructor = GameView;

// DOM creation & insertion
GameView.prototype.init = function(){
  this._scoreElement = $('<span>');
  this._tankElement = $('<span>');
  this._moneyElement = $('<span>');
  this._startElement = $('<button>Démarrer</button>');
  this._buyElement = $('<button>Acheter</button>');

  $('#gameContainer')
    .append(this._scoreElement).append(' récoltes').append('<hr/>')
    .append(this._tankElement).append(' Litres').append('<hr/>')
    .append(this._moneyElement).append(' $$$').append('<hr/>')
    .append(this._startElement)
    .append(this._buyElement);

  this.refresh(); // DOM initialization
};

GameView.prototype.bindListeners = function(){
  this._startElement.on('click', function(){
    this.emit('START');
  }.bind(this));

  this._buyElement.on('click', function(){
    this.emit('BUY_MENU');
  }.bind(this));
};

GameView.prototype.listen = function(){
  this._game.on('SCORE_CHANGED', this.displayScore.bind(this));
  this._game.on('TANK_CHANGED', this.displayTank.bind(this));
  this._game.on('MONEY_CHANGED', this.displayMoney.bind(this));
};

GameView.prototype.refresh = function(){
  this.displayMoney();
  this.displayTank();
  this.displayScore();
};

GameView.prototype.displayScore = function(){
  this._scoreElement.html(this._game.getScore());
};

GameView.prototype.displayTank = function(){
  this._tankElement.html(this._game.getTank());

};

GameView.prototype.displayMoney = function(){
  this._moneyElement.html(this._game.getMoney());
};
