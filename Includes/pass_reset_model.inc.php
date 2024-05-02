<?php

declare(strict_types=1);

function check_user_email(object $pdo, string $username, string $email)
{
    $query = "SELECT username,email,id FROM users WHERE username = :username OR email = :email;";
    $db_stmt = $pdo->prepare($query);

    $db_stmt->bindPARAM(":username", $username);
    $db_stmt->bindPARAM(":email", $email);
    $db_stmt->execute();

    $results = $db_stmt->fetch(PDO::FETCH_ASSOC);

    return $results;
}

// function check_verification(object $pdo)
// {
//     if ()
//     $query = "SELECT "
// }
