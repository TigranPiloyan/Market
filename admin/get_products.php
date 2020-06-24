<?php

$cat = $_POST['cat'];

include('sql.php');

if($cat == 'all'){
	$arr = get_products_all();
	echo json_encode($arr);
}else{
	$arr = get_products($cat);
	echo json_encode($arr);
}
