var imgs = ['http://www.gigasmiley.com/assets/img/produit/GigaSmiley.4c4207c44e5fa18f4fbbdff8c355a3f0.jpg',
            'http://38.media.tumblr.com/avatar_8f1ac442d592_128.png',
            'http://papillonvolant.p.a.pic.centerblog.net/s1vh7z1n.jpg',
            'https://33.media.tumblr.com/avatar_17135998b3f5_128.png',
            'https://33.media.tumblr.com/avatar_52e80e3ad564_128.png',
            'http://38.media.tumblr.com/avatar_1d84667d2b3a_128.png',
            'http://38.media.tumblr.com/avatar_77caa9553877_128.png',
            'http://ediogames.com/uploaded_files/avatars/a54b5695412c7e55d449f1146cd2a6ab128.png'
          ];

  	for (var i = 0; i < imgs.length*2; i++) {
  		
  		// var tab=[];
  		// do{
  		var nb=Math.floor(Math.random()*imgs.length);
  		// tab.push(nb);
	  	// }while (!jQuery.inArray( nb, tab));

	  	// console.log(tab);

  		var fig= $('<figure>');
	  	$('#board').append(fig);
	  	var img= $('<img>');
	  	fig.append(img);
		img.attr('src', imgs[nb]);
	  	img.addClass('hide');
  	};
	  	
	
	$('img').click(changeClass);

	function changeClass(){
		$(this).toggleClass('hide').toggleClass('show');
		
	};

	if (true) {};
  	


