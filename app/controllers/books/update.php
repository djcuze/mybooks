<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../../config/database.php';
include_once '../../models/book.php';
$database = new Database();
$db = $database->getConnection();

$book = new Book($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// set book property values
$book->title = $data->title;
$book->original_title = $data->original_title;
$book->year_of_publication = $data->year_of_publication;
$book->genre = $data->genre;
$book->millions_sold = $data->millions_sold;
$book->language = $data->language;
//$book->plot = $data->plot;
//$book->author = $data->author;

// create the book
if ($book->update()) {
    echo '{';
    echo '"message": "Book was updated successfully."';
    echo '}';
} // if unable to create the book, tell the user
else {
    echo '{';
    echo '"message": "Unable to create book."';
    echo '}';
}
?>