<?php

declare(strict_types=1);

function errors_on_search()
{
    if (isset($_SESSION["errors_search"])) {
        $errors = $_SESSION["errors_search"];
        foreach ($errors as $type => $msg) {
            echo "<p style=\"color:red;\">" . $msg . "</p>";

            unset($_SESSION["errors_search"]);
        }
    }
}

function display_currency_type()
{
    $currency = $_SESSION["currency_data"];

    foreach ($currency as $currency => $ex_rate) {
        echo "<option value=$currency>$currency</option>";
    }
}

function display_currency_history(array $results)
{
    foreach ($results as $value) {
        echo "<tr>";
        $history_data = array("currency" => $value["currency"], "ex_rate" => $value["ex_rate"], "time_of" => $value["time_of"]);
        foreach ($history_data as $key => $data) {

            if ($key == "time_of") {
                $data = date("F j, Y, g:i a", strtotime($data));
            }

            echo "<td>" . $data . "</td>";
        }
        echo "<tr>";
    }
}
