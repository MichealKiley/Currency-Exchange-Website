<?php

if (isset($_SESSION["user_id"])) {
    try {
        require_once "dbh.inc.php";
        require_once "history_model.inc.php";
        require_once "history_contr.inc.php";

        require_once "./config_session.inc.php";
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    //redirect to login page and add error to page
    header("Location: ../Views/login.php");
    $_SESSION["errors_login"] = array("error" => "Not signed in!");
}
