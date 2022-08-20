 <!-- Content Header (Page header) -->
<?php 
require_once 'controller/universidad.controller.php';
include_once 'model/conexion.php';

$Universidad = new UniversidadController;	
?>


<section class="content-header">  
	<h1>
		Modulo Administracion
	</h1>
	<ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="index.php?c=Universidad">Universidad</a></li>
            <li class="active">Actualizar</li>
          </ol>
</section>
<?php
 if (!isset($_REQUEST['idUniversidad'])==''){
$Universidad= $this->Consultar($_REQUEST['idUniversidad']);
  ?>

<section class="content">
	<div class="row">
		<div class="col-sm-12 col-md-8 col-md-offset-2">
	  		<div class="box">
	    		<div class='box-header with-border'>
	      			<h3 class='box-title'><i class="fa fa-briefcase"></i> Actualizar Universidad</h3>
	    		</div>
	    		<div class="box-body">
	    			<form id="frmActualizarUniversidad" action="?c=universidad&a=Actualizar" method="post" enctype="multipart/form-data" role="form">
	    				<input type="hidden" name="idUniversidad" value="<?php echo $Universidad->__GET('idUniversidad'); ?>" /> 
					    <div class="form-group col-md-3">
					        <label for="codigo">Codigo</label>
					        <input type="text" id="codigo" name="codigo" value="<?php echo $Universidad->__GET('codigo'); ?>" class="form-control" placeholder=""  required />
					    </div>				   
					    <div class="form-group col-md-3">
					        <label for="nombre">Nombre</label>
					        <input type="text" id="nombre" name="nombre" value="<?php echo $Universidad->__GET('nombre'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					        <label for="direccion">Direccion</label>
					        <input type="text" id="direccion" name="direccion" value="<?php echo $Universidad->__GET('direccion'); ?>" class="form-control" placeholder=""  required />
					    </div>
					    <div class="form-group col-md-3">
					    	<label for="licenciado">Licenciado</label>
					        <select type="text" id="licenciado" name="licenciado" value="" class="form-control formulario__input" placeholder=""  required>
					        	<option>Seleccione</option>
					        	<option value="1">si</option>
					        	<option value="0">no</option>
					        </select>					        
					    </div>
					    <div class="form-group col-md-3">
					        <label for="cantidad_carreras">Cantidad de carreras</label>
					        <input type="text" id="cantidad_carreras"name="cantidad_carreras" value="<?php echo $Universidad->__GET('cantidad_carreras'); ?>" class="form-control" placeholder=""  required/>
					    </div>
					    
					    			    
					    <div class="form-group col-md-12">
					      <label>Activo</label>
					      <label class="radio-inline">
					          <input type="radio" name="activo" id="estado_activo" value="1" <?php if ($Universidad->__GET('activo')==1) { echo 'checked';  } ?>> SI
					      </label>
					      <label class="radio-inline">
					          <input type="radio" name="activo" id="estado_inactivo" value="0" <?php if ($Universidad->__GET('activo')==0) { echo 'checked'; }  ?>> NO
					      </label>					    
					    </div>
					  

					  <div class="col-md-12" style="margin-top:2em;">
					    <div class="col-md-6 col-sm-12">
					        
					        <button type="button" id="btnSubmit" class="btn btn-primary col-md-12 col-xs-12"><i class="fa fa-save"></i> Actualizar</button>    
					      
					    </div>
					     <div class="col-md-6 col-sm-12">

					       
					    
					        <a href="index.php?c=Universidad" class="btn btn-danger col-md-12 col-xs-12 "><i class="fa fa-times-circle"></i> Cancelar</a>
					    </div>  
					  </div>
					</form>                   
                </div>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<script>
	
	$(document).ready(function() {
		
		$("#btnSubmit").click(function(event) {

			bootbox.dialog({
	            message: "¿Estas seguro de actualizar?",
	            title: "Actualizar Universidad",
	            buttons: {
	                main: {
	                    label: "Actualizar",
	                    className: "btn-primary",
	                    callback: function() {
	                        //console.log('Eliminado al usuario');
	                        
	                              $( "#frmActualizarUniversidad" ).submit();
	                         

	                       
	                    }
	                },
	                danger: {
	                    label: "Cancelar",
	                    className: "btn-danger",
	                    callback: function() {
	                        bootbox.hideAll();
	                    }
	                }
	            }
        	}); 
		});



		$("#primer_nombre").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});
  		$("#segundo_nombre").focusout(function() {
  			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});

		$("#apellido_paterno").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});
  		$("#apellido_materno").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});
  		$("#PrimNomyApePat").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});




	});


	function PrimeraLetraMayuscula(string){
		var capitalize=string.toLowerCase();
  		return capitalize.charAt(0).toUpperCase() + capitalize.slice(1);
	}

</script>
<?php }/*--- END REQUESt*/ ?>