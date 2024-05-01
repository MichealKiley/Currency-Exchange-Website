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
