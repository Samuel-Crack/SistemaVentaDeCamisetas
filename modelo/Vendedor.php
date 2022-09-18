<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Vendedor extends Modelo implements TablaInterface {
    private $_id;   # Nuestro (PK)
    private $_nombres;
    private $_apellidos;
    private $_dni;
    private $_direccion;
    private $_telefono;
    private $_bd;
    const TABLA = 'vendedor';
    #Constructor
    public function __construct($id=null, $nombres=null, $apellidos=null, $dni=null, $direccion=null, $telefono=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_id = $id;
        $this->_nombres = $nombres;
        $this->_apellidos = $apellidos;
        $this->_dni = $dni;
        $this->_direccion = $direccion; 
        $this->_telefono = $telefono; 
    }
    # Implementamos lo que dice la INTERFACE
    public function nuevo(){
        $sql = "INSERT INTO ". self::TABLA 
            ." (idvendedor, nombres, apellidos, dni, direccion, telefono) VALUES (".
                $this->_id .",'". $this->_nombres ."','". $this->_apellidos ."','". $this->_dni ."','". $this->_telefono ."','". $this->_direccion ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". self::TABLA 
            . " SET nombres='".$this->_nombres."',apellidos='".$this->_apellidos."',dni='".$this->_dni."',telefono='".$this->_telefono."',direccion='".$this->_direccion."'"
            ." WHERE idvendedor=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". self::TABLA 
            ." WHERE idvendedor=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function leer($todo=true){
        $sql ="SELECT * FROM ". self::TABLA ;
        if (!$todo)
            $sql .=" WHERE idvendedor=".$this->_id.";";
        $datos=$this->_bd->ejecutar($sql);
        if (!$todo)
            $this->setPropiedades($datos[0]);
        return $datos;
    }

    #Devolvemos las propiedades
    public function getId(){
        return $this->_id;
    }
    public function getNombres(){
        return $this->_nombres;
    }
    public function getApellidos(){
        return $this->_apellidos;
    }
    public function getDni(){
        return $this->_dni;
    }
    public function getDireccion(){
        return $this->_direccion;
    }
    public function getTelefono(){
        return $this->_telefono;
    }

    private function setPropiedades ($registro){
        $this->_id= $registro["idvendedor"];
        $this->_nombres =$registro ["nombres"];
        $this->_apellidos = $registro["apellidos"];
        $this->_dni =$registro ["dni"];
        $this->_direccion = $registro["direccion"];
        $this->_telefono = $registro["telefono"];
    }
}