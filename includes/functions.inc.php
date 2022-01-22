<?php

// returns true if any input empty

function emptyInputLogin($username, $password) {

	if (empty($username) || empty($password)) {
		return true;
	} else {
		return false;
	}
}

function emptyInputUser($username, $password, $name, $lastname, $gender, $birthday) {

	if (empty($username) || empty($password) || empty($name) || empty($lastname) || empty($gender) || empty($birthday)) {
		return true;
	} else {
		return false;
	}
}

// check fullname for invalid letters

function validateFullname($name, $lastname) {
	if (!preg_match("/^[a-zA-Z]*$/", $name) && !preg_match("/^[a-zA-Z]*$/", $lastname)) {
		return true;
	} else {
		return false;
	}
}

// checks if user exists in database

function userExists($username, $conn) {
	$stmt = $conn->prepare("SELECT * FROM Users WHERE username=?");

	if (!$stmt) {
		header("location: ../index.php?error=requesterror");
		exit();
	}

	$stmt->bind_param('s', $username);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($row = $result->fetch_assoc()) {
		return $row;
	} else {
		$result = false;
		return $result;
	}

	$stmt->close();
}

// insert user in database

function createUser($username, $password, $name, $lastname, $gender, $birthday, $conn) {
		$user = userExists($username, $conn);

		if ($user !== false) {
			header("location: ../create-user.php?error=userexist");
			exit();
		}

		$stmt = $conn->prepare("INSERT INTO users VALUES (?, ?, ?, ?, ?, ?)");

		if (!$stmt) {
			header("location: ../index.php?error=requesterror");
			exit();
		}

		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		$stmt->bind_param('ssssss', $username, $hashedPassword, $name, $lastname, $gender, $birthday);
		$stmt->execute();
		$stmt->close();

		header('location: ../create-user.php?error=none');
		exit();
}

// updates user in database

function updateUser($oldusername, $oldpassword, $username, $password, $name, $lastname, $gender, $birthday, $conn) {
	$stmt = $conn->prepare("UPDATE users SET username=?, password=?, name = ?, lastname = ?, gender=?,birthday=? WHERE username = ?");

	if (!$stmt) {
			header("location: ../index.php?error=requesterror");
			exit();
	}

	$password = empty($password) ? $oldpassword : $password;

	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	$stmt->bind_param('sssssss', $username, $hashedPassword, $name, $lastname, $gender, $birthday, $oldusername);
	$stmt->execute();
	$stmt->close();

	header("location: ../update-user.php?error=none");
	exit();
}

// starts a session for logged user

function loginUser($username, $password, $conn) {
	$user = userExists($username, $conn);

	if ($user === false) {
		header('location: ../index.php?error=usernotexist');
		exit();
	}

	$hashedPassword = $user["password"];
	$checkPassword = password_verify($password, $hashedPassword);

	if ($checkPassword === false) {
		header('location: ../index.php?error=wrongpassword');
		exit();
	}

	if ($checkPassword === true) {
		session_start();
		$result = $conn->query("SELECT * FROM admins WHERE username='$username'");
		if ($row = $result->fetch_assoc()) {
			$_SESSION['role'] = $row['role'];
		}
		$_SESSION['username'] = $username;
		header("location: ../admin-panel.php");
		exit();
	}
}

	