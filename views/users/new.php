<?php
	include 'toolbar.php';
?>
<form action="./controllers/users_controller.php" method="POST">
  <div class="row">
	<div class="col-md-12">
	  <div class="form-group"><!--
	    <div class="cont_pic">
		  <img class="profile_pict" src="./misc/img/default-user.jpg"></img>
		  <div class="hoverimg">
		    <button type="button" class="btn btn-default hovertext">Cambiar</button>
		  </div>
		</div>-->
		<input type="text" class="form-control" hidden id="im_profilepic" name="im_profilepic" value="default-user.jpg" required>
      </div>
	</div>
  </div>
  <div class="row">
	<div class="col-md-6">
	  <div class="form-group">
		<label for="st_grade">Grado</label>
		<input type="text" class="form-control" id="st_grade" name="st_grade" autofocus placeholder="Grado" required>
	  </div>
	</div>
	<div class="col-md-6">
	  <div class="form-group">
  	    <label for="st_name">Apellidos y Nombre</label>
        <input type="text" class="form-control" id="st_name" name="st_name" autofocus placeholder="Apellidos y Nombre" required>
      </div>
	</div>
  </div>
  <div class="row">
	<div class="col-md-6">
	  <div class="form-group">
		<label for="st_code">Código</label>
		<input type="text" class="form-control" id="st_code" name="st_code" autofocus placeholder="Código" required>
	  </div>
	</div>
	<div class="col-md-6">
	  <div class="form-group">
  	    <label for="st_mail">Correo</label>
        <input type="email" class="form-control" id="st_mail" name="st_mail" autofocus placeholder="Correo" >
      </div>
	</div>
  </div>
  <div class="row">
	<div class="col-md-6">
	  <div class="form-group">
		<label for="st_phone">Teléfono</label>
		<input type="text" class="form-control" id="st_phone" name="st_phone" autofocus placeholder="Teléfono" >
	  </div>
	</div>
	<div class="col-md-6">
	  <div class="form-group">
  	    <label for="st_unit">Unidad</label>
<br/>

             <select id="st_unit" class="select_chosen" name="st_unit" required>
			<option value=""> -- </option>
                        <option value="BN5">Base Naval ARC "ORINOQUIA"</option>
                        <option value="BRIM5">Brigada I.M. No 5</option>
                        <option value="BFIM51">Batallón Fluvial I.M. No. 51</option>
                        <option value="BFIM52">Batallón Fluvial I.M. No. 52</option>
                        <option value="BFIM50">Batallón Fluvial I.M. No. 50</option>
                        <option value="FFO">Flotilla Fluvial del Oriente</option>
                        <option value="FNO">Fuerza Naval del Oriente</option>	
                        <option value="EGCAR">Estación de Guardacostas</option>
                        <option value="ESM4030">Entidad Sanidad Militar 4030</option>		
             </select>



        <!--<input type="text" class="form-control" id="st_unit" name="st_unit" autofocus placeholder="Unidad" required>-->







      </div>
	</div>
  </div>
  <div class="row">
  <div class="col-md-6">
    <div class="form-group">
  	  <label for="st_dependency">Dependencia</label>
      <input type="text" class="form-control" id="st_dependency" name="st_dependency" placeholder="Dependencia" required>
    </div>
  </div>
  </div>
  <div class="form-group text-center">
  	<input type="submit" name="create" value="Crear" class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				El usuario ha sido creado.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al crear el usario, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
</form>