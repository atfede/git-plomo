<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {

   public function index() {
//       $this->load->model("HomeModel"); //una vez que cargamos el modelo, podemos llamar sus funciones
//       $data['records'] = $this->HomeModel->getData(); //tiene todos los resultados del array
//         $this->load->view("index", $data);

//       $variable = 'jaja';
//       $this->load->view("controllers/calendario", $variable);
//       $this->load->view("CalendarioView");

       $this->load->view("IndexView");
         
    }
}
