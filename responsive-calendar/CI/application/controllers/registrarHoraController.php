<?php


class registrarHoraController extends CI_Controller {

    public function index() {
        $this->load->model('Reservas/SSReservas');
        $SSReservas = SSReservas::getInstancia();
        
        $horario = new Horario($this->input->post('inicio'),$this->input->post('fin'));
        $registro = new Registro($this->input->post('dia'), $horario, 0);
        
        $ingreso = $SSReservas->ingresarHorarioAtencion($registro, 0, "sala 1");
        if($ingreso){
            ?><script> alert('Ingreso correcto');</script> <?php
        }else{
            ?><script> alert('Error al ingresar');</script> <?php
        }
         
    }
}
