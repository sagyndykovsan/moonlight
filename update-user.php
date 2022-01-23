<?php
require_once 'header.php';
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';

$user = userExists($_GET['username'], $conn);
?>

<div class="main container">
		<form action="includes/update-user.inc.php" class="user-form" method="POST">
			<label for="username">Username</label>
			<input id="username"type="text" class="user-form__input" name="username" value="<?php echo $user['username']; ?>">
			<input type="text" name="oldusername" value="<?php echo $_GET['username']; ?>" hidden>
			<input type="text" name="oldpassword" value="<?php echo $_GET['password']; ?>" hidden>
			<label for="password">Password</label>
			<input id="password" type="password" class="user-form__input" name="password">
			<label for="name">Name</label>
			<input id="name"type="text" class="user-form__input" name="name" value="<?php echo $user['name']; ?>">
			<label for="lastname">Lastname</label>
			<input id="lastname"type="text" class="user-form__input" name="lastname" value="<?php echo $user['lastname']; ?>">
			<div>Gender</div>
			<div class="radio__btns">
				<label for="male" class="radio__labels">
					<input id="male" type="radio" value="male" name="gender" <?php if (strtolower($user['gender']) == strtolower('male')) echo 'checked'; ?> >
					<span class="radio__icon"></span>
					<span class="radio__text">Male</span>
				</label>
				<label for="female" class="radio__labels">
					<input id="female" type="radio" value="female" name="gender" <?php if (strtolower($user['gender']) == strtolower('female')) echo 'checked'; ?> >
					<span class="radio__icon"></span>
					<span class="radio__text">Female</span>
				</label>
			</div>
			<label for="birthday">Birthday</label>
			<input id="birthday" type="date" class="user-form__input" name="birthday" value="<?php echo $user['birthday']; ?>">
			<div class="user-form__btns">
				<button class="user-form__btn user-form__submit">Update user</button>
				<a href="admin-panel.php" class="user-form__btn user-form__cancel">Cancel</a>
			</div>
			<?php

				// show errors to user if occured
				if ($_GET['error'] === 'none') {
					echo '<div class="msg-box success">
							User updated.
						</div>';
				} else {
					if (isset($_GET['error'])) {
						echo '<div class="msg-box">';
						switch ($_GET['error']) {
							case 'emptyinput':
							$msg = 'Fill all the fields!';
							break;
							case 'fullnameinvalid':
							$msg = 'Name and Lastname should not contains symbols and numbers!';
							break;
							case 'userexist':
							$msg = 'User with this username already exist!';
							break;
						}
						echo $msg;
						echo '</div>';
					}
				}
			?>
		</form>
</body>
</html>
