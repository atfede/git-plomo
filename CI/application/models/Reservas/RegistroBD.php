<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistroBD
 *
 * @author LoLo
 */
class RegistroBD extends CI_Model {

    public static function obtenerXFecha($fecha, $pusuario, $pnombre) {
        
    }
    
    public static function modificarRegistro($pRegistro){
        
    }
    
    public static function insertarRgistro($pRegistro){
        ?><script> alert(' <?php 
        $pRegistro->getFecha().' - '.
        $pRegistro->obtenerInicio().' - '.
        $pRegistro->obtenerFin().' - '.
        $pRegistro->getTipo().' - ';
        ?> ');</script> <?php
    }
    
    //POS: Retorna unicamente los horarios de los registros para esa fecha
    public static function obtenerHorariosXFecha($fecha, $pusuario, $pnombre){
        
    }

}
