<?php

declare(strict_types=1);

function user_logged_in(object $pdo, string $username, string $pwd, string $email)
{
    if (log_user_in($pdo, $username, $pwd, $email)) {
        return true;
    } else {
        return false;
    }
}

function user_exists(object $pdo, string $username, string $email)
{
    if (!check_for_user($pdo, $username, $email)) {
        return true;
    } else {
        return false;
    }
}

function is_input_empty(string $username, string $pwd)
{
    if (empty($username) or empty($pwd)) {
        return true;
    } else {
        return false;
    }
}
