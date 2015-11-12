<?php

class HorariosControllerCI extends CI_Controller {

    public function index() {

        $this->load->model('Reservas/SSReservas');
        $this->load->model('Reservas/Horario');

        $SSReservas = SSReservas::getInstancia();
<<<<<<< HEAD


        //sacar post y pasarlos como parametros
        //$horarios = $SSReservas->obtenerHorarios(1, 'sala 1', '2015/11/03'); //user, sala, dia
        
        $registros = $SSReservas->obtenerHorarios(1, '2015-11-03'); //id_usuario (sala o profesor), fecha

=======
        
>>>>>>> e5232c824eeaf040b22976293a37f766635104fb
        //sacar post y pasarlos como parametros
        //$horarios = $SSReservas->obtenerHorarios(1, 'sala 1', '2015/11/03'); //user, sala, dia
        $registros = $SSReservas->obtenerHorarios(1, '2015/11/03'); //id_usuario (sala o profesor), fecha


        $data['registros'] = $registros;

        $this->load->view("HorariosView", $data);
    }

}
