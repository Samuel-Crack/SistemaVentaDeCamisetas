<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';

require_once MOD . DIRECTORY_SEPARATOR . 'Modelo_talla.php';

/*
* Clase CtrlModelo_talla
*/
class CtrlModelo_talla extends Controlador {
    
    public function index(){
        # Mostramos los datos
        $modelo_talla = new Modelo_talla();
        $datosModelo_talla = $modelo_talla->leer();
        $datos = array(
                'titulo'=>'Modelo_talla',
                'encabezado'=>'Listado de Modelo_talla',
                'datos'=>$datosModelo_talla,
            );
        $this->mostrarVista('modelo_talla/mostrar.php',$datos);
    }
    public function eliminar(){
        if (isset($_REQUEST['id'])) {
            $modelo_talla = new Modelo_talla($_REQUEST['id']);
            $modelo_talla->eliminar();
            $this->index();
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function guardarNuevo(){
        $modelo_talla = new Modelo_talla (
                $_POST["id"],
                $_POST["idtalla"],
 
                );
        $modelo_talla->nuevo();

        $this->index();
    }
    public function guardarEditar(){
        $modelo_talla = new Modelo_talla (
                $_POST["id"],    #El id que enviamos
                $_POST["idtalla"],

                );
        $modelo_talla->editar();

        $this->index();
    }
    public function nuevo(){
        #Mostramos el Formulario de Nuevo
        $datos=array(
            'encabezado'=>'Nuevo Modelo_talla'
            );
         $this->mostrarVista('modelo_talla/frmNuevo.php',$datos);
    }
    public function editar(){
        #Mostramos el Formulario de Editar
        if (isset($_REQUEST['id'])) {
            $modelo_talla = new Modelo_talla($_REQUEST['id']);
            $modelo_talla->leer(false);
            $datos = array(
                'encabezado'=>'Editando Modelo_talla: '. $_REQUEST['id'],
                'modelo_talla'=>$modelo_talla, 
               );
            $this->mostrarVista('modelo_talla/frmEditar.php',$datos);
        } else {
            echo "...El Id a Editar es requerido";
        }
        
    }
}