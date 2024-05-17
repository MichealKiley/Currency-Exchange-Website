<?php

function populate_ex_rates($pdo)
{
    $top_currencies = array(
        "1. US dollar: " => "USD",
        "2. Euro: " => "EUR",
        "3. Japanese yen: " => "JPY",
        "4. British pound sterling: " => "GBP",
        "5. Chinese renminbi: " => "CNH",
        "6. Australian dollar: " => "AUD",
        "7. Canadian dollar: " => "CAD",
        "8. Swiss franc: " => "CHF",
        "9. Hong Kong dollar: " => "HKD",
        "10. New Zealand dollar: " => "NZD",
    );

    $currency_display = [];

    foreach ($top_currencies as $label => $currency) {
        $query = "SELECT ex_rate FROM currency_type WHERE currency = :currency;";
        $db_stmt = $pdo->prepare($query);

        $db_stmt->bindPARAM(":currency", $currency);
        $db_stmt->execute();

        $results = $db_stmt->fetch(PDO::FETCH_ASSOC);

        $currency_display[$label] = $results["ex_rate"];
    }

    return $currency_display;
}

function display_top_currencies(array $currency_display)
{
    foreach ($currency_display as $text => $rate) {
        echo "<p>" . $text . $rate .  "</p>";
    }
}
