<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once "TablaInterface.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Detalles_camisetas extends Modelo implements TablaInterface {
    private $_id;   # Nuestro (PK)
    private $_precio;
    private $_stock;
    private $_idcamisetas;
    private $_idmodelo_talla;
    private $_idmodelo_seleccion;
    private $_idmodelo_calidad;
    private $_idmodelos;
    private $_bd;
    const TABLA = 'detalles_camisetas';
    #Constructor
    public function __construct($id=null, $precio=null, $stock=null, $idcamisetas=null, $idmodelo_talla=null, $idmodelo_seleccion=null, $idmodelo_calidad=null, $idmodelos=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_id = $id;
        $this->_precio = $precio;
        $this->_stock = $stock;
        $this->_idcamisetas = $idcamisetas;
        $this->_idmodelo_talla = $idmodelo_talla; 
        $this->_idmodelo_seleccion = $idmodelo_seleccion; 
        $this->_idmodelo_calidad = $idmodelo_calidad; 
        $this->_idmodelos; 
    }
    # Implementamos lo que dice la INTERFACE
    public function nuevo(){
        $sql = "INSERT INTO ". self::TABLA 
            ." (iddetalles_camisetas, precio, stock, idcamisetas, idmodelo_talla, idmodelo_seleccion, idmodelo_calidad, idmodelos) VALUES (".
                $this->_id .",'". $this->_precio ."','". $this->_stock ."','". $this->_idcamisetas ."','". $this->_idmodelo_seleccion ."','". $this->_idmodelo_calidad ."','".$this->_idmodelos ."','". $this->_idmodelo_talla ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". self::TABLA 
            . " SET precio='".$this->_precio."',stock='".$this->_stock."',idmodelos='".$this->_idmodelos."',idcamisetas='".$this->_idcamisetas."',idmodelo_seleccion='".$this->_idmodelo_seleccion."',idmodelo_calidad='".$this->_idmodelo_calidad."',idmodelo_talla='".$this->_idmodelo_talla."'"
            ." WHERE iddetalles_camisetas=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". self::TABLA 
            ." WHERE iddetalles_camisetas=".$this->_id.";";
        return $this->_bd->ejecutar($sql);
    }
    public function leer($todo=true){
        $sql ="SELECT * FROM ". self::TABLA ;
        if (!$todo)
            $sql .=" WHERE iddetalles_camisetas=".$this->_id.";";
        $datos=$this->_bd->ejecutar($sql);
        if (!$todo)
            $this->setPropiedades($datos[0]);
        return $datos;
    }

    #Devolvemos las propiedades
    public function getId(){
        return $this->_id;
    }
    public function getPrecio(){
        return $this->_precio;
    }
    public function getStock(){
        return $this->_stock;
    }
    public function getIdcamisetas(){
        return $this->_idcamisetas;
    }
    public function getIdmodelo_talla(){
        return $this->_idmodelo_talla;
    }
    public function getIdmodelo_seleccion(){
        return $this->_idmodelo_seleccion;
    }
    public function getIdmodelo_calidad(){
        return $this->_idmodelo_calidad;
    }
    public function getIdmodelos(){
        return $this->_idmodelos;
    }
    private function setPropiedades ($registro){
        $this->_id= $registro["iddetalles_camisetas"];
        $this->_precio =$registro ["precio"];
        $this->_stock = $registro["stock"];
        $this->_idcamisetas =$registro ["idcamisetas"];
        $this->_idmodelo_talla = $registro["idmodelo_talla"];
        $this->_idmodelo_seleccion = $registro["idmodelo_seleccion"];
        $this->_idmodelo_calidad = $registro["idmodelo_calidad"];
        $this->_idmodelos = $registro["idmodelos"];
    }
}