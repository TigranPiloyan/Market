<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
	<link rel="stylesheet" href="style/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
	<div class="wrapper">
		<div class="form__body">	
			<?php
				session_start();
				if(isset($_SESSION['success'])){
					echo '<p>'.$_SESSION['success'].'</p>';
					unset($_SESSION['success']);
				}
			?>
			<h5>АВТОРИЗАЦИЯ</h5>
			<form action="login.php" method="post">
				<input type="text" name="login" placeholder="login"> 
				<input type="password" name="password" placeholder="password"> 
				<label class="remember">
					<p>Запомнить меня</p><input type='checkbox' name='remember' >
				</label>
				<label class="remember">
					<a class="forget__password" href="restore_pass/forget_pass.php">forgot password?</a>
				</label>
				<?php 
					if(isset($_SESSION['error'])){
						echo '<p>'.$_SESSION['error'].'</p>';
						unset($_SESSION['error']);
					}
				?>
				<button type="submit" name="submit">ВОЙТИ</button>
			</form>
		</div>
	</div>
</body>
</html>