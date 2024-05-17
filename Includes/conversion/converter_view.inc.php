<?php

declare(strict_types=1);

function display_currency_type(array $currency)
{
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

function show_conversion_amount()
{
    if (isset($_SESSION["converted_total"])) {
        $num = (float)$_SESSION["converted_total"];
        $formatted_num = number_format($num, 2);

        echo "<i class='bx bxs-bank' id=\"icon-money\"></i>";
        echo "<h2>" . $formatted_num . "</h2>";
    }
    unset($_SESSION["converted_total"]);
}
