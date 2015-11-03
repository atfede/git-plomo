<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author LoLo
 */
interface IMarcador{
    
    public function getX();
    public function getY();
    public function getNombre();
    public function getTipo();
    public function getImagen();
    public function isVisible();
    public function setVisible($visible);
    
}
