var ClockObserver = function($el) {

  var base = this;
  var h = '00',
  var m = '58',
  var s = '58';

  function date_heure(id)
  {
         date = new Date;
         
         h = date.getHours();
         if(h<10)
         {
                 h = "0"+h;
         }
         m = date.getMinutes();
         if(m<10)
         {
                 m = "0"+m;
         }
         s = date.getSeconds();
         if(s<10)
         {
                 s = "0"+s;
         }
         resultat = h+':'+m+':'+s;
         document.getElementById(id).innerHTML = resultat;
         setTimeout('date_heure("'+id+'");','1000');
         return true;
  }

  function plusH(){
      if (h==59){
        h=0;
      }
      h++;
  }

  function plusM(){
      if (m==59){
        m=0;
      }
      m++;
  }

  function plusS(){
      if (s==59){
        s=0;
      }
      s++;
  }

  function moinsH(){
      if (h==0{
        h=59;
      }
      h--;
  }

  function moinsM(){
      if (m==0){
        m=59;
      }
      m--;
  }

  function moinsS(){
      if (s==0){
        s=59;
      }
      s--;
  }
    base.init = function() {
      date_heure(clock);
      
    };


  base.notify = function(event, parameters) {
    switch(event) {
      case 'buttons.h-plus':
        $('.clock').text('ok');
        break;
 
    }
  };

  return base;
};

extend(ClockObserver, Observer);

// gestion de l'héritage
function extend(C, P) {
  var F = function () {};
  F = P;
  F.prototype = $.extend(P.prototype, C.prototype);
  C.prototype = new F();
  C.uber = P.prototype;
  C.prototype.constructor = C;
}