<?php

if ($_SESSION['role'] === 'admin') {
	header('location: admin-panel.php');
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Moonlight</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="outer">
		<div class="middle">
		<div class="login-form">
			<form action="/includes/login.inc.php" method="POST">
				<h1 class="login-form__title">Login</h1>
				<input class="login-form__input" type="text" name="username" placeholder="username" >
				<input class="login-form__input" type="password" name="password" placeholder="password">
				<button class="login-form__btn" type="submit" name="submit" value="submit">Login</button>
			</form>
		</div>
		</div>
	</div>
</body>
</html>