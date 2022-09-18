<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';

require_once MOD . DIRECTORY_SEPARATOR . 'Modelos.php';

/*
* Clase CtrlModelos
*/
class CtrlModelos extends Controlador {
    
    public function index(){
        # Mostramos los datos
        $modelos = new Modelos();
        $datosModelos = $modelos->leer();
        $datos = array(
                'titulo'=>'Modelos',
                'encabezado'=>'Listado de Modelos',
                'datos'=>$datosModelos,
            );
        $this->mostrarVista('modelos/mostrar.php',$datos);
    }
    public function eliminar(){
        if (isset($_REQUEST['id'])) {
            $modelos = new Modelos($_REQUEST['id']);
            $modelos->eliminar();
            $this->index();
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function guardarNuevo(){
        $modelos = new Modelos (
                $_POST["id"],
                $_POST["idmarca"],
                $_POST["modelo"],
 
                );
        $modelos->nuevo();

        $this->index();
    }
    public function guardarEditar(){
        $modelos = new Modelos (
                $_POST["id"],    #El id que enviamos
                $_POST["idmarca"],
                $_POST["modelo"],

                );
        $modelos->editar();

        $this->index();
    }
    public function nuevo(){
        #Mostramos el Formulario de Nuevo
        $datos=array(
            'encabezado'=>'Nuevo Modelos'
            );
         $this->mostrarVista('modelos/frmNuevo.php',$datos);
    }
    public function editar(){
        #Mostramos el Formulario de Editar
        if (isset($_REQUEST['id'])) {
            $modelos = new Modelos($_REQUEST['id']);
            $modelos->leer(false);
            $datos = array(
                'encabezado'=>'Editando Modelos: '. $_REQUEST['id'],
                'modelos'=>$modelos, 
               );
            $this->mostrarVista('modelos/frmEditar.php',$datos);
        } else {
            echo "...El Id a Editar es requerido";
        }
        
    }
}