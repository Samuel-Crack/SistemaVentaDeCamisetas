<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Modelo_talla extends Modelo implements TablaInterface {
    private $_id;   # Nuestro (PK)
    private $_idtalla;

    private $_bd;
    const TABLA = 'modelo_talla';
    #Constructor
    public function __construct($id=null, $idtalla=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_id = $id;
        $this->_idtalla = $idtalla;

    }
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){
        $sql = "INSERT INTO ". self::TABLA 
            ." (idmodelo_talla, idtalla) VALUES (".
                $this->_id .",'". $this->_idtalla ."'".");";
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". self::TABLA 
            . " SET idtalla='".$this->_idtalla ."'"
            ." WHERE idmodelo_talla=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". self::TABLA 
            ." WHERE idmodelo_talla=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function leer($todo=true){
        $sql ="SELECT * FROM ". self::TABLA ;  
        if (!$todo)
            $sql .=" WHERE idmodelo_talla=".$this->_id.";";
        $datos=$this->_bd->ejecutar($sql);
        if (!$todo)
            $this->setPropiedades($datos[0]);
        return $datos;
    }

    #Devolvemos las propiedades
    public function getId(){
        return $this->_id;
    }
    public function getIdtalla(){
        return $this->_idtalla;
    }

    private function setPropiedades ($registro){
        $this->_id= $registro["idmodelo_talla"];
        $this->_idtalla =$registro ["idtalla"];

    }
}