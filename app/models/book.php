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
    public $image_path;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {
        $query = "SELECT books.*, i.path AS image_path FROM books INNER JOIN book_images i ON books.book_image_id = i.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function create()
    {
        try {
            $stmt = $this->conn;
            $stmt->beginTransaction();
            // query to insert record
            $query_for_image = "INSERT INTO book_images
             SET
               path = 'http://placehold.it/300/300'
              ";
            $stmt->exec($query_for_image);
            $image_id = $stmt->lastInsertId();
            echo $image_id;
            $query_for_book = "INSERT INTO book
            SET 
                title=:title, 
                original_title=:original_title, 
                year_of_publication=:year_of_publication, 
                genre=:genre, 
                millions_sold=:millions_sold,
                language= :language,
                AuthorID = 1,
                book_image_id = $image_id 
                ";
            $stmt->exec($query_for_book);
            // Sanitize parameters
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
            $stmt->commit();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            // Recognize mistake and roll back changes
            $stmt->rollBack();
            die();
        }
        return true;
    }

    function readOne()
    {
        // query to read single record
        $query = "
            SELECT    
              books.*, 
              i.path AS image_path 
            FROM books 
            INNER JOIN book_images i ON books.book_image_id = i.id 
            WHERE books.id = :id LIMIT 1
            ";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // set values to object properties
        $this->id = $row['id'];
        $this->title = $row['title'];
        $this->original_title = $row['original_title'];
        $this->year_of_publication = $row['year_of_publication'];
        $this->genre = $row['genre'];
        $this->millions_sold = $row['millions_sold'];
        $this->language = $row['language'];
        $this->image_path = $row['image_path'];
    }

    function update()
    {
        try {
            $query = "UPDATE books
            SET 
                title = :title, 
                original_title = :original_title, 
                year_of_publication = :year_of_publication, 
                genre = :genre, 
                millions_sold = :millions_sold,
                language = :language
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
        $query = "DELETE FROM book WHERE id = :id";
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
