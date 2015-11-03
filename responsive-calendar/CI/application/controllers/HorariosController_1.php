<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HorariosController extends CI_Controller {

    public function index() {
        //Carga de modelos        
        $this->load->model('Reservas/SSReservas');
        $this->load->library('table');
        $this->load->helper('form');
        
        $this->verHorario();
        
        
/*
        $data = array(
            array('Nombre', 'Color', 'Tamaño'),
            array('Fred', 'Azul', 'Pequeño'),
            array('Mary', 'Rojo', 'Grande'),
            array('John', 'Verde', 'Mediano')
        );

        echo $this->table->generate($data);*/
    }
    
    public function verHorario(){
        $usuario = $this->input->post('usuario');
        $nombre = $this->input->post('nombre');
        $fecha = $this->input->post('fecha');
        $dia = date('N', strtotime($fecha));
        
        $SSReservas = SSReservas::getInstancia();
        $horarios = $SSReservas->obtenerHorario($usuario,$nombre,$dia);
       
        foreach($horarios as $h){
            ?><script> alert('<?php echo $h->getInicio()?>')</script> <?php
            ?><script> alert('<?php echo $h->getFin()?>')</script> <?php
        }
                
        $data['usuario'] = $usuario;
        $data['nombre'] = $nombre;
        $data['fecha'] = $fecha;
        $this->load->view('HorarioView', $data);
    }
    
    

}
