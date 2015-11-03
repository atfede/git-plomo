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

    public function obtenerHorario($pusuario, $pnombre, $fecha) {
        $ret = RegistroBD::horasRegistradasXFecha($fecha, $pusuario, $pnombre);
        //¿Retorna null si la consuta es vacia?
        if ($ret == null) {
            $dia = date('N', strtotime($fecha));
            $ret = HorariosBD::horariosAtencionXDia($dia, $pusuario, $pnombre);
        }
        return $ret;
    }

    public function ingresarRegistro($pregistro, $pusuario, $pnombre) {
        $ret = false;
        $registros = RegistroBD::obtenerXFecha($pregistro->getFecha(), $pusuario, $pnombre);
        if ($registros != null) {
            for ($i = 0; $i < count($registros) && !$ret; $i++) {
                $r = $registros[i];
                if ($r->getTipo() == 0 && $r->getHorario()->estaEnHorario($pregistro->getHorario())) {
                    actualizarRegistrosXIngreso($r, $pregistro);
                    $ret = true;
                }
            }
        } else {
            $dia = date('N', strtotime($pregistro->getFecha()));
            $horarios = HorariosBD::getHorarios($dia, $pusuario, $pnombre);
            $nuevosRegistros = array();
            for ($i = 0; $i < count($horarios) && !$ret; $i++) {
                $h = $horarios[$i];
                $r = new Registro($pregistro->getFecha(), $h, 0);
                if ($h->estaEnHorario($pregistro->getHorario())) {
                    actualizarRegistrosXIngreso($r, $pregistro);
                    $ret = true;
                } else {
                    array_push($nuevosRegistros, $r);
                }
            }
            if ($ret) {
                foreach ($nuevosRegistros as $nuevo) {
                    RegistroBD::insertarRgistro($nuevo);
                }
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

    public function ingresarHorarioAtencion($pregistro, $pusuario, $pnombre) {
        $ret = true;
        $dia = $pregistro->getFecha();
        $HorariosAtencion = RegistroBD::horariosAtencionXDia($dia, $pusuario, $pnombre);

        for ($i = 0; $i < count($HorariosAtencion) && $ret; $i++) {
            $h = $HorariosAtencion[$i];
            if ($h->getHorario()->horaEnHorario($pregistro->obtenerInicio()) ||
                    $h->getHorario()->horaEnHorario($pregistro->obtenerFin())) {
                $ret = false;
            }
        }
        if ($ret) {
            RegistroBD::insertarHorarioAtencion($pregistro);
        }
        return $ret;
    }

}
