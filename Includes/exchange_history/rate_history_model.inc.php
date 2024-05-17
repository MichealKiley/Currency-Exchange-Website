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

function get_currency_type(object $pdo)
{
    $currency_data = [];

    $query = "SELECT currency,ex_rate FROM currency_type;";
    $dbstmt = $pdo->prepare($query);
    $dbstmt->execute();

    $results = $dbstmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $value) {
        $currency_data[$value["currency"]] = $value["ex_rate"];
    }

    return $currency_data;
}
