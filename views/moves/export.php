<?php
	include './models/users.php';
	$user  = new Users();
    $user_list = $user->getUserList();
    $dependency_list = $user->getDependencyList();
    $unit_list = $user->getUnitList();

	include 'toolbar.php';
?>
<div class="row" style="padding-top:15px;">
	<div class="col">
    
	</div>
</div>
<form action="views/moves/pdf.php" method="POST">

  <div class="row">
	<div class="col-lg-4">
	  <div class="form-group">
      <input id="user_flt" type="radio" name="filter" value="user" checked="checked">
      <label for="user_flt">Usuario</label>
      <br/>
        <select id="select_user" name="select_user" class="select_chosen"  style="width:90%">
            <option value=""> -- </option>
            <?php 
                foreach ($user_list as $row)
                {
                    echo "<option value='". $row['id_user'] ."'>". $row['st_name'] ."</option>";
                }          
            ?>
        </select>
		</div>
	</div>
	<div class="col-lg-4">
	  <div class="form-group">
          <input id="unit_flt" type="radio" name="filter" value="unity">
          <label for="unit_flt">Unidad</label>
          <br/>
          <select id="select_unity" name="select_unity" class="select_chosen" disabled style="width:90%">
            <option value=""> -- </option>
            <?php 
                foreach ($unit_list as $row)
                {
                    echo "<option value='". $row['st_unit'] ."'>". $row['st_unit'] ."</option>";
                }          
            ?>
        </select>
        </div>
    </div>
    <div class="col-lg-4">
	  <div class="form-group">
        <input id="dependency_flt" type="radio" name="filter" value="dependency">
        <label for="dependency_flt">Dependencia</label>
        <br/>
        <select id="select_dependency" name="select_dependency" class="select_chosen" disabled style="width:90%">
            <option value=""> -- </option>
            <?php 
                foreach ($dependency_list as $row)
                {
                    echo "<option value='". $row['st_dependency'] ."'>". $row['st_dependency'] ."</option>";
                }          
            ?>
        </select>
      </div>
	</div>
    
  </div>
	
  <div class="row">
	
	<div class="col-lg-4">
        <div class="form-group">
        <label for="st_move">Movimiento</label>
            <br/>
            <select name="select_movement" class="select_chosen" style="width:100%">
                <option value=""> -- </option>
                <option value="IN">Entrada</option>
                <option value="OUT">Salida</option>
            </select>
        
        </div>
    </div>
    <div class="col-lg-8">
	  <div class="form-group">
          <label for="st_unit">Rango de fecha</label>
          <br/>
          <div class="input-daterange" id="datepicker">
    <input type="text" class="input-small" name="start" required />
    <span class="add-on">to</span>
    <input type="text" class="input-small" name="end" required />
</div>
        </div>
	</div>
    
  </div>
  <div class="form-group text-center">
  	<input id="export" type="submit" name="export" value="Exportar" class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				Datos exportados con éxito.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al exportar los datos.
			</div>
	<?php
  		}
  	?>
  </div>
</form>