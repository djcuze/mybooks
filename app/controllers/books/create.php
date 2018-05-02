<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../../config/database.php';
include_once '../../models/book.php';

$database = new Database();
$db = $database->getConnection();

$book = new Book($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// set book property values
$book->book_date = $_POST['book_date'];
$book->book_number = $_POST['book_number'];
$book->supplier_id = $_POST['supplier_id'];

// create the book
if ($book->create()) {
    echo '{';
    echo '"message": "Book was created."';
    echo '}';
} // if unable to create the book, tell the user
else {
    echo '{';
    echo '"message": "Unable to create book."';
    echo '}';
}
?>