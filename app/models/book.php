<?php
error_reporting(E_ALL);

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
        $pdo = $this->conn;
        // Begin the transaction
        $pdo->beginTransaction();
        try {
            // Sanitize
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->original_title = htmlspecialchars(strip_tags($this->original_title));
            $this->year_of_publication = htmlspecialchars(strip_tags($this->year_of_publication));
            $this->genre = htmlspecialchars(strip_tags($this->genre));
            $this->millions_sold = htmlspecialchars(strip_tags($this->millions_sold));
            $this->language = htmlspecialchars(strip_tags($this->language));
            $this->image_path = htmlspecialchars(strip_tags($this->image_path));

            // Query 1: Attempt to insert book image
            $sql = "INSERT INTO book_images (path) VALUES ( ? )";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                    $this->image_path
                )
            );
            // Fetch id of the recently inserted image
            $book_image_id = $pdo->lastInsertId();

            // Query 2: Attempt to insert Book
            $sql = "INSERT INTO books (title, original_title, year_of_publication, genre, millions_sold, language, book_image_id)
                VALUES (:title, :original_title, :year_of_publication, :genre, :millions_sold, :language, :book_image_id)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ":title" => $this->title,
                ":original_title" => $this->original_title,
                ":year_of_publication" => $this->year_of_publication,
                ":genre" => $this->genre,
                ":millions_sold" => $this->millions_sold,
                ":language" => $this->language,
                ":book_image_id" => $book_image_id
            ));
            // Commit the Changes
            $pdo->commit();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            // Recognize mistake and roll back changes
            $pdo->rollBack();
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
        $pdo = $this->conn;
        // Begin the transaction
        try {
            $pdo->beginTransaction();
            // Sanitize input
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->original_title = htmlspecialchars(strip_tags($this->original_title));
            $this->year_of_publication = htmlspecialchars(strip_tags($this->year_of_publication));
            $this->genre = htmlspecialchars(strip_tags($this->genre));
            $this->millions_sold = htmlspecialchars(strip_tags($this->millions_sold));
            $this->language = htmlspecialchars(strip_tags($this->language));
            $this->image_path = htmlspecialchars(strip_tags($this->image_path));

            if (!empty($_FILES['fileToUpload']['name'])) //new image uploaded
            {
                // Query 1: Attempt to update book image
                echo $this->id;
                echo $this->image_path;
                $sql = "UPDATE book_images SET path = :path WHERE id = (SELECT book_image_id FROM books WHERE books.id = :id)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    ":path" => $this->image_path,
                    ":id" => $this->id
                ));
                // Query 2: Attempt to insert Book
                $sql = "UPDATE books 
                SET 
                  title = :title, 
                  original_title = :original_title, 
                  year_of_publication = :year_of_publication, 
                  genre = :genre, 
                  millions_sold = :millions_sold, 
                  language = :language
                WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    ":id" => $this->id,
                    ":title" => $this->title,
                    ":original_title" => $this->original_title,
                    ":year_of_publication" => $this->year_of_publication,
                    ":genre" => $this->genre,
                    ":millions_sold" => $this->millions_sold,
                    ":language" => $this->language
                ));
            } else // no new image
            {
                // Query 2: Attempt to insert Book
                $sql = "UPDATE books 
                SET 
                  title = :title, 
                  original_title = :original_title, 
                  year_of_publication = :year_of_publication, 
                  genre = :genre, 
                  millions_sold = :millions_sold, 
                  language = :language
                WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                    ":id" => $this->id,
                    ":title" => $this->title,
                    ":original_title" => $this->original_title,
                    ":year_of_publication" => $this->year_of_publication,
                    ":genre" => $this->genre,
                    ":millions_sold" => $this->millions_sold,
                    ":language" => $this->language
                ));
            }
            // Commit the Changes
            $pdo->commit();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            // Recognize mistake and roll back changes
            $pdo->rollBack();
            die();
        }

        return true;
    }

    function delete()
    {
        $query = "DELETE FROM books WHERE id = :id";
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
