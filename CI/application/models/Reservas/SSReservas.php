<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SSReservas
 *
 * @author LoLo
 */
class SSReservas extends CI_Model {

    private static $instancia;
    private $dias = array();//no tiene sentido??

    public static function getInstancia() {
        if (!self::$instancia instanceof self) {
            self::$instancia = new self;
        }
        return self::$instancia;
    }
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Reservas/HorariosBD');
    }
    
    public function obtenerHorario($pusuario,$pnombre,$dia){
        return HorariosBD::getHorarios($dia,$pusuario,$pnombre);
    }
    
    public function agregarHorario($pDia,$pIni,$pFin,$pusuario,$pnombre){        
        if($this->dias($pDia) == null){//no tiene sentido??
            //$this->dias($pDia) = new Dia();
        }
        $this->dias($pDia)->agregarHorario($pIni,$pFin,$pusuario,$pnombre);        
    }    
    
    public function displayHorarios(){
        
    }

}
