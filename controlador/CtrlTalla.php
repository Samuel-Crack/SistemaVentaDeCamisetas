<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Talla.php'; 
/* * Clase CtrlTalla */ 
class CtrlTalla extends Controlador { public function index(){ 
    # Mostramos los datos 
    $talla = new Talla(); 
    $datosTalla = $talla->leer(); 
    $datos = array( 
        'titulo'=>'Talla', 
        'encabezado'=>'Listado de Talla', 
        'datos'=>$datosTalla, 
    ); 
    $this->mostrarVista('talla/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $talla = new Talla($_REQUEST['id']); 
        $talla->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $talla = new Talla ( 
        $_POST["id"], 
        $_POST["talla"], 
    ); 
    $talla->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $talla = new Talla ( 
        $_POST["id"], #El id que enviamos 
        $_POST["talla"], 
    );
     $talla->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo Talla' 
    ); 
    $this->mostrarVista('talla/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostramos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $talla = new Talla($_REQUEST['id']); 
        $talla->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando Talla: '. $_REQUEST['id'], 
            'talla'=>$talla, 
        ); 
        $this->mostrarVista('talla/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}