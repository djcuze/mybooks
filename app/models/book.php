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

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {
        $query = "SELECT * FROM book";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function create()
    {
        try {
            // query to insert record
            $query = "INSERT INTO book
            SET 
                title=:title, 
                original_title=:original_title, 
                year_of_publication=:year_of_publication, 
                genre=:genre, 
                millions_sold=:millions_sold,
                language= :language,
                AuthorID = 1
                ";

            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->original_title = htmlspecialchars(strip_tags($this->original_title));
            $this->year_of_publication = htmlspecialchars(strip_tags($this->year_of_publication));
            $this->genre = htmlspecialchars(strip_tags($this->genre));
            $this->millions_sold = htmlspecialchars(strip_tags($this->millions_sold));
            $this->language = htmlspecialchars(strip_tags($this->language));
            // prepare query
            $stmt = $this->conn->prepare($query);
            // bind values
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":original_title", $this->original_title);
            $stmt->bindParam(":year_of_publication", $this->year_of_publication);
            $stmt->bindParam(":genre", $this->genre);
            $stmt->bindParam(":millions_sold", $this->millions_sold);
            $stmt->bindParam(":language", $this->language);
            $stmt->execute();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return true;
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
        $this->title = $row['title'];
        $this->original_title = $row['original_title'];
        $this->year_of_publication = $row['year_of_publication'];
        $this->genre = $row['genre'];
        $this->millions_sold = $row['millions_sold'];
        $this->language = $row['language'];
        $this->author = $row['author'];
        $this->plot = $row['plot'];
    }

    function update()
    {
        try {
            $query = "UPDATE 
              book_view
            SET 
                title = :title, 
                original_title = :original_title, 
                year_of_publication = :year_of_publication, 
                genre = :genre, 
                millions_sold = :millions_sold,
                book_view.language = :book_view.language
            WHERE
                id = :id";
            $stmt = $this->conn->prepare($query);
            // sanitize
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->original_title = htmlspecialchars(strip_tags($this->original_title));
            $this->year_of_publication = htmlspecialchars(strip_tags($this->year_of_publication));
            $this->genre = htmlspecialchars(strip_tags($this->genre));
            $this->millions_sold = htmlspecialchars(strip_tags($this->millions_sold));
            $this->language = htmlspecialchars(strip_tags($this->language));
            // bind values
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":original_title", $this->original_title);
            $stmt->bindParam(":year_of_publication", $this->year_of_publication);
            $stmt->bindParam(":genre", $this->genre);
            $stmt->bindParam(":millions_sold", $this->millions_sold);
            $stmt->bindParam(":language", $this->language);
            $stmt->execute();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return true;
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
