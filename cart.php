<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
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
	<table class="table table-hover">
	<tr>
		<th class="table-dark">name</th>
		<th class="table-light">price</th>
		<th class="table-warning">description</th>
		<th class="table-warning">count</th>
		<th class="table-secondary">image</th>
		<th class="table-secondary">sum</th>
		<th class="table-danger">delete</th>
	</tr>
		<?php
		if(!empty($_SESSION['basket'])){
			include('admin/sql.php');
			$keys = array_keys($_SESSION['basket']);
			$all = get_chosen_products($keys);
			$total = 0;
				foreach($all as $val){
				$id = $val['id'];
				$name = $val['name'];
				$price = $val['price'];
				$description = $val['description'];
				$image = $val['image'];
				$count = $_SESSION['basket'][$id];
				$sum = $count*$price;
				$total += $sum;
				echo"
				<tr id='$id' class='table-primary'>
					<td class='name'>$name</td>
					<td class='price'>$price </td>
					<td class='description'>$description</td>
					<td class='description'><input class='count_prod' type='number' width=20 value='$count' min=0></td>
					<td><img src='admin/$image' width=50 alt=''></td>
					<td>$sum</td>
					<td><button class='delete btn btn-danger' date-id='$id'>delete</button></td>
				</tr>";
			}
			echo "<tr>
					<td colspan='5'>total</td>
					<td>$total</td>
					<td><button class='buy__products btn btn-success'>buy</button></td>
				</tr>";
				$_SESSION['total'] = $total;
			}
		?>
	</div>
</table>
<div class="modals__window">
	<div class="success__buy_body">
		<div class="success__message">
			<h1>спасибо за покупки</h1>
		</div>
	</div>
</div>
<!--scripts==============================-->
<script	script src="scripts/jquery-3.5.1.min.js"></script>
<script src="scripts/script.js"></script>
<!--/scripts==============================-->
</body>
</html>