<div class="container is-fluid mb-6">
	<h1 class="title">Vehiculos</h1>
	<h2 class="subtitle">Nuevo Vehiculo</h2>
</div>
<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./php/producto_guardar.php" method="POST" class="FormularioAjaxj" autocomplete="off" >
	<div id="smsvehiculo"></div>
	<div class="row infopropi" >

		<h1 class="title is-1">Informaci&oacute;n Propietario </h1>
			<div class="columns">
				<div class="column">
					<div class="control">
						<label>Numero de Cedula</label>
						<input class="input" type="number" name="cedulapro" id="cedulapro" maxlength="40" required >
					</div>
				</div>
				<div class="column">
					<div class="control">
						<label>Primer Nombre</label>
						<input class="input" type="text" name="pnombrepro" id="pnombrepro" maxlength="40" required >
					</div>
				</div>
			</div>
			<div class="columns">
				<div class="column">
					<div class="control">
						<label>Segundo Nombre</label>
						<input class="input" type="text" name="snombrepro" id="snombrepro" required >
					</div>
				</div>
				<div class="column">
					<div class="control">
						<label>Apellidos</label>
						<input class="input" type="text" name="apellidospro" id="apellidospro" required >
					</div>
				</div>
			</div>
			<div class="columns">
				<div class="column">
					<div class="control">
						<label>Direcci&oacute;n</label>
						<input class="input" type="text" name="direccionpro" id="direccionpro" maxlength="50" required >
					</div>
				</div>
				<div class="column">
					<div class="control">
						<label>Telefono</label>
						<input class="input" type="number" name="telefonopro" id="telefonopro" required >
					</div>
				</div>
			</div>
			<div class="columns">
				<div class="column">
					<div class="control">
						<label>Ciudad</label>
						<input class="input" type="text" name="ciudadpro" id="ciudadpro" required >
					</div>
				</div>
			</div>

			<h1 class="title is-1">Informaci&oacute;n Conductor </h1>
			<div class="columns">
				<div class="column">
					<div class="control">
						<label>Numero de Cedula</label>
						<input class="input" type="number" name="cedulacon" id="cedulacon" maxlength="40" required >
					</div>
				</div>
				<div class="column">
					<div class="control">
						<label>Primer Nombre</label>
						<input class="input" type="text" name="pnombrecon" id="pnombrecon" maxlength="40" required >
					</div>
				</div>
			</div>
			<div class="columns">
				<div class="column">
					<div class="control">
						<label>Segundo Nombre</label>
						<input class="input" type="text" name="snombrecon" id="snombrecon" required >
					</div>
				</div>
				<div class="column">
					<div class="control">
						<label>Apellidos</label>
						<input class="input" type="text" name="apellidoscon" id="apellidoscon" required >
					</div>
				</div>
			</div>
			<div class="columns">
				<div class="column">
					<div class="control">
						<label>Direcci&oacute;n</label>
						<input class="input" type="text" name="direccioncon" id="direccioncon" maxlength="50" required >
					</div>
				</div>
				<div class="column">
					<div class="control">
						<label>Telefono</label>
						<input class="input" type="number" name="telefonocon" id="telefonocon" required >
					</div>
				</div>
			</div>
			<div class="columns">
				<div class="column">
					<div class="control">
						<label>Ciudad</label>
						<input class="input" type="text" name="ciudadcon" id="ciudadcon" required >
					</div>
				</div>
			</div>
			
		</div>

		<div class="row infovehiculo">
	
				<h1 class="title is-1">Informaci&oacute;n Veh&iacute;culo </h1>
			<div class="columns">
				<div class="column">
					<div class="control">
						<label>Placa</label>
						<input class="input" type="text" name="placav" id="placav" maxlength="40" required >
					</div>
				</div>
				<div class="column">
					<div class="control">
						<label>Color</label>
						<input class="input" type="text" name="colorv" id="colorv" maxlength="40" required >
					</div>
				</div>
			</div>
			<div class="columns">
				<div class="column">
					<div class="control">
						<label>Marca</label>
						<input class="input" type="text" name="marcav" id="marcav" required >
					</div>
				</div>
				<div class="column">
					<div class="control">
						<label>Tipo Vehiculo</label>
						<select   class="input" name="tipov" id="tipov">
						<option value="">Seleccione</option>
				
						<?php 
							require_once "./php/main.php";
							$db = conexion();
							$cadenacot = "SELECT codigo,descripcion from tipo_vehiculo where estado=1 ORDER BY codigo";
																					// $cadenacot = "select * from smt_razon_cierre where otras_acciones = 1 and activo = 1 order by descripcion";
							$_SESSION['SQL_tipo'] = $cadenacot;
							$datos = $db->query($cadenacot);
							$datos = $datos->fetchAll();
							foreach($datos as $rows) {
								//$i++;
								//print_r($datos);
								echo '<option value="' . trim($rows["codigo"]) . '">' . trim($rows["descripcion"]) . '</option>';
							}
						?>
						</select>
					</div>
				</div>
			</div>
			
		
			<p class="has-text-centered">
				<button type="submit" class="button is-info is-rounded">Guardar</button>
			</p>

		</div>
	</form>
</div>
<script src="./js/gestion_vehiculos.js?fec=<?php echo date('Ydh');?>"></script>
