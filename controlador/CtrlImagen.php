<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';

require_once MOD . DIRECTORY_SEPARATOR . 'Imagen.php';

/*
* Clase CtrlImagen
*/
class CtrlImagen extends Controlador {
    
    public function index(){
        # Mostramos los datos
        $imagen = new Imagen();
        $datosImagen = $imagen->leer();
        $datos = array(
                'titulo'=>'Imagen',
                'encabezado'=>'Listado de Imagen',
                'datos'=>$datosImagen,
            );
        $this->mostrarVista('imagen/mostrar.php',$datos);
    }
    public function eliminar(){
        if (isset($_REQUEST['id'])) {
            $imagen = new Imagen($_REQUEST['id']);
            $imagen->eliminar();
            $this->index();
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function guardarNuevo(){
        $imagen = new Imagen (
                $_POST["id"],
                $_POST["idmodelo_seleccion"],
                $_POST["descripcion"],
                $_POST["url"],
 
                );
        $imagen->nuevo();

        $this->index();
    }
    public function guardarEditar(){
        $imagen = new Imagen (
                $_POST["id"],    #El id que enviamos
                $_POST["idmodelo_seleccion"],
                $_POST["descripcion"],
                $_POST["url"],

                );
        $imagen->editar();

        $this->index();
    }
    public function nuevo(){
        #Mostramos el Formulario de Nuevo
        $datos=array(
            'encabezado'=>'Nuevo Imagen'
            );
         $this->mostrarVista('imagen/frmNuevo.php',$datos);
    }
    public function editar(){
        #Mostramos el Formulario de Editar
        if (isset($_REQUEST['id'])) {
            $imagen = new Imagen($_REQUEST['id']);
            $imagen->leer(false);
            $datos = array(
                'encabezado'=>'Editando Imagen: '. $_REQUEST['id'],
                'imagen'=>$imagen, 
               );
            $this->mostrarVista('imagen/frmEditar.php',$datos);
        } else {
            echo "...El Id a Editar es requerido";
        }
        
    }
}