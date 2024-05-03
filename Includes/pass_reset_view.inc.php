<?php

//links to forgot.inc.php, verify.inc.php, and reset.inc.php

declare(strict_types=1);

function errors_on_reset()
{
    if (isset($_SESSION["errors_reset"])) {
        $errors = $_SESSION["errors_reset"];

        foreach ($errors as $type => $msg) {
            echo "<p style=\"color:red;\">" . $msg . "</p>";
        }
        unset($_SESSION["errors_reset"]);
    }
}
