<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SSMapa
 *
 * @author LoLo
 */
class SSMapa extends CI_Model {

    private static $instancia;
    private $marcadores;

    public function __construct() {
        parent::__construct();
        $this->load->model('MapaBD');
        $this->load->model('MarcadorM');
        get_instance()->load->iface('IMarcador');
        $mapaBD = new MapaBD();
        //$marcadores = $this->get_instance();
        $this->marcadores = $mapaBD->getMarcadores();
    }

    public static function getInstancia() {
        if (!self::$instancia instanceof self) {
            self::$instancia = new self;
        }
        return self::$instancia;
    }

    public function getMarcadores() {
        return $this->marcadores;
    }

    public function Filtrar($marcador, $tipo, $nombre) {
        $visible = ($marcador->getTipo() == $tipo || $tipo == "todos" || $tipo == "");
        $marcador->setVisible($visible);
        if ($marcador->isVisible()) {
            return $this->FiltrarNombre($marcador, $nombre);
        } else {
            return false;
        }        
    }

    public function FiltrarNombre($marcador, $nombre) {
        return ($marcador->getNombre() == $nombre || $nombre == '');
    }

}
