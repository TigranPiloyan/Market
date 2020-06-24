<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/style_admin.css">
</head>
<body>
    <?php  
        session_start();
        if(isset($_GET['cat'])){
            $_SESSION['cat_id'] = $_GET['cat'];
        }
    ?>

    
<div class="wrapper">
    <div class="form__body">	
        <h5>Add product</h5>
        <form action='add_product.php' method='post' enctype="multipart/form-data">
            <label for="name">
                <span>Имя:</span>
                <input class="form-control col-8" type="text" name="name" placeholder="name" id="name"> 
            </label>
            <label for="price">
                <span>Цена:</span>
                <input class="form-control col-8" type="text" name="price" placeholder="price" id="price"> 
            </label>
            <label for="description">
                <span>Описание</span>
                <textarea class="form-control col-8" type="text"  name="description" id="" cols="40" rows="2" placeholder="description" id="description"></textarea>
            </label>
            <label for="file"><input type='file' name='img' id="file"></label>
            <label for="select">
                <span>валюта</span>
                <select name="currency" id="select">
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="AMD">AMD</option>
                </select>
            </label>
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
            <button type="submit" name="action" value="add">add</button>
        </form>
    </div>

</div>
    
    <?php
        include('sql.php');
        $arr = get_products($_SESSION['cat_id']);
    ?>
    <table class="table table-hover">
        <tr>
            <th class="table-dark">name</th>
            <th class="table-light">price</th>
            <th class="table-warning">description</th>
            <th class="table-secondary">image</th>
            <th class="table-success">update</th>
            <th class="table-danger">delete</th>
        </tr>
            <?php
                foreach($arr as $val){
                $id = $val['id'];
                $name = $val['name'];
                $price = $val['price'];
                $description = $val['description'];
                $image = $val['image'];
                echo"
                <tr id='$id' class='table-primary'>
                    <td contenteditable class='name'>$name</td>
                    <td contenteditable class='price'>$price </td>
                    <td contenteditable class='description'>$description</td>
                    <td><img src='$image' alt=''></td>
                    <td><button class='update btn btn-success'>update</button></td>
                    <td><button class='delete btn btn-danger'>delete</button></td>
                </tr>";
            }
            ?>
    </table>
    <script>
      $(document).ready(function(){
        $('.delete').on('click',function(){
            let id = $(this).parent().parent().attr('id');
            $.ajax({
                url:'add_product.php',
                type:'post',
                data:{id:id,action:'delete'},
                success:function(answer){  
                    location.reload();                    
                }
            });
        });
        $('.update').on('click',function(){
            let self = $(this).parents('tr');
            let id = $(self).attr('id');
            let name =$(self).find('.name').text();
            let price = $(self).find('.price').text();
            let description = $(self).find('.description').text();
            $.ajax({
                url:'add_product.php',
                type:'post',
                data:{
                    id:id,
                    name:name,
                    price:price,
                    description:description,
                    action:'update'
                },
                success:function(answer){  
                    location.reload();           
                }
            });
        });
      });
    </script>
    <style>
        table{
            text-align:center;
        }
        table img{
            while:50px;
            height:50px;
        }
    </style>

</body>
</html>

