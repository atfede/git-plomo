<?php

class HorariosControllerCI extends CI_Controller {

    public function index() {

        $this->load->model('Reservas/SSReservas');
        $this->load->model('Reservas/Horario');

        $SSReservas = SSReservas::getInstancia();
<<<<<<< HEAD
=======
<<<<<<< HEAD

        //sacar post y pasarlos como parametros
        //$horarios = $SSReservas->obtenerHorarios(1, 'sala 1', '2015/11/03'); //user, sala, dia
        
        $registros = $SSReservas->obtenerHorarios(1, '2015-11-03'); //id_usuario (sala o profesor), fecha

=======
>>>>>>> 76e4870e7a7f37038bbac562f3f470c171b17bc1
        
        //sacar post y pasarlos como parametros
//        $horarios = $SSReservas->obtenerHorarios(1, 'sala 1', '2015/11/03'); //user, sala, dia
        $registros = $SSReservas->obtenerHorarios(1, '2015/11/03'); //id_usuario (sala o profesor), fecha

<<<<<<< HEAD
=======
>>>>>>> 9754ad9af97cfd27cd52374d39b49c45a66437a0
>>>>>>> 76e4870e7a7f37038bbac562f3f470c171b17bc1
        $data['registros'] = $registros;

        $this->load->view("HorariosView", $data);
    }

}
