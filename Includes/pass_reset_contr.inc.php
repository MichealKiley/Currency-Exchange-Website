<?php

declare(strict_types=1);


function is_input_empty(string $username, string $email)
{
    if (empty($username) or empty($email)) {
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
