<?php

declare(strict_types=1);

function errors_on_login()
{
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];

        foreach ($errors as $type => $msg) {
            echo "<p style=\"color:red;\">" . $msg . "</p>";
        }
        unset($_SESSION["errors_login"]);
    }
}

function user_signup_on_login()
{
    if (isset($_SESSION["user_signup"])) {
        $msg = $_SESSION["user_signup"];

        echo "<p style=\"color:green;\">" . $msg . "</p>";

        unset($_SESSION["user_signup"]);
    }
}
