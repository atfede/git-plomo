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

    public function estaEnHorario($hora) {
        return ($this->inicio <= $hora && $hora <= $this->fin);
    }
<<<<<<< HEAD
    
    public function tamano(){
        return (($this->getFin() - $this->getInicio())); //21
=======

    public function tamano() {
        return ( ($this->getFin() - $this->getInicio()) * 21);
>>>>>>> fac0d343c3cb106dc337574ff82e87c22e37f3da
    }

    function esIgual($pHorario) {
        return ($this->inicio == $pHorario->getInicio() &&
                $this->fin == $pHorario->getFin());
    }

}
