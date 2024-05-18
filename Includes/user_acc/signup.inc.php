<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $confirm_pwd = $_POST["confirm_password"];
    $email = $_POST["email"];

    try {
        require_once "../dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";
        require_once "../tasks/password_complexity.php";

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $pwd, $email)) {
            $errors["input_errors"] = "Fill in all fields!";
        }
        if ($pwd != $confirm_pwd) {
            $errors["wrong_pass"] = "Passwords do not match!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Email isn't valid!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username is taken!";
        }
        if (is_email_taken($pdo, $email)) {
            $errors["email_used"] = "Email already registered!";
        }

        if (!$errors) {
            foreach (password_complexity_checker($pwd) as $type => $msg) {
                $errors[$type] = $msg;
            }
        }

        require_once "../config_session.inc.php";

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: /../index.php");
        }
        // MAKING USER IF NO ERRORS
        else {
            create_user($pdo, $username, $pwd, $email);
            header("Location: /Views/login.php");
            $_SESSION["user_signup"] = "User " . $username . " has been created!";
        }
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
