<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MapaController extends CI_Controller {

    //Cual es la diferencia entre public, var y $

    public $marcadores;
    public $servicios;

    public function index() {
        //Carga de modelos y librerias
        $this->load->library('googlemaps');
        $this->load->model('MarcadorM');
        $this->load->model('ServicioTipoM');
        $this->load->helper('form');

        //Datos prueba
        $this->_CrearServicios();
        $this->_Crearmarcadores();

        $this->_Marcar();
    }

    //-- Datos de prueba --
    function _CrearServicios() {
        $a = new ServicioTipoM('Sala de ensayo', "/img/sala.png");
        $b = new ServicioTipoM('Estudio de grabación', "/img/estudio.png");
        $c = new ServicioTipoM('Profesor', "/img/icono.png");
        $this->servicios = array($a, $b, $c);
    }

    function _Crearmarcadores() {
        $fede = new MarcadorM('Fede', -34.889056, -56.080797, $this->servicios[2]);
        $altoV = new MarcadorM('Alto Voltaje', '-34.899755', '-56.133355', $this->servicios[0]);
        $ort = new MarcadorM('ORT', '-34.903699', '-56.190897', $this->servicios[1]);
        $llambi = new MarcadorM('Llambi', '-34.902329', '-56.151007', $this->servicios[0]);
        $this->marcadores = array($fede, $altoV, $ort, $llambi);
    }

    //----------------------------------------

    function _Marcar() {
        /* //-- Geo --      
          $config = array();
          $config['center'] = 'auto'; //si lo saco se rompe geo
          $config['onboundschanged'] = '{
          var mapCentre = map.getCenter();
          marker_0.setOptions( {
          position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
          });
          }
          centreGot = true;';
          //-- Fin geo -- */
        $config['center'] = $marcador->x . ',' . $marcador->y;
        $config['zoom'] = 'auto';
        $this->googlemaps->initialize($config);

        //-- Agrego marcador de geo --
        // set up the marker ready for positioning 
        // once we know the users location
        //$marker = array();        
        //$this->googlemaps->add_marker($marker);      
        //-- fin marcador geo --    
        //-- Agrega Marcadores --  
        foreach ($this->marcadores as $marcador) {
            $marker = array();
            $marker['position'] = $marcador->x . ',' . $marcador->y;
            $marker['animation'] = 'BOUNCE';
            $marker['infowindow_content'] = $marcador->nombre . ' ' . $marcador->tipo->nombre;
            $marker['icon'] = $marcador->tipo->imagen;
            $this->_Filtrar($marcador);
            $marker['visible'] = $marcador->visible;
            $this->googlemaps->add_marker($marker);
        }
        //-- Fin agregar marcadores --       

        $selected = ($this->input->post('tipos'));
        $js = 'onChange="this.form.submit()"';
        $guide_options = array('todos' => 'Todos',
            'Sala de ensayo' => 'Sala de ensayo',
            'Estudio de grabación' => 'Estudio de grabación',
            'Profesor' => 'Profesores'
        );

        $data['select'] = form_dropdown('tipos', $guide_options, $selected, $js);

        $data['map'] = $this->googlemaps->create_map();
        $data['nombre'] = $this->input->post('busqueda');
        //$data['ddServicios'] = $this->_DDServicios();
        $this->load->view('MapaView', $data);
    }

    function _Filtrar($marcador) {
        $tipo = $this->input->post('tipos');
        $marcador->visible = ($marcador->tipo->nombre == $tipo || $tipo == "todos" || $tipo == "");
        $this->_FiltrarNombre($marcador);
    }

    function _FiltrarNombre($marcador) {
        if ($marcador->visible) {
            $nombre = $this->input->post('busqueda');
            $marcador->visible = ($marcador->nombre == $nombre || $nombre == '');
        }
        //$data['nombre'] = $nombre;
    }

    /*
      //FUNCION PARA CARGAR SELECT
      function _DDServicios(){
      $i = 0;
      foreach($this->servicios as $s)	{
      $ddServicios[$i] = $s->nombre;
      $i++;
      }
      return form_dropdown('ddServicios', $ddServicios);
      } */
}
