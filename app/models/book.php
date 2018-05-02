<?php

class Book
{
    // database connection and table name
    private $conn;
    public $id;
    public $title;
    public $original_title;
    public $year_of_publication;
    public $genre;
    public $millions_sold;
    public $language;
    public $plot;
    public $author;

    // constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT * FROM book_view";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function create() {
        // query to insert record
        $query = "
            INSERT INTO book_view 
            SET 
                BookTitle = :title, 
                OriginalTitle = :original_title, 
                YearofPublication = :year_of__publication, 
                Genre = :genre, 
                MillionsSold = :millions_sold,
                LanguageWritten = :language,
                Plot = :plot,
                Author = :author,
                ";

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->original_title = htmlspecialchars(strip_tags($this->original_title));
        $this->year_of_publication = htmlspecialchars(strip_tags($this->year_of_publication));
        $this->genre = htmlspecialchars(strip_tags($this->genre));
        $this->millions_sold = htmlspecialchars(strip_tags($this->millions_sold));
        $this->language = htmlspecialchars(strip_tags($this->language));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->plot = htmlspecialchars(strip_tags($this->plot));
        // prepare query
        $stmt = $this->conn->prepare($query);
        // bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":original_title", $this->original_title);
        $stmt->bindParam(":year_of_publication", $this->year_of_publication);
        $stmt->bindParam(":genre", $this->genre);
        $stmt->bindParam(":millions_sold", $this->millions_sold);
        $stmt->bindParam(":language", $this->language);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":plot", $this->plot);

        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function readOne()
    {
        // query to read single record
        $query = "
            SELECT *
            FROM book_view
            WHERE BookID = :id
            LIMIT 1";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // set values to object properties
        $this->id = $row['BookID'];
        $this->title = $row['BookTitle'];
        $this->original_title = $row['OriginalTitle'];
        $this->year_of_publication = $row['YearofPublication'];
        $this->genre = $row['Genre'];
        $this->millions_sold = $row['MillionsSold'];
        $this->language = $row['LanguageWritten'];
        $this->author = $row['Author'];
        $this->plot = $row['Plot'];
    }

    function update()
    {
        $query = "
            UPDATE book
            SET 
                BookTitle = :title, 
                OriginalTitle = :original_title, 
                YearofPublication = :year_of__publication, 
                Genre = :genre, 
                MillionsSold = :millions_sold,
                LanguageWritten = :language
            WHERE
                BookID = :id
                ";
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->original_title = htmlspecialchars(strip_tags($this->original_title));
        $this->year_of_publication = htmlspecialchars(strip_tags($this->year_of_publication));
        $this->genre = htmlspecialchars(strip_tags($this->genre));
        $this->millions_sold = htmlspecialchars(strip_tags($this->millions_sold));
        $this->language = htmlspecialchars(strip_tags($this->language));
        // bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":original_title", $this->original_title);
        $stmt->bindParam(":year_of_publication", $this->year_of_publication);
        $stmt->bindParam(":genre", $this->genre);
        $stmt->bindParam(":millions_sold", $this->millions_sold);
        $stmt->bindParam(":language", $this->language);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function delete()
    {
        $query = "DELETE FROM book_view WHERE BookID = :id";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);
        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
