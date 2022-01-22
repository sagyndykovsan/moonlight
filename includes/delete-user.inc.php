<?php

session_start();

if ($_SESSION['role'] === 'admin') {

	require_once 'dbh.inc.php';

	$username = $conn->real_escape_string($_GET['username']);

	$query = "DELETE FROM users WHERE username='$username'";

	if ($conn->query($query)) {
		echo 'deleted';
	} else {
		echo $conn->error;
	}

} else {
	header('location: ../index.php');
	exit();
}