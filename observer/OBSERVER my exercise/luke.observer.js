var LukeObserver = function($el) {

  var base = this;

  base.init = function() {
    $('.parler', $el).bind('click', function() {
      base.notifyObservers('luke.parler');
    });


  };


  base.notify = function(event, parameters) {
    switch(event) {
      case 'darthVader.parler':
        $('.dialog', $el).text("Non c'est pas possible :-((  !!!! ");
        break;
      case 'darthVader.avancer':
        $('.dialog', $el).text("Luke saute et se dit qu'il aurait du vérifier la température avant.");
        break;
      case 'luke.parler':
        $('.dialog', $el).text('Je te jure je vais sauter !!!');
        break;
      case 'yoda.parler':
        $('.dialog', $el).text('Je fais le fayot (whatever that means?!) !!!');
        break;
      case 'reset.effacer':
        $('.dialog', $el).text('');
        break;
    }
  };

  return base;
};
extend(LukeObserver, Observer);


// gestion de l'héritage
function extend(C, P) {
  var F = function () {};
  F = P;
  F.prototype = $.extend(P.prototype, C.prototype);
  C.prototype = new F();
  C.uber = P.prototype;
  C.prototype.constructor = C;
}