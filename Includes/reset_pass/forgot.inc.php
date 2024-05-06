<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["email-username"];
    $email = $_POST["email-username"];

    try {

        require_once "pass_reset_contr.inc.php";
        require_once "pass_reset_model.inc.php";
        require_once "../tasks/email_code.php";
        require_once "../dbh.inc.php";

        $errors = [];

        if (is_input_empty($username, $email)) {
            $errors["input_errors"] = "Fill in all fields!";
        }

        if (!user_exists($pdo, $username, $email) and !is_input_empty($username, $email)) {
            $errors["user_exist"] = "User doesn't exist!";
        }

        require_once "../config_session.inc.php";

        if ($errors) {
            header("Location: /Views/forgot.php");
            $_SESSION["errors_reset"] = $errors;
        } else {
            $_SESSION["reset_user_id"] = check_user_email($pdo, $username, $email)["id"];
            $_SESSION["reset_user_email"] = check_user_email($pdo, $username, $email)["email"];
            $_SESSION["reset_user_username"] = check_user_email($pdo, $username, $email)["username"];
            send_verify_code_email($pdo);
            header("Location: /Views/verify.php");
        }
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ./login.php");
    die();
}
