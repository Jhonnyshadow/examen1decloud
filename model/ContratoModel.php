<?php


include_once 'Database.php';
include_once './Productos.php';
include_once 'construcciones.php';

/**
 * Description of ContratoModel
 *
 * @author T30
 */
class ContratoModel {
    public function getProductos() {
        $pdo = Database::connect();
        $sql = "select * from Productos";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $contrato = new Productos($res['Codigo'],$res['descripcion'],$res['cantidad'],$res['precio']);
            array_push($listado, $contrato);
        }
        Database::disconnect();
        return $listado;
    }
    public function getProducto($cod) {
        $pdo = Database::connect();
        $sql = "select * from Productos where Codigo=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($cod));
        $res=$consulta->fetch(PDO::FETCH_ASSOC);
        $contrato = new Productos($res['Codigo'],$res['descripcion'],$res['cantidad'],$res['precio']);
        Database::disconnect();
        return $contrato;
    }
     
     public function insertarProducto(Productos $producto) {
        $pdo = Database::connect();
        $sql = "insert into Productos(Codigo, descripcion,cantidad, precio) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($producto->getCodigo(),$producto->getDescripcion(),$producto->getCantidad(),$producto->getPrecio()));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
     
    public function actualizarContrato($cantidad, $codigo){
        $pdo=Database::connect();
        $sql="update Productos set cantidad=? where Codigo=?";
        $consulta=$pdo->prepare($sql);
        $consulta->execute(array($cantidad, $codigo));
        Database::disconnect();
    }
      
    public function eliminarContrato($codigo){
        $pdo=Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="delete from Productos where Codigo=?";
        $consulta=$pdo->prepare($sql);
        $consulta->execute(array($codigo));
        Database::disconnect();
    }
}
