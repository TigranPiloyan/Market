<?php
$conn=mysqli_connect('localhost','root',"","shop");
if(!$conn){
    die(mysqli_connect_error($conn));
}


function checkAdmin($login,$password){
    global $conn;
    $query="SELECT * FROM `admin` WHERE `login`='$login' and `password`='$password'";
    $res=mysqli_query($conn,$query);
    return mysqli_num_rows($res)>0;  
}

function add_category($name){
    global $conn;
    $query="INSERT INTO `categories` (name) VALUES('$name')";
    mysqli_query($conn,$query);
}
function get_categories(){
    global $conn;
    $query="SELECT * FROM categories";
    $res=mysqli_query($conn,$query);
    return mysqli_fetch_all($res,MYSQLI_ASSOC);
 }

 function delete_category($id){
    global $conn;
    $query="DELETE FROM `categories` WHERE `id`='$id'";
    mysqli_query($conn,$query);
 }

 function update_category($id,$name){
    global $conn;
    $query="UPDATE `categories` SET `name`='$name' WHERE `id`='$id'";
    mysqli_query($conn,$query);
 }                 

 function add_product($name,$price,$description,$currency,$cat_id,$img){
    global $conn;
    $query="INSERT INTO `products` (name,price,description,currency,cat_id,image) VALUES('$name','$price','$description','$currency','$cat_id','$img')";
    mysqli_query($conn,$query);
 }

 function get_products($cat_id){
   global $conn;
   $query = "SELECT * FROM `products` WHERE `cat_id` = '$cat_id'";
   $res = mysqli_query($conn,$query);
   return mysqli_fetch_all($res,MYSQLI_ASSOC);
 }
 function get_products_all(){
   global $conn;
   $query = "SELECT * FROM `products`";
   $res = mysqli_query($conn,$query);
   return mysqli_fetch_all($res,MYSQLI_ASSOC);
 }

 function delete_product($id){
   global $conn;
   $query="DELETE FROM `products` WHERE id='$id'";
   mysqli_query($conn,$query);
}

function update_product($id,$name,$price,$description){
    global $conn;
    $query="UPDATE `products` SET `name`='$name',`price`='$price',`description`='$description' WHERE `id`='$id'";
    mysqli_query($conn,$query);
 }     

 /**
  * users
  */
 function check_have_user($email){
    global $conn;
    $query = "SELECT `email` FROM `users` WHERE `email`='$email'";
    $res = mysqli_query($conn, $query);
    return mysqli_num_rows($res)>0;
 }

 function add_user_db($name,$email,$login,$password){
   global $conn;
   $query="INSERT INTO `users` (name,email,login,password) VALUES('$name','$email','$login','$password')";
   $res = mysqli_query($conn, $query);
 }

 function get_user_id($login,$password ){
   global $conn;
   $query = "SELECT `id` FROM `users` WHERE `login`='$login' && `password`='$password'";
   $res = mysqli_query($conn, $query);
   return mysqli_fetch_all($res,MYSQLI_ASSOC);
 }

 function check_user_info($login,$password){
   global $conn;
   $query = "SELECT `login`,`password` FROM `users` WHERE `login`='$login' AND `password`='$password'";
   $res = mysqli_query($conn, $query);
   return mysqli_num_rows($res)>0;
 }

  /**
  * add basket product
  */

  function add_product_basket($id){
   global $conn;
   $query = "SELECT `name`,`price` FROM `products` WHERE `id`='$id'";
   $res = mysqli_query($conn, $query);
   return mysqli_fetch_all($res,MYSQLI_ASSOC);
  }
  
   /**
  * change password
  */
  function change_password($password,$email){
   global $conn;
   $query="UPDATE `users` SET `password`='$password' WHERE `email`='$email'";
   mysqli_query($conn,$query);
}  
/**
 * get chosen products
 */
function get_chosen_products($array){
   $str = implode(',',$array);
   global $conn;
   $query =  "SELECT * FROM `products` WHERE `id` IN($str)";
   $res = mysqli_query($conn, $query);
   return mysqli_fetch_all($res,MYSQLI_ASSOC);
 }
/**
 * add order to data base
 */
 function add_order_db($total,$id_user){
   global $conn;
   $query="INSERT INTO `orders` (`user_id`,`total`) VALUES('$total','$id_user')";
   mysqli_query($conn, $query);
   return mysqli_insert_id($conn);
}
/**
 * add order information
 */
function add_order_items($order_item,$product_id,$count=0,$price_product){
   global $conn;
   $query="INSERT INTO `order_items` (`order_id`,`product_id`,`count`,`price_product`) VALUES('$order_item','$product_id','$count','$price_product')";
   mysqli_query($conn, $query);
}

 
