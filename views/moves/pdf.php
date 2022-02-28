<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=usuarios.xls');

    include '../../models/moves.php';
    $move  = new Moves();
    $moves = $move->exportMoves($_POST)

	
?>

<table border="1">
	<tr >
		<th style="background-color:#FFA860;">Grado</th>
		<th style="background-color:#FFA860;">Nombre y Apellido</th>
        <th style="background-color:#FFA860;">Codigo</th>
        <th style="background-color:#FFA860;">Unidad</th>
        <th style="background-color:#FFA860;">Dependencia</th>
        <th style="background-color:#FFA860;">Movimiento</th>
        <th style="background-color:#FFA860;">Fecha y hora</th>
        
	</tr>
	<?php
		foreach ($moves as $column =>$value) {
			?>
				<tr>
					<td><?php echo $value['st_grade']; ?></td>
					<td><?php echo $value['st_name']; ?></td>
                    <td><?php echo $value['st_code']; ?></td>
                    <td><?php echo $value['st_unit']; ?></td>
                    <td><?php echo $value['st_dependency']; ?></td>
                    <td><?php if ($value['st_move']=="IN"){
											echo ("<span style='color:green;'>Entrada</span>");
										}else if($value['st_move']=="OUT"){
											echo ("<span style='color:red;'>Salida</span>");
										} ?></td>
                    <td><?php echo $value['dt_datetime']; ?></td>
				</tr>	

			<?php
		}

	?>
</table>