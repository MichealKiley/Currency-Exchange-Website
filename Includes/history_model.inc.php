<?php

declare(strict_types=1);

function get_conversion_history(object $pdo)
{
    $query = "SELECT * FROM conversion_history WHERE users_id = :users_id;";
    $db_stmt = $pdo->prepare($query);

    $db_stmt->bindPARAM(":users_id", $_SESSION["user_id"]);
    $db_stmt->execute();

    $results = $db_stmt->fetchALL(PDO::FETCH_ASSOC);

    return $results;
}
