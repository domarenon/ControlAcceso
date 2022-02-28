<?php
	include './models/users.php';
	$user  = new Users();
	$id_user		  = '';
	$st_grade         = '';
	$st_name          = '';
	$st_code          = '';
	$st_unit          = '';
	$st_dependency    = '';
	$im_profilepic    = '';

	$user_list = $user->getUserList();

	//Si utiliza el filtro de busqueda
	if(isset($search)){
		$users = $user->getUserByCode($dataSearch);
		if($users){
			$id_user		=$users[0]['id_user'];
			$st_grade       =$users[0]['st_grade'];
			$st_name        =$users[0]['st_name'];
			$st_code        =$users[0]['st_code'];
			$st_unit        =$users[0]['st_unit'];
			$st_dependency  =$users[0]['st_dependency'];
			$im_profilepic  =$users[0]['im_profilepic'];
		}
	}else{
		$dataSearch=NULL;
	}
	include 'toolbar.php';
?>
<div class="row" style="padding-top:15px;">
	<div class="col">
		<form action="./index.php?page=new_move" method="post" accept-charset="utf-8" class="form-inline">
			<div hidden class="form-group mx-sm-3 mb-2">
    			<input type="text" class="form-control" name="dataSearch" autofocus required placeholder="Buscar" value="<?php echo $dataSearch;  ?>">
  			</div>
			  <button hidden type="submit" name="btnSearch" class="btn btn-primary mb-2">Buscar</button>
			  


			  <script type="text/javascript">
				
				var sound = new Audio("./misc/sonido/barcode.wav");
				$(document).ready(function(){
				
				barcode.config.start = 0.1;
				barcode.config.end = 0.9;
				barcode.config.video = '#barcodevideo';
				barcode.config.canvas = '#barcodecanvas';
				barcode.config.canvasg = '#barcodecanvasg';
				
				barcode.setHandler(function(barcode){
					var barcodef=+(barcode.substring(0,barcode.length - 1));
					$('#result').html(barcodef);
				})
				barcode.init();
				
				$('#result').bind('DOMSubtreeModified', function(e){

					sound.play();
					
					$("input[name='dataSearch']").val($('#result').text())
					$("button[name='btnSearch']").click()
				});

				});
			</script>
			
		</form>
	</div>
</div>
<form action="./controllers/moves_controller.php" method="POST">
<div class="row">
	<div class="col-md-12">
	  <div class="form-group">
	    <!--<img class="profile_pict" src="./misc/img/<?php echo $im_profilepic ? $im_profilepic : 'default-user.jpg'; ?>"></img>
		<input type="text" class="form-control" hidden id="im_profilepic" name="im_profilepic" value="<?php echo $im_profilepic ? $im_profilepic : 'default-user.jpg'; ?>" required>
		-->
		<div id="barcode">
		<video id="barcodevideo" autoplay></video>
		<canvas id="barcodecanvasg"></canvas>
		</div>

		<canvas id="barcodecanvas"></canvas>
		<div id="result" name="dataResult"></div>
		<div style="text-align:center">
		<select id="select_user" class="select_chosen">
				<option value=""> Seleccionar usuario </option>
				<?php 
					
					foreach ($user_list as $row)
					{
						if ($row['id_user'] == $dataSearch){
							echo "<option value='". $row['st_code'] ."' selected>". $row['st_name'] ."</option>";
						}else{
							echo "<option value='". $row['st_code'] ."'>". $row['st_name'] ."</option>";
						}
					}
					
					
				?>
			</select>
			</div>
	  </div>
	  
	</div>
	
  </div>
  <div class="row">
	<div class="col-md-6">
	  <div class="form-group">
		<label for="st_grade">Grado</label>
		<input type="text" class="form-control" id="st_grade" name="st_grade" autofocus placeholder="Grado"  readonly value="<?php echo $st_grade; ?>">
	  </div>
	</div>
	<div class="col-md-6">
	  <div class="form-group">
  	    <label for="st_name">Apellidos y Nombre</label>
        <input type="text" class="form-control" id="st_name" name="st_name" autofocus placeholder="Apellidos y Nombre"  readonly value="<?php echo $st_name; ?>">
      </div>
	</div>
  </div>
  <div class="row">
	<div class="col-md-6">
	  <div class="form-group">
		<label for="st_code">Código</label>
		<input type="text" class="form-control" id="st_code" name="st_code"  autofocus placeholder="Código" readonly value="<?php echo $st_code; ?>">
	  </div>
	</div>
	<div class="col-md-6">
	  <div class="form-group">
  	    <label for="st_unit">Unidad</label>
        <input type="text" class="form-control" id="st_unit" name="st_unit" autofocus placeholder="Unidad"  readonly value="<?php echo $st_unit; ?>">
      </div>
	</div>
  </div>
	
  <div class="row">
	<div class="col-md-6">
		<div class="form-group">
		<label for="st_dependency">Dependencia</label>
		<input type="text" class="form-control" id="st_dependency" name="st_dependency" placeholder="Dependencia"  readonly value="<?php echo $st_dependency; ?>">
		</div>
	</div>
	<div class="col-md-6">
    <div class="form-group">
  	  <label for="st_move">Movimiento</label>
		<br/>
	  <input type="checkbox" id="toggle_move" data-toggle="toggle" data-on="Salida" data-off="Entrada" data-onstyle="danger" data-offstyle="success" onchange="changeMove()">
	  <input type="text" class="form-control" id="st_move" name= "st_move" hidden value="IN">
    </div>
  </div>
  </div>
  <input type="text" class="form-control" id="id_user" name= "id_user" hidden value="<?php echo $id_user ?>">
  <div class="form-group text-center">
  	<input id="new_move" type="submit" name="create" value="Registrar" disabled class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				El movimiento ha sido ingresado con éxito.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al realizar el ingreso.
			</div>
	<?php
  		}
  	?>
  </div>
</form>