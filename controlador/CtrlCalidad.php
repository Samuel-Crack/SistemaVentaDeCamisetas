<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Calidad.php'; 
/* * Clase CtrlCalidad */ 
class CtrlCalidad extends Controlador { public function index(){ 
    # Mostramos los datos 
    $calidad = new Calidad(); 
    $datosCalidad = $calidad->leer(); 
    $datos = array( 
        'titulo'=>'Calidad', 
        'encabezado'=>'Listado de Calidad', 
        'datos'=>$datosCalidad, 
    ); 
    $this->mostrarVista('calidad/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $calidad = new Calidad($_REQUEST['id']); 
        $calidad->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $calidad = new Calidad ( 
        $_POST["id"], 
        $_POST["calidad"], 
    ); 
    $calidad->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $calidad = new Calidad ( 
        $_POST["id"], #El id que enviamos 
        $_POST["calidad"], 
    );
     $calidad->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo Calidad' 
    ); 
    $this->mostrarVista('calidad/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostramos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $calidad = new Calidad($_REQUEST['id']); 
        $calidad->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando Calidad: '. $_REQUEST['id'], 
            'calidad'=>$calidad, 
        ); 
        $this->mostrarVista('calidad/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}