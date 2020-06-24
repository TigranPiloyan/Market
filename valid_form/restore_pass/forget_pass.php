<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
	<link rel="stylesheet" href="../style/bootstrap.min.css">
	<link rel="stylesheet" href="../style/style.css">
</head>
<body>
	<div class="wrapper">
		<div class="form__body">	
			<h5>восстановить пароль</h5>
			<form action="restore_pass.php" method="post">
				<input type="text" name="email" placeholder="enter email"> 
				<?php 
					session_start();
					if(isset($_SESSION['error'])){
						echo '<p>'.$_SESSION['error'].'</p>';
						unset($_SESSION['error']);
					}
				?>
				<button type="submit" name="submit">Восстановить</button>
			</form>
		</div>
	</div>
</body>
</html>