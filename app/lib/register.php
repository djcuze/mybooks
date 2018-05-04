<?php
include_once 'functions.php';
include "../config/database.php";
session_unset();
// Create database connection
$database = new Database();
$db = $database->getConnection();
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create a user
func::createUser($_POST['username'], $_POST['password'], $db);

//header('location:/assignment_3');

session_start();

