<?php

declare(strict_types=1);

function get_rate_history(object $pdo)
{
    $query = "SELECT * FROM rate_history WHERE currency = :currency_type;";
    $db_stmt = $pdo->prepare($query);

    $db_stmt->bindPARAM(":currency_type", $_SESSION["search_currency_type"]);
    $db_stmt->execute();

    $results = $db_stmt->fetchALL(PDO::FETCH_ASSOC);

    return $results;
}
