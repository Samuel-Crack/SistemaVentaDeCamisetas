<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Modelo_calidad extends Modelo implements TablaInterface {
    private $_id;   # Nuestro (PK)
    private $_idcalidad;

    private $_bd;
    const TABLA = 'modelo_calidad';
    #Constructor
    public function __construct($id=null, $idcalidad=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_id = $id;
        $this->_idcalidad = $idcalidad;

    }
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){
        $sql = "INSERT INTO ". self::TABLA 
            ." (idmodelo_calidad, idcalidad) VALUES (".
                $this->_id .",'". $this->_idcalidad ."'".");";
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". self::TABLA 
            . " SET idcalidad='".$this->_idcalidad ."'"
            ." WHERE idmodelo_calidad=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". self::TABLA 
            ." WHERE idmodelo_calidad=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function leer($todo=true){
        $sql ="SELECT * FROM ". self::TABLA ;  
        if (!$todo)
            $sql .=" WHERE idmodelo_calidad=".$this->_id.";";
        $datos=$this->_bd->ejecutar($sql);
        if (!$todo)
            $this->setPropiedades($datos[0]);
        return $datos;
    }

    #Devolvemos las propiedades
    public function getId(){
        return $this->_id;
    }
    public function getIdcalidad(){
        return $this->_idcalidad;
    }

    private function setPropiedades ($registro){
        $this->_id= $registro["idmodelo_calidad"];
        $this->_idcalidad =$registro ["idcalidad"];

    }
}