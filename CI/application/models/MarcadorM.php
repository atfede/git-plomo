<?php
get_instance()->load->iface('IMarcador');
class MarcadorM extends CI_Model implements IMarcador{
    
        var $nombre;
	var $x;
	var $y;
        var $tipo;   
        var $visible = true;        
        var $imagen;
        
        function __construct($pnombre="",$px="",$py="",$ptipo="",$pimagen="")
	{
            parent::__construct();            
            $this->nombre = $pnombre;
            $this->x = $px;
            $this->y = $py;
            $this->tipo = $ptipo;
            $this->imagen = $pimagen;            
        } 
        function getNombre() {
            return $this->nombre;
        }

        function getX() {
            return $this->x;
        }

        function getY() {
            return $this->y;
        }

        function getTipo() {
            return $this->tipo;
        }

        function isVisible() {
            return $this->visible;
        }
        
        function getImagen() {
            return $this->imagen;
        }
        function setVisible($visible) {
            $this->visible = $visible;
        }     
        
}
            
      



