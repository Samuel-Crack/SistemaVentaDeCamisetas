<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Boletas extends Modelo implements TablaInterface {
    private $_id;   # Nuestro (PK)
    private $_fecha;
    private $_total;
    private $_idclientes;
    private $_idvendedor;
    private $_bd;
    const TABLA = 'boletas';
    #Constructor
    public function __construct($id=null, $fecha=null, $total=null, $idclientes=null, $idvendedor=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_id = $id;
        $this->_fecha = $fecha;
        $this->_total = $total;
        $this->_idclientes = $idclientes;
        $this->_idvendedor = $idvendedor; 
    }
    # Implementamos lo que dice la INTERFACE
    public function nuevo(){
        $sql = "INSERT INTO ". self::TABLA 
            ." (idboletas, fecha, total, idclientes, idvendedor) VALUES (".
                $this->_id .",'". $this->_fecha ."','". $this->_total ."','". $this->_idclientes ."','". $this->_idvendedor ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". self::TABLA 
            . " SET fecha='".$this->_fecha."',total='".$this->_total."',idclientes='".$this->_idclientes."',idvendedor='".$this->_idvendedor."'"
            ." WHERE idboletas=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". self::TABLA 
            ." WHERE idboletas=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function leer($todo=true){
        $sql ="SELECT * FROM ". self::TABLA ;
        if (!$todo)
            $sql .=" WHERE idboletas=".$this->_id.";";
        $datos=$this->_bd->ejecutar($sql);
        if (!$todo)
            $this->setPropiedades($datos[0]);
        return $datos;
    }

    #Devolvemos las propiedades
    public function getId(){
        return $this->_id;
    }
    public function getFecha(){
        return $this->_fecha;
    }
    public function getTotal(){
        return $this->_total;
    }
    public function getIdclientes(){
        return $this->_idclientes;
    }
    public function getIdvendedor(){
        return $this->_idvendedor;
    }

    private function setPropiedades ($registro){
        $this->_id= $registro["idboletas"];
        $this->_fecha =$registro ["fecha"];
        $this->_total = $registro["total"];
        $this->_idclientes =$registro ["idclientes"];
        $this->_idvendedor = $registro["idvendedor"];
    }
}