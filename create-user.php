<?php
require_once 'header.php';
?>

<div class="main container">
		<form action="includes/create-user.inc.php" class="user-form" method="POST">
			<label for="username">Username</label>
			<input id="username"type="text" class="user-form__input" name="username">
			<label for="password">Password</label>
			<input id="password" type="password" class="user-form__input" name="password">
			<label for="name">Name</label>
			<input id="name"type="text" class="user-form__input" name="name">
			<label for="lastname">Lastname</label>
			<input id="lastname"type="text" class="user-form__input" name="lastname">
			<div>Gender</div>
			<div class="radio__btns">
				<label for="male" class="radio__labels">
					<input id="male" type="radio" value="male" name="gender">
					<span class="radio__icon"></span>
					<span class="radio__text">Male</span>
				</label>
				<label for="female" class="radio__labels">
					<input id="female" type="radio" value="female" name="gender">
					<span class="radio__icon"></span>
					<span class="radio__text">Female</span>
				</label>
			</div>
			<label for="birthday">Birthday</label>
			<input id="birthday" type="date" class="user-form__input" name="birthday">
			<div class="user-form__btns">
				<button class="user-form__btn user-form__submit">Add user</button>
				<a href="admin-panel.php" class="user-form__btn user-form__cancel">cancel</a>
			</div>
			<?php

				// show errors to user if occured
				if ($_GET['error'] === 'none') {
					echo '<div class="msg-box success">
							User added.
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
