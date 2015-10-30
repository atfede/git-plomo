<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HorariosBD
 *
 * @author LoLo
 */
class HorariosBD extends CI_Model {

    private static $horarios = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Reservas/Horario');
    }

    public static function getHorarios($numero, $pusuario, $pnombre) {
        $horarios = array();
        if ($pusuario == "0") {
            if ($pnombre == "sala 1") {
                if ($numero == 2) {
                    $a = new Horario("08:00", "12:00");
                    $b = new Horario("16:00", "22:00");
                    array_push($horarios, $a, $b);
                } else if ($numero == 1) { //xx
                    $a = new Horario("08:00", "12:00");
                    $b = new Horario("16:00", "22:00");
                    array_push($horarios, $a, $b);
                } else if ($numero == 5) {
                    $a = new Horario("08:00", "12:00");
                    array_push($horarios, $a);
                } else if ($numero == 7) {
                    $a = new Horario("14:00", "16:00");
                    $b = new Horario("20:00", "23:30");
                    array_push($horarios, $a, $b);
                }
            } else if ($pnombre == "sala 2") {
                if ($numero == 3) {
                    $a = new Horario("08:00", "12:00");
                    $b = new Horario("15:00", "17:00");
                    $c = new Horario("20:00", "22:30");
                    array_push($horarios, $a, $b, $c);
                } else if ($numero == 5) {
                    $a = new Horario("16:00", "02:00");
                    array_push($horarios, $a);
                } else if ($numero == 6) {
                    $a = new Horario("16:00", "02:00");
                    array_push($horarios, $a);
                } else if ($numero == 7) {
                    $a = new Horario("16:30", "23:30");
                    array_push($horarios, $a);
                }
            }
        } else if ($pusuario == "1") {
            if ($pnombre == "estudio") {
                if ($numero == 1) {
                    $a = new Horario("10:00", "15:30");
                    $b = new Horario("16:00", "22:00");
                    array_push($horarios, $a, $b);
                } else if ($numero == 3) {
                    $a = new Horario("09:00", "12:00");
                    $b = new Horario("16:00", "21:00");
                    array_push($horarios, $a, $b);
                } else if ($numero == 4) {
                    $a = new Horario("10:00", "21:30");
                    array_push($horarios, $a);
                } else if ($numero == 5) {
                    $a = new Horario("14:00", "16:00");
                    $b = new Horario("20:00", "23:30");
                    array_push($horarios, $a, $b);
                }
            } else if ($pnombre == "sala") {
                if ($numero == 3) {
                    $a = new Horario("09:00", "12:00");
                    $b = new Horario("15:00", "17:00");
                    $c = new Horario("20:00", "22:30");
                    array_push($horarios, $a, $b, $c);
                } else if ($numero == 4) {
                    $a = new Horario("10:00", "22:00");
                    array_push($horarios, $a);
                } else if ($numero == 5) {
                    $a = new Horario("07:00", "02:00");
                    $b = new Horario("16:00", "24:00");
                    array_push($horarios, $a, $b);
                } else if ($numero == 6) {
                    $a = new Horario("16:30", "00:30");
                    array_push($horarios, $a);
                }
            }
        }       
        
        return $horarios;        
    }

}
