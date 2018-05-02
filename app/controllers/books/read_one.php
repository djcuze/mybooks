<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../../config/database.php';
include_once '../../models/book.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$book = new Book($db);
$book->id = isset($_GET['id']) ? $_GET['id'] : die();
$book->readOne();
$book_arr = array(
    "id" => $book->id,
    "title" => $book->title,
    "original_title" => $book->original_title,
    "year_of_publication" => $book->year_of_publication,
    "genre" => $book->genre,
    "millions_sold" => $book->millions_sold,
    "language" => $book->language
);
print_r(json_encode($book_arr));
?>