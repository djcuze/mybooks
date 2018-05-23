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

                $access_level = $row['access_level'];
                $hashed_password = $row['pass'];
                print_r($access_level);

                // If the password matches the hashed_password
                if (password_verify($password, $hashed_password)) {
                    session_start();
                    // Log the user in
                    $_SESSION['notice'] = 'Successfully logged in';
                    $_SESSION['css'] = 'success';
                    $_SESSION['loggedIn'] = true;
                    if ($access_level === 1) {
                        $_SESSION['admin'] = true;
                    }
                    header('Location:/mybooks');
                } else {
                    $_SESSION['notice'] = 'Incorrect username and/or password';
                    $_SESSION['css'] = 'error';
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            // If not logged in
            if (!isset($_SESSION['loggedIn'])) {
                $_SESSION['admin'] = false;
            }
        }
    }

    // Creates a user
    public static function createUser($username, $password, $access_level, $db)
    {
        // if POST parameters equalling a username and password are found
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['access_level'])) {

            // Insert Query
            try {
                $query = "
                  INSERT INTO users 
                  SET 
                    name = :username,
                    pass = :password,
                    access_level = :access_level
                    ";

                // Sanitize
                $sanitized_username = htmlspecialchars(strip_tags($username), ENT_NOQUOTES);
                $sanitized_password = htmlspecialchars(strip_tags($password), ENT_NOQUOTES);
                $sanitized_access_level = htmlspecialchars(strip_tags($access_level), ENT_NOQUOTES);

                // Hash the password
                $hashed_password = password_hash($sanitized_password, PASSWORD_DEFAULT);

                $stmt = $db->prepare($query);
                $stmt->execute(array(':username' => $sanitized_username, ':password' => $hashed_password, ':access_level' => $sanitized_access_level));

                session_start();
                $_SESSION['notice'] = "Registration successful";
                $_SESSION['css'] = 'success';

                // Loads the home-page
                header('Location:/mybooks');

            } catch (PDOException $e) {
                header('location:/mybooks/#/registration');

                // gives us access to the $_SESSION super-global
                session_start();

                // assuming the only error returned is a duplicate username:
                $_SESSION['notice'] = "Username not available";
                $_SESSION['css'] = 'error';
            }
        }
    }
}