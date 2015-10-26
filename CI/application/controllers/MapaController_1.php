<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MapaController extends CI_Controller {
    
    //Cual es la diferencia entre public, var y $    
    public $marcadores;    
    public $SSMapa;

    public function index() {
        //Carga de modelos y librerias
        $this->load->library('googlemaps');
        $this->load->model('SSMapa');    
        $this->load->helper('form');
        
        $SSMapa = SSMapa::getInstancia();
        $this->marcadores = $SSMapa->getMarcadores();      
        $this->_Marcar();             
    }    
    
    function _Marcar() {             
        $config['center'] = '1600 Amphitheatre Parkway in Mountain View, Santa Clara County, California';
        $config['zoom'] = 'auto';           
        $this->googlemaps->initialize($config);            
        
        //-- Agrega Marcadores --  
        foreach ($this->marcadores as $marcador) {            
            $marker = array();
            $marker['position'] = $marcador->getX().','.$marcador->getY();
            $marker['animation'] = 'BOUNCE';
            $marker['infowindow_content'] = $marcador->getNombre().' '.$marcador->getTipo();            
            $marker['icon'] = $marcador->getImagen();            
            //$tipo = $this->input->post('tipos');
            //$nombre = "hola";//$this->input->post('busqueda');     
            //$marker['visible'] = $this->SSMapa->Filtrar($marcador,$tipo,$nombre);          
            $this->googlemaps->add_marker($marker);  
            
        }   
        
        //-- Fin agregar marcadores --     
        $data = array();
        $data['map'] = $this->googlemaps->create_map();
        
        /*
        $selected = "Profesor";//($this->input->post('tipos'));                      
        $js ='onChange="this.form.submit();"';
        $options = array('todos' => 'Todos',
                       'Sala de ensayo' => 'Sala de ensayo',
                       'Estudio de grabación' => 'Estudio de grabación',                       
                       'Profesor' => 'Profesores'
            );*/
        
        
        //$data['select'] = "select";//form_dropdown('tipos', $options, $selected, $js);    
        //$data['nombre'] = "nombre";//$nombre;
        //$data['ddServicios'] = $this->_DDServicios();
        $this->load->view('MapaView', $data);
        ?> 
        <?php
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
    }*/
}




