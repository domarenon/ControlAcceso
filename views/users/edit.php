<?php
  include './models/users.php';
  $title="Listado de Usuarios";

  $user             = new Users();
  $id_user          = isset($_GET['id'])?$_GET['id']:null;
  $users            = $user->getUserById($id_user);
  $st_grade         = '';
  $st_name          = '';
  $st_code          = '';
  $st_mail          = '';
  $st_phone         = '';
  $st_unit          = '';
  $st_dependency    = '';
  $im_profilepic	= '';
  if($users){
    $st_grade       =$users[0]['st_grade'];
    $st_name        =$users[0]['st_name'];
    $st_code        =$users[0]['st_code'];
    $st_mail        =$users[0]['st_mail'];
    $st_phone       =$users[0]['st_phone'];
    $st_unit        =$users[0]['st_unit'];
	$st_dependency  =$users[0]['st_dependency'];
	$im_profilepic  =$users[0]['im_profilepic'];
  }

	include 'toolbar.php';
?>
<form action="./controllers/users_controller.php" method="POST">
  <div class="row">
	<div class="col-md-12">
	  <div class="form-group">
	    <!--<div class="cont_pic">
	      <img class="profile_pict" src="./misc/img/<?php echo $im_profilepic; ?>"></img>
		  <div class="hoverimg">
		  <button type="button" class="btn btn-default hovertext">Cambiar</button>
		  </div>
		</div>-->
		<input type="text" class="form-control" hidden id="im_profilepic" name="im_profilepic" value="<?php echo $im_profilepic; ?>" required>
      </div>
	</div>
  </div>
  <div class="row">
	<div class="col-md-6">
	  <div class="form-group">
		<label for="st_grade">Grado</label>
		<input type="text" class="form-control" id="st_grade" name="st_grade" autofocus placeholder="Grado" required value="<?php echo $st_grade; ?>">
	  </div>
	</div>
	<div class="col-md-6">
	  <div class="form-group">
  	    <label for="st_name">Apellidos y Nombre</label>
        <input type="text" class="form-control" id="st_name" name="st_name" autofocus placeholder="Apellidos y Nombre" required value="<?php echo $st_name; ?>">
      </div>
	</div>
  </div>
  <div class="row">
	<div class="col-md-6">
	  <div class="form-group">
		<label for="st_code">Código</label>
		<input type="text" class="form-control" id="st_code" name="st_code" autofocus placeholder="Código" required value="<?php echo $st_code; ?>">
	  </div>
	</div>
	<div class="col-md-6">
	  <div class="form-group">
  	    <label for="st_mail">Correo</label>
        <input type="email" class="form-control" id="st_mail" name="st_mail" autofocus placeholder="Correo"  value="<?php echo $st_mail; ?>">
      </div>
	</div>
  </div>
  <div class="row">
	<div class="col-md-6">
	  <div class="form-group">
		<label for="st_phone">Teléfono</label>
		<input type="text" class="form-control" id="st_phone" name="st_phone" autofocus placeholder="Teléfono"  value="<?php echo $st_phone; ?>">
	  </div>
	</div>
	<div class="col-md-6">
	  <div class="form-group">
  	    <label for="st_unit">Unidad</label>

<br/>
             <select id="st_unit" class="select_chosen" name="st_unit" required>
                        <option value=""> -- </option>
                        <option <?php if ($st_unit=="BN5") {echo 'selected=""';} ?> value="BN5">Base Naval ARC "ORINOQUIA"</option>
                        <option <?php if ($st_unit=="BRIM5") {echo 'selected=""';} ?> value="BRIM5">Brigada I.M. No 5</option>
                        <option <?php if ($st_unit=="BFIM51") {echo 'selected=""';} ?> value="BFIM51">Batallón Fluvial I.M. No. 51</option>
                        <option <?php if ($st_unit=="BFIM52") {echo 'selected=""';} ?> value="BFIM52">Batallón Fluvial I.M. No. 52</option>
                        <option <?php if ($st_unit=="BFIM50") {echo 'selected=""';} ?> value="BFIM50">Batallón Fluvial I.M. No. 50</option>
                        <option <?php if ($st_unit=="FFO") {echo 'selected=""';} ?> value="FFO">Flotilla Fluvial del Oriente</option>
                        <option <?php if ($st_unit=="FNO") {echo 'selected=""';} ?> value="FNO">Fuerza Naval del Oriente</option>	
                        <option <?php if ($st_unit=="EGCAR") {echo 'selected=""';} ?> value="EGCAR">Estación de Guardacostas</option>
                        <option <?php if ($st_unit=="ESM4030") {echo 'selected=""';} ?> value="ESM4030">Entidad Sanidad Militar 4030</option>		
             </select>

        <!--<input type="text" class="form-control" id="st_unit" name="st_unit" autofocus placeholder="Unidad" required value="<?php echo $st_unit; ?>">-->
      </div>
	</div>
  </div>
  <div class="row">
  <div class="col-md-6">
    <div class="form-group">
  	  <label for="st_dependency">Dependencia</label>
      <input type="text" class="form-control" id="st_dependency" name="st_dependency" placeholder="Dependencia" required value="<?php echo $st_dependency; ?>">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
  	  
       <svg id="ean-13"></svg>
       <script>
         var st_code_fixed = get_codebar_string(<?php echo $st_code; ?>);
         JsBarcode("#ean-13",st_code_fixed)</script>
    </div>
  </div>
  </div>
  <div class="form-group text-center">
  	<input type="submit" name="edit" value="Editar" class="btn btn-primary" >
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				La informacion ha sido actualizada.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al editar la información, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
  <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
</form>