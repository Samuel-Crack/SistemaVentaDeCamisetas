<?php 
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php"; 
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php"; 
class Calidad extends Modelo implements TablaInterface { 
    private $_id; # Nuestro (PK) 
    private $_calidad; 
    private $_bd; 
    const TABLA = 'calidad'; 
    #Constructor 
    public function __construct($id=null, $calidad=""){ 
        $this->_bd = new BaseDeDatos(new MySQL()); 
        $this->_id = $id; 
        $this->_calidad = $calidad; 
    } 
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){ 
        $sql = "INSERT INTO ". self::TABLA 
            ." (idcalidad, calidad) VALUES (". 
            $this->_id .",'". $this->_calidad ."'" 
            .");"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function editar(){ 
        $sql ="UPDATE ". self::TABLA 
        . " SET calidad='".$this->_calidad."'" 
        ." WHERE idcalidad=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function eliminar(){ 
        $sql ="DELETE FROM ". self::TABLA 
        ." WHERE idcalidad=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function leer($todo=true){ 
        $sql ="SELECT * FROM ". self::TABLA ; 
        if (!$todo) 
            $sql .=" WHERE idcalidad=".$this->_id.";";
            $datos=$this->_bd->ejecutar($sql); 
        if (!$todo) 
            $this->setPropiedades($datos[0]); 
            return $datos; 
    } 
#Devolvemos las propiedades 
public function getId(){ 
    return $this->_id; 
} 
public function getCalidad(){ 
    return $this->_calidad; 
} 
private function setPropiedades ($registro){ 
    $this->_id= $registro["idcalidad"]; 
    $this->_calidad=$registro["calidad"]; } 
}