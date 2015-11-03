<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MapaBD
 *
 * @author LoLo
 */
class MapaBD extends CI_Model{//Extends model?
    
    function getServicios(){
        $a = new ServicioTipoM('Sala de ensayo',"/img/sala.png");
        $b = new ServicioTipoM('Estudio de grabación',"/img/estudio.png");
        $c = new ServicioTipoM('Profesor',"/img/icono.png");
        return array($a,$b,$c);
    }
    
    function getMarcadores(){
        $fede = new MarcadorM('Fede',-34.889056,-56.080797,$this->getServicios()[2]->nombre,$this->getServicios()[2]->imagen);
        $altoV = new MarcadorM('Alto Voltaje','-34.899755','-56.133355',$this->getServicios()[0]->nombre,$this->getServicios()[0]->imagen);
        $ort = new MarcadorM('ORT','-34.903699','-56.190897',$this->getServicios()[1]->nombre,$this->getServicios()[1]->imagen);
        $llambi = new MarcadorM('Llambi','-34.902329','-56.151007',$this->getServicios()[0]->nombre,$this->getServicios()[0]->imagen);        
        return array($fede,$altoV,$ort,$llambi);
    }
    
    function __construct() {
        parent::__construct();
        $this->load->model('MarcadorM');
        $this->load->model('ServicioTipoM');
    }

}
