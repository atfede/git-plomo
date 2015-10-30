<?php

class HorariosControllerCI extends CI_Controller {

    public function index() {

        $this->load->model('Reservas/SSReservas');
        $this->load->model('Reservas/Horario');

        $SSReservas = SSReservas::getInstancia();
        $horarios = $SSReservas->obtenerHorario("0", 'sala 1', 1); //user, sala, dia

        $data['horarios'] = $horarios;
        
        $this->load->view("HorariosView", $data);
    }

}
