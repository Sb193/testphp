<?php
	require_once "Controller/SachController.php";
	
	$ctr = null;
	$controller = null;
	
	if (isset($_GET["controller"])){
		$ctr = $_GET["controller"];
	}
	
	switch ($ctr){
		case 'sach':
			$controller = new SachController();
			break;
		default:
			$controller = new SachController();
			break;
		
	}
	
	$controller->handleRequest();

?>