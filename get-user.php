<?php
require_once 'header.php';
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';

$user = userExists($_GET['username'], $conn);
?>

<div class="main container">
		<div class="user-profile">
				<div class="row">
					<span>Логин: </span><span><?php echo $user['username']; ?></span>
				</div>
				<div class="row">
					<span>Имя: </span><span><?php echo $user['name']; ?></span>
				</div>
				<div class="row">
					<span>Фамилие: </span><span><?php echo $user['lastname']; ?></span>
				</div>
				<div class="row">
					<span>Пол: </span><span><?php
					if ($user['gender'] === 'male') {
						echo 'Мужской';
					} else {
						echo "Женский";
					}

				?></span>
				</div>
				<div class="row">
					<span>Дата рождения: </span><span><?php echo $user['birthday']; ?></span>
				</div>
				<a href="admin-panel.php" class="user-form__btn">Вернуться</a>
		</div>
</body>
</html>
