<!DOCTYPE html>
<?php
require_once '../model/Contrato.php';
require_once '../model/Salarios.php';
require_once '../model/Obreros.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CONTRATO</title>
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
                <h3>PRODUCTOS</h3>

            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Inicio</a>
            </div>
            <p>
            
           
        </p>
         <div class="panel panel-primary">
                    <div    class=" panel-heading"><b>INVENTARIO</b></div>
                    <div class=" panel-body">
        <table data-toggle="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Operacion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //verificamos si existe en sesion el listado de clientes:
                if (isset($_SESSION['listaObreros'])) {
                    $listado1 = unserialize($_SESSION['listaObreros']);
                      if (isset($_SESSION['listaContrato'])) {
                    $listado = unserialize($_SESSION['listaContrato']);
                    
                    foreach ($listado1 as $facturaDet1) {
                    foreach ($listado as $facturaDet) {
                        if ($facturaDet1->getCodigo()==$facturaDet->getCodigo_contrato()) {
                        echo "<tr>";
                        echo "<td>" . $facturaDet1->getDescripcion() . "</td>";
                        echo "<td>" . $facturaDet1->getCantidad() . "</td>";
                        echo "<td>" . $facturaDet1->getPrecio() . "</td>";
                        echo "<td><a href='../controller/controller.php?opcion=eliminar_contrato&codigo_contrato=" . $facturaDet->getCodigo() . "'>ELIMINAR</a></td>";
                        echo "</tr>";
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
