<?php 
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php"; 
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php"; 
class Camisetas extends Modelo implements TablaInterface { 
    private $_id; # Nuestro (PK) 
    private $_descripcion; 
    private $_bd; 
    const TABLA = 'camisetas'; 
    #Constructor 
    public function __construct($id=null, $descripcion=""){ 
        $this->_bd = new BaseDeDatos(new MySQL()); 
        $this->_id = $id; 
        $this->_descripcion = $descripcion; 
    } 
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){ 
        $sql = "INSERT INTO ". self::TABLA 
            ." (idcamisetas, descripcion) VALUES (". 
            $this->_id .",'". $this->_descripcion ."'" 
            .");"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function editar(){ 
        $sql ="UPDATE ". self::TABLA 
        . " SET camisetas='".$this->_camisetas."'" 
        ." WHERE idcamisetas=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function eliminar(){ 
        $sql ="DELETE FROM ". self::TABLA 
        ." WHERE idcamisetas=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function leer($todo=true){ 
        $sql ="SELECT * FROM ". self::TABLA ; 
        if (!$todo) 
            $sql .=" WHERE idcamisetas=".$this->_id.";";
            $datos=$this->_bd->ejecutar($sql); 
        if (!$todo) 
            $this->setPropiedades($datos[0]); 
            return $datos; 
    } 
#Devolvemos las propiedades 
public function getId(){ 
    return $this->_id; 
} 
public function getDescripcion(){ 
    return $this->_descripcion; 
} 
private function setPropiedades ($registro){ 
    $this->_id= $registro["idcamisetas"]; 
    $this->_descripcion=$registro["descripcion"]; } 
}