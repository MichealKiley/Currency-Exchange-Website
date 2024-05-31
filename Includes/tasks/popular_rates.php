<?php

function populate_ex_rates($pdo, array $top_currencies)
{
    $currency_data = [];

    foreach ($top_currencies as $label => $currency) {
        $query = "SELECT currency, ex_rate FROM currency_type WHERE currency = :currency;";
        $db_stmt = $pdo->prepare($query);

        $db_stmt->bindPARAM(":currency", $currency);
        $db_stmt->execute();

        $results = $db_stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $value) {
            $currency_data[$value["currency"]] = $value["ex_rate"];
        }
    }

    return $currency_data;
}

function display_top_currencies(array $currency_data, array $top_currencies)
{
    $counter = 1;

    foreach ($currency_data as $type => $ex_rate) {
        foreach ($top_currencies as $text => $currency) {
            if ($currency == $type) {
                $currency_display = array("order" => $counter, "code" => $type, "name" => $text, "rate" => $ex_rate);

                $counter++;

                echo "<tr>";

                foreach ($currency_display as $key => $data) {
                    if (isset($data)) {
                        echo "<td>" . $data . "</td>";
                    }
                }

                echo "</tr>";
            }
        }
    }
}
