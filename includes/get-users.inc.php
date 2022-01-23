<?php

require_once 'dbh.inc.php';

session_start();

// checks user permission for page if not admin sends them to login page

if ($_SESSION['role'] === 'admin') {
	// getting current page
	$page = (int)$_GET['page'];

	// setting offset and limit
	$limit = 10;
	$offset = ($page-1)*$limit;
	
	$output = '';
	
	// checking if sort parameters were set by user

	if (!empty($_GET['sortby'])) {
		switch ($_GET['sortby']) {
			case '1':
				$sortby = 'username';
			break;
			case '2':
				$sortby = 'name';
			break;
			case '3':
				$sortby = 'lastname';
			break;
			case '4':
				$sortby = 'gender';
			break;
			case '5':
				$sortby = 'birthday';
			break;
		}

		if ($_GET['order'] == 'DESC') {
			$order = 'DESC';
		} else {
			$order = 'ASC';
		}

		$query = "SELECT * FROM users ORDER BY $sortby $order";
	} else {
		$query = "SELECT * FROM users";
	}

	$query .= " LIMIT " . $offset . ", " . $limit;

	// collecting all users in one table

	if ($result = $conn->query($query)) {
		$output .= '<table><tr><th>Username</th><th>Name</th><th>Lastname</th><th>Gender</th><th>Birthday</th><th></th></tr>';
		foreach($result as $row) {
			$output .= '<tr><td>'.$row['username'].'</td>
						<td>'.$row['name'].'</td>
						<td>'.$row['lastname'].'</td>
						<td>'.$row['gender'].'</td>
						<td>'.$row['birthday'].'</td>
						<td><span class="user__btns">
						<a href="get-user.php?'.'username='.$row['username'].'"><img src="assets/img/view.png" class="user__btn-icon user__btn-change"> </a>
							<a href="update-user.php?'.'username='.$row['username'].'"><img src="assets/img/pen.png" class="user__btn-icon user__btn-change"> </a>
							<div onclick="deleteUser(\''.$row['username'].'\', this)"><img src="assets/img/delete.png" class="user__btn-icon user__btn-delete"> </div>
						</span></td>
						</tr>';
		}
		$output .= '</table>';
	}

	// sending page links

	$result = $conn->query("SELECT COUNT(username) AS total FROM users");
	$total_records = $result->fetch_assoc()['total'];
	$total_pages = ceil($total_records/$limit);
	$result->free();

	if ($total_pages > 1) {
		$output .= '<ul class="page__list">';

		if ($page > 1) {
			$output .= '<li class="page__arrow left" data-page="'.($page - 1).'"></li>';
		}

		if ($page > 7) {
			$output .= '<li class="page__item" data-page="1">1</li>';
			$output .= '<li class="page__more left">...</li>';
		} else if ($page == 7) {
			$output .= '<li class="page__item" data-page="1">1</li>';
		}

		$pageMore = ($page > 5) ? $page - 5 : 1;

		for ($i = $pageMore; $i < $page; $i++) {
			$output .= '<li class="page__item" data-page="'.($i).'">'.($i).'</li>';
		}

		$output .= '<li class="page__item active" data-page="'.($page).'">'.($page).'</li>';

		$pageMore = ($page > $total_pages - 5) ? $total_pages : $page + 5;

		for ($i = $page+1; $i <= $pageMore; $i++) {
			$output .= '<li class="page__item" data-page="'.($i).'">'.($i).'</li>';
		}

		if ($page < $total_pages-6) {
			$output .= '<li class="page__more right" data-page="'.($page+1).'">...</li>';
			$output .= '<li class="page__item" data-page="'.$total_pages.'">'.$total_pages.'</li>';
		} else if ($page == $total_pages-6) {
			$output .= '<li class="page__item" data-page="'.$total_pages.'">'.$total_pages.'</li>';
		}

		if ($page != $total_pages) {
			$output .= '<li class="page__arrow" data-page="' . ($page + 1) . '"></li>';
		}

			$output .= "</ul>";
		}

	echo $output;
} else {
	header('location ../index.php');
	exit();
}
