<?php
	define('HOMEDIR',__DIR__);

	include 'views/header.php';
	
	$page=isset($_GET['page'])?$_GET['page']:'moves';

	if(isset($_POST['btnSearch'])){
		$search     =true;
		$dataSearch =$_POST['dataSearch'];
	}

	if($page=='moves' or $page =='new_move' or $page =='export')
	{
		include 'views/moves/'.$page.'.php';
	}
	else{
		include 'views/users/'.$page.'.php';
	}
	include 'views/footer.php';
