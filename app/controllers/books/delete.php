<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object file
include_once '../../config/database.php';
include_once '../../models/book.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
$book = new Book($db);
$data = json_decode(file_get_contents("php://input"));

$book->id = $data->id;
// delete the product
if($book->delete()){
    echo '{';
    echo '"message": "Book was deleted."';
    echo '}';
}

// if unable to delete the product
else{
    echo '{';
    echo '"message": "Unable to delete Book."';
    echo '}';
}
?>