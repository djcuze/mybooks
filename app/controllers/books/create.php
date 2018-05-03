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

print_r($_POST);
$book = new Book($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
// uploads the file
fileUpload();
// set book property values
$book->title = $_POST['title'];
$book->original_title = $_POST['original_title'];
$book->year_of_publication = $_POST['year_of_publication'];
$book->genre = $_POST['genre'];
$book->millions_sold = $_POST['millions_sold'];
$book->language = $_POST['language'];
$book->image_path = '../../public/images/inventory' . $_FILES["fileToUpload"]["name"];

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