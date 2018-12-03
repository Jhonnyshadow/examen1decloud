<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of construcciones
 *
* @author Mateo Salcedo
 */
class construcciones {
    
    private $cod_edificio;
    private $nombre_construccion;
    private $direccion;
    private $fecha_inicio;
    private $fecha_entrega;
    
    
    
    function __construct($cod_edificio, $nombre_construccion, $direccion, $fecha_inicio, $fecha_entrega) {
        $this->cod_edificio = $cod_edificio;
        $this->nombre_construccion = $nombre_construccion;
        $this->direccion = $direccion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_entrega = $fecha_entrega;
    }

    
    function getCod_edificio() {
        return $this->cod_edificio;
    }

    function getNombre_construccion() {
        return $this->nombre_construccion;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getFecha_inicio() {
        return $this->fecha_inicio;
    }

    function getFecha_entrega() {
        return $this->fecha_entrega;
    }

    function setCod_edificio($cod_edificio) {
        $this->cod_edificio = $cod_edificio;
    }

    function setNombre_construccion($nombre_construccion) {
        $this->nombre_construccion = $nombre_construccion;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setFecha_inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    function setFecha_entrega($fecha_entrega) {
        $this->fecha_entrega = $fecha_entrega;
    }


    
}
