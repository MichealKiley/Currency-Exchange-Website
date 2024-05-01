<?php

declare(strict_types=1);

function log_user_in(object $pdo, string $username, string $pwd, string $email)
{
    $hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT, ['cost' => 12]);

    $query = ("SELECT username,pwd,email FROM users WHERE username = :username OR email = :email AND pwd = :pwd;");
    $db_stmt = $pdo->prepare($query);

    $db_stmt->bindPARAM(":username", $username);
    $db_stmt->bindPARAM(":email", $email);
    $db_stmt->bindPARAM(":pwd", $hashed_pwd);
    $db_stmt->execute();

    $results = $db_stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}

function check_for_user(object $pdo, string $username, string $email)
{
    $query = ("SELECT username,email FROM users WHERE username = :username OR email = :email;");
    $db_stmt = $pdo->prepare($query);

    $db_stmt->bindPARAM(":username", $username);
    $db_stmt->bindPARAM(":email", $email);
    $db_stmt->execute();

    $results = $db_stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}


function get_logged_user(object $pdo, string $username)
{
    $query = ("SELECT id FROM users WHERE username = :username;");
    $db_stmt = $pdo->prepare($query);

    $db_stmt->bindPARAM(":username", $username);
    $db_stmt->execute();

    $results = $db_stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
