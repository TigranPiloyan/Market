<?php
session_start();
if(isset($_SESSION['admin'])){
	$url = "../admin/index.php";
}else{
	$url = "../index.php";
}
setcookie('admin','',time()-10,"/");
setcookie('user','',time()-10,"/");
session_destroy();
header("location:$url");

