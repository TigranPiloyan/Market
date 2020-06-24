<?php
include('sql.php');
session_start();


$action=$_POST['action'];

if($action=='get_cat'){
    $arr=get_categories();
    echo json_encode($arr);
}
if($action=='add'){
    $name=$_POST['name'];
    add_category($name);
}
if($action=='delete'){
    $id=$_POST['id'];
    delete_category($id);
}

if($action=='update'){
    $id = $_POST['id'];
    $str = $_POST['str'];
    echo update_category($id ,$str);
}



