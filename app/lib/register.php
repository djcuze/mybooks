<?php
include_once 'functions.php';
include "../config/database.php";
session_unset();
// Create database connection
$database = new Database();
$db = $database->getConnection();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$username = $_POST['username'];
$password = $_POST['password'];
$access_level = $_POST['access_level'];
// Create a user
func::createUser($username, $password, $access_level, $db);

//header('location:/assignment_3');

session_start();

