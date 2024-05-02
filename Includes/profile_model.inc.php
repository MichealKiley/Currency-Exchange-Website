<?php

declare(strict_types=1);

function get_profile_data($pdo)
{
    $query = "SELECT * FROM users WHERE id = :users_id;";
    $dbstmt = $pdo->prepare($query);

    $dbstmt->bindParam(":users_id", $_SESSION["user_id"]);

    $dbstmt->execute();

    $results = $dbstmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}
