<?php

class UsuarioEdicion extends CI_Model {
    
    public function index() {
        echo 'echo del index!';
    }

    public function guardar_ubicacion() {

        echo 'echo del guardar_ubicacion';
        
//        $data = array(
//            'title' => $title,
//            'name' => $name,
//            'date' => $date
//        );
//
//        $this->db->where('id', $id);
//        $this->db->update('usuarios', $data);

// Produces:
// UPDATE mytable 
// SET title = '{$title}', name = '{$name}', date = '{$date}'
// WHERE id = $id
    }

}
