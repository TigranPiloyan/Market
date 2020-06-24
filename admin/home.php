<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/style_admin.css">
</head>
<body>
   <div class='container'> 
       <div class="d-flex add__products">   
            <input type='text' id='name' class='form-control col-2' placeholder="category name">
            <button class="btn btn-success" id="add"type='button'>ADD</button>
            <button class="btn btn-outline-primary" ><a href="../valid_form/logout.php">LOGOUT</a></button>
        </div>
        <?php
            session_start();
            if(!isset($_SESSION['admin'])){
            header('location:index.php');
            die;
            }
            include('sql.php');
            $all=get_categories();
            echo'<table class="table table-hover"><tr>';
            echo'<th class="table-dark">name</th><th class="table-success">update</th><th class="table-danger">delete</th><th class="table-secondary">show</th></tr>';
                foreach ($all as $row) {
                    $id=$row['id'];
                    $name=$row['name'];
                    echo"<tr id='$id' class='table-primary'>
                        <td contenteditable='true'>$name</td>
                        <td><button class='update btn btn-success'>update</button></td>
                        <td><button class='delete btn btn-danger'>delete</button></td>
                        <td><a href='products.php?cat=$id'><button class='btn btn-primary'>show</button></a></td>
                    </tr>";
                }
            echo'</table>';
        ?>
       
    </div>
<script>
    $(document).ready(function(){
        $("#add").click(function(){
            let name=$('#name').val().trim();
            if(name.length!=0){
                    $.ajax({
                    url:'add_cat.php',
                    type:'post',
                    data:{name:name,action:'add'},
                    success:function(answer){
                        location.reload();
                    }
                });
            }  
        });
        $('.delete').click(function(){
            let id=$(this).parent().parent().attr('id');
            $.ajax({
                url:'add_cat.php',
                type:'post',
                data:{id:id,action:'delete'},
                success:function(answer){  
                    location.reload();                    
                }
            });
        });
        $('.update').click(function(){
            let id = $(this).parent().parent().attr('id');
            let text = $(this).parent().prev().text();
            $.ajax({
                url:'add_cat.php',
                type:'post',
                data:{
                    id:id,
                    str:text,
                    action:'update'
                },
                success:function(data){  
                    location.reload();      
                }              
            });
        });
        $('.show').click(function(){
            let arr=[];
            arr[0]=$(this).parent().parent().attr('id');
            arr[1]=$(this).parent().prev().text();
            let str = JSON.stringify(arr);

            $.ajax({
                url:'add_cat.php',
                type:'post',
                data:{str:str,action:'update'},
                success:function(answer){  
                    location.reload();                    
                }
            });
        });
    });
</script> 
</body>
</html>