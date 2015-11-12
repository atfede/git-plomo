<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrarHoraController
 *
 * @author LoLo
 */
class RegistrarHoraController extends CI_Controller {

    public function index() {
        $this->load->helper('form');
        
        //Carga select        
        $selected = ($this->input->post('tipo'));       
        $options = array(0 => 'Disponible',
            1 => 'Ocupado'
        );
        $data['select'] = form_dropdown('tipo', $options, $selected);
        $this->load->view('RegistrarHoraView', $data);
    }
    
    public function registrar(){
        $this->load->model('Reservas/SSReservas');
        $this->load->model('Reservas/Registro');
        $SSReservas = SSReservas::getInstancia();
               
        $horario = new Horario($this->input->post('inicio'),$this->input->post('fin'));
        $usuario = 0;
        $fecha = $this->input->post('fecha');
        $registro = new Registro($fecha, $horario, $this->input->post('tipo'), $usuario);
        
        $ingreso = $SSReservas->ingresarHoraRegistrada($registro,"sala 1");                
        if($ingreso){
            ?><script> alert('Ingreso correcto');</script> <?php
        }else{
            ?><script> alert('Error al ingresar');</script> <?php
        }
        
    }
    
}
