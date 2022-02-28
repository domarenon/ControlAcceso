<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=codes.xls');

    include '../../models/users.php';
    $user  = new Users();
    $BarCodes = $user->exportBarCodes($_POST)

	
?>

<table border="1">
	<tr >
		<th style="background-color:#FFA860;">Grado</th>
		<th style="background-color:#FFA860;">Nombre y Apellido</th>
        <th style="background-color:#FFA860;">Codigo</th>
        <th style="background-color:#FFA860;">Unidad</th>
        <th style="background-color:#FFA860;">Dependencia</th>
        <th style="background-color:#FFA860;">Bar Code</th>
        
	</tr>
	<?php
        if($BarCodes){
	    	foreach ($BarCodes as $column =>$value) {
			    ?>
				    <tr>
				    	<td><?php echo $value['st_grade']; ?></td>
					    <td><?php echo $value['st_name']; ?></td>
                        <td><?php echo $value['st_code']; ?></td>
                        <td><?php echo $value['st_unit']; ?></td>
                        <td><?php echo $value['st_dependency']; ?></td>
                        <td>
                            <svg id="ean-13"></svg>
                            <script>
                            var st_code_fixed = get_codebar_string(<?php echo $st_code; ?>);
                              JsBarcode("#ean-13",st_code_fixed)</script>


                        </td>
			    	</tr>	

			    <?php
		    }
        }

	?>
</table>