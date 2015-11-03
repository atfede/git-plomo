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

    //POS: retonra los registros correspondientes a los horarios de atención para ese día
    public static function horariosAtencionXDia($dia, $pusuario, $pnombre) {
        
    }
    //POS: retonra los registros correspondientes a las horas registradas para esa fecha
    public static function horasRegistradasXFecha($fecha, $pusuario, $pnombre) {
        
    }
    
    public static function modificarRegistro($pRegistro){
        
    }
    
    public static function insertarHoraRgistrada($pRegistro){
        /*?><script> alert(' <?php 
        $pRegistro->getFecha().' - '.
        $pRegistro->obtenerInicio().' - '.
        $pRegistro->obtenerFin().' - '.
        $pRegistro->getTipo().' - ';
        ?> ');</script> <?php*/
    }
    
    public static function insertarHorarioAtencion($pRegistro){
        
    }
    
   

}
