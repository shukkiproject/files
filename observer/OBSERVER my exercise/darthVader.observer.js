var DarthVaderObserver = function($el) {

  var base = this;

  base.init = function() {
    $('.parler', $el).bind('click', function() {
      base.notifyObservers('darthVader.parler');
    });
    $('.avancer', $el).bind('click', function() {
      base.notifyObservers('darthVader.avancer');
    });

  };

  base.notify = function(event, parameters) {
    switch(event) {
      case 'darthVader.parler':
        $('.dialog', $el).text('Je suis ton père.');
        break;
      case 'darthVader.avancer':
        $('.dialog', $el).text('Allez donne moi la main...');
        break;
      case 'luke.parler':
        $('.dialog', $el).text("Déconne pas Petit elle est froide.");
        break;
      case 'yoda.parler':
        $('.dialog', $el).text("Je suis pas content!!!!!!!!!!!!");
        break;
      case 'reset.effacer':
        $('.dialog', $el).text('');
        break;
    }
  };

  return base;
};

extend(DarthVaderObserver, Observer);

// gestion de l'héritage
function extend(C, P) {
  var F = function () {};
  F = P;
  F.prototype = $.extend(P.prototype, C.prototype);
  C.prototype = new F();
  C.uber = P.prototype;
  C.prototype.constructor = C;
}