<?php
require_once 'header.php';
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';

$user = userExists($_GET['username'], $conn);
?>

<div class="main container">
		<div class="user-profile">
				<div class="row">
					<span>Username: </span><span><?php echo $user['username']; ?></span>
				</div>
				<div class="row">
					<span>Name: </span><span><?php echo $user['name']; ?></span>
				</div>
				<div class="row">
					<span>Lastname: </span><span><?php echo $user['lastname']; ?></span>
				</div>
				<div class="row">
					<span>Gender: </span><span><?php
					if ($user['gender'] === 'male') {
						echo 'Male';
					} else {
						echo "Female";
					}

				?></span>
				</div>
				<div class="row">
					<span>Birthday: </span><span><?php echo $user['birthday']; ?></span>
				</div>
				<a href="admin-panel.php" class="user-form__btn">Return</a>
		</div>
</body>
</html>
