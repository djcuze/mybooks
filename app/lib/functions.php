<?php

class func
{
    // Check if user is logged in
    public static function checkLoginState($db)
    {

        // If a username and password have been submitted:
        if (isset($_POST['username']) && isset($_POST['password'])) {

            // Query the database for a match
            $query = "SELECT * FROM users WHERE name = :username AND pass = :password";

            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $db->prepare($query);
            $stmt->execute(array(':username' => $username, ':password' => $password));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // If a match is found
            if ($row['user_id'] > 0) {
                header("location:/assignment_3/");
                $_SESSION['loggedIn'] = true;
            } else {
                print_r($_SESSION['notice']);
                include 'app/views/layout/login.php';
                $_SESSION['loggedIn'] = false;
                exit();
            }
        } else {
            // If not logged in
            if (!isset($_SESSION['loggedIn'])) {
                include 'app/views/layout/login.php';
                exit();
            }
        }
    }
}