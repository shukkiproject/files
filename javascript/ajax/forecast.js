//by leaving the input area
$("#submit").on('click', function(event){
	// var ville=$this.value; js
	var ville =$("#city").val(); //jquery
	var latitude, longtitude;

	weatherNow();
	setTimeout(forecast, 1000);

	function weatherNow(){

	// var country =$("#country").val();

	var urlm1 ='http://api.openweathermap.org/data/2.5/weather?&q=' + ville + '&appid=b1b15e88fa797225412429c1c50c122a';
	
	var request1 = {
		url:urlm1,
		type:'GET',
		dataType: 'json',
		// timeout: 100,
		error: function(){
			alert('Erreur chargement');
		},
		success: function(data){
			console.dir(data);
			latitude=data.coord.lat;
			longtitude=data.coord.lon;
			map();
			$('#now').html(
           '<h4>Heure de mesure : </h4>'+timeConverter(data.dt)+
           '<h4>Levé du soleil : </h4>'+timeConverter(data.sys.sunrise)+
           '<h4>Couché du soleil : </h4>'+timeConverter(data.sys.sunset)+
           '<h4>Humidité : </h4>'+data.main.humidity+' %'+
           '<h4>Pression : </h4>'+data.main.pressure+' hPA'+
           '<h4>Vitesse du vent : </h4>'+data.wind.speed+' km/h'+
           '<h4>Temperature : </h4>'+data.main.temp+'°'+
           '<img src="http://openweathermap.org/img/w/'+data.weather[0].icon+'.png" />' );
		}

	};
	$.ajax(request1);
	}

	function forecast(){

	var count =$("#count").val();
	var icon="";
	var urlm2 ='http://api.openweathermap.org/data/2.5/forecast/daily?q=' + ville +'&cnt='+ count +'&appid=b1b15e88fa797225412429c1c50c122a';
	
	var request2 = {
		url:urlm2,
		type:'GET',
		dataType: 'json',
		// timeout: 100,
		error: function(){
			alert('Erreur chargement');
		},
		success: function(data){
			console.dir(data);
			$('#forecast').html('<h4>Prévision</h4>');
			for (var i = 0; i < count; i++) {

				var div=$('<img id="'+i+'">');
  				$('#forecast').append(div);

				icon=data.list[i].weather[0]["icon"];
				div.attr('src', 'http://openweathermap.org/img/w/'+icon+'.png');
			}
		}


	};
	$.ajax(request2);

	}

	function map() {

			$('#map').html('<h4>Map</h4><img src="http://maps.googleapis.com/maps/api/staticmap?center=' + latitude + ','+ longtitude + '&zoom=10&size=200x200" />');
		}

	
	

function timeConverter(UNIX_timestamp){
 var a = new Date(UNIX_timestamp * 1000);
 var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
 var year = a.getFullYear();
 var month = months[a.getMonth()];
 var date = a.getDate();
 var hour = a.getHours();
 var min = a.getMinutes();
 var sec = a.getSeconds();
 var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
 return time;
}

});

//by button
// $("button").on('click', function(){

// var ville =$('#city').val();

// var urlm ='http://api.openweathermap.org/data/2.5/weather?&q=' + ville + '&appid=44db6a862fba0b067b1930da0d769e98';

// 	var request = {
// 		url:urlm,
// 		type:'GET',
// 		dataType: 'json',
// 		timeout: 1000,
// 		error: function(){
// 			alert('Erreur chargement');
// 		},
// 		success: function(data){
// 			console.dir(data);
// 			$('div').text(data.main.temp);
// 		}
// 	};

// 	$.ajax(request);

// });