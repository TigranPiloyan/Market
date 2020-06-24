<?php

	if(!isset($_POST['submit'])){
		header('location:forget_pass.php');
		die;
	}
	session_start();
	if(empty(trim($_POST['password']))){
		$_SESSION['error'] = 'введите новый пароль';
		header('location:change_pass.php');
		die;
	}

	$password = trim(md5($_POST['password']));
	include('../../admin/sql.php');

	change_password($password,$_SESSION['email']);
	$_SESSION['error'] = 'ваш пароль изменён';
	header('location:../login_form.php');
	die;