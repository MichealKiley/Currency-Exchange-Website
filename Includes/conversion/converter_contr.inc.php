<?php

declare(strict_types=1);

function is_input_empty(string $pre_currency, string $post_currency, string $amount_of_currency)
{
    if (empty($pre_currency) or empty($post_currency) or empty($amount_of_currency)) {
        return true;
    } else {
        return false;
    }
}

function make_conversion(string $pre_currency, string $post_currency, string $amount_of_currency, array $results)
{
    // check for pre and post currency rates and make the initial conversion
    foreach ($results as $currency => $rate) {

        if ($currency == $pre_currency) {
            $pre_converted_amount = $amount_of_currency / $rate;
        }
        if ($currency == $post_currency) {
            $post_rate = $rate;
        }
    }

    //making final conversion and rounding number to 0.00 format
    $converted_total = $pre_converted_amount * $post_rate;
    $formatted_total = round($converted_total, 2);

    $_SESSION["converted_total"] = $formatted_total;
}
