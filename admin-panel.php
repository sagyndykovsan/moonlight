<?php
require_once 'header.php';
?>
	<div class="main container">
		<div class="row">
			<ul class="sort__list">
				<h4>Sort by: </h4>
				<li class="sort__item" data-sort="1">username
					<span class="sort__arrow"></span>
				</li>
				<li class="sort__item" data-sort="2">Name<span class="sort__arrow"></span></li>
				<li class="sort__item" data-sort="3">Lastname<span class="sort__arrow"></span></li>
				<li class="sort__item" data-sort="4">Gender<span class="sort__arrow"></span></li>
				<li class="sort__item" data-sort="5">Birthday<span class="sort__arrow"></span></li>
			</ul>
			<a id="useradd" href="create-user.php">Add user <img class="useradd__icon" src="assets/img/plus.png" alt=""></a>
		</div>
		<div class="users__list">
			
		</div>
	</div>
	<div class="modal">
		<div class="modal__window">
		<div class="modal__text">
			Delete user: "<span class="modal__user"></span>"?
		</div>
		<div class="modal__btns">
			<div id="modal-yes" class="modal__btn modal__yes">Yes</div>
			<div id="modal-no" class="modal__btn modal__no">No</div>
		</div>
	</div>
	</div>
	<script src="assets/js/ajax.js"></script>
</body>
</html>