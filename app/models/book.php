<?php

class Book
{
    // database connection and table name
    private $conn;
    private $table_name = "book";
    public $title;
    public $original_title;
    public $year_of_publication;
    public $genre;
    public $millions_sold;
    public $language;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {
        // select all query
        $query = "SELECT * FROM book";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }

    function create()
    {
        // query to insert record
        $query = "
            INSERT INTO book 
            SET 
                BookTitle = :title, 
                OriginalTitle = :original_title, 
                YearofPublication = :year_of__publication, 
                Genre = :genre, 
                MillionsSold = :millions_sold,
                LanguageWritten = :language
                ";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->original_title = htmlspecialchars(strip_tags($this->original_title));
        $this->year_of_publication = htmlspecialchars(strip_tags($this->year_of_publication));
        $this->genre = htmlspecialchars(strip_tags($this->genre));
        $this->millions_sold = htmlspecialchars(strip_tags($this->millions_sold));
        $this->language = htmlspecialchars(strip_tags($this->language));
        // bind values
        print_r($this);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":original_title", $this->original_title);
        $stmt->bindParam(":year_of_publication", $this->year_of_publication);
        $stmt->bindParam(":genre", $this->genre);
        $stmt->bindParam(":millions_sold", $this->millions_sold);
        $stmt->bindParam(":language", $this->language);
        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function readOne()
    {
        // query to read single record
        $query = "SELECT
                categories.id, categories.book_number, categories.book_date, suppliers.name AS supplier_name
            FROM
                " . $this->table_name . "
            INNER JOIN suppliers ON categories.supplier_id = suppliers.id
            WHERE
                categories.id = ?
            LIMIT
                1";
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->id = $row['id'];
        $this->book_number = $row['book_number'];
        $this->book_date = $row['book_date'];
        $this->supplier_name = $row['supplier_name'];
    }

    function update()
    {

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                SET book_date = :book_date, book_number = :book_number, supplier_id = :supplier_id
            WHERE
                id = :id";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->book_number = htmlspecialchars(strip_tags($this->book_number));
        $this->book_date = htmlspecialchars(strip_tags($this->book_date));
        $this->supplier_id = htmlspecialchars(strip_tags($this->supplier_id));
        // bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":book_number", $this->book_number);
        $stmt->bindParam(":book_date", $this->book_date);
        $stmt->bindParam(":supplier_id", $this->supplier_id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function delete()
    {
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
