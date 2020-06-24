<?php

session_start();
if(empty(trim($_POST['login']))||empty(trim($_POST['password']))){
	$_SESSION['error'] = 'заполните все поля';
	header('location:login_form.php');
	die;
}
include('../admin/sql.php');
$login = trim($_POST['login']);
$password = trim(md5($_POST['password']));
if(check_user_info($login,$password)){
	$_SESSION['user'] = $login;
	$user_id = get_user_id($login,$password);		
	$_SESSION['user_id'] = $user_id[0]['id'];
	if(isset($_POST['remember'])){
		setcookie('user',$login,time()+3600*24,"/");
		setcookie('user_id',$user_id,time()+3600*24,"/");
	}
	header('location:../index.php');
	die;
}
$_SESSION['error'] = 'неверный логин или пароль';
header('location:login_form.php');
die;


