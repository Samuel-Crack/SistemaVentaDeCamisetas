<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Detalle_boleta extends Modelo implements TablaInterface {
    private $_id;   # Nuestro (PK)
    private $_cantidad;
    private $_precio_unitario;
    private $_subtotal;
    private $_producto;
    private $_idboletas;
    private $_iddetalles_camisetas;
    private $_bd;
    const TABLA = 'detalle_boleta';
    #Constructor
    public function __construct($id=null, $cantidad=null, $precio_unitario=null, $subtotal=null, $producto=null, $idboletas=null, $iddetalles_camisetas=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_id = $id;
        $this->_cantidad = $cantidad;
        $this->_precio_unitario = $precio_unitario;
        $this->_subtotal = $subtotal;
        $this->_producto = $producto; 
        $this->_idboletas = $idboletas; 
        $this->_iddetalles_camisetas = $iddetalles_camisetas; 
    }
    # Implementamos lo que dice la INTERFACE
    public function nuevo(){
        $sql = "INSERT INTO ". self::TABLA 
            ." (iddetalle_boleta, cantidad, precio_unitario, subtotal, producto, idboletas, iddetalles_camisetas) VALUES (".
                $this->_id .",'". $this->_cantidad ."','". $this->_precio_unitario ."','". $this->_subtotal ."','". $this->_idboletas ."','". $this->_iddetalles_camisetas ."','". $this->_producto ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". self::TABLA 
            . " SET cantidad='".$this->_cantidad."',precio_unitario='".$this->_precio_unitario."',subtotal='".$this->_subtotal."',idboletas='".$this->_idboletas."',iddetalles_camisetas='".$this->_iddetalles_camisetas."',producto='".$this->_producto."'"
            ." WHERE iddetalle_boleta=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". self::TABLA 
            ." WHERE iddetalle_boleta=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function leer($todo=true){
        $sql ="SELECT * FROM ". self::TABLA ;
        if (!$todo)
            $sql .=" WHERE iddetalle_boleta=".$this->_id.";";
        $datos=$this->_bd->ejecutar($sql);
        if (!$todo)
            $this->setPropiedades($datos[0]);
        return $datos;
    }

    #Devolvemos las propiedades
    public function getId(){
        return $this->_id;
    }
    public function getCantidad(){
        return $this->_cantidad;
    }
    public function getPrecio_unitario(){
        return $this->_precio_unitario;
    }
    public function getSubtotal(){
        return $this->_subtotal;
    }
    public function getProducto(){
        return $this->_producto;
    }
    public function getIdboletas(){
        return $this->_idboletas;
    }
    public function getiIddetalles_camisetas(){
        return $this->_iddetalles_camisetas;
    }
    private function setPropiedades ($registro){
        $this->_id= $registro["iddetalle_boleta"];
        $this->_cantidad =$registro ["cantidad"];
        $this->_precio_unitario = $registro["precio_unitario"];
        $this->_subtotal =$registro ["subtotal"];
        $this->_producto = $registro["producto"];
        $this->_idboletas = $registro["idboletas"];
        $this->_iddetalles_camisetas = $registro["iddetalles_camisetas"];
    }
}