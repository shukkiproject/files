var ButtonsObserver = function($el) {

  var base = this;

  base.init = function() {
    $('.h-plus', $el).bind('click', function() {
      base.notifyObservers('buttons.h-plus');
    });
    $('.m-plus', $el).bind('click', function() {
      base.notifyObservers('buttons.m-plus');
    });
    $('.s-plus', $el).bind('click', function() {
      base.notifyObservers('buttons.s-plus');
    });
    $('.h-moins', $el).bind('click', function() {
      base.notifyObservers('buttons.h-moins');
    });
    $('.m-moins', $el).bind('click', function() {
      base.notifyObservers('buttons.m-moins');
    });
    $('.s-moins', $el).bind('click', function() {
      base.notifyObservers('buttons.s-moins');
    });
  };

  return base;
};
extend(ButtonsObserver, Observer);


// gestion de l'héritage
function extend(C, P) {
  var F = function () {};
  F = P;
  F.prototype = $.extend(P.prototype, C.prototype);
  C.prototype = new F();
  C.uber = P.prototype;
  C.prototype.constructor = C;
}