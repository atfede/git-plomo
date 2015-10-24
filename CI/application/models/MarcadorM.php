<?php

class MarcadorM extends CI_Model{
    
        var $nombre;
	var $x;
	var $y;
        var $tipo;        
        
        function __construct($pnombre="",$px="",$py="",$ptipo="")
	{
            parent::__construct();
            $this->nombre = $pnombre;
            $this->x = $px;
            $this->y = $py;
            $this->tipo = $ptipo;
        } 
        
        /*
        public static function tipos($pindex){
            return self::$tipos[$pindex];
        }*/
        
}
            
      



