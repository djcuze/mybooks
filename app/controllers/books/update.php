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
include_once '../../lib/file_upload.php';

$database = new Database();
$db = $database->getConnection();

$book = new Book($db);
if (!empty($_FILES['fileToUpload']['name'])) {
    // uploads the file
    fileUpload();
    $book->image_path = 'public/covers/' . $_FILES["fileToUpload"]["name"];
}
// Set book property values
$book->id = $_POST['id'];
$book->title = $_POST['title'];
$book->original_title = $_POST['original_title'];
$book->year_of_publication = $_POST['year_of_publication'];
$book->genre = $_POST['genre'];
$book->millions_sold = $_POST['millions_sold'];
$book->language = $_POST['language'];

// update the book
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