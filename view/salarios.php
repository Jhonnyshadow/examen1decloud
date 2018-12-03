<!DOCTYPE html>
<?php
require_once '../model/Salarios.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SALARIO</title>
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
                <h3>SALARIO</h3>

            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Inicio</a>
            </div>
            <p>
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="crear_salario">
                <div class="panel panel-primary">
                    <div    class=" panel-heading"><b>INGRESO OFICIO-SALARIO</b></div>
                    <div class=" panel-body">
                        OFICIO:<input type="text" name="oficio" maxlength="50" required="true">
                        SALARIO:<input type="text" name="salario" maxlength="50" required="true">
                        <input type="submit" value="Crear">
                    </div>
                </div>
            </form>
        </p>
        <div class="panel panel-primary">
            <div    class=" panel-heading"><b>LISTA -OFICIOS-SALARIOS</b></div>
            <div class=" panel-body">
                <table data-toggle="table">
                    <thead>
                        <tr>
                            <th>OFICIO</th>
                            <th>SALARIO</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //verificamos si existe en sesion el listado de clientes:
                        if (isset($_SESSION['listaSalarios'])) {
                            $listado = unserialize($_SESSION['listaSalarios']);
                            foreach ($listado as $facturaDet) {
                                echo "<tr>";
                                echo "<td>" . $facturaDet->getOficio() . "</td>";
                                echo "<td>" . $facturaDet->getSalario() . "</td>";
                                echo "<td><a href='../controller/controller.php?opcion=eliminar_oficio&oficio=" . $facturaDet->getOficio() . "'>Eliminar</a></td>";
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
