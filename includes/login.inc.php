<?php


if ( isset($_POST['submit']) ) {

	$username = $_POST['username'];
	$pwd = $_POST['password'];

	require_once "dbh.inc.php";
	require_once "functions.inc.php";

	// checking if inputs not empty

	if ( emptyInputLogin($username, $pwd) !== false ) {
		header('location: ../index.php?error=emptyinput');
		exit();
	}

	loginUser($username, $pwd, $conn);

} else {
	header("location: ../index.php");
	exit();
}