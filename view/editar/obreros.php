<!DOCTYPE html>
<?php
require_once '../../model/Obreros.php';
require_once '../../model/Contrato.php';
session_start();
 $obrero = $_SESSION['obrero'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OBREROS</title>
        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/bootstrap-table.js"></script>
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="images/banner_contacto.jpg">
            <div class="row">
                <h3>OBREROS</h3>

            </div>
            <div class="row">
                <a class="btn btn-success" href="../index.php">Inicio</a>
            </div>
            <p>
            <table data-toggle="table">
            <form action="../../controller/controller.php">
                <input type="hidden" name="opcion" value="modificar_obrero">
                <tr><td> CEDULA:</td><td><?php echo $obrero->getCedula(); ?><input type="hidden" name="cedula" required="true" autocomplete="off" required="" value="<?php echo $obrero->getCedula(); ?>"></td></tr>
                <tr><td>NOMBRE:</td><td><input type="text" name="nombre" required="true" autocomplete="off" required=""value="<?php echo $obrero->getNombre(); ?>"></td></tr>
                <tr><td>APELLIDO:</td><td><input type="text" name="apellido" required="true" autocomplete="off" required="" value="<?php echo $obrero->getApellido(); ?>"></td></tr>
                <tr><td>DIRECCION:</td><td><input type="text" name="direccion" required="true" autocomplete="off" required="" value="<?php echo $obrero->getDireccion(); ?>"></td></tr>
                <tr><td>HIJOS:</td><td><input type="text" name="hijos" required="true" autocomplete="off" required="" value="<?php echo $obrero->getNhijos(); ?>"></td></tr>
                <tr><td>CONTRATO:</td><td>
              
                    <a href="../editar/contratos.php">EDITAR</a>
                </td></tr>
                </select>
                <tr><td colspan="2"><center><input class="btn btn-success" type="submit" value="Crear"></center></td></tr>
                </table>
            </form>
        </p>
       
    </div>
</body>

</html>
