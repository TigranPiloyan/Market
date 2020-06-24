<?php

	if(!isset($_POST['submit'])){
		header('location:reg_form.php');
		die;
	}
	session_start();
	if(empty(trim($_POST['name'])) || empty(trim($_POST['email'])) ||empty(trim($_POST['login']))||empty(trim($_POST['password']))||empty(trim($_POST['password1']))){
		$_SESSION['error'] = 'заполните все поля';
		header('location:reg_form.php');
		die;
	}

	if(trim($_POST['password']) != trim($_POST['password1'])){
		$_SESSION['error'] = 'повторный пароль введен неверно';
		header('location:reg_form.php');
		die;
	}

	if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
		$_SESSION['error'] = 'Пожалуйста. введите правильный Email адрес';
		header('location:reg_form.php');
		die;
	}

	$login = trim($_POST['login']);
	$email = trim($_POST['email']);
	$name = trim($_POST['name']);
	$password = trim($_POST['password']);
	$password = md5($password);

	include('../admin/sql.php');
	if(check_have_user($email)){
		$_SESSION['error'] = 'пользователь с этим e-mail уже существует';
		header('location:reg_form.php');
		die;
	}

	add_user_db($name,$email,$login,$password);
	header('location:../index.php');
	$_SESSION['user'] = $login;
	die;