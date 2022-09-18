<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Imagen extends Modelo implements TablaInterface {
    private $_id;   # Nuestro (PK)
    private $_idmodelo_seleccion;
    private $_descripcion;
    private $_url;

    private $_bd;
    const TABLA = 'imagen';
    #Constructor
    public function __construct($id=null, $idmodelo_seleccion=null, $descripcion=null, $url=null ){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_id = $id;
        $this->_idmodelo_seleccion = $idmodelo_seleccion;
        $this->_descripcion = $descripcion;
        $this->_url = $url;

    }
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){
        $sql = "INSERT INTO ". self::TABLA 
            ." (idimagen, idmodelo_seleccion, descripcion, url) VALUES (".
                $this->_id .",'". $this->_idmodelo_seleccion ."','". $this->_descripcion ."','". $this->_url ."'".");";
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". self::TABLA 
            . " SET idmodelo_seleccion='".$this->_idmodelo_seleccion."',descripcion='".$this->_descripcion."',url='".$this->_url."'"
            ." WHERE idimagen=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". self::TABLA 
            ." WHERE idimagen=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function leer($todo=true){
        $sql ="SELECT * FROM ". self::TABLA ;  
        if (!$todo)
            $sql .=" WHERE idimagen=".$this->_id.";";
        $datos=$this->_bd->ejecutar($sql);
        if (!$todo)
            $this->setPropiedades($datos[0]);
        return $datos;
    }

    #Devolvemos las propiedades
    public function getId(){
        return $this->_id;
    }
    public function getIdmodelo_seleccion(){
        return $this->_idmodelo_seleccion;
    }
    public function getDescripcion(){
        return $this->_descripcion;
    }
    public function getUrl(){
        return $this->_url;
    }

    private function setPropiedades ($registro){
        $this->_id= $registro["idimagen"];
        $this->_idimagen =$registro ["idimagen"];

    }
}