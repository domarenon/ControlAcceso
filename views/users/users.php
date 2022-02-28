<?php

	include './models/users.php';
	$user  = new Users();

	//Si utiliza el filtro de busqueda
	if(isset($search)){
		$users = $user->getUsersBySearch($dataSearch);
	}else{
		//Trae todos los usuarios
		$dataSearch=NULL;
		$users =$user->getUsers();
	}

	$title="Listado de Usuarios";
	include 'toolbar.php';
?>
<div class="row">
	<div class="col text-center">
		<i class="material-icons" style="font-size: 80px;">people</i>
	</div>
</div>
<div class="table-responsive">
		<table id="user_table" class="table-striped table-bordered table-hover display">
			<thead class="thead-dark">
				<th class="text-center">Grado</th>
				<th class="text-center">Nombres y Apellidos</th>
				<th class="text-center">Código</th>
				<th class="text-center">Celular</th>
				<th class="text-center">Unidad</th>
				<th class="text-center">Dependencia</th>
				<th></th>
				<th></th>
			</thead>
			<tbody>
				<?php

					if(count($users)>0){

						foreach ($users as $column =>$value) {
				?>

							<tr id="row<?php echo $value['id_user']; ?>">
								<td><?php echo $value['st_grade']; ?></td>
								<td><?php echo $value['st_name']; ?></td>
								<td><?php echo $value['st_code']; ?></td>
								<td><?php echo $value['st_phone']; ?></td>
								<td><?php echo $value['st_unit']; ?></td>
								<td><?php echo $value['st_dependency']; ?></td>
								<td class="text-center">
									<a href="./index.php?page=edit&id=<?php echo $value['id_user'] ?>" title="Editar">
										<i class="material-icons btn_edit">edit</i>
									</a>
								</td>
								<td class="text-center">
									<a href="#" onclick="btnDeleteUser(<?php echo $value['id_user'] ?>)" id="btnDeleteUser" title="Borrar">
										<i class="material-icons btn_delete">delete_forever</i>
									</a>
								</td>
							</tr>
				<?php
						}
					}else{
				?>
					<tr>
						<td colspan="7">
							<div class="alert alert-info">
								No se encontraron usuarios.
							</div>
						</td>
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>

	<!-- PRINT ALL BAR CODES-->
	<!--
	<p>
	<div class="row">
		<div class="col">
			<div class="alert alert-success" id="msgSuccess" style="display: none;"></div>
			<div class="alert alert-danger" id="msgDanger" style="display: none;"></div>
		</div>
	</div>
	<div class="row">
	<?php
		foreach ($users as $column =>$value) {
	?>
	
		<div class="col-3 badge" style="border: solid 1px">
		<p style="font-size: 12px; text-align:center;"><?php echo $value['st_grade'] ?> <?php echo $value['st_name'] ?></p>
		<svg id="code_<?php echo $value['id_user'] ?>" ></svg></div>
		<script>
		var st_code_fixed = get_codebar_string(<?php echo $value['st_code'] ?>);
         JsBarcode("#code_<?php echo $value['id_user'] ?>",st_code_fixed);
		 </script>
	<?php
		}
	?>
	
	</div>

	-->
	<!-- PRINT ALL BAR CODES -->

<script type="text/javascript">

	function btnDeleteUser(id){
		if(confirm("Esta seguro de eliminar el usuario?")){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200) {
				var response   = JSON.parse(this.responseText);
				var msgSuccess = document.getElementById('msgSuccess');
				var msgDanger   = document.getElementById('msgDanger');
				if(response.success){
					// alert("El usuario ha sido borrado de la base de datos.");
					msgSuccess.style.display = 'inherit';
					msgSuccess.innerHTML     = 'El usuario ha sido borrado de la base de datos.';
					msgDanger.style.display  = 'none';

					//Elimina el registro de la tabla
					var row    = document.getElementById('row'+id);
					var parent = row.parentElement;
        			parent.removeChild(row);

					// location.reload(true);
				}else if(response.error){
					// alert("No se ha podido eliminar el registro");
					msgDanger.style.display  = 'inherit';
					msgDanger.innerHTML      = 'No se ha podido eliminar el registro';
					msgSuccess.style.display = 'none';
				}
			}
			};
			xhttp.open("GET", "./controllers/users_controller.php?delete=true&id="+id, true);
			xhttp.send();
		}
	}


</script>