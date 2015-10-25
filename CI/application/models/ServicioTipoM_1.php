<?php

class ServicioTipoM extends CI_Model{
    
        public $nombre;
	public $imagen;
	        
        function __construct($pnombre="",$pimagen="")
	{
            parent::__construct();
            $this->nombre = $pnombre;
            $this->imagen = $pimagen;            
        } 
        
        public static function tipos($pindex){
            return self::$tipos[$pindex];
        }
        
}
            