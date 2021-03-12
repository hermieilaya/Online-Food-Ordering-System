<?php
	session_start();

	if(isset($_SESSION['accounts'])){
		header('Location:menu.php');
	}

//check if button is pressed
	if(isset($_POST['login'])){

		if($_POST['username'] == 'user' and $_POST['password'] == 'mypass123'){
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['message'] = 'Login Sucess!!!';
			header('Location:menu.php');

		}else{
			echo 'Invalid Credentials!!!!';

		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>
		Online Food Ordering System
	</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="wrapper">
		<header>
			<div class="logo">
				<img src="a.jpeg">
				<h1 style="color: white;">ONLINE FOOD ORDERING SYSTEM</h1>
			</div>
			<nav>
				<ul>
					<li><a href="home.php">HOME</a></li>
					<li><a href="menu.php">MENU</a></li>
					<li><a href="login.php">LOGIN</a></li>
					<li><a href="transaction.php.php">TRANSACTION</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
			</nav>
		</header>
		<section>
				<br>
				<div class="box1">
					<h1 style="text-align: center; font-size: 35px; font-family: Lucida console;">Food Ordering System</h1><br>
					<h1 style="text-align: center;font-size: 25px;">User Login Form</h1><br>

				<form name="login" action="" method="POST">
					<br><br>
					<div class="login">
					<input type="text" name="username" placeholder="user" required=""><br><br>
					<input type="password" name="password" placeholder="password" required=""><br><br>
					</a>
					<p><input type="submit" name="login" value="Login"></p>
					</div>
				</form>
				
			</div>
		
		</section>
		<footer>
			
		</footer>
	</div>

</body>
</html>