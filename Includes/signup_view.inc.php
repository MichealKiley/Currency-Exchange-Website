<?php

declare(strict_types=1);

function errors_on_signup()
{
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];

        foreach ($errors as $type => $msg) {
            echo "<p style=\"color:red;\">" . $msg . "</p>";
        }
        unset($_SESSION["errors_signup"]);
    }
}
