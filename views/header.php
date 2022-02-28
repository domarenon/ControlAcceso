<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="es">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title=isset($title)?$title:'Control de Acceso BN5'; ?></title>

    <script type="text/javascript" src="./misc/pluggins/jquery/jquery.js"></script>
	<script type="text/javascript" src="./misc/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="./misc/pluggins/bootstrap-toggle/bootstrap4-toggle.min.js"></script>
	<script type="text/javascript" src="./misc/js/barcode.js"></script>
	<script type="text/javascript" src="./misc/js/JsBarcode.ean-upc.min.js"></script>
	<script type="text/javascript" src="./misc/js/chosen.jquery.min.js"></script>
	<script type="text/javascript" src="./misc/js/functions.js"></script>
	<script type="text/javascript" src="./misc/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="./misc/pluggins/Datepicker/js/bootstrap-datepicker.min.js"></script>

	<link rel="stylesheet" type="text/css" href="./misc/pluggins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./misc/style.css">
	<link rel="stylesheet" type="text/css" href="./misc/pluggins/bootstrap-toggle/bootstrap4-toggle.min.css">
	<link rel="stylesheet" type="text/css" href="./misc/css/chosen.min.css">
	<link rel="stylesheet" type="text/css" href="./misc/css/jquery.dataTables.min.css">
	<link href="./misc/css/materialicons.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./misc/pluggins/Datepicker/css/bootstrap-datepicker.min.css">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light nav-bar">
  		<a class="navbar-brand list-items" href="index.php"><strong>Control de Acceso</strong></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		  <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item dropdown text-right ">
		        <a class="nav-link dropdown-toggle list-items" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Menú
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="index.php?page=moves">Entradas y salidas</a>
				  <a class="dropdown-item" href="index.php?page=users">Usuarios</a>
				  <a class="dropdown-item" href="index.php">Salir</a>
		        </div>
		      </li>
		    </ul>
		  </div>
</nav>
	<div class="container">