<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/style_admin.css">
</head>
<body>

<div class="wrapper">
    <div class="form__body">	
        <h5>Login for Admin</h5>
        <form action="login.php" method="post">
        <label for="login">
            <span>login:</span>
            <input type="text" name="login" placeholder="login" id="login"> 
        </label>
        <label for="password">
            <span>password</span>
            <input type="password" name="password" placeholder="password" id="password"> 
        </label>
            <label class="remember">
                <span>Запомнить меня</span><input type='checkbox' name='remember' >
            </label>
                    <?php
                    session_start();
                    if(isset($_SESSION['msg'])){
                        echo '<p style="color:red">'.$_SESSION['msg'].'</p>';
                        unset($_SESSION['msg']);
                    }
                    if(isset($_COOKIE['admin'])){
                        $_SESSION['admin']=$_COOKIE['admin'];
                        header('location:home.php');
                    }
                    ?>
            <button type="submit" name="submit">ВОЙТИ</button>
        </form>
    </div>
</div>
</body>
</html>