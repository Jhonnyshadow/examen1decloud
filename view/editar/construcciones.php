<!DOCTYPE html>
<?php
require_once '../../model/construcciones.php';
session_start();
        $edificio = $_SESSION['edificio'];
      
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CONSTRUCCIONES</title>
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
                <h3>CONSTRUCCIONES</h3>

            </div>
            <div class="row">
                <a class="btn btn-success" href="../index.php">Inicio</a>
            </div>
            <p>
            <table data-toggle="table" >
               
            <form action="../../controller/controller.php">
                <input type="hidden" name="opcion" value="modificar_construccion">
                <tr><td> CODIGO CONSTRUCCION:</td><td><input type="hidden" name="cod_edificio" value="<?php echo $edificio->getCod_edificio(); ?>" maxlength="50" required="true"><?php echo $edificio->getCod_edificio(); ?></td></tr>
                 <tr><td>NOMBRE CONSTRUCCION:</td><td><input type="text" name="nombre_construccion" value="<?php echo $edificio->getNombre_construccion(); ?>"  maxlength="50" required="true"></td></tr>
                 <tr><td>DIRECCION :</td><td><input type="text" name="direccion" value="<?php echo $edificio->getDireccion(); ?>" maxlength="50" required="true"></td></tr>
                 <tr><td>INICIO CONSTRUCCION:</td><td><input type="date" name="fecha_inicio" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>"></td></tr>
                 <tr><td>ENTREGA COSNTRUCCION:</td><td><input type="date" name="fecha_entrega" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>"></td></tr>
                 <tr><td colspan="2"><center><input type="submit" class="btn" value="ACTUALIZAR"></center></td></tr>
            </form>
            </table>
        </p>
       


    </div>
</body>
</html>
