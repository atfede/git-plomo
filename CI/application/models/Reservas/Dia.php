<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dia
 *
 * @author LoLo
 */
class Dia extends CI_Model {

    //var $nombre;
    var $numero;
    private $horarios;

    public function __construct() {
        parent::__construct();
        $this->horarios = array();
    }

    public function agregarHorario($pIni,$pFin,$pusuario,$pnombre) {
        $this->horarios = HorariosBD::getHorarios($this->numero,$pusuario,$pnombre);
        if (validarHorario($pIni, $pFin)) {
            //Agregar BD
        }
    }

    function getHorarios($pusuario,$pnombre) { //no tiene sentido, lo hago dircto del SSReserva
        return HorariosBD::getHorarios($this->numero,$pusuario,$pnombre);
        //return $this->horarios;       
    }

    private function validarHorario($pIni, $pFin) {
        $valido = true;
        for ($i = 0; $i < count($this->horarios) && $valido; $i++) {
            if ($this->horarios($i)->estaEnHorario($pIni) ||
                    $this->horarios($i)->estaEnHorario($pFin)) {
                $valido = false;
            }
        }
        return $valido;
    }

}
