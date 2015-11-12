<?php

class RegistroBD extends CI_Model {

<<<<<<< HEAD
    //POS: retonra los registros correspondientes a las horas registradas para esa fecha
    public static function horasRegistradasXFecha($fecha, $pusuario, $pnombre) {
=======
    public function __construct() {
        $this->load->model('Reservas/Horario');
        $this->load->model('Reservas/Registro');
    }

    //POS: retonra los registros correspondientes a las horas registradas para esa fecha
    public function horasRegistradasXFecha($fecha, $pusuario) {
>>>>>>> 76e4870e7a7f37038bbac562f3f470c171b17bc1
        $registros = array();
        $sql = $this->db->get_where('registro', array('fecha' => $fecha, 'id_usuario' => $pusuario));
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
<<<<<<< HEAD
                
                $horario = new Horario($row['hora_inicio'], $row['hora_fin']);
                $reg = new Registro($row['fecha'], $horario, $row['id_tipo']);
                
                $$registros[] = $reg;
=======

                $horario = new Horario($row->hora_inicio, $row->hora_fin);
                $reg = new Registro($row->fecha, $horario, $row->id_tipo, $pusuario);

                $registros[] = $reg;
>>>>>>> 76e4870e7a7f37038bbac562f3f470c171b17bc1
            }
        }
        return $registros;
    }
<<<<<<< HEAD
        
    //POS: retonra los registros correspondientes a los horarios de atención para ese día
    public static function horariosAtencionXDia($fecha, $pusuario, $pnombre) { //pnombre ??
        $data = array();
        $sql = $this->db->get_where('registro', array('fecha' => $fecha, 'id_usuario' => $pusuario));
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public static function modificarRegistro($pRegistro) {
=======

    //POS: retonra los registros correspondientes a los horarios de atención para ese día
    public function horariosAtencionXDia($dia, $pusuario) {
        $registros = array();
        $sql = $this->db->get_where('horario_atencion', array('dia' => $dia, 'id_usuario' => $pusuario));
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {

                $horario = new Horario($row->hora_inicio, $row->hora_fin);
                $reg = new Registro($row->dia, $horario, 0, $row->id_usuario);

                $registros[] = $reg;
//                $data[] = $row;
            }
        }
        return $registros;
    }

    public function modificarRegistro($pRegistro) {
>>>>>>> 76e4870e7a7f37038bbac562f3f470c171b17bc1
        $this->db->where('id_registro', $pRegistro->id_registro)
                ->update('registro', array(
                    'id_usuario' => $pRegistro->id_usuario, // conseguir id_usuario
                    'fecha' => $pRegistro->fecha,
                    'hora_inicio' => $pRegistro->horario, //sacar parte de fecha-> desde
                    'hora_fin' => $pRegistro->horario, //sacar parte de fecha-> hasta
                    'id_tipo' => $pRegistro->tipo
        ));
    }
<<<<<<< HEAD
    
    public static function insertarHorarioAtencion($pRegistro){
        $this->db->insert('horario_atencion', array(
            'id_usuario' => $pRegistro->getUsuario(), // conseguir id_usuario
            'hora_inicio' => $pRegistro->obtenerInicio(), 
            'hora_fin' => $pRegistro->obtenerFin(), 
            'dia' => $pRegistro->getFecha()
        ));
    } 

    public static function insertarHoraRegistrada($pRegistro) {
        $this->db->insert('registro', array(
            'id_usuario' => $pRegistro->id_usuario, // conseguir id_usuario
            'fecha' => $pRegistro->getFecha(),
            'hora_inicio' => $pRegistro->obtenerInicio(), 
            'hora_fin' => $pRegistro->obtenerFin(), 
=======

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
>>>>>>> 76e4870e7a7f37038bbac562f3f470c171b17bc1
            'id_tipo' => $pRegistro->getTipo()
        ));
    }

<<<<<<< HEAD
    
    // Es la misma función que la primera???
    
    //POS: Retorna unicamente los horarios de los registros para esa fecha
    public static function obtenerHorariosXFecha($fecha, $pusuario, $pnombre) {
=======
    //POS: Retorna unicamente los horarios de los registros para esa fecha
    public function obtenerHorariosXFecha($fecha, $pusuario, $pnombre) {
>>>>>>> 76e4870e7a7f37038bbac562f3f470c171b17bc1
        $registros = array();
        $sql = $this->db->get_where('registro', array('fecha' => $fecha, 'id_usuario' => $pusuario));
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
<<<<<<< HEAD
                $horario = new Horario($row['hora_inicio'], $row['hora_fin']);
                $reg = new Registro($row['fecha'], $horario, $row['id_tipo']);
                
                $$registros[] = $reg;
            }
        }
        return $data;
    }
    
=======
                $horario = new Horario($row->hora_inicio, $row->hora_fin);
                $reg = new Registro($row->fecha, $horario, $row->id_tipo);

                $registros[] = $reg;
            }
        }
        return $registros;
    }

>>>>>>> 76e4870e7a7f37038bbac562f3f470c171b17bc1
}
