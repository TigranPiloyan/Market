<?php
session_start();
if(!isset($_POST['action'])){
    header('location:products.php');
    die;
}

include('sql.php');

$action = $_POST['action'];
if($action == 'add'){

    if(empty(trim($_POST['name']))||empty(trim($_POST['price']))||empty(trim($_POST['description']))){
        $_SESSION['msg']="Пополните все поля";
        header('location:home.php');
        die;
    }

    $url='img/'.$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'img/'.$_FILES['img']['name']);
    add_product(trim($_POST['name']),trim($_POST['price']),trim($_POST['description']),$_POST['currency'], $_SESSION['cat_id'],$url);
    header('location:products.php');
}
if($action == 'delete'){
    delete_product($_POST['id']);
}
if($action == 'update'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    update_product($id,$name,$price,$description);
}
