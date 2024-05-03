<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_code = $_POST["verification_code"];

    try {
        require_once "./config_session.inc.php";
        require_once "./pass_reset_contr.inc.php";
        require_once "./pass_reset_model.inc.php";
        require_once "./dbh.inc.php";

        $errors = [];

        if (is_input_empty($user_code, "placeholder")) {
            $errors["input_errors"] = "Fill in all fields!";
        }

        if ($_SESSION["reset_user_code"] != $user_code) {
            $errors["wrong_code"] = "Code does not match!";
        }

        if ($errors) {
            header("Location: ../Views/verify.php");
            $_SESSION["errors_reset"] = $errors;
        } else {
            header("Location: ../Views/reset.php");
        }
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../login.php");
    die();
}
