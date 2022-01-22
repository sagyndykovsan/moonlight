<?php

// database credentials for connection

$DB_HOST = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "root";
$DB_NAME = "moonlight";

$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if ($conn->connect_error) {
	die("connection error: " . $conn->connect_error);
}