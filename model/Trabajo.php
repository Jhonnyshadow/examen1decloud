<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Trabajo
 *
 * @author T30
 */
class Trabajo {
    
    private $cod_obrero;
    private $cod_edificio;
     
    function __construct($cod_obrero, $cod_edificio) {
        $this->cod_obrero = $cod_obrero;
        $this->cod_edificio = $cod_edificio;
    }

    
    function getCod_obrero() {
        return $this->cod_obrero;
    }

    function getCod_edificio() {
        return $this->cod_edificio;
    }

    function setCod_obrero($cod_obrero) {
        $this->cod_obrero = $cod_obrero;
    }

    function setCod_edificio($cod_edificio) {
        $this->cod_edificio = $cod_edificio;
    }


    
}
