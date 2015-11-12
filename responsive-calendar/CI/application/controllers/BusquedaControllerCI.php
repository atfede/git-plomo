<?php

class BusquedaControllerCI extends CI_Controller {

    //Variables bruno
    public $marcadores;
    public $SSMapa;
    public $nombre;
    public $select;

    public function index() {

        $config = array();
        $config['center'] = 'auto';
        $config['onboundschanged'] = 'if (!centreGot) {
	var mapCentre = map.getCenter();
	marker_0.setOptions({
		position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
	});
    }
    centreGot = true;';
//
        $this->googlemaps->initialize($config);
//
//        $this->load->model('Servicio');
//
//        $infoMarkers = $this->Servicio->get_servicios();
//
//        $marker = array();
//        $marker['infowindow_content'] = '<span style="font-weight:bold;">' . 'E.T.: Mi casa!' . '</span><br>' . 'Dirección' . "<br>" . 'latitud' . " | " . 'longitud';
//        
//        foreach ($infoMarkers as $infoMarker) {
//            $marker = array();
//            $marker['infowindow_content'] = '<span style="font-weight:bold;">' . $infoMarker->descripcion . '</span><br>' . $infoMarker->direccion . "<br>" . $infoMarker->latitud . " | " . $infoMarker->longitud; //1 - Hello World!
//            $marker['position'] = $infoMarker->latitud . "," . $infoMarker->longitud;
//            $this->googlemaps->add_marker($marker);
//        }

        $this->_Inicio();
        $this->_AgregarMarcadores();

        $data['select'] = $this->select;
        $data['nombre'] = $this->nombre;

        $data['map'] = $this->googlemaps->create_map();

        $this->load->view('BusquedaViewCI', $data);
    }

    function _Inicio() {
//        $this->load->library('googlemaps');
        $this->load->model('SSMapa');
        $this->load->helper('form');

        $SSMapa = SSMapa::getInstancia();
        $this->marcadores = $SSMapa->getMarcadores();
    }

    function _AgregarMarcadores() {

        $marker = array();
        $marker['visible'] = false;
        $this->googlemaps->add_marker($marker);


        foreach ($this->marcadores as $marcador) {
            $marker = array();
            $marker['position'] = $marcador->getX() . ',' . $marcador->getY();
            $marker['animation'] = 'BOUNCE';
            $marker['infowindow_content'] = $marcador->getNombre() . ' ' . $marcador->getTipo();
            $marker['icon'] = $marcador->getImagen();
            $tipo = $this->input->post('tipos');
            $this->nombre = $this->input->post('busqueda');
            $marker['visible'] = $this->SSMapa->Filtrar($marcador, $tipo, $this->nombre);
            $this->googlemaps->add_marker($marker);
        }

        //Carga select        
        $selected = ($this->input->post('tipos'));
        $js = 'onChange="this.form.submit();", class="form-control"';
        $options = array('todos' => 'Todos',
            'Sala de ensayo' => 'Sala de ensayo',
            'Estudio de grabación' => 'Estudio de grabación',
            'Profesor' => 'Profesores'
        );


        $this->select = form_dropdown('tipos', $options, $selected, $js);
    }


    
//    $this->load->model('SSCalenadario');
//    $this->SSCalendario->get_eventos_en_dia($dia);
//    $this->SSCalendario->get_eventos_en_mes($mes);
//    $this->SSCalendario->get_eventos_en_anio($año);
    
    
//      $this->load_model('SSCal');
//      $this->model('SSCalendario')->get_eventos_en_dia($dia);
}
