<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of My_Loader
 *
 * @author LoLo
 */
class MY_Loader extends CI_Loader {

    public function __construct() {
        parent::__construct();
    }

    public function iface($strInterfaceName) {
        require_once APPPATH . '/interfaces/' . $strInterfaceName . '.php';
    }

}
