<!DOCTYPE html>
<?php
require_once '../model/Obreros.php';
require_once '../model/Contrato.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OBREROS</title>
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
                <h3>OBREROS</h3>

            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Inicio</a>
            </div>
            <p>
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="crear_obrero">
                 <div class="panel panel-primary">
                    <div    class=" panel-heading"><b>INGRESO DATOS CONSTRUCCION</b></div>
                    <div class=" panel-body">
                <table>
                <tr><td> CEDULA:</td><td><input type="text" name="cedula" required="true" autocomplete="off" required="" value=""></td></tr>
                 <tr><td>NOMBRE:</td><td><input type="text" name="nombre" required="true" autocomplete="off" required="" value=""></td></tr>
                 <tr><td>APELLIDO:</td><td><input type="text" name="apellido" required="true" autocomplete="off" required="" value=""></td></tr>
                 <tr><td>DIRECCION:</td><td><input type="text" name="direccion" required="true" autocomplete="off" required="" value=""></td></tr>
                 <tr><td>HIJOS:</td><td><input type="text" name="hijos" required="true" autocomplete="off" required="" value=""></td></tr>
                </table>

                <input type="submit" value="Crear">
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
                    <th>DIRECCION</th>
                    <th>HIJOS</th>
                    <th>CONTRATO</th>
                    <th>OPCIONES</th>

                </tr>
            </thead>
            <tbody>
                <?php
                //verificamos si existe en sesion el listado de clientes:
                if (isset($_SESSION['listaObreros'])) {
                    $listado = unserialize($_SESSION['listaObreros']);
                    foreach ($listado as $facturaDet) {
                        echo "<tr>";
                        echo "<td>" . $facturaDet->getCedula() . "</td>";
                        echo "<td>" . $facturaDet->getNombre() . "</td>";
                        echo "<td>" . $facturaDet->getApellido() . "</td>";
                        echo "<td>" . $facturaDet->getDireccion() . "</td>";
                        echo "<td>" . $facturaDet->getNhijos() . "</td>";
                        if ($facturaDet->getCod_contrato() == "") {
                            
                           echo "<td><a href='../controller/controller.php?opcion=redireccionar&cedula=" . $facturaDet->getCedula() . "'>CREAR CONTRATO</a></td>";
                        } else {
                            echo "<td>" . $facturaDet->getCod_contrato() . "</td>";
                        }

                        echo "<td><a href='../controller/controller.php?opcion=cargar_obrero&cedula=" . $facturaDet->getCedula() ."&cod_contrato=".$facturaDet->getCod_contrato(). "'>EDITAR</a></td>";
                        echo "<td><a href='../controller/controller.php?opcion=eliminar_obrero&cedula=" . $facturaDet->getCedula() . "'>ELIMINAR</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No se han cargado datos.";
                }
                ?>
            </tbody>
        </table>
                    </div></div>
    </div>
</body>

</html>
