<?php

class Servicio extends CI_Model {

    public function get_servicios() {
        $data = array();

        $sql = $this->db->get('servicios');
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function get_map_con_filtros($tipo) {
        $data = array();
        ?><!--<script>alert('<?php // echo $tipo;  ?>');</script>-->
        <?php
        if ($tipo == "todos") {
            $sql = $this->db->get('servicios');
        }

        $sql = $this->db->get_where('servicios', array('tipo' => $tipo));

        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function get_servicios_palabras($str) {
        $data = array();

        $sql = $this->db->get('servicios');

        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $row) {

                if (strpos($row->descripcion, $str) !== false) {
                    ?><script>alert('<?php echo $row->descripcion; ?>');</script><?php
                    
                    $data[] = $row;
                }
            }
        }
        return $data;
    }

}
