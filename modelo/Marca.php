<?php 
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php"; 
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php"; 
class Marca extends Modelo implements TablaInterface { 
    private $_id; # Nuestro (PK) 
    private $_marca; 
    private $_bd; 
    const TABLA = 'marca'; 
    #Constructor 
    public function __construct($id=null, $marca=""){ 
        $this->_bd = new BaseDeDatos(new MySQL()); 
        $this->_id = $id; 
        $this->_marca = $marca; 
    } 
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){ 
        $sql = "INSERT INTO ". self::TABLA 
            ." (idmarca, marca) VALUES (". 
            $this->_id .",'". $this->_marca ."'" 
            .");"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function editar(){ 
        $sql ="UPDATE ". self::TABLA 
        . " SET marca='".$this->_marca."'" 
        ." WHERE idmarca=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function eliminar(){ 
        $sql ="DELETE FROM ". self::TABLA 
        ." WHERE idmarca=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function leer($todo=true){ 
        $sql ="SELECT * FROM ". self::TABLA ; 
        if (!$todo) 
            $sql .=" WHERE idmarca=".$this->_id.";";
            $datos=$this->_bd->ejecutar($sql); 
        if (!$todo) 
            $this->setPropiedades($datos[0]); 
            return $datos; 
    } 
#Devolvemos las propiedades 
public function getId(){ 
    return $this->_id; 
} 
public function getMarca(){ 
    return $this->_marca; 
} 
private function setPropiedades ($registro){ 
    $this->_id= $registro["idmarca"]; 
    $this->_marca=$registro["marca"]; } 
}