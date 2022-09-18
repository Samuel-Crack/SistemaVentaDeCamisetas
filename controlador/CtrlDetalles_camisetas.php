<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';

require_once MOD . DIRECTORY_SEPARATOR . 'Detalles_camisetas.php';

/*
* Clase CtrlDetalles_camisetas
*/
class CtrlDetalles_camisetas extends Controlador {
    
    public function index(){
        # Mostramos los datos
        $detalles_camisetas = new Detalles_camisetas();
        $datosDetalles_camisetas = $detalles_camisetas->leer();
        $datos = array(
                'titulo'=>'Detalles_camisetas',
                'encabezado'=>'Listado de Detalles_camisetas',
                'datos'=>$datosDetalles_camisetas,
            );
        $this->mostrarVista('detalles_camisetas/mostrar.php',$datos);
    }
    public function eliminar(){
        if (isset($_REQUEST['id'])) {
            $detalles_camisetas = new Detalles_camisetas($_REQUEST['id']);
            $detalles_camisetas->eliminar();
            $this->index();
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function guardarNuevo(){
        $detalles_camisetas = new Detalles_camisetas (
                $_POST["id"],
                $_POST["precio"],
                $_POST["stock"],
                $_POST["idcamisetas"],
                $_POST["idmodelo_talla"],
                $_POST["idmodelo_seleccion"],
                $_POST["idmodelo_calidad"],
                $_POST["idmodelos"],
                );
        $detalles_camisetas->nuevo();

        $this->index();
    }
    public function guardarEditar(){
        $detalles_camisetas = new Detalles_camisetas (
                $_POST["id"],    #El id que enviamos
                $_POST["precio"],
                $_POST["stock"],
                $_POST["idcamisetas"],
                $_POST["idmodelo_talla"],
                $_POST["idmodelo_seleccion"],
                $_POST["idmodelo_calidad"],
                $_POST["idmodelos"],
                );
        $detalles_camisetas->editar();

        $this->index();
    }
    public function nuevo(){
        #Mostramos el Formulario de Nuevo
        $datos=array(
            'encabezado'=>'Nuevo Detalles_camisetas'
            );
         $this->mostrarVista('detalles_camisetas/frmNuevo.php',$datos);
    }
    public function editar(){
        #Mostramos el Formulario de Editar
        if (isset($_REQUEST['id'])) {
            $detalles_camisetas = new Detalles_camisetas($_REQUEST['id']);
            $detalles_camisetas->leer(false);
            $datos = array(
                'encabezado'=>'Editando Detalles_camisetas: '. $_REQUEST['id'],
                'detalles_camisetas'=>$detalles_camisetas, 
               );
            $this->mostrarVista('detalles_camisetas/frmEditar.php',$datos);
        } else {
            echo "...El Id a Editar es requerido";
        }
        
    }
}