<?php

	if(!isset($_POST['submit'])){
		header('location:forget_pass.php');
		die;
	}
	session_start();
	if(empty(trim($_POST['num']))){
		$_SESSION['error'] = 'введите число с письма';
		header('location:check_number.php');
		die;
	}

	if(trim($_POST['num']) == $_SESSION['number']){
		header('location:change_pass.php');
	}else{
		$_SESSION['error'] = 'номер введён непривильно';
		header('location:check_number.php');
	}