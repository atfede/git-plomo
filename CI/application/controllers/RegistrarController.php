<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrarController
 *
 * @author LoLo
 */
class RegistrarController extends CI_Controller {

    public function index() {
        $this->load->model('Reservas/SSReservas');
        $this->load->model('Reservas/Registro');
        //$this->load->model('Reservas/Horario');
        $SSReservas = SSReservas::getInstancia();

        $ingreso = $SSReservas->ingresarRegistro($this->_CargarRegistro(),0,"sala 1");
         ?><script> alert(' <?php echo $ingreso; ?> ');</script> <?php
       
    }

    function _CargarRegistro() {
        $horario = new Horario("17:00", "18:00");
        $fecha = "12-10-2015";
        return new Registro($fecha, $horario, 2);
    }

}
