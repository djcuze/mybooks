<?php
session_start();
require_once 'app/config/database.php';
require_once 'app/views/books/index.php';
require_once 'app/views/books/show.php';
require_once 'app/views/books/new.php';

$database = new Database();
$db = $database->getConnection();
