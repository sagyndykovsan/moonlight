<?php
require_once 'header.php';
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';

$user = userExists($_GET['username'], $conn);
?>

<div class="main container">
		<form action="includes/update-user.inc.php" class="user-form" method="POST">
			<label for="username">Логин</label>
			<input id="username"type="text" class="user-form__input" name="username" value="<?php echo $user['username']; ?>">
			<input type="text" name="oldusername" value="<?php echo $_GET['username']; ?>" hidden>
			<input type="text" name="oldpassword" value="<?php echo $_GET['password']; ?>" hidden>
			<label for="password">Пароль</label>
			<input id="password" type="password" class="user-form__input" name="password">
			<label for="name">Имя</label>
			<input id="name"type="text" class="user-form__input" name="name" value="<?php echo $user['name']; ?>">
			<label for="lastname">Фамилие</label>
			<input id="lastname"type="text" class="user-form__input" name="lastname" value="<?php echo $user['lastname']; ?>">
			<div>Пол</div>
			<div class="radio__btns">
				<label for="male" class="radio__labels">
					<input id="male" type="radio" value="male" name="gender" <?php if (strtolower($user['gender']) == strtolower('male')) echo 'checked'; ?> >
					<span class="radio__icon"></span>
					<span class="radio__text">Мужской</span>
				</label>
				<label for="female" class="radio__labels">
					<input id="female" type="radio" value="female" name="gender" <?php if (strtolower($user['gender']) == strtolower('female')) echo 'checked'; ?> >
					<span class="radio__icon"></span>
					<span class="radio__text">Женский</span>
				</label>
			</div>
			<label for="birthday">Дата рождения</label>
			<input id="birthday" type="date" class="user-form__input" name="birthday" value="<?php echo $user['birthday']; ?>">
			<div class="user-form__btns">
				<button class="user-form__btn user-form__submit">Сохранить</button>
				<a href="admin-panel.php" class="user-form__btn user-form__cancel">Отменить</a>
			</div>
			<?php

				// show errors to user if occured
				if ($_GET['error'] === 'none') {
					echo '<div class="msg-box success">
							Пользователь изменен.
						</div>';
				} else {
					if (isset($_GET['error'])) {
						echo '<div class="msg-box">';
						switch ($_GET['error']) {
							case 'emptyinput':
							$msg = 'Заполните все поля!';
							break;
							case 'fullnameinvalid':
							$msg = 'Имя и Фамилие не должны иметь числа и символы!';
							break;
							case 'userexist':
							$msg = 'Пользователь с таким логином уже существует!';
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
