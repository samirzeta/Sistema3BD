<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
	</head>
	<body>

		<?php 
		$arreglo = array('raul', 1, 12);
		echo $arreglo[0][1]. '<br>';


		//$zeta = ['key1' => 'samir', 'key2' => 'pepito'];

		$zeta = array('key1' => 'samir', 'key2' => 'pepito');
		echo $zeta['key1']. '<br>'. '<br>';
			echo '<pre>';
				$variable = 1;
				print_r($variable. '<br>');
				print_r('<br>');

				$semana[0] = 'lunes'. '<br>';
				$semana[1] = 'martes'. '<br>';
				$semana[2] = 'miercoles'. '<br>';
				$semana[3] = 'jueves'. '<br>';
				$semana[4] = 'viernes'. '<br>';
				$semana[5] = 'sabado'. '<br>';
				$semana[6] = 'domingo'. '<br>';

				for($i=0;$i<count($semana);$i++) {
					echo $semana[$i];
				}

			print_r('<br>');

			$cursos = array('Analisis Real', 'Matemática Básica', 'Cálculo III', 'Optimización', ' Estadistica', 'Analisis Complejo');
			print_r($cursos);
			print_r('<br>');
			print_r('El cuarto curso asignado es: '.$cursos[3]);
			print_r('<br>');

			echo count($cursos);
			print_r('<br>'. '<br>');

			$arreglo = array();
			$j = 0;

			/*
			foreach($cursos as $key) {
				$arreglo[$j] = $key;
				$j++;
			}
			print_r($arrelog);
			print_r('<br>'. '<br>');*/

			/*
			foreach($cursos as $key) {
				$arreglo[1][$j] = $key;
				$j++;
			}
			print_r($arreglo);
			print_r('<br>'. '<br>');*/

			foreach($cursos as $key) {
				$arreglo[1][$j]['subindices'] = $key;
				$j++;
			}
			print_r($arreglo);
			print_r('<br>'. '<br>');

			//ver información de los tipos de variable
			var_dump($arreglo);
			echo '</pre>';

			$Array = array(array(0 => 1),
							array(4 => 10),
							array(6 => 100)
			);
			print_r($Array);
			print_r('<br>'. '<br>');

			foreach ($Array as $k => $val) {
				if(key($val) > 5) {
					unset($Array[$k]);
				}
			}

			print_r($Array);
 		?>
	</body>
</html>

<!--<div class="form-group col-md-3">
	<label for="curso">Curso</label>
	<select type="text" id="idCurso" name="idCurso" value="" class="form-control formulario__input" placeholder=""  required>
			<?php
			/*while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
			<option value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?></option>
		<?php } ?>
	</select>
</div>-->
