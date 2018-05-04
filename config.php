<?php
require_once 'app/config/database.php';
require_once 'app/lib/functions.php';

// Create a Database connection
$database = new Database();
$db = $database->getConnection();

// Start a session
session_start();

// Check login state
func::checkLoginState($db);

require_once 'app/views/books/index.php';
require_once 'app/views/books/show.php';
require_once 'app/views/books/new.php';
require_once 'app/views/books/edit.php';
require_once 'app/views/layout/registration.php';
