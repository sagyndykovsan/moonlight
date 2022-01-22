<?php

session_start();

if ($_SESSION['role'] === 'admin') {

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$name = trim($_POST['name']);
	$lastname = trim($_POST['lastname']);
	$gender = $_POST['gender'];
	$birthday = $_POST['birthday'];

	// check if any input empty

	if (emptyInputUser($username, $password, $name, $lastname, $gender, $birthday) !== false) {
		header('location: ../create-user.php?error=emptyinput');
		exit();
	}

	// check name and lastname for invalid letter

	if (validateFullname($name, $lastname) === true) {
		header('location: ../create-user.php?error=fullnameinvalid');
		exit();
	}

	createUser($username, $password, $name, $lastname, $gender, $birthday, $conn);

} else {
	header('location: ../index.php');
	exit();
}