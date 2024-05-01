<?php

declare(strict_types=1);

function display_currency_type()
{
    $currency = $_SESSION["currency_data"];

    foreach ($currency as $currency => $ex_rate) {
        echo "<option value=$currency>$currency</option>";
    }
}

function errors_on_convert()
{
    if (isset($_SESSION["errors_converter"])) {
        $errors = $_SESSION["errors_converter"];

        foreach ($errors as $type => $msg) {
            echo "<p style=\"color:red;\">" . $msg . "</p>";
        }
        unset($_SESSION["errors_converter"]);
    }
}
