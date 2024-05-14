<?php


if ($_SERVER["REQUEST_METHOD"] = "POST") {

    $currency_type = $_POST["currency_history_choice"];

    try {
        require_once "../config_session.inc.php";
        require_once "rate_history_model.inc.php";
        require_once "rate_history_contr.inc.php";
        require_once "../dbh.inc.php";

        $errors = [];

        if (is_input_empty($currency_type)) {
            $errors["input_errors"] = "Fill in all fields!";
        }

        if ($errors) {
            $_SESSION["errors_search"] = $errors;
            header("Location: /Views/rate_search.php");
        } else {
            $_SESSION["search_currency_type"] =  $currency_type;
            header("Location: /Views/rate_history.php");
        }
    } catch (Exception $e) {
        echo "Query Failed: " . $e;
    }
} else {
    header("Location: index.php");
}
