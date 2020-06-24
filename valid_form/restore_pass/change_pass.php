<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new password</title>
	<link rel="stylesheet" href="../style/bootstrap.min.css">
	<link rel="stylesheet" href="../style/style.css">
</head>
<body>
	<div class="wrapper">
		<div class="form__body">	
			<h5>введите новый пароль</h5>
			<form action="change.php" method="post">
				<input type="text" name="password" placeholder="enter new password"> 
				<input type="text" name="password1" placeholder="enter new password">
				<?php 
					session_start();
					if(isset($_SESSION['error'])){
						echo '<p>'.$_SESSION['error'].'</p>';
						unset($_SESSION['error']);
					}
				?>
				<button type="submit" name="submit">сохранить</button>
			</form>
		</div>
	</div>
</body>
</html>