<?php

///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas.
///////////////////////////////////////////////////////////////////////
/**
 * Description of construcciones
 *
* @author Mateo Salcedo
 */

require_once '../model/ContratoModel.php';
session_start();
$crudModel = new ContratoModel();
$opcion = $_REQUEST['opcion'];
$mensajeError = "";
unset($_SESSION['mensajeError']);
switch ($opcion) {
    case "listar_contratos":
        $listaContrato = $crudModel->getContratos();
        $_SESSION['listaContrato'] = serialize($listaContrato);
        $listaSalarios = $crudModel->getSalarios();
        $_SESSION['listaSalarios'] = serialize($listaSalarios);
         $listaObreros = $crudModel->getObreros();
        $_SESSION['listaObreros'] = serialize($listaObreros);
        header('Location: ../view/listacontratos.php');
        break;
    case "listar_salarios":
        $listaSalarios = $crudModel->getSalarios();
        $_SESSION['listaSalarios'] = serialize($listaSalarios);
        header('Location: ../view/salarios.php');
        break;
    case "listar_trabajo":
        $listaConstrucciones = $crudModel->getConstrucciones();
        $_SESSION['listaConstrucciones'] = serialize($listaConstrucciones);
         $listaObreros = $crudModel->getObreros();
        $_SESSION['listaObreros'] = serialize($listaObreros);
        $listaTrabajos = $crudModel->getTrabajo();
        $_SESSION['listaTrabajo'] = serialize($listaTrabajos);
        header('Location: ../view/trabajo.php');
        break;
    case "listar_construcciones":
        $listaConstrucciones = $crudModel->getConstrucciones();
        $_SESSION['listaConstrucciones'] = serialize($listaConstrucciones);
        header('Location: ../view/construcciones.php');
        break;
    case "listar_obreros":
        $listaObreros = $crudModel->getObreros();
        $_SESSION['listaObreros'] = serialize($listaObreros);
        $listaContrato = $crudModel->getContratos();
        $_SESSION['listaContrato'] = serialize($listaContrato);
        header('Location: ../view/obreros.php');
        break;
    case "crear_contratos":
        $inicio_contrato = $_REQUEST['inicio_contrato'];
        $fin_contrato = $_REQUEST['fin_contrato'];
        $oficio = $_REQUEST['oficio'];
        $codigo_contrato = $_REQUEST['codigo_contrato'];
        $crudModel->insertarContrato($inicio_contrato, $fin_contrato, $oficio, $codigo_contrato);
        $listaContrato = $crudModel->getContratos();
        $_SESSION['listaContrato'] = serialize($listaContrato);
        header('Location: ../view/index.php');
         $cedula = unserialize($_SESSION['cedula']);
        $crudModel->ObreroContrato($cedula, $codigo_contrato);
        break;
        break;
    case "crear_salario":
        $oficio = $_REQUEST['oficio'];
        $salario = $_REQUEST['salario'];
        $crudModel->insertarSalario($oficio, $salario);
        $listaSalarios = $crudModel->getSalarios();
        $_SESSION['listaSalarios'] = serialize($listaSalarios);
        header('Location: ../view/salarios.php');
        break;
    case "crear_construccion":
        $cod_edificio = $_REQUEST['cod_edificio'];
        $nombre_construccion = $_REQUEST['nombre_construccion'];
        $direccion = $_REQUEST['direccion'];
        $fecha_inicio = $_REQUEST['fecha_inicio'];
        $fecha_entrega = $_REQUEST['fecha_entrega'];
        $crudModel->insertarConstruccion($cod_edificio, $nombre_construccion, $direccion, $fecha_inicio, $fecha_entrega);
        $listaConstrucciones = $crudModel->getConstrucciones();
        $_SESSION['listaConstrucciones'] = serialize($listaConstrucciones);
        header('Location: ../view/construcciones.php');
        break;
    case "crear_obrero":
        $cedula = $_REQUEST['cedula'];
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $direccion = $_REQUEST['direccion'];
        $nhijos = $_REQUEST['hijos'];
        $cod_contrato = $_REQUEST['cod_contrato'];
        $crudModel->insertarObrero($cedula, $nombre, $apellido, $direccion, $nhijos, $cod_contrato);
        $listaObreros = $crudModel->getObreros();
        $_SESSION['listaObreros'] = serialize($listaObreros);
        header('Location: ../view/obreros.php');
        break;
    case "crear_trabajo":
        $cod_obrero = $_REQUEST['cedula'];
        $cod_edificio = $_REQUEST['cod_edificio'];
        $crudModel->insertarTrabajo($cod_obrero, $cod_edificio);
        $listaTrabajos = $crudModel->getTrabajo();
        $_SESSION['listaTrabajo'] = serialize($listaTrabajos);
        
        header('Location: ../view/trabajo.php');
        break;
    case "cargar_construccion":
        $cod_edificio = $_REQUEST['cod_edificio'];
        $edificio = $crudModel->getConstruccion($cod_edificio);
        $_SESSION['edificio'] = $edificio;
        
        
        header('Location: ../view/editar/construcciones.php');
        break;
    case "cargar_obrero":
        $cedula = $_REQUEST['cedula'];
        $cod_contrato=$_REQUEST['cod_contrato'];
        $obrero = $crudModel->getObrero($cedula);
        $_SESSION['obrero'] = $obrero;
        
        $contrato = $crudModel->getContrato($cod_contrato);
        $_SESSION['contrato'] =  $contrato;
        header('Location: ../view/editar/obreros.php');
        break;
     
    case "modificar_contrato":
        $inicio_contrato = $_REQUEST['inicio_contrato'];
        $fin_contrato = $_REQUEST['fin_contrato'];
        $oficio = $_REQUEST['oficio'];
        $codigo_contrato = $_REQUEST['codigo_contrato'];
        $ms = $crudModel->actualizarContrato($inicio_contrato, $fin_contrato, $oficio, $codigo_contrato);
        $_SESSION['ms'] = $ms;
        $listaContrato = $crudModel->getContratos();
        $listaConstrucciones = $crudModel->getConstrucciones();
     //   header('Location: ../view/index.php');
        break;

    case "modificar_construccion":
        $cod_edificio = $_REQUEST['cod_edificio'];
        $nombre_construccion = $_REQUEST['nombre_construccion'];
        $direccion = $_REQUEST['direccion'];
        $fecha_inicio = $_REQUEST['fecha_inicio'];
        $fecha_entrega = $_REQUEST['fecha_entrega'];
        $ms = $crudModel->actualizarConstruccion($cod_edificio, $nombre_construccion, $direccion, $fecha_inicio, $fecha_entrega);
        $_SESSION['ms'] = $ms;
        $listaConstrucciones = $crudModel->getConstrucciones();
        header('Location: ../view/index.php');
        break;

    case "modificar_obrero":

        $cedula = $_REQUEST['cedula'];
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $direccion = $_REQUEST['direccion'];
        $nhijos = $_REQUEST['hijos'];
        $cod_contrato = $_REQUEST['cod_contrato'];
        $crudModel->actualizarObrero($cedula, $nombre, $apellido, $direccion, $nhijos);
        $listaObreros = $crudModel->getObreros();
        $_SESSION['listaObreros'] = serialize($listaObreros);
        header('Location: ../view/obreros.php');
        break;

    case "eliminar_construccion":
        $cod_edificio = $_REQUEST['cod_edificio'];
        $crudModel->eliminarConstruccion($cod_edificio);
        $listaConstrucciones = $crudModel->getConstrucciones();
        $_SESSION['listaConstrucciones'] = serialize($listaConstrucciones);
        header('Location: ../view/construcciones.php');
        break;

    case "eliminar_contrato":
        $codigo_contrato = $_REQUEST['codigo_contrato'];
        $crudModel->eliminarContrato($codigo_contrato);
        $listaContrato = $crudModel->getContratos();
        $_SESSION['listaContrato'] = serialize($listaContrato);

        header('Location: ../view/listacontratos.php');
        break;
    case "eliminar_obrero":
        $cedula = $_REQUEST['cedula'];
        $crudModel->eliminarObrero($cedula);
        $listaObreros = $crudModel->getObreros();
        $_SESSION['listaObreros'] = serialize($listaObreros);
        header('Location: ../view/obreros.php');
        break;

    case "eliminar_oficio":
        $salario = $_REQUEST['oficio'];
        $crudModel->eliminarSalario($salario);
       $listaSalarios = $crudModel->getSalarios();
        $_SESSION['listaSalarios'] = serialize($listaSalarios);
        header('Location: ../view/salario.php');
        break;
    
    case "redireccionar":
        $cedula=$_REQUEST['cedula'];
        $_SESSION['cedula'] = serialize($cedula);
        header('Location: ../view/contratos.php');
        break;
    case "asignar":
        $cod_contrato=$_REQUEST['contrato'];
        if (isset($_SESSION['cedula'])) {
         $cedula = unserialize($_SESSION['cedula']);
        }
        $crudModel->ObreroContrato($cedula, $cod_contrato);
        break;
    
    default:
        header('Location: ../view/index.php');
}

