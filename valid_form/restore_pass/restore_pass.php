<?php

	if(!isset($_POST['submit'])){
		header('location:../login_form.php');
		die;
	}

	session_start();
	if(empty(trim($_POST['email']))){
		$_SESSION['error'] = 'введите логин или email';
		header('location:forget_pass.php');
		die;
	}

	if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
		$_SESSION['error'] = 'Пожалуйста. введите правильный Email адрес';
		header('location:forget_pass.php');
		die;
	}

	$email = trim($_POST['email']);
	include('../../admin/sql.php');
	if(check_have_user($email)){
		$rand_number = rand(1000,5000);
		$_SESSION['number'] = $rand_number;
		$_SESSION['email'] = $email;
		header('loction:check_number.php');
		require_once('phpmailer/mail.php');
	}else{
		$_SESSION['error'] = 'вы не были зарегистрированы этим email-ом';
		header('location:forget_pass.php');
		die;
	}
	

