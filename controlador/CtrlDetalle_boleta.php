<?php 
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php'; 
require_once MOD . DIRECTORY_SEPARATOR . 'Detalle_boleta.php'; 
/* * Clase CtrlDetalle_boleta */ 
class CtrlDetalle_boleta extends Controlador { public function index(){ 
    # Mostramos los datos 
    $detalle_boleta = new Detalle_boleta(); 
    $datosDetalle_boleta = $detalle_boleta->leer(); 
    $datos = array( 
        'titulo'=>'Detalle_boleta', 
        'encabezado'=>'Listado de Detalle_boleta', 
        'datos'=>$datosDetalle_boleta, 
    ); 
    $this->mostrarVista('detalle_boleta/mostrar.php',$datos); 
} 
public function eliminar(){ 
    if (isset($_REQUEST['id'])) {
        $detalle_boleta = new Detalle_boleta($_REQUEST['id']); 
        $detalle_boleta->eliminar(); $this->index(); 
    }
    else 
    echo "...El Id a ELIMINAR es requerido"; 
} 
public function guardarNuevo(){ 
    $detalle_boleta = new Detalle_boleta ( 
        $_POST["id"], 
        $_POST["cantidad"], 
        $_POST["precio_unitario"], 
        $_POST["subtotal"], 
        $_POST["producto"], 
        $_POST["idboletas"], 
        $_POST["iddetalles_camisetas"], 
    ); 
    $detalle_boleta->nuevo(); 
    $this->index(); 
} 
public function guardarEditar(){ 
    $detalle_boleta = new Detalle_boleta ( 
        $_POST["id"], #El id que enviamos 
        $_POST["cantidad"], 
        $_POST["precio_unitario"], 
        $_POST["subtotal"], 
        $_POST["producto"], 
        $_POST["idboletas"], 
        $_POST["iddetalles_camisetas"], 
    );
     $detalle_boleta->editar();
     $this->index();
}
public function nuevo(){ 
    #Mostramos el Formulario de Nuevo 
    $datos=array( 
        'encabezado'=>'Nuevo Detalle_boleta' 
    ); 
    $this->mostrarVista('detalle_boleta/frmNuevo.php',$datos); 
} 
public function editar(){ 
    #Mostramos el Formulario de Editar 
    if (isset($_REQUEST['id'])) { 
        $detalle_boleta = new Detalle_boleta($_REQUEST['id']); 
        $detalle_boleta->leer(false); 
        $datos = array( 
            'encabezado'=>'Editando Detalle_boleta: '. $_REQUEST['id'], 
            'detalle_boleta'=>$detalle_boleta, 
        ); 
        $this->mostrarVista('detalle_boleta/frmEditar.php',$datos); 
    } 
    else 
    echo "...El Id a EDITAR es requerido"; 
} 
}