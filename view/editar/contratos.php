<!DOCTYPE html>
<?php
require_once '../../model/Contrato.php';
require_once '../../model/Salarios.php';
session_start();
$contrato=$_SESSION['contrato'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CONTRATO</title>
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
                <h3>CONTRATO</h3>

            </div>
            <div class="row">
                <a class="btn btn-success" href="../view/index.php">Inicio</a>
            </div>
            <p>
            
            <form action="../../controller/controller.php">
                <div class="panel panel-primary">
                    <div    class=" panel-heading"><b>MODIFICAR DATOS CONTRATOS</b></div>
                    <div class=" panel-body">
                <input type="hidden" name="opcion" value="modificar_contrato">
                
                INICIO CONTRATO:<input type="date" name="inicio_contrato" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>">

                FIN CONTRATO:<input type="date" name="fin_contrato" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>">
                OFICIO:
                <select name="oficio">
                    
                    <?php
              
                   if (isset($_SESSION['listaSalarios'])) {
                    $listado1 = unserialize($_SESSION['listaSalarios']);
                   
                    foreach ($listado1 as $salario) {
                        if ($salario->getOficio()==$contrato->getOficio()) {
                            echo "<option selected=true value=".$salario->getOficio().">" . $salario->getOficio()  . "</option>";
                        }else{
                            echo "<option value=".$salario->getOficio().">" . $salario->getOficio()  . "</option>";
                        }
                        
                    }
                   }
                    ?>
                </select>
                CODIGO CONTRATO:<?php echo $contrato->getCodigo_contrato() ?>
                <input type="hidden" name="codigo_contrato" value="<?php echo $contrato->getCodigo_contrato()?>">
                <input type="submit" value="Actualizar">
                       </div>
                </div>
            </form>
                   
        </p>
       
    </div>
</body>

</html>
