<?php

if (isset($_SERVER["user_id"])) {

    try {
        require_once "./profile_contr.inc.php";
        require_once "./profile_model.inc.php";
        require_once "./dbh.inc.php";

        require_once "./config_session.inc.php";
    } catch (Exception $e) {
        echo "Query Failed: " . $e->getMessage();
    }
} else {
    header("Location: ../Views/login.php");
    $_SESSION["errors_login"] = array("error" => "Not signed in!");
}
