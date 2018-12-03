<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contrato
 *
 * @author T30
 */
class Contrato {
    //put your code here
     private $inicio_contrato;
     private $fin_contrato;
     private $oficio;
     private $codigo_contrato;
     

     function __construct($inicio_contrato, $fin_contrato, $oficio, $codigo_contrato) {
         $this->inicio_contrato = $inicio_contrato;
         $this->fin_contrato = $fin_contrato;
         $this->oficio = $oficio;
         $this->codigo_contrato = $codigo_contrato;
     }

     
     function getInicio_contrato() {
         return $this->inicio_contrato;
     }

     function getFin_contrato() {
         return $this->fin_contrato;
     }

     function getOficio() {
         return $this->oficio;
     }

     function getCodigo_contrato() {
         return $this->codigo_contrato;
     }

     function setInicio_contrato($inicio_contrato) {
         $this->inicio_contrato = $inicio_contrato;
     }

     function setFin_contrato($fin_contrato) {
         $this->fin_contrato = $fin_contrato;
     }

     function setOficio($oficio) {
         $this->oficio = $oficio;
     }

     function setCodigo_contrato($codigo_contrato) {
         $this->codigo_contrato = $codigo_contrato;
     }


     
     
    
    
    
    
}
