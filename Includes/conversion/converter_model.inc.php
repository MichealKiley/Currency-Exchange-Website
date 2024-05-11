<?php

declare(strict_types=1);

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

    $_SESSION["currency_data"] = $currency_data;
}

function post_conversion_history(object $pdo, string $pre_currency, string $post_currency, string $amount_of_currency)
{
    $query = "INSERT INTO conversion_history (pre_type,post_type,pre_amount,post_amount,users_id) VALUES (:pre_type,:post_type,:pre_amount,:post_amount,:users_id)";
    $dbstmt = $pdo->prepare($query);

    $dbstmt->bindParam(":pre_type", $pre_currency);
    $dbstmt->bindParam(":post_type", $post_currency);
    $dbstmt->bindParam(":pre_amount", $amount_of_currency);
    $dbstmt->bindParam(":post_amount", $_SESSION["converted_total"]);
    $dbstmt->bindParam(":users_id", $_SESSION["user_id"]);


    $dbstmt->execute();
}
