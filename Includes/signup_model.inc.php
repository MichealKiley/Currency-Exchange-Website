<?php

declare(strict_types=1);


function get_username(object $pdo, string $username)
{
    $query = "SELECT username FROM users WHERE username = :username;";
    $db_stmt = $pdo->prepare($query);

    $db_stmt->bindPARAM(":username", $username);
    $db_stmt->execute();

    $results = $db_stmt->fetch(PDO::FETCH_ASSOC);

    return $results;
}

function get_email(object $pdo, string $email)
{
    $query = "SELECT email FROM users WHERE email = :email;";
    $db_stmt = $pdo->prepare($query);

    $db_stmt->bindPARAM(":email", $email);
    $db_stmt->execute();

    $results = $db_stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}

function create_user(object $pdo, string $username, string $pwd, string $email)
{
    $hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT, ['cost' => 12]);

    $query = "INSERT INTO users (username, pwd ,email) VALUES (:username, :pwd, :email)";
    $db_stmt = $pdo->prepare($query);

    $db_stmt->bindPARAM(":username", $username);
    $db_stmt->bindPARAM(":pwd", $hashed_pwd);
    $db_stmt->bindPARAM(":email", $email);
    $db_stmt->execute();
}
