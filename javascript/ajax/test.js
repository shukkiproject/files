//by leaving the input area
$("input").on('change', function(event){


	// var ville=$this.value; js
	var ville =$(this).val(); //jquery

	var urlm ='http://api.openweathermap.org/data/2.5/weather?&q=' + ville + '&appid=44db6a862fba0b067b1930da0d769e98';

	var request = {
		url:urlm,
		type:'GET',
		dataType: 'json',
		timeout: 1000,
		error: function(){
			alert('Erreur chargement');
		},
		success: function(data){
			console.dir(data);
			$('div').text(data.main.temp);
		}
	};

	$.ajax(request);

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