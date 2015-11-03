<?php

class RegistroBD extends CI_Model {

    public static function horariosAtencionXDia($fecha, $pusuario, $pnombre) { //pnombre ??
        $data = array();
        $sql = $this->db->get_where('registros', array('fecha' => $fecha, 'id_usuario' => $pusuario));
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public static function modificarRegistro($pRegistro) {
        $this->db->where('id_registro', $pRegistro->id_registro)
                ->update('registro', array(
                    'id_usuario' => $pRegistro->id_usuario, // conseguir id_usuario
                    'fecha' => $pRegistro->fecha,
                    'hora_inicio' => $pRegistro->horario, //sacar parte de fecha-> desde
                    'hora_fin' => $pRegistro->horario, //sacar parte de fecha-> hasta
                    'id_tipo' => $pRegistro->tipo,
        ));
    }

    public static function insertarHoraRegistrada($pRegistro) {
        $this->db->insert('registro', array(
            'id_usuario' => $pRegistro->id_usuario, // conseguir id_usuario
            'fecha' => $pRegistro->fecha,
            'hora_inicio' => $pRegistro->horario, //sacar parte -> desde
            'hora_fin' => $pRegistro->horario, //sacar parte-> hasta
            'id_tipo' => $pRegistro->tipo,
        ));
    }

    //POS: Retorna unicamente los horarios de los registros para esa fecha
    public static function obtenerHorariosXFecha($fecha, $pusuario, $pnombre) {
        $data = array();
        $sql = $this->db->get_where('registros', array('fecha' => $fecha, 'id_usuario' => $pusuario));
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

}
