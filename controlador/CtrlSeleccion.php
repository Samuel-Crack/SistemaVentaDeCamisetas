<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Seleccion.php'; 
/* * Clase CtrlSeleccion */ 
class CtrlSeleccion extends Controlador { public function index(){ 
    # Mostramos los datos 
    $seleccion = new Seleccion(); 
    $datosSeleccion = $seleccion->leer(); 
    $datos = array( 
        'titulo'=>'Seleccion', 
        'encabezado'=>'Listado de Seleccion', 
        'datos'=>$datosSeleccion, 
    ); 
    $this->mostrarVista('seleccion/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $seleccion = new Seleccion($_REQUEST['id']); 
        $seleccion->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $seleccion = new Seleccion ( 
        $_POST["id"], 
        $_POST["seleccion"], 
    ); 
    $seleccion->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $seleccion = new Seleccion ( 
        $_POST["id"], #El id que enviamos 
        $_POST["seleccion"], 
    );
     $seleccion->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo Seleccion' 
    ); 
    $this->mostrarVista('seleccion/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostramos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $seleccion = new Seleccion($_REQUEST['id']); 
        $seleccion->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando Seleccion: '. $_REQUEST['id'], 
            'seleccion'=>$seleccion, 
        ); 
        $this->mostrarVista('seleccion/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}