<!DOCTYPE html>
<?php
require_once '../model/construcciones.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CONSTRUCCIONES</title>
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
                <h3>CONSTRUCCIONES</h3>

            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Inicio</a>
            </div>
            <p>
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="crear_construccion">
                <div class="panel panel-primary">
                    <div    class=" panel-heading"><b>INGRESO DATOS CONSTRUCCION</b></div>
                    <div class=" panel-body">
                        <table>
                            <tr><td>CODIGO CONSTRUCCION:</td><td><input type="text" name="cod_edificio" maxlength="50" required="true"></td></tr>
                            <tr><td> NOMBRE CONSTRUCCION:</td><td><input type="text" name="nombre_construccion" maxlength="50" required="true"></td></tr>
                            <tr><td>DIRECCION :</td><td><input type="text" name="direccion" maxlength="50" required="true"></td></tr>
                            <tr><td>INICIO CONSTRUCCION:</td><td><input type="date" name="fecha_inicio" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>"></td></tr>
                 <tr><td>ENTREGA COSNTRUCCION:</td><td><input type="date" name="fecha_entrega" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>"></td></tr>
                            <tr><td> <input type="submit" value="crear"></td></tr>
                        </table>
                    </div>
                </div>
            </form>
        </p>
        <div class="panel panel-info">
            <div    class=" panel-heading"><b>LISTA CONSTRUCCIONES</b></div>
            <div class=" panel-body">
                <table data-toggle="table">

                    <thead>
                        <tr>
                            <th><center>CODIGO_CONSTRUCCION</center></th>
                    <th><center>NOMBRE_CONSTRUCCION</center></th>
                    <th><center>DIRECCION</center></th>
                    <th><center>INICIO CONSTRUCCION</center></th>
                    <th><center>ENTREGA CONSTRUCCION</center></th>
                    <th><center>OPCIONES</center></th>
                    <th><center>OPCIONES</center></th>


                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        //verificamos si existe en sesion el listado de clientes:
                        if (isset($_SESSION['listaConstrucciones'])) {
                            $listado = unserialize($_SESSION['listaConstrucciones']);

                            foreach ($listado as $facturaDet) {
                                echo "<tr>";
                                echo "<td>" . $facturaDet->getCod_edificio() . "</td>";
                                echo "<td>" . $facturaDet->getNombre_construccion() . "</td>";
                                echo "<td>" . $facturaDet->getDireccion() . "</td>";
                                echo "<td>" . $facturaDet->getFecha_inicio() . "</td>";
                                echo "<td>" . $facturaDet->getFecha_entrega() . "</td>";
                                echo "<td><a href='../controller/controller.php?opcion=cargar_construccion&cod_edificio=" . $facturaDet->getCod_edificio() . "'>EDITAR</a></td>";
                                echo "<td><a href='../controller/controller.php?opcion=eliminar_construccion&cod_edificio=" . $facturaDet->getCod_edificio() . "'>ELIMINAR</a></td>";
                                echo "</tr>";
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
