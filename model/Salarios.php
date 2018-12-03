<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Salarios
 *
* @author Mateo Salcedo
 */
class Salarios {
    //put your code here
    private $oficio;
    private $salario;
    
    
    function __construct($oficio, $salario) {
        $this->oficio = $oficio;
        $this->salario = $salario;
    }

    
    
    function getOficio() {
        return $this->oficio;
    }

    function getSalario() {
        return $this->salario;
    }

    function setOficio($oficio) {
        $this->oficio = $oficio;
    }

    function setSalario($salario) {
        $this->salario = $salario;
    }


    
    
    
}
