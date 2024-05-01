<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["email-username"];
    $email = $_POST["email-username"];
    $pwd = $_POST["password"];

    try {
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $pwd, $email)) {
            $errors["input_errors"] = "Fill in all fields!";
        }

        if (user_exists($pdo, $username, $email)) {
            $errors["user_not_exist"] = "Username or Email does not exist!";
        }

        if (user_logged_in($pdo, $username, $pwd, $email)) {
            $errors["pwd_not_valid"] = "Password does not match!";
        }

        require_once "./config_session.inc.php";

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../Views/login.php");
        }
        // CREATING SESSION IF NO ERRORS
        else {
            $_SESSION["user_id"] = get_logged_user($pdo, $username);
            header("Location: ../Views/converter.php");
        }
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
