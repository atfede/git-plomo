<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SetHorariosReservaController extends CI_Controller {

    public function index() {
        //Carga de modelos        
        $this->load->model('Reservas/SSReservas');
//        $this->SSReservas::getInstancia();
    }

}
