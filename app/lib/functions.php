<?php

class func
{
    // Check if user is logged in
    public static function checkLoginState($db)
    {
        // If a username and password have been submitted:
        if (isset($_POST['username']) && isset($_POST['password'])) {
            try {
                // Query the database for a match
                $query = "SELECT * FROM users WHERE name = :username";

                // Sanitize
                $username = htmlspecialchars(strip_tags($_POST['username']));
                $password = htmlspecialchars(strip_tags($_POST['password']));

                $stmt = $db->prepare($query);
                $stmt->execute(array(':username' => $username));

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $hashed_password = $row['pass'];

                // If the password matches the hashed_password
                if (password_verify($password, $hashed_password)) {
                    // Log the user in
                    header("location:/assignment_3/");
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['notice'] = null;
                    echo 'works';
                } else {
                    $_SESSION['notice'] = 'Incorrect username and/or password';
                    $_SESSION['css'] = 'error';
                    $_SESSION['loggedIn'] = false;
                    include 'app/views/layout/login.php';
                    echo 'Incorrect username';
                    exit();
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            // If not logged in
            if (!isset($_SESSION['loggedIn'])) {
                include 'app/views/layout/login.php';
                exit();
            }
        }
    }

    // Creates a user
    public static function createUser($username, $password, $db)
    {
        // if POST parameters equalling a username and password are found
        if (isset($_POST['username']) && isset($_POST['password'])) {

            // Insert Query
            try {
                $query = "
                  INSERT INTO users 
                  SET 
                    name = :username,
                    pass = :password
                    ";

                // Sanitize
                $sanitized_username = htmlspecialchars(strip_tags($username));
                $sanitized_password = htmlspecialchars(strip_tags($password));

                // Hash the password
                $hashed_password = password_hash($sanitized_password, PASSWORD_DEFAULT);

                $stmt = $db->prepare($query);
                $stmt->execute(array(':username' => $sanitized_username, ':password' => $hashed_password));


                session_start();
                $_SESSION['notice'] = "Registration successful";
                $_SESSION['css'] = 'success';

                // Loads the home-page
                header('Location:/assignment_3');

            } catch (PDOException $e) {
                header('location:/assignment_3/#/registration');

                // gives us access to the $_SESSION super-global
                session_start();

                // assuming the only error returned is a duplicate username:
                $_SESSION['notice'] = "Username not available";
                $_SESSION['css'] = 'error';
            }
        }
    }
}