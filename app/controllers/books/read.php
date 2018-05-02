<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../../config/database.php';
include_once '../../models/book.php';

// instantiate database and book object
$database = new Database();
$db = $database->getConnection();

// initialize object
$book = new Book($db);

// query products
$stmt = $book->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    // books array
    $books_arr = array();
    $books_arr["books"] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $book_item = array(
            "id" => $BookID,
            "title" => $BookTitle,
            "original_title" => $OriginalTitle,
            "year_of_publication" => $YearofPublication,
            "genre" => $Genre,
            "millions_sold" => $MillionsSold,
            "language" => $LanguageWritten,
            "plot" => $Plot,
            "author" => $Author,
        );
        array_push($books_arr["books"], $book_item);
    }

    echo json_encode($books_arr);
} else {
    echo json_encode(
        array("message" => "No books found.")
    );
}
?>