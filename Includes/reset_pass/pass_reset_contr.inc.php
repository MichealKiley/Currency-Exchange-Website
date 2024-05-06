<?php

//links to forgot.inc.php, verify.inc.php, and reset.inc.php

declare(strict_types=1);


function is_input_empty(string $input1, string $input2)
{
    if (empty($input1) or empty($input2)) {
        return true;
    } else {
        return false;
    }
}

function user_exists(object $pdo, string $username, string $email)
{
    if (check_user_email($pdo, $username, $email)) {
        return true;
    } else {
        return false;
    }
}
