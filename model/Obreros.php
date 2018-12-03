<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Obreros
 *
 * @author T30
 */
class Obreros {
   
    private $cedula;
    private $nombre;
    private $apellido;
    private $direccion;
    private $nhijos;
    private $cod_contrato;
   
    
    function __construct($cedula, $nombre, $apellido, $direccion, $nhijos, $cod_contrato) {
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->nhijos = $nhijos;
        $this->cod_contrato = $cod_contrato;
    }

    
    
    function getCedula() {
        return $this->cedula;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getNhijos() {
        return $this->nhijos;
    }

    function getCod_contrato() {
        return $this->cod_contrato;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setNhijos($nhijos) {
        $this->nhijos = $nhijos;
    }

    function setCod_contrato($cod_contrato) {
        $this->cod_contrato = $cod_contrato;
    }


    
    
    
    
}
