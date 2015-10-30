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
    private $dias = array(); //no tiene sentido 

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

    public function obtenerHorario($pusuario, $pnombre, $dia) {
        return HorariosBD::getHorarios($dia, $pusuario, $pnombre);
    }

    public function agregarHorario($pDia, $pIni, $pFin, $pusuario, $pnombre) {
        if ($this->dias($pDia) == null) {//no tiene sentido??
            //$this->dias($pDia) = new Dia();
        }
        $this->dias($pDia)->agregarHorario($pIni, $pFin, $pusuario, $pnombre);
    }

    public function displayHorarios() {
        $disponible; //Disponibles y reservas(ordenados)
        $retorno = array();

        for ($i = 0; $i < count($disponible); $i++) {
            $h = new Horario;
        }
    }

    public function ingresarRegistro($pregistro, $pusuario, $pnombre) {
        $ret = false;
        $registros = RegistroBD::obtenerXFecha($pregistro->getFecha(), $pusuario, $pnombre);
        for ($i = 0; $i < count($registros) && !$ret; $i++) {
            $r = $registros[i];
            if ($r->getTipo() == 0 && $r->estaEnHorario($pregistro->getHorario())) {
                actualizarRegistrosXIngreso($r,$pregistro);
                $ret = true;
            }
        }
        return $ret;
    }

    private function actualizarRegistrosXIngreso($r, $nuevo) {
        if ($r->esIgual($nuevo)) {
            $r->setTipo($nuevo->getTipo());
        } else {
            if ($r->obtenerInicio() == $nuevo->obtenerInicio()) {
                $r->cambiarInicio($nuevo->obtenerFin());
            } else if ($r->obtenerFin() == $nuevo->obtenerFin()) {
                $r->cambiarFin($nuevo->obtenerInicio());
            } else {
                $horario = new Horario($nuevo->obtenerFin(), $r->obtenerFin());
                $nuevo2 = new Registro($r->getFecha(), $horario, 0);
                $r->cambiarFin($nuevo->obtenerInicio());
                RegistroBD::insertarRgistro($nuevo2);                
            }
            RegistroBD::insertarRgistro($nuevo);
        }
        RegistroBD::modificarRegistro($r);
    }

}
