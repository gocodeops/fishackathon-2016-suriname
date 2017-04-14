function scrollDown() {
	window.scrollBy(0,1000); // horizontal and vertical scroll increments
	// scrolldelay = setTimeout('pageScroll()', 100); // scrolls every 100 milliseconds
}

function scrollUp() {
	window.scrollBy(0,-1000); // horizontal and vertical scroll increments
	// scrolldelay = setTimeout('pageScroll()', 100); // scrolls every 100 milliseconds
}

function DeleteMarkers() {
    //Loop through all the markers and remove
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
    markers = [];
};

function getlaws() {
	$.get('http://192.168.1.10/fishackathon-2016/backend/index.php/law/getall/', function(data){
		data = jQuery.parseJSON(data);
		div_to_append = $("#laws");

		$.each(data, function(i, value){
			div_to_append.append('<tr>\
				<td>' + value.country_code + '</td>\
				<td>' + value.title + '</td>\
				<td>' + value.body + '</td>\
			</tr>')
		});
	});
}

function getAreas() {
	$.get('http://192.168.1.10/fishackathon-2016/backend/index.php/area/getall/', function(data) {
		data = $.parseJSON(data);
		// console.log(data);
		$.each(data, function(i, value) {
			$('#areas').append('\
				<tr>\
					<td>'+value.name+'</td>\
					<td>'+value.lat+'</td>\
					<td>'+value.lng+'</td>\
					<td>'+value.content+'</td>\
				<tr>\
			');
		})
	})
}

function getDocks(){
	$.get('http://192.168.1.10/fishackathon-2016/backend/index.php/marker/getall/', function(data) {
		data = $.parseJSON(data);
		// console.log(data);
		$.each(data, function(i, value) {
			$('#docks').append('\
				<tr>\
					<td>'+value.name+'</td>\
					<td>'+value.lat+'</td>\
					<td>'+value.lng+'</td>\
					<td>'+value.content+'</td>\
				<tr>\
			');
		})
	})
}

function postlaw(country_code, title, body){
	$.post('http://192.168.1.10/fishackathon-2016/backend/index.php/law/new/', {
		country_code: country_code,
		title: title,
		body: body
	}, function(data){
		if (data == 1) {
			alert("Success");
		} else {
			alert("Failed");
		}
	});
}

function postArea() {
	$('#form_area').submit(function(e) {
		e.preventDefault();

		$.post('http://192.168.1.10/fishackathon-2016/backend/index.php/area/new/', 
		{
			name: $('#name').val(),
			lat: $('#lat').val(),
			lng: $('#lng').val(),
			radius: $('#radius').val(),
			type: $('#area_type').val(),
			content: $('#content').val()
		}, function(data) {
			if(data == 1) {
				window.location = "index.html";
			} else {
				alert("Error");
				console.log(data);
			}
		})
	})
}

function postMarker() {
	$('#form_marker').submit(function(e) {
		e.preventDefault();

		$.post('http://192.168.1.10/fishackathon-2016/backend/index.php/marker/new/', 
		{
			name: $('#name').val(),
			lat: $('#lat').val(),
			lng: $('#lng').val(),
			content: $('#content').val()
		}, function(data) {
			if(data == 1) {
				window.location = "index.html";
			} else {
				alert("Error");
				console.log(data);
			}
		})
	})
}