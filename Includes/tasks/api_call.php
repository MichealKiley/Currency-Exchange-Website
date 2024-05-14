<?php

function populate_currency_type_db($pdo)
{

    //making api call
    $API_url = "https://v6.exchangerate-api.com/v6/0859bc49c275b17813cc3714/latest/USD";
    $API_rates_output = file_get_contents($API_url);
    $JSON_API_data = json_decode($API_rates_output, true);

    //writing data to db
    try {

        //clearing db
        $query = "TRUNCATE TABLE currency_type;";
        $db_stmt = $pdo->prepare($query);
        $db_stmt->execute();

        //writing updated info to db
        foreach ($JSON_API_data["conversion_rates"] as $type => $rate) {
            $query = "INSERT INTO currency_type (currency,ex_rate) VALUES (:currency, :rate);";
            $db_stmt = $pdo->prepare($query);

            $db_stmt->bindParam(":currency", $type);
            $db_stmt->bindParam(":rate", $rate);

            $db_stmt->execute();
        }
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}

function populate_rate_history_db($pdo)
{
    //making api call
    $API_url = "https://v6.exchangerate-api.com/v6/0859bc49c275b17813cc3714/latest/USD";
    $API_rates_output = file_get_contents($API_url);
    $JSON_API_data = json_decode($API_rates_output, true);

    //writing data to db
    try {

        //writing updated info to db
        foreach ($JSON_API_data["conversion_rates"] as $type => $rate) {
            $query = "INSERT INTO rate_history (currency,ex_rate) VALUES (:currency, :rate);";
            $db_stmt = $pdo->prepare($query);

            $db_stmt->bindParam(":currency", $type);
            $db_stmt->bindParam(":rate", $rate);

            $db_stmt->execute();
        }
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}
