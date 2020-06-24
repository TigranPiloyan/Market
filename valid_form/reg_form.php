<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>reg form</title>
	<link rel="stylesheet" href="style/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
	<div class="wrapper">
		<div class="form__body">	
			<h5>РЕГИСТРАЦИЯ</h5>
			<form action="registr.php" method="post">
				<input type="text" name="name" placeholder="enter name">
				<input type="text" name="email" placeholder="enter email">
				<input type="text" name="login" placeholder="login"> 
				<input type="password" name="password" placeholder="password"> 
				<input type="password" name="password1" placeholder="password re"> 
				<?php 
					session_start();
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