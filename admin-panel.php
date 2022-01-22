<?php
require_once 'header.php';
?>
	<div class="main container">
		<div class="row">
			<ul class="sort__list">
				<h4>Сортировать по: </h4>
				<li class="sort__item" data-sort="1">Логину
					<span class="sort__arrow"></span>
				</li>
				<li class="sort__item" data-sort="2">Имени<span class="sort__arrow"></span></li>
				<li class="sort__item" data-sort="3">Фамилии<span class="sort__arrow"></span></li>
				<li class="sort__item" data-sort="4">Полу<span class="sort__arrow"></span></li>
				<li class="sort__item" data-sort="5">Дате рождения<span class="sort__arrow"></span></li>
			</ul>
			<a id="useradd" href="create-user.php">Добавить пользователя <img class="useradd__icon" src="assets/img/plus.png" alt=""></a>
		</div>
		<div class="users__list">
			
		</div>
	</div>
	<div class="modal">
		<div class="modal__window">
		<div class="modal__text">
			Удалить пользователя: "<span class="modal__user"></span>"?
		</div>
		<div class="modal__btns">
			<div id="modal-yes" class="modal__btn modal__yes">Да</div>
			<div id="modal-no" class="modal__btn modal__no">Нет</div>
		</div>
	</div>
	</div>
	<script src="assets/js/ajax.js"></script>
</body>
</html>