<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IngresarHAController
 *
 * @author LoLo
 */
class IngresarHAController extends CI_Controller {

    public function index() {     
        
        $this->load->view('IngresarHAView');
         
    }
    
    public function ingresar(){
        $this->load->model('Reservas/SSReservas');
        $this->load->model('Reservas/Registro');
        $SSReservas = SSReservas::getInstancia();
               
        $horario = new Horario($this->input->post('inicio'),$this->input->post('fin'));
        $usuario = 0;
        $registro = new Registro($this->input->post('dia'), $horario, 0, $usuario);
        
        $ingreso = $SSReservas->ingresarHorarioAtencion($registro, "sala 1");
        if($ingreso){
            ?><script> alert('Ingreso correcto');</script> <?php
        }else{
            ?><script> alert('Error al ingresar');</script> <?php
        }
    }
    
}
