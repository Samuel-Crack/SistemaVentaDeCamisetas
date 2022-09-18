<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Camisetas.php'; 
/* * Clase CtrlCamisetas */ 
class CtrlCamisetas extends Controlador { public function index(){ 
    # Mostramos los datos 
    $camisetas = new Camisetas(); 
    $datosCamisetas = $camisetas->leer(); 
    $datos = array( 
        'titulo'=>'Camisetas', 
        'encabezado'=>'Listado de Camisetas', 
        'datos'=>$datosCamisetas, 
    ); 
    $this->mostrarVista('camisetas/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $camisetas = new Camisetas($_REQUEST['id']); 
        $camisetas->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $camisetas = new Camisetas ( 
        $_POST["id"], 
        $_POST["descripcion"], 
    ); 
    $camisetas->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $camisetas = new Camisetas ( 
        $_POST["id"], #El id que enviamos 
        $_POST["descripcion"], 
    );
     $camisetas->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo Camisetas' 
    ); 
    $this->mostrarVista('camisetas/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostramos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $camisetas = new Camisetas($_REQUEST['id']); 
        $camisetas->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando Camisetas: '. $_REQUEST['id'], 
            'camisetas'=>$camisetas, 
        ); 
        $this->mostrarVista('camisetas/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}