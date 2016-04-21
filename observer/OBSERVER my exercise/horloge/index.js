var observable;
var clockElement;
var buttonsElement;

$(document).ready(function() {
  
  // creation de l'observable
  observable = new Observable();

  // creation de l'observer darthVader
  clockElement = new ClockObserver($('#clock'))
    .register(observable)
    .init()
  ;

  buttonsElement = new ButtonsObserver($('#buttons'))
    .register(observable)
    .init()
  ;
});

// gestion de l'héritage
function extend(C, P) {
  var F = function () {};
  F = P;
  F.prototype = $.extend(P.prototype, C.prototype);
  C.prototype = new F();
  C.uber = P.prototype;
  C.prototype.constructor = C;
}