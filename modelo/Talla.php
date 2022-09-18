<?php 
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php"; 
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php"; 
class Talla extends Modelo implements TablaInterface { 
    private $_id; # Nuestro (PK) 
    private $_talla; 
    private $_bd; 
    const TABLA = 'talla'; 
    #Constructor 
    public function __construct($id=null, $talla=""){ 
        $this->_bd = new BaseDeDatos(new MySQL()); 
        $this->_id = $id; 
        $this->_talla = $talla; 
    } 
    # Implementamos lo que dice la INTERFACE 
    public function nuevo(){ 
        $sql = "INSERT INTO ". self::TABLA 
            ." (idtalla, talla) VALUES (". 
            $this->_id .",'". $this->_talla ."'" 
            .");"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function editar(){ 
        $sql ="UPDATE ". self::TABLA 
        . " SET talla='".$this->_talla."'" 
        ." WHERE idtalla=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function eliminar(){ 
        $sql ="DELETE FROM ". self::TABLA 
        ." WHERE idtalla=".$this->_id.";"; 
        return $this->_bd->ejecutar($sql); 
    } 
    public function leer($todo=true){ 
        $sql ="SELECT * FROM ". self::TABLA ; 
        if (!$todo) 
            $sql .=" WHERE idtalla=".$this->_id.";";
            $datos=$this->_bd->ejecutar($sql); 
        if (!$todo) 
            $this->setPropiedades($datos[0]); 
            return $datos; 
    } 
#Devolvemos las propiedades 
public function getId(){ 
    return $this->_id; 
} 
public function getTalla(){ 
    return $this->_talla; 
} 
private function setPropiedades ($registro){ 
    $this->_id= $registro["idtalla"]; 
    $this->_talla=$registro["talla"]; } 
}