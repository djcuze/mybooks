<?php
session_start();
require_once 'app/config/database.php';
$database = new Database();
$db = $database->getConnection();
