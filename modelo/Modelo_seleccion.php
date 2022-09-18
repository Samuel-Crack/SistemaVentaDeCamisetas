<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Modelo_seleccion extends Modelo implements TablaInterface {
    private $_id;   # Nuestro (PK)
    private $_idseleccion;
    private $_descripcion;
    private $_color;

    private $_bd;
    const TABLA = 'modelo_seleccion';
    #Constructor
    public function __construct($id=null, $idseleccion=null, $descripcion=null, $color=null ){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_id = $id;
        $this->_idseleccion = $idseleccion;
        $this->_descripcion = $descripcion;
        $this->_color = $color;

    }
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){
        $sql = "INSERT INTO ". self::TABLA 
            ." (idmodelo_seleccion, idseleccion, descripcion, color) VALUES (".
                $this->_id .",'". $this->_idseleccion ."','". $this->_descripcion ."','". $this->_color ."'".");";
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". self::TABLA 
            . " SET idseleccion='".$this->_idseleccion."',descripcion='".$this->_descripcion."',color='".$this->_color."'"
            ." WHERE idmodelo_seleccion=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". self::TABLA 
            ." WHERE idmodelo_seleccion=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function leer($todo=true){
        $sql ="SELECT * FROM ". self::TABLA ;  
        if (!$todo)
            $sql .=" WHERE idmodelo_seleccion=".$this->_id.";";
        $datos=$this->_bd->ejecutar($sql);
        if (!$todo)
            $this->setPropiedades($datos[0]);
        return $datos;
    }

    #Devolvemos las propiedades
    public function getId(){
        return $this->_id;
    }
    public function getIdseleccion(){
        return $this->_idseleccion;
    }
    public function getDescripcion(){
        return $this->_descripcion;
    }
    public function getColor(){
        return $this->_color;
    }

    private function setPropiedades ($registro){
        $this->_id= $registro["idmodelo_seleccion"];
        $this->_idseleccion =$registro ["idseleccion"];
        $this->_descripcion =$registro ["descripcion"];
        $this->_color =$registro ["color"];

    }
}