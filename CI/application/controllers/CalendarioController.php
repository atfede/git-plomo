<?php

class CalendarioController extends CI_Controller {

    public function index() {
        $this->load->view("CalendarioView");
    }

    public function displayCalendar($year = null, $month = null) { //index()
        $this->load->model("Calendario");

        $data['calendar'] = $this->Calendario->generate($year, $month);

        $this->load->view("CalendarioCIView", $data);
    }

}
