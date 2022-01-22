<?php
require_once 'header.php';
?>

<div class="main container">
		<form action="includes/create-user.inc.php" class="user-form" method="POST">
			<label for="username">Логин</label>
			<input id="username"type="text" class="user-form__input" name="username">
			<label for="password">Пароль</label>
			<input id="password" type="password" class="user-form__input" name="password">
			<label for="name">Имя</label>
			<input id="name"type="text" class="user-form__input" name="name">
			<label for="lastname">Фамилие</label>
			<input id="lastname"type="text" class="user-form__input" name="lastname">
			<div>Пол</div>
			<div class="radio__btns">
				<label for="male" class="radio__labels">
					<input id="male" type="radio" value="male" name="gender">
					<span class="radio__icon"></span>
					<span class="radio__text">Мужской</span>
				</label>
				<label for="female" class="radio__labels">
					<input id="female" type="radio" value="female" name="gender">
					<span class="radio__icon"></span>
					<span class="radio__text">Женский</span>
				</label>
			</div>
			<label for="birthday">Дата рождения</label>
			<input id="birthday" type="date" class="user-form__input" name="birthday">
			<div class="user-form__btns">
				<button class="user-form__btn user-form__submit">Добавить</button>
				<a href="admin-panel.php" class="user-form__btn user-form__cancel">Отменить</a>
			</div>
			<?php

				// show errors to user if occured
				if ($_GET['error'] === 'none') {
					echo '<div class="msg-box success">
							Пользователь добавлен.
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
