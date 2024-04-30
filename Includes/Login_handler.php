<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //connecting file to db and assigning whether the request is a Create or Login
    require_once "dbh.inc.php";
    $request_type = $_POST["account_type"];

    //Create user
    if ($request_type == "Create") {

        //assigning variables
        $user_username = $_POST["username"];
        $user_password = $_POST["password"];
        $user_email = $_POST["email"];
        $user_exist = false;

        //checking db if user already exists
        $query = ("SELECT id, username, email FROM users");
        $db_stmt = $pdo->prepare($query);

        $db_stmt->execute();

        $results = $db_stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $value) {
            $user_id = $value["id"];
            $username = $value["username"];
            $email = $value["email"];

            if ($username == $user_username or $email == $user_email) {
                $user_exist = true;
                echo "<a href=\"../index.php\">" . "This email or username is already taken, please try again!" . "</a>";
            }
        }

        //if user does not exist, it enters a new user into the db
        if ($user_exist != true) {

            //entering new user into db
            $query = ("INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email)");
            $db_stmt = $pdo->prepare($query);

            $db_stmt->bindParam(":username", $user_username);
            $db_stmt->bindParam(":pwd", $user_password);
            $db_stmt->bindParam(":email", $user_email);

            $db_stmt->execute();


            //creating session for new user
            $query = ("SELECT id,username From users WHERE username = :username;");
            $db_stmt = $pdo->prepare($query);

            $db_stmt->bindParam(":username", $user_username);
            $db_stmt->execute();

            $results = $db_stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $value) {
                $_SESSION["user_id"] = $value["id"];
                $_SESSION["username"] = $value["username"];
            }

            header("Location: ../Views/converter.php");

            $pdo = null;
            $db_stmt = null;

            die();
        }
    }

    //User Login
    if ($request_type == "Login") {

        //assigning variables
        $user_email_password = $_POST["email-password"];
        $user_password = $_POST["password"];
        $user_exist = false;

        //checking users db to see if user exists
        $query = ("SELECT id, username, email, pwd FROM users");
        $db_stmt = $pdo->prepare($query);

        $db_stmt->execute();

        $results = $db_stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $value) {
            $username = $value["username"];
            $email = $value["email"];
            $pwd = $value["pwd"];

            if ($email == $user_email_password or $username == $user_email_password and $pwd == $user_password) {
                $username = $value["username"];
                $user_id = $value["id"];
                $user_exist = true;
                break;
            }
        }

        //Creating session for user
        if ($user_exist == true) {
            $_SESSION["user_id"] = $user_id;
            $_SESSION["username"] = $username;
        } else {
            echo "User not found!";
            die();
        }

        $pdo = null;
        $db_stmt = null;

        header("Location: ../Views/converter.php");

        die();
    }
} else {
    header("Location: ../index.php");
}
