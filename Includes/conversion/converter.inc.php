<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //assigning form data to variables
    $pre_currency = $_POST["pre_currency"];
    $post_currency = $_POST["post_currency"];
    $amount_of_currency = $_POST["amount_of_currency"];


    try {
        require_once "../dbh.inc.php";
        require_once "converter_model.inc.php";
        require_once "converter_contr.inc.php";
        require_once "converter_view.inc.php";

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($pre_currency, $post_currency, $amount_of_currency)) {
            $errors["input_errors"] = "Fill in all fields!";
        }

        require_once "../config_session.inc.php";

        if ($errors) {
            $_SESSION["errors_converter"] = $errors;
            header("Location: /Views/converter.php");
        } else {
            make_conversion($pre_currency, $post_currency, $amount_of_currency, get_currency_type($pdo));
            post_conversion_history($pdo, $pre_currency, $post_currency, $amount_of_currency);
            header("Location: /Views/converter.php");
        }
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
