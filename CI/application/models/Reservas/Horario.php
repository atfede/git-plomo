<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Horario
 *
 * @author LoLo
 */
class Horario extends CI_Model {

    private $inicio;
    private $fin;

    public function __construct($pini = "", $pfin = "") {
        parent::__construct();
        $this->inicio = $pini;
        $this->fin = $pfin;
    }

    function getInicio() {
        return $this->inicio;
    }

    function getFin() {
        return $this->fin;
    }

    public function setInicio($inicio) {
        $this->inicio = $inicio;
    }

    public function setFin($fin) {
        $this->fin = $fin;
    }

    public function estaEnHorario($horario) {
        return ($this->inicio <= $horario->getInicio()
                && $horario->getFin() <= $this->fin);
    }

    public function tamano() {
        return ( ($this->getFin() - $this->getInicio()) * 21);
    }

    function esIgual($pHorario) {
        return ($this->inicio == $pHorario->getInicio() &&
                $this->fin == $pHorario->getFin());
    }
    
    public function horaEnHorario($pHora){
        return ($pHora>= $this->inicio &&
                $pHora<= $this->fin);
    }
    
    /*
     private function validarHorario($pIni, $pFin) {
        $valido = true;
        for ($i = 0; $i < count($this->horarios) && $valido; $i++) {
            if ($this->horarios($i)->estaEnHorario($pIni) ||
                    $this->horarios($i)->estaEnHorario($pFin)) {
                $valido = false;
            }
        }
        return $valido;
    }*/

}
