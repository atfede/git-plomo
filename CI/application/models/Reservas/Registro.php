<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Registro
 *
 * @author LoLo
 */
class Registro extends CI_Model {
    
    private $fecha;     
    private $horario;
    private $tipo;
    
    public function __construct($fecha,$horario, $tipo) {
        $this->fecha = $fecha;
        $this->horario = $horario;
        $this->tipo = $tipo;
    }
    
    public function getFecha() {
        return $this->fecha;
    }

        public function getHorario() {
        return $this->horario;
    }

    public function getTipo() {
        return $this->tipo;
    }
    
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    //Esta bien delegar get/set
    function obtenerInicio() {
        return $this->horario->getInicio();
    }

    function obtenerFin() {
        return $this->horario->getFin();
    }
    
    public function cambiarInicio($hora){
        $this->horario->setInicio($hora);
    }
    
    public function cambiarFin($hora){
        $this->horario->setFin($hora);
    }
    
}
