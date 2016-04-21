var observable;
var darthVaderElement;
var lukeElement;
var yodaElement;
var resetElement;

$(document).ready(function() {
  
  // creation de l'observable
  observable = new Observable();

  // creation de l'observer darthVader
  darthVaderElement = new DarthVaderObserver($('#darthVader'))
    .register(observable)
    .init()
  ;

  // creation de l'observer Luke
  lukeElement = new LukeObserver($('#luke'))
    .register(observable)
    .init()
  ;

  yodaElement = new YodaObserver($('#yoda'))
    .register(observable)
    .init()
  ;

  resetElement = new ResetObserver($('#reset'))
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