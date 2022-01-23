<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
	header('location: index.php');
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
	<header class="header">
		<nav class="nav container">
			<div class="nav__menu">
				<div class="nav__logo">
					<a href="admin-panel.php">
						Moonlight
					</a>
				</div>
				<ul class="nav__list">
					<li class="nav__item">
						<a href="includes/logout.inc.php" class="nav__link">logout</a>
						<img src="assets/img/logout.png" class="nav__icon" alt="icon">
					</li>
				</ul>
			</div>
		</nav>
	</header>