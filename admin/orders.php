<?php

	//include('../cart.php');
	include('sql.php');
	session_start();

	$keys = array_keys($_SESSION['basket']);
	$all = get_chosen_products($keys);
	echo '<pre>';
	print_r($_SESSION['basket']);
	$_SESSION['order_id'] =  add_order_db($_SESSION['user_id'],$_SESSION['total']);

	foreach($all as $value){
		add_order_items($_SESSION['order_id'],$value['id'],$_SESSION['basket'][$value['id']], $value['price']);
	}


