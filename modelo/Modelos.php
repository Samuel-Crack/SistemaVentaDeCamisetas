<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Modelos extends Modelo implements TablaInterface {
    private $_id;   # Nuestro (PK)
    private $_idmarca;
    private $_modelo;


    private $_bd;
    const TABLA = 'modelos';
    #Constructor
    public function __construct($id=null, $idmarca=null, $modelo=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_id = $id;
        $this->_idmarca = $idmarca;
        $this->_modelo = $modelo;

    }
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){
        $sql = "INSERT INTO ". self::TABLA 
            ." (idmodelos, idmarca, modelo) VALUES (".
                $this->_id .",'". $this->_idmarca ."','". $this->_modelo ."'".");";
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". self::TABLA 
            . " SET idmarca='".$this->_idmarca."',modelo='".$this->_modelo."'"
            ." WHERE idmodelos=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". self::TABLA 
            ." WHERE idmodelos=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function leer($todo=true){
        $sql ="SELECT * FROM ". self::TABLA ;  
        if (!$todo)
            $sql .=" WHERE idmodelos=".$this->_id.";";
        $datos=$this->_bd->ejecutar($sql);
        if (!$todo)
            $this->setPropiedades($datos[0]);
        return $datos;
    }

    #Devolvemos las propiedades
    public function getId(){
        return $this->_id;
    }
    public function getIdmarca(){
        return $this->_idmarca;
    }
    public function getModelo(){
        return $this->_modelo;
    }
 

    private function setPropiedades ($registro){
        $this->_id= $registro["idmodelos"];
        $this->_idmarca =$registro ["idmarca"];
        $this->_modelo =$registro ["modelo"];

    }
}