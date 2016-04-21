var ResetObserver = function($el) {

  var base = this;

  base.init = function() {
    $('.effacer', $el).bind('click', function() {
      base.notifyObservers('reset.effacer');
    });
  };


  base.notify = function(event, parameters) {
    switch(event) {
      case 'reset.effacer':
        $('.dialog', $el).text("");
        break;
    }
  };

  return base;
};
extend(ResetObserver, Observer);


// gestion de l'héritage
function extend(C, P) {
  var F = function () {};
  F = P;
  F.prototype = $.extend(P.prototype, C.prototype);
  C.prototype = new F();
  C.uber = P.prototype;
  C.prototype.constructor = C;
}