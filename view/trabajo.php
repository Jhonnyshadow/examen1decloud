<!DOCTYPE html>
<?php
require_once '../model/Trabajo.php';
require_once '../model/Obreros.php';
require_once '../model/construcciones.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TRABAJO</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="images/banner_contacto.jpg">
            <div class="row">
                <h3>TRABAJO</h3>

            </div>
            <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
            </div>
            <p>
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="crear_trabajo">
                <div class="panel panel-primary">
                    <div    class=" panel-heading"><b>INGRESO DATOS CONSTRUCCION</b></div>
                    <div class=" panel-body">
                        CEDULA:
                        <select name="cedula">

                            <?php
                            if (isset($_SESSION['listaObreros'])) {
                                $listado11 = unserialize($_SESSION['listaObreros']);

                                foreach ($listado11 as $contrato) {

                                    echo "<option value=" . $contrato->getCedula() . ">" . $contrato->getCedula() . "</option>";
                                }
                            }
                            ?>
                        </select>
                        CONSTRUCCION:
                        <select name="cod_edificio">

                            <?php
                            if (isset($_SESSION['listaConstrucciones'])) {
                                $listado1 = unserialize($_SESSION['listaConstrucciones']);

                                foreach ($listado1 as $contrato) {

                                    echo "<option value=" . $contrato->getCod_edificio() . ">" . $contrato->getCod_edificio() . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <input type="submit" value="Asignar">
                    </div>
                </div>
            </form>
        </p>
        <div class="panel panel-primary">
            <div    class=" panel-heading"><b>INGRESO DATOS CONSTRUCCION</b></div>
            <div class=" panel-body">
                <table data-toggle="table">
                    <thead>
                        <tr>
                            <th>CEDULA</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>NOMBRE CONSTRUCCION</th>
                            <th>UBICACION CONSTRUCCION</th>
                            <th>FECHA INICIO</th>
                            <th>FECHA ENTREGA</th>

                        </tr>
                    </thead>
                    <tbody>
<?php
//verificamos si existe en sesion el listado de clientes:
if (isset($_SESSION['listaObreros'])) {
    $listado1 = unserialize($_SESSION['listaObreros']);
    if (isset($_SESSION['listaTrabajo'])) {
        $listado = unserialize($_SESSION['listaTrabajo']);
        if (isset($_SESSION['listaConstrucciones'])) {
            $listado2 = unserialize($_SESSION['listaConstrucciones']);
            foreach ($listado1 as $facturaDet1) {
                foreach ($listado2 as $facturaDet2) {
                    foreach ($listado as $facturaDet) {
                        if ($facturaDet1->getCedula() == $facturaDet->getCod_obrero() && $facturaDet2->getCod_edificio() == $facturaDet->getCod_edificio()) {
                            echo "<tr>";
                            echo "<td>" . $facturaDet1->getCedula() . "</td>";
                            echo "<td>" . $facturaDet1->getNombre() . "</td>";
                            echo "<td>" . $facturaDet1->getApellido() . "</td>";
                            echo "<td>" . $facturaDet2->getNombre_construccion() . "</td>";
                            echo "<td>" . $facturaDet2->getDireccion() . "</td>";
                            echo "<td>" . $facturaDet2->getFecha_inicio() . "</td>";
                            echo "<td>" . $facturaDet2->getFecha_entrega() . "</td>";

                            echo "</tr>";
                        }
                    }
                }
            }
        }
    }
} else {
    echo "No se han cargado datos.";
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
