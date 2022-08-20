
<!-- Content Header (Page header) -->
<?php 
require_once 'controller/alumno.controller.php';
include_once 'model/conexion.php';

$bd;

$this->bd = new Conexion();
$stmt = $this->bd->prepare("SELECT * FROM curso where eliminado=0 ORDER BY nombre ASC;" );
$stmt->execute();  

$alumno = new AlumnoController;
 ?>

<section class="content-header">  
	<h1>
		Modulo Administracion
	</h1>
	<ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="index.php?c=Origen">Origen de Información</a></li>
            <li class="active">Registrar</li>
          </ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-sm-12 col-md-8 col-md-offset-2">
	  		<div class="box">
	    		<div class='box-header with-border'>
	      			<h3 class='box-title'><i class="fa fa-briefcase"></i> Registrar Alumno</h3>
	    		</div>
	    		<div class="box-body">
	    			<form id="frmRegistrarAlumno"  action="?c=Alumno&a=Registrar" method="post" enctype="multipart/form-data" role="form">	   				

					    <div class="form-group col-md-3 formulario__grupo formulario__grupo-correcto" id="grupo__primer_nombre" >
					        <label for="primer_nombre" class="formulario__label">Primer Nombre</label>
					        	<div class="formulario__grupo-input">
					        		<input type="text" id="primer_nombre" name="primer_nombre" value="" class="form-control  formulario__input" placeholder=""  required />
					        	</div> 	
					    </div>
					   
					    <div class="form-group col-md-3">
					        <label for="segundo_nombre">Apellido Paterno</label>
					        <input type="text" id="apellido_paterno" name="apellido_paterno" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>

					    <div class="form-group col-md-3">
					        <label for="apellido_materno">Apellido Materno</label>
					        <input type="text" id="apellido_materno"name="apellido_materno" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>

					    

					    <div class="form-group col-md-3">
					        <label for="dni">DNI</label>
					        <input type="text" id="dni" name="dni" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>

					    <div class="form-group col-md-3">
					        <label for="fecha_nacimiento">Fecha Nacimiento</label>
					        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>

					    <div class="form-group col-md-3">
					    	<label for="curso">Curso</label>
					        <select type="text" id="curso" name="curso" value="" class="form-control formulario__input" placeholder=""  required>
					        	<option>Seleccione curso</option>
					        	<?php 
					        		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
					        		<option value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?></option>
					        	<?php } ?>
					        </select>					        
					    </div>
					    
					    <div class="form-group col-md-3">
					        <label for="carrera">Carrera</label>
					        <input type="text" id="carrera" name="carrera" value="" class="form-control formulario__input" placeholder=""  required />
					    </div>

					  	<div class="col-md-12" style="margin-top:2em;">
					  		<div class="col-md-6 col-sm-12">
					        <button type="button" id="btnSubmit" class="btn btn-primary col-md-12 col-xs-12" disable><i class="fa fa-save"></i> Registrar</button>    		      
					    </div>
					     <div class="col-md-6 col-sm-12">		    
					        <a href="index.php?c=Alumno" class="btn btn-danger col-md-12 col-xs-12 "><i class="fa fa-times-circle"></i> Cancelar</a>
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
	            message: "¿Estas seguro de Registrar?",
	            title: "Registrar Alumno",
	            buttons: {
	                main: {
	                    label: "Registrar",
	                    className: "btn-primary",
	                    callback: function() {
	                        //console.log('Eliminado al usuario');
	                        
	                              $( "#frmRegistrarAlumno" ).submit();
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

		$("#apellido_paterno").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});
  		$("#apellido_materno").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});
  		$("#PrimNomyApePat").focusout(function() {
			$(this).val(PrimeraLetraMayuscula($(this).val()))
  		});



		$( "#Area_id" ).change(function ()
 		{
			Area_id = $("#Area_id").val();
			//alert(Area_id);

			ListarCargoxArea_id(Area_id)

		});

	});

	function PrimeraLetraMayuscula(string){
		var capitalize=string.toLowerCase();
  		return capitalize.charAt(0).toUpperCase() + capitalize.slice(1);
	}

	function ListarCargoxArea_id(Area_id){
	    $.ajax({
	      	type: "POST",
	      	url: 'index.php?c=Cargo&a=ListarxArea_id_ajax',
	      	data:{
	      		Area_id:Area_id
	      	},
	      	//sync:false,           
	      	success: function(data) {
	        	//console.log(data);
	          	var html = "";
	          	$("#Cargo_id").find("option").remove();                 
	          	$.each(data, function(index, value) { 
	            	html += '<option value="'+value.idCargo+'">'+value.nombre+'</option>';
	          	});
	        	$("#Cargo_id").append('<option value="0">-- Seleccionar Cargo --</option>');        
	          	$("#Cargo_id").append(html);  
	        },
	      	dataType: 'json'
	  	});
	}

</script>

