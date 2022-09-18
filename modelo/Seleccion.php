<?php 
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php"; 
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php"; 
class Seleccion extends Modelo implements TablaInterface { 
    private $_id; # Nuestro (PK) 
    private $_seleccion; 
    private $_bd; 
    const TABLA = 'seleccion'; 
    #Constructor 
    public function __construct($id=null, $seleccion=""){ 
        $this->_bd = new BaseDeDatos(new MySQL()); 
        $this->_id = $id; 
        $this->_seleccion = $seleccion; 
    } 
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){ 
        $sql = "INSERT INTO ". self::TABLA 
            ." (idseleccion, seleccion) VALUES (". 
            $this->_id .",'". $this->_seleccion ."'" 
            .");"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function editar(){ 
        $sql ="UPDATE ". self::TABLA 
        . " SET seleccion='".$this->_seleccion."'" 
        ." WHERE idseleccion=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function eliminar(){ 
        $sql ="DELETE FROM ". self::TABLA 
        ." WHERE idseleccion=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function leer($todo=true){ 
        $sql ="SELECT * FROM ". self::TABLA ; 
        if (!$todo) 
            $sql .=" WHERE idseleccion=".$this->_id.";";
            $datos=$this->_bd->ejecutar($sql); 
        if (!$todo) 
            $this->setPropiedades($datos[0]); 
            return $datos; 
    } 
#Devolvemos las propiedades 
public function getId(){ 
    return $this->_id; 
} 
public function getSeleccion(){ 
    return $this->_seleccion; 
} 
private function setPropiedades ($registro){ 
    $this->_id= $registro["idseleccion"]; 
    $this->_seleccion=$registro["seleccion"]; } 
}