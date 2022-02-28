<?php

	include './models/moves.php';
	$move  = new Moves();

	//Si utiliza el filtro de busqueda
	if(isset($search)){
		$moves = $move->getMovesBySearch($dataSearch);
	}else{
		//Trae todos los movimientos
		$dataSearch=NULL;
		$moves =$move->getMoves();
	}

	$title="Entradas y Salidas";
	include 'toolbar.php';
?>
<div class="row">
	<div class="col text-center">
		<i class="material-icons" style="font-size: 80px;">compare_arrows</i>
	</div>
</div>
<div class="table-responsive">
		<table id="move_table" class="table-striped table-bordered table-hover display">
			<thead class="thead-dark">
				<th class="text-center">Grado</th>
				<th class="text-center">Nombres y Apellidos</th>
				<th class="text-center">Código</th>
				<th class="text-center">Unidad</th>
				<th class="text-center">Dependencia</th>
				<th class="text-center">Movimiento</th>
				<th class="text-center">Fecha Hora</th>
			</thead>
			<tbody>
				<?php

					if(count($moves)>0){

						foreach ($moves as $column =>$value) {
				?>

							<tr id="row<?php echo $value['id_user']; ?>">
								<td><?php echo $value['st_grade']; ?></td>
								<td><?php echo $value['st_name']; ?></td>
								<td><?php echo $value['st_code']; ?></td>
								<td><?php echo $value['st_unit']; ?></td>
								<td><?php echo $value['st_dependency']; ?></td>
								<td class="text-center"><?php
										if ($value['st_move']=="IN"){
											echo ("<span class='badge badge-success'>Entrada</span>");
										}else if($value['st_move']=="OUT"){
											echo ("<span class='badge badge-danger'>Salida</span>");
										} ?></td>
								<td><?php echo $value['dt_datetime']; ?></td>
							</tr>
				<?php
						}
					}else{
				?>
					<tr>
						<td colspan="7">
							<div class="alert alert-info">
								No existen registros.
							</div>
						</td>
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col">
			<div class="alert alert-success" id="msgSuccess" style="display: none;"></div>
			<div class="alert alert-danger" id="msgDanger" style="display: none;"></div>
		</div>
	</div>