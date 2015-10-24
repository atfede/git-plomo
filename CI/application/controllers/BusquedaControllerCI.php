<?php

class BusquedaControllerCI extends CI_Controller {

    public function index() {

        $config = array();
        $config['center'] = 'auto';
        $config['onboundschanged'] = 'if (!centreGot) {
	var mapCentre = map.getCenter();
	marker_0.setOptions({
		position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
	});
     
        //xx
//        infowindow = new google.maps.InfoWindow({"content":results[0].formatted_address});
//        infowindow = new google.maps.InfoWindow({"content":"E.T. - Mi casa!"});
//        infowindow.open(map, marker);
    }
    centreGot = true;';

        $this->googlemaps->initialize($config);

        $this->load->model('Servicio');

        $infoMarkers = $this->Servicio->get_servicios();

        $marker = array();
        $marker['infowindow_content'] = '<span style="font-weight:bold;">' . 'E.T.: Mi casa!' . '</span><br>' . 'Dirección' . "<br>" . 'latitud' . " | " . 'longitud';
//        $marker['position'] = $marker->latitud . "," . $marker->longitud;
//        $this->googlemaps->add_marker($config['center']);
//        $url = "http://maps.google.com/maps/api/geocode/json?address=West+Bridgford&sensor=false&region=UK";
//        $response = file_get_contents($url);
//        $response = json_decode($response, true);
//        //print_r($response);
//        $lat = $response['results'][0]['geometry']['location']['lat'];
//        $long = $response['results'][0]['geometry']['location']['lng'];
//
//        


        foreach ($infoMarkers as $infoMarker) {
            $marker = array();
            $marker['infowindow_content'] = '<span style="font-weight:bold;">' . $infoMarker->descripcion . '</span><br>' . $infoMarker->direccion . "<br>" . $infoMarker->latitud . " | " . $infoMarker->longitud; //1 - Hello World!
            $marker['position'] = $infoMarker->latitud . "," . $infoMarker->longitud;
            $this->googlemaps->add_marker($marker);
        }

        $data['map'] = $this->googlemaps->create_map();

        $this->load->view('BusquedaViewCI', $data);
    }

    public function FiltrarTipo() {

//        $config = array();
//        $config['center'] = 'auto';
//        
//        $config['onboundschanged'] = 'if (!centreGot) {
//	var mapCentre = map.getCenter();
//	marker_0.setOptions({
//		position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
//	});
//    }
//    centreGot = true;';
//        $this->googlemaps->initialize($config);
////

        $this->load->model('Servicio');

        $tipo = $this->input->post('tipo');

        $infoMarkers = $this->Servicio->get_map_con_filtros($tipo);

        foreach ($infoMarkers as $infoMarker) {
            $marker = array();
//            $marker['position'] = $infoMarker->lat . "," . $infoMarker->lng;
            $marker['infowindow_content'] = '<span style="font-weight:bold;">' . $infoMarker->descripcion . '</span><br>' . $infoMarker->direccion . "<br>" . $infoMarker->latitud . " | " . $infoMarker->longitud; //1 - Hello World!
//          $marker['icon'] = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=A|9999FF|000000';
            $marker['position'] = $infoMarker->latitud . "," . $infoMarker->longitud;
            $this->googlemaps->add_marker($marker);
        }

        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('BusquedaViewCI', $data);
    }

    public function GetServicios() {
        $this->load->model('Servicio');
        $str = $this->input->post('srch-term');

        $infoMarkers = $this->Servicio->get_servicios_palabras($str);

        foreach ($infoMarkers as $infoMarker) {
            $marker = array();
            $marker['infowindow_content'] = '<span style="font-weight:bold;">' . $infoMarker->descripcion . '</span><br>' . $infoMarker->direccion . "<br>" . $infoMarker->latitud . " | " . $infoMarker->longitud; //1 - Hello World!
            $marker['position'] = $infoMarker->latitud . "," . $infoMarker->longitud;
            $this->googlemaps->add_marker($marker);
        }

        $data['map'] = $this->googlemaps->create_map();

        $this->load->view('BusquedaViewCI', $data);
    }

}
