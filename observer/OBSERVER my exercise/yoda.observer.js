var YodaObserver = function($el) {

  var base = this;

  base.init = function() {
  
    $('.parler', $el).bind('click', function() {
      base.notifyObservers('yoda.parler');
    });

  };

  base.notify = function(event, parameters) {
    switch(event) {
      case 'yoda.parler':
        $('.dialog', $el).text("groumf!");
        break;
      case 'reset.effacer':
        $('.dialog', $el).text('');
        break;
    }
  };
  return base;
};
extend(YodaObserver, Observer);


// gestion de l'héritage
function extend(C, P) {
  var F = function () {};
  F = P;
  F.prototype = $.extend(P.prototype, C.prototype);
  C.prototype = new F();
  C.uber = P.prototype;
  C.prototype.constructor = C;
}