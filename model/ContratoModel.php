<?php


include_once 'Database.php';
include_once 'Contrato.php';
include_once 'Salarios.php';
include_once 'construcciones.php';
include_once 'Obreros.php';
include_once 'Trabajo.php';
/**
 * Description of ContratoModel
 *
 * @author T30
 */
class ContratoModel {
    public function getContratos() {
        $pdo = Database::connect();
        $sql = "select * from contrato";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $contrato = new Contrato($res['inicio_Contrato'], $res['fin_contrato'], $res['oficio'], $res['codigo_contrato']);
            array_push($listado, $contrato);
        }
        Database::disconnect();
        return $listado;
    }
     public function getSalarios() {
        $pdo = Database::connect();
        $sql = "select * from salarios";
        
        $resultado = $pdo->query($sql);
        $listado = array();
        
        foreach ($resultado as $res) {
           $Salarios = new Salarios($res['oficio'], $res['salario']);
            array_push($listado, $Salarios);
        }
        Database::disconnect();
        return $listado;
    }
     public function getTrabajo() {
        $pdo = Database::connect();
        $sql = "select * from trabajo_obrero";
        
        $resultado = $pdo->query($sql);
        $listado = array();
        
        foreach ($resultado as $res) {
           $Trabajo = new Trabajo($res['cod_obrero'], $res['cod_edificio']);
            array_push($listado, $Trabajo);
        }
        Database::disconnect();
        return $listado;
    }
     public function getConstrucciones() {
        $pdo = Database::connect();
        $sql = "select * from construcciones";
        
        $resultado = $pdo->query($sql);
        $listado = array();
        
        foreach ($resultado as $res) {
           $Construcciones = new construcciones($res['cod_edificio'], $res['nombre_construccion'],$res['direccion'],$res['fecha_inicio'],$res['fecha_entrega']);
            array_push($listado, $Construcciones);
        }
        Database::disconnect();
        return $listado;
    }
     public function getObreros() {
        $pdo = Database::connect();
        $sql = "select * from datos_obrero";
        
        $resultado = $pdo->query($sql);
        $listado = array();
        
        foreach ($resultado as $res) {
           $Obreros = new Obreros($res['cod_obrero'], $res['nombre_obrero'],$res['apellido_obrero'],$res['direccion_obrero'],$res['numero_hijos'],$res['codigo_contrato']);
            array_push($listado, $Obreros);
        }
        Database::disconnect();
        return $listado;
    }
  
    public function getConstruccion($cod_edificio) {
        $pdo = Database::connect();
        $sql = "select * from construcciones where cod_edificio=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cod_edificio));
        $res=$consulta->fetch(PDO::FETCH_ASSOC);
        $edificio=new construcciones($res['cod_edificio'], $res['nombre_construccion'],$res['direccion'],$res['fecha_inicio'],$res['fecha_entrega']);
        Database::disconnect();
        return $edificio;
    }
    public function getContrato($cod_contrato) {
        $pdo = Database::connect();
        $sql = "select * from contrato where codigo_contrato=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cod_contrato));
        $res=$consulta->fetch(PDO::FETCH_ASSOC);
        $contrato = new Contrato($res['inicio_Contrato'], $res['fin_contrato'], $res['oficio'], $res['codigo_contrato']);
        Database::disconnect();
        return $contrato;
    }
     public function getObrero($cedula) {
        $pdo = Database::connect();
        $sql = "select * from datos_obrero where cod_obrero=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cedula));
        $res=$consulta->fetch(PDO::FETCH_ASSOC);
        $obrero=new Obreros($res['cod_obrero'], $res['nombre_obrero'],$res['apellido_obrero'],$res['direccion_obrero'],$res['numero_hijos'],$res['codigo_contrato']);
        Database::disconnect();
        return $obrero;
    }

     public function insertarSalario($oficio, $salario) {
        $pdo = Database::connect();
        $sql = "insert into salarios(oficio,salario) values(?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($oficio, $salario));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
     public function insertarConstruccion($cod_edificio, $nombre_construccion, $direccion, $fecha_inicio, $fecha_entrega) {
        $pdo = Database::connect();
        $sql = "insert into construcciones(cod_edificio, nombre_construccion, direccion, fecha_inicio, fecha_entrega) values(?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cod_edificio, $nombre_construccion, $direccion, $fecha_inicio, $fecha_entrega));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
    public function insertarObrero($cedula, $nombre, $apellido, $direccion, $nhijos, $cod_contrato) {
        $pdo = Database::connect();
        $sql = "insert into datos_obrero(cod_obrero,nombre_obrero,apellido_obrero,direccion_obrero,numero_hijos,codigo_contrato) values(?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cedula, $nombre, $apellido, $direccion, $nhijos, $cod_contrato));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
    
    public function insertarContrato($inicio_contrato,$fin_contrato,$oficio,$codigo_contrato) {
        $pdo = Database::connect();
        $sql = "insert into contrato(inicio_Contrato,fin_contrato,oficio,codigo_contrato) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($inicio_contrato,$fin_contrato,$oficio,$codigo_contrato));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    public function insertarTrabajo($cod_obrero, $cod_edificio) {
        $pdo = Database::connect();
        $sql = "insert into trabajo_obrero(cod_obrero,cod_edificio) values(?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($cod_obrero, $cod_edificio));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    


    public function actualizarConstruccion($cod_edificio, $nombre_construccion, $direccion, $fecha_inicio, $fecha_entrega){
        $pdo=Database::connect();
        $sql="update construcciones set nombre_construccion=?,direccion=?,fecha_inicio=?,fecha_entrega=? where cod_edificio=?";
        $consulta=$pdo->prepare($sql);
        $consulta->execute(array($nombre_construccion, $direccion, $fecha_inicio, $fecha_entrega,$cod_edificio));
        Database::disconnect();
    }
    public function actualizarContrato($inicio_contrato, $fin_contrato, $oficio, $codigo_contrato){
        $pdo=Database::connect();
        $sql="update contrato set inicio_contrato=?, fin_contrato=?, oficio=?  where codigo_contrato=?";
        $consulta=$pdo->prepare($sql);
        $consulta->execute(array($inicio_contrato, $fin_contrato, $oficio, $codigo_contrato));
        Database::disconnect();
    }
     public function actualizarObrero($cedula, $nombre, $apellido, $direccion, $nhijos){
        $pdo=Database::connect();
        $sql="update datos_obrero set nombre_obrero=?,apellido_obrero=?,direccion_obrero=?,numero_hijos=? where cod_obrero=?";
        $consulta=$pdo->prepare($sql);
        $consulta->execute(array( $nombre, $apellido, $direccion, $nhijos,$cedula));
        Database::disconnect();
    }
     public function ObreroContrato($cedula,$cod_contrato){
        $pdo=Database::connect();
        $sql="update datos_obrero set codigo_contrato=? where cod_obrero=?";
        $consulta=$pdo->prepare($sql);
        $consulta->execute(array($cod_contrato,$cedula));
        Database::disconnect();
    }
   public function eliminarConstruccion($cod_edificio){
        //Preparamos la conexion a la bdd:
        $pdo=Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="delete from construcciones where cod_edificio=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($cod_edificio));
        Database::disconnect();
    }
    

    public function eliminarContrato($codigo_contrato){
        $pdo=Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="delete from contrato where codigo_contrato=?";
        $consulta=$pdo->prepare($sql);
        $consulta->execute(array($codigo_contrato));
        Database::disconnect();
    }
     public function eliminarObrero($cedula){
        //Preparamos la conexion a la bdd:
        $pdo=Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="delete from datos_obrero where cod_obrero=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($cedula));
        Database::disconnect();
    }
     public function eliminarSalario($salario){
        //Preparamos la conexion a la bdd:
        $pdo=Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="delete from salarios where oficio=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($salario));
        Database::disconnect();
    }
}
