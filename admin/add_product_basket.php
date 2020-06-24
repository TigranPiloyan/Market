<?php
	session_start();

	$action = $_GET['action'];
	if($action == 'add'){
		$id = $_GET['id'];
		$_SESSION['basket'][$id] = 1;
	}
	if($action == 'update'){
		$id = $_GET['id'];
		$count = $_GET['count'];
		$_SESSION['basket'][$id] = $count;
	}
	if($action == 'delete'){
		$id = $_GET['id'];
		unset($_SESSION['basket'][$id]);
	}





	