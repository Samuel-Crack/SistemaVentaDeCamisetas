<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Clientes extends Modelo implements TablaInterface {
    private $_id;   # Nuestro (PK)
    private $_nombres;
    private $_apellidos;
    private $_dni;
    private $_direccion;
    private $_telefono;
    private $_nacionalidad;
    private $_bd;
    const TABLA = 'clientes';
    #Constructor
    public function __construct($id=null, $nombres=null, $apellidos=null, $dni=null, $direccion=null, $telefono=null, $nacionalidad=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_id = $id;
        $this->_nombres = $nombres;
        $this->_apellidos = $apellidos;
        $this->_dni = $dni;
        $this->_direccion = $direccion; 
        $this->_telefono = $telefono; 
        $this->_nacionalidad = $nacionalidad; 
    }
    # Implementamos lo que dice la INTERFACE
    public function nuevo(){
        $sql = "INSERT INTO ". self::TABLA 
            ." (idclientes, nombres, apellidos, dni, direccion, telefono, nacionalidad) VALUES (".
                $this->_id .",'". $this->_nombres ."','". $this->_apellidos ."','". $this->_dni ."','". $this->_telefono ."','". $this->_nacionalidad ."','". $this->_direccion ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". self::TABLA 
            . " SET nombres='".$this->_nombres."',apellidos='".$this->_apellidos."',dni='".$this->_dni."',telefono='".$this->_telefono."',nacionalidad='".$this->_nacionalidad."',direccion='".$this->_direccion."'"
            ." WHERE idclientes=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". self::TABLA 
            ." WHERE idclientes=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function leer($todo=true){
        $sql ="SELECT * FROM ". self::TABLA ;
        if (!$todo)
            $sql .=" WHERE idclientes=".$this->_id.";";
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
    public function getNacionalidad(){
        return $this->_nacionalidad;
    }
    private function setPropiedades ($registro){
        $this->_id= $registro["idclientes"];
        $this->_nombres =$registro ["nombres"];
        $this->_apellidos = $registro["apellidos"];
        $this->_dni =$registro ["dni"];
        $this->_direccion = $registro["direccion"];
        $this->_telefono = $registro["telefono"];
        $this->_nacionalidad = $registro["nacionalidad"];
    }
}