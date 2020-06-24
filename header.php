<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>header</title>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
	<div class="wrapper">
		<header class="header">
			<div class="container">
				<div class="header__top">
					<div class="header__left">
						<div class="logo">
							<img src="images/logo.png" alt="">
						</div>
						<a href="index.php">Delivery <br> Market</a>
						<div class="user">
							<?php
								session_start();
								if(isset($_COOKIE['user'])){
									$_SESSION['user'] = $_COOKIE['user'];
								}
								if(isset($_COOKIE['user_id'])){
									$_SESSION['user_id'] = $_COOKIE['user_id'];
								}
								if(isset($_SESSION['user'])){
									echo '<div class="avatar"><img src="images/user.svg" alt=""></div>';
									echo '<h4>'.$_SESSION['user'].'</h4>';
								}
							?>
						</div>
					</div>
					<div class="header__search">
						<input type="text" placeholder="search">
						<img class="search__btn"src="images/search.svg" alt="">
					</div>
					<div class="header__right">	
						<a class="signin" href="index.php">домой</a>
						<?php
							if(isset($_SESSION['user'])){
								echo '<a class="signin" href="valid_form/logout.php">Выход</a>';
							}else{
								echo '<a class="signin" href="valid_form/login_form.php">Войти</a>';
								echo '<a class="registration" href="valid_form/reg_form.php">зарегистрироваться</a>';
							}
						?>
						<a class="show__basket" href="cart.php">Корзина</a>
					</div>
		
				</div>
				<nav class="menu__cat">
				
				    <ul>
						<li class="menu__item_cat"><button data-id='all'>all</button></li>
						<?php 
							include('admin/sql.php');
							$all_cat = get_categories();
							foreach($all_cat as $value){
								$id = $value['id'];
								$name = $value['name'];
								echo "<li class='menu__item_cat'><button data-id='$id'>$name</button></li>";
							}
						?>

					</ul>
				</nav>
			</div>
		</header>
	
			
	</div>

	
	<!--scripts==============================-->
	<script src="scripts/jquery-3.5.1.min.js"></script>
	<script src="scripts/script.js"></script>
	<!--/scripts==============================-->
</body>
</html>