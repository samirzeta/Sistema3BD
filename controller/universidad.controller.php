<?php
require_once 'model/universidad.model.php';
require_once 'entity/universidad.entity.php';
require_once 'includes.controller.php';

class universidadController extends IncludesController{    
  
    private $model;
    
    public function __CONSTRUCT()
    {
        $this->model = new universidadModel();
    }
    /**==========================Vistas=======================================*/
    public function Index(){        
        require_once 'view/header.php';
        require_once 'view/administracion/universidad/index.php';
        require_once 'view/footer.php';       
    }

    public function v_Actualizar(){        
        require_once 'view/header.php';
        require_once 'view/administracion/universidad/actualizar.php';
        require_once 'view/footer.php';       
    }

    public function v_Registrar(){        
        require_once 'view/header.php';
        require_once 'view/administracion/universidad/registrar.php';
        require_once 'view/footer.php';       
    }


    /**=======================================================================*/   
    public function Listar()
    {
        $universidads = $this->model->Listar();
        return $universidads;
    }

    public function Consultar($idUniversidad)
    {
        $universidad = new universidad();
        $universidad->__SET('idUniversidad',$idUniversidad);

        $consulta = $this->model->Consultar($universidad);
        return $consulta;
    }

    public function Registrar(){
        
        $universidad = new Universidad();
        
        $universidad->__SET('codigo',$_REQUEST['codigo']);
        $universidad->__SET('nombre',$_REQUEST['nombre']);
        $universidad->__SET('direccion',$_REQUEST['direccion']);
                            
        $universidad->__SET('licenciado',$_REQUEST['licenciado']);
        $universidad->__SET('cantidad_carreras',$_REQUEST['cantidad_carreras']);
        /*Validar Documento / Si no existe Registrar / Mostrar un mensaje que indique que el dni ya fue registrado*/
        $registrar_universidad = $this->model->Registrar($universidad);  
         //echo $registrar_persona;
        if($registrar_universidad=='error'){
            header('Location: index.php?c=Universidad&a=v_Registrar');
            echo 'No se Ha Podido Registrar';
         }else{
            echo 'Registrado Correctamente';
            header('Location: index.php?c=Universidad');
         }
    }

    public function Actualizar(){
        $universidad = new Universidad();
        $universidad->__SET('idUniversidad',$_REQUEST['idUniversidad']);
        $universidad->__SET('codigo',$_REQUEST['codigo']);
        $universidad->__SET('nombre',$_REQUEST['nombre']);
        $universidad->__SET('direccion',$_REQUEST['direccion']);
                            
        $universidad->__SET('licenciado',$_REQUEST['licenciado']);
        $universidad->__SET('cantidad_carreras',$_REQUEST['cantidad_carreras']);
        $universidad->__SET('activo',$_REQUEST['activo']);
        $universidad->__SET('modificado_por',$_SESSION['Usuario_Actual']);
        $actualizar_universidad = $this->model->Actualizar($universidad);         
        if($actualizar_universidad=='error'){
            header('Location: index.php?c=Universidad&a=v_Actualizar&idUniversidad='. $universidad->__GET('idUniversidad'));
            echo 'No se Ha Podido Actualizar';
        }else{
            echo 'Actualizado Correctamente';
            header('Location: index.php?c=Universidad');
         }
    }

    public function Eliminar(){
        $universidad = new Universidad();
        $universidad->__SET('idUniversidad',$_REQUEST['idUniversidad']);      
        $universidad->__SET('modificado_por',$_SESSION['Usuario_Actual']);
        $universidad->__SET('eliminado',1); 
        $eliminar_universidad = $this->model->Eliminar($universidad);  
        if($eliminar_universidad=='error'){
            echo 'No se Ha Podido Eliminar la universidad';
            header('Location: index.php?c=Universidad');            
        }else{
            echo 'Origen Eliminado Correctamente';
            header('Location: index.php?c=Universidad');
        }
    }
}