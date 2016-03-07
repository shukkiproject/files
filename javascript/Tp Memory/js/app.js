var imgs = ['http://www.gigasmiley.com/assets/img/produit/GigaSmiley.4c4207c44e5fa18f4fbbdff8c355a3f0.jpg',
            'http://38.media.tumblr.com/avatar_8f1ac442d592_128.png',
            'http://papillonvolant.p.a.pic.centerblog.net/s1vh7z1n.jpg',
            'https://33.media.tumblr.com/avatar_17135998b3f5_128.png',
            'https://33.media.tumblr.com/avatar_52e80e3ad564_128.png',
            'http://38.media.tumblr.com/avatar_1d84667d2b3a_128.png',
            'http://38.media.tumblr.com/avatar_77caa9553877_128.png',
            'http://ediogames.com/uploaded_files/avatars/a54b5695412c7e55d449f1146cd2a6ab128.png'
          ];

        // original idea to count the numbers
        // ($.inArray(nb, tab)===-1 || ) 
        // var counts = {};
        // tab.forEach(function(x) { counts[x] = (counts[x] || 0)+1; });

    var tab=[];
    for (var j = 0; j < 2; j++) {
      for (var i = 0; i < imgs.length; i++) {
          tab.push(i);
      }
    };
    //shuffle table
    for (var i = 0; i < imgs.length*2; i++) {
      var temp,randPos;
      randPos=Math.floor(Math.random()*imgs.length*2);
      temp=tab[i];
      tab[i]=tab[randPos];
      tab[randPos]=temp;
    }
    // console.dir(tab);
    var img;
    for (var i = 0; i < imgs.length*2; i++) {
  		var fig= $('<figure>');
	  	$('#board').append(fig);
	  	img= $('<img>');
	  	fig.append(img);
		  img.attr('src', imgs[tab[i]]);
	  	img.addClass('hide');
  	};
	  		
	$('img').click(changeClass);
  
  var clicked=[];
  var pause;
	function changeClass(){
		$(this).toggleClass('show').toggleClass('hide');
    clicked.push($(this));

    pause=setTimeout(verify, 1500);

    function verify(){
    if (clicked.length==2){
            console.log('2'); 
        if (clicked[0].attr('src')==clicked[1].attr('src')) {
            // console.log('same');  
            var target = $('.show').each(function() {
              $(this).addClass('good').removeClass('hide');
              $(this).parent().css('border', '0');
              });
          
        }else{
          // console.log('not the same');
           $('.show').each(function() {
              $(this).delay(2000).toggleClass('hide').toggleClass('show');
            });
        }
        clicked=[];
  };
  }  

}



