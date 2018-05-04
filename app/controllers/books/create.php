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
include_once '../../lib/file_upload.php';

$database = new Database();
$db = $database->getConnection();

$book = new Book($db);
// uploads the file
fileUpload();
// set book property values
$book->title = $_POST['title'];
$book->original_title = $_POST['original_title'];
$book->year_of_publication = $_POST['year_of_publication'];
$book->genre = $_POST['genre'];
$book->millions_sold = $_POST['millions_sold'];
$book->language = $_POST['language'];
$book->image_path = 'public/covers/' . $_FILES["fileToUpload"]["name"];

// Author
$book->author_first_name = $_POST['author_first_name'];
$book->author_surname = $_POST['author_surname'];
$book->author_nationality = $_POST['author_nationality'];
$book->author_birth_year = $_POST['author_birth_year'];

// create the book
if ($book->create()) {
    echo '{';
    echo '"message": "Book was created."';
    echo '}';
    header('Location:/assignment_3/');
    session_start();
    $_SESSION['notice'] = 'Book created successfully!';
    $_SESSION['css'] = 'success';
} // if unable to create the book, tell the user
else {
    echo '{';
    echo '"message": "Unable to create book."';
    echo '}';
}
?>