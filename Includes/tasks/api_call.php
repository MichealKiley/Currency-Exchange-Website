<?php

function populate_currency_type_db($pdo)
{

    //making api call
    $API_url = "https://v6.exchangerate-api.com/v6/0859bc49c275b17813cc3714/latest/USD";
    $API_rates_output = file_get_contents($API_url);
    $JSON_API_data = json_decode($API_rates_output, true);

    //writing data to db
    try {

        // checking if day has already been recorded
        $query = "SELECT time_of FROM currency_type WHERE id = (SELECT MAX(id) FROM currency_type);";
        $db_stmt = $pdo->prepare($query);
        $db_stmt->execute();

        $results = $db_stmt->fetch(PDO::FETCH_ASSOC);


        if ($results["time_of"] != date("Y-m-d")) {

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

        // checking if day has already been recorded
        $query = "SELECT time_of FROM rate_history WHERE id = (SELECT MAX(id) FROM rate_history);";
        $db_stmt = $pdo->prepare($query);
        $db_stmt->execute();

        $results = $db_stmt->fetch(PDO::FETCH_ASSOC);

        if ($results["time_of"] != date("Y-m-d")) {

            //writing updated info to db
            foreach ($JSON_API_data["conversion_rates"] as $type => $rate) {
                $query = "INSERT INTO rate_history (currency,ex_rate) VALUES (:currency, :rate);";
                $db_stmt = $pdo->prepare($query);

                $db_stmt->bindParam(":currency", $type);
                $db_stmt->bindParam(":rate", $rate);

                $db_stmt->execute();
            }
        }
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}
