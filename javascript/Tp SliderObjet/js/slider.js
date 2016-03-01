// first argument must be an id, second must be an array of images
function Slider(id, imgs, speed){
  	
  	this.speed = speed || 2000;
  	this.slider = $('#'+id);

  	var nb = 0, timer = false;

  	var div=$('<div>');
  	$('body').append(div);

	var img=this.slider.attr('src', imgs[nb]);
	div.append(img);

	var div2=$('<div>');
	div.append(div2);

	var btn1=$('<button>');
	$(div2).append(btn1);
	btn1.html('start');

	var btn2=$('<button>');
	$(div2).append(btn2);
	btn2.html('previous');

	var btn3=$('<button>');
	$(div2).append(btn3);
	btn3.html('next');

	
	btn1.on('click', slider.bind(this));
	btn2.on('click', previous.bind(this));
	btn3.on('click', next.bind(this));

	 function slider(){	
	  // If there is not an interval running
	  if(!timer){
	    timer = setInterval(change.bind(this), this.speed);
	    btn1.html('stop');
	  } else {
	  	clearInterval(timer);
	  	timer=false;
	  	btn1.html('start');
	  }

	}

	function change(){
		nb++;
		if (nb===imgs.length) {
			nb=0;
		};
		this.slider.attr('src', imgs[nb]);	
	}

	function previous(){
	  nb = (nb - 1 + imgs.length) % imgs.length;
	  this.slider.attr('src', imgs[nb]);
	}
  

	function next(){
	  nb = (nb + 1 ) % imgs.length;
	  this.slider.attr('src', imgs[nb]);
	}
  




}
