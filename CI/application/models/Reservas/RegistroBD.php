<?php

class RegistroBD extends CI_Model {

    //POS: retonra los registros correspondientes a las horas registradas para esa fecha
    public function horasRegistradasXFecha($fecha, $pusuario, $pnombre) {
        $registros = array();
        $sql = $this->db->get_where('registro', array('fecha' => $fecha, 'id_usuario' => $pusuario));
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {

                $horario = new Horario($row->hora_inicio, $row->hora_fin);
                $reg = new Registro($row->fecha, $horario, $row->id_tipo);

                $registros[] = $reg;
            }
        }
        return $registros;
    }

    //POS: retonra los registros correspondientes a los horarios de atención para ese día
    public function horariosAtencionXDia($fecha, $pusuario, $pnombre) { //pnombre ??
        $data = array();
        $sql = $this->db->get_where('registro', array('fecha' => $fecha, 'id_usuario' => $pusuario));
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function modificarRegistro($pRegistro) {
        $this->db->where('id_registro', $pRegistro->id_registro)
                ->update('registro', array(
                    'id_usuario' => $pRegistro->id_usuario, // conseguir id_usuario
                    'fecha' => $pRegistro->fecha,
                    'hora_inicio' => $pRegistro->horario, //sacar parte de fecha-> desde
                    'hora_fin' => $pRegistro->horario, //sacar parte de fecha-> hasta
                    'id_tipo' => $pRegistro->tipo
        ));
    }

    // horario_atencion
    public function insertarHorarioAtencion($pRegistro) {
        $this->db->insert('horario_atencion', array(
            'id_usuario' => $pRegistro->getUsuario(), // conseguir id_usuario
            'hora_inicio' => $pRegistro->obtenerInicio(),
            'hora_fin' => $pRegistro->obtenerFin(),
            'hora_inicio' => $pRegistro->obtenerInicio(),
            'hora_fin' => $pRegistro->obtenerFin(),
            'dia' => $pRegistro->getFecha()
        ));
    }

    public function insertarHoraRegistrada($pRegistro) {
        $this->db->insert('registro', array(
            'id_usuario' => $pRegistro->id_usuario, // conseguir id_usuario
            'fecha' => $pRegistro->getFecha(),
            'hora_inicio' => $pRegistro->obtenerInicio(),
            'hora_fin' => $pRegistro->obtenerFin(),
            'id_tipo' => $pRegistro->getTipo()
        ));
    }

    //POS: Retorna unicamente los horarios de los registros para esa fecha
    public function obtenerHorariosXFecha($fecha, $pusuario, $pnombre) {
        $registros = array();
        $sql = $this->db->get_where('registro', array('fecha' => $fecha, 'id_usuario' => $pusuario));
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $horario = new Horario($row->hora_inicio, $row->hora_fin);
                $reg = new Registro($row->fecha, $horario, $row->id_tipo);

                $registros[] = $reg;
            }
        }
        return $registros;
    }


}
