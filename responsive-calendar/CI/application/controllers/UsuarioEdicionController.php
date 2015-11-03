<?php

class UsuarioEdicionController extends CI_Controller {

    public function index() {

        $config = array();
        $config['center'] = 'auto';
        $config['zoom'] = '16';
        $config['onboundschanged'] = 'if (!centreGot) {
	var mapCentre = map.getCenter();
	marker_0.setOptions({
		position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
	});
    }
    centreGot = true;';

//https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete
        //Places Input Autocomplete
        $config['places'] = TRUE;
        $config['placesAutocompleteInputID'] = 'srch-term-user';
        $config['placesAutocompleteBoundsMap'] = TRUE; //set results biased towards the maps viewport
// If the place has a geometry, then present it on a map.
        $config['placesAutocompleteOnChange'] = '

//saco el primer marcador
marker_0.setMap(null);

var geocoder = new google.maps.Geocoder();
        var address = document.getElementById("srch-term-user").value;
        geocoder.geocode({ "address": address }, function (results, status) {
            console.log((results[0]))
            if (status == google.maps.GeocoderStatus.OK) {
                if(typeof marker != "undefined"){marker.setMap(null)};
                $("#srch-term-user").parent().removeClass("has-error");
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();
                 marker = new google.maps.Marker({
map:map,
draggable:true, //false
animation: google.maps.Animation.DROP,
title:results[0].formatted_address,
position: new google.maps.LatLng(latitude, longitude)
});

google.maps.event.addListener(marker, "dragend", function(event) { 
//    alert("marker dragged"); 
    $.ajax({
      type: "POST",
      url: "../../../js/ajax_calls/guardar_ubicacion.php",
      data: {"lat" : event.latLng.lat(), "long" : event.latLng.lng() } ,
      success:function(data){
//            alert("lat: " + event.latLng.lat() + "long: " + event.latLng.lng());
            alert("Haz actualizado tu ubicación!!");
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert(thrownError); //throw any errors
            alert("mal!"); //throw any errors
        }
    })
    });


map.setCenter(new google.maps.LatLng(latitude, longitude), 16);
map.setZoom(16);
google.maps.event.addListener(marker, "click", function (event) {
//infowindow = new google.maps.InfoWindow({"content":results[0].formatted_address});
infowindow = new google.maps.InfoWindow({"content":"E.T. - Mi casa!"});
infowindow.open(map, marker);

latitude = this.getPosition().lat();
longitude = this.getPosition().lng();
});
            } else {
                alert("Request failed.")
                $("#srch-term-user").parent().addClass("has-error");
            }
        });


';

        $this->googlemaps->initialize($config);

        $this->load->model('UsuarioEdicion');

        $marker = array();
        $marker['draggable'] = true;

//guardar ubicación
        $marker['ondragend'] = '
    $.ajax({
      type: "POST",
      url: "../../../js/ajax_calls/guardar_ubicacion.php",
      data: {"lat" : event.latLng.lat(), "long" : event.latLng.lng() } ,
      success:function(data){
//            alert("lat: " + event.latLng.lat() + "long: " + event.latLng.lng());
            alert("Haz actualizado tu ubicación!!");
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert(thrownError); //throw any errors
            alert("mal!"); //throw any errors
        }
    })';

        $this->googlemaps->add_marker($marker);
        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('UsuarioEdicionView', $data);
    }

}
