<!DOCTYPE html>
<?php
require_once '../model/Contrato.php';
require_once '../model/Salarios.php';
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
                <h3>CONTRATO</h3>

            </div>
            <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
            </div>
            <p>
            
            <form action="../controller/controller.php">
                <div class="panel panel-primary">
                    <div    class=" panel-heading"><b>INGRESO DATOS CONTRATO</b></div>
                    <div class=" panel-body">
                <input type="hidden" name="opcion" value="crear_contratos">
                INICIO CONTRATO:<input type="date" name="inicio_contrato" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>">

                FIN CONTRATO:<input type="date" name="fin_contrato" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>">
                OFICIO:
                <select name="oficio">
                    
                    <?php
              
                   if (isset($_SESSION['listaSalarios'])) {
                    $listado1 = unserialize($_SESSION['listaSalarios']);
                   
                    foreach ($listado1 as $salario) {
                        print_r($salario);
                        echo "<option value=".$salario->getOficio().">" . $salario->getOficio()  . "</option>";
                    }
                   }
                    ?>
                </select>
                CODIGO CONTRATO:<input type="text" name="codigo_contrato" maxlength="100">
                <input type="submit" value="Crear">
                       </div>
                </div>
            </form>
                   
        </p>
       
    </div>
</body>

</html>
