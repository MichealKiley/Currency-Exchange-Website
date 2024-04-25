<?php
function Conversion()
{
    // Grabbing form data
    $chosen_currency = $_POST["chosen_currency"];
    $amount_of_currency = $_POST["amount_of_currency"];

    // known exchange rates
    $riel_exRate = 4062.17;
    $kyat_exRate = 2100.44;
    $krones_exRate = 11;
    $lek_exRate = 94.42;

    // setting variables
    $loop_counter = 0;
    $decimal_bool = false;
    $formatted_total = 0;

    $exRates = array("riel" => $riel_exRate, "kyat" => $kyat_exRate, "krones" => $krones_exRate, "lek" => $lek_exRate);

    //making the conversion
    foreach ($exRates as $type => $rate) {
        if ($type == $chosen_currency) {
            $converted_total = $amount_of_currency / $rate;
        }
    }

    //cutting off the decimal numbers past the first 2 digits
    $total_array = str_split($converted_total);
    foreach ($total_array as $value) {
        if ($value == ".") {
            $decimal_bool = true;
        }
        if ($decimal_bool == true and $value != ".") {
            $loop_counter++;
        }

        $formatted_total .= $value;

        if ($loop_counter >= 2) {
            break;
        }
    }

    return $formatted_total;
}

//formating the output
$conversion_form_data = ltrim(Conversion(), "0");
if ($conversion_form_data[0] == ".") {
    $conversion_form_data = "0" . $conversion_form_data;
}

//printing output on screen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "$" . $conversion_form_data . "<br>";
}


$API_url = "https://v6.exchangerate-api.com/v6/0859bc49c275b17813cc3714/latest/USD";
$API_rates_output = file_get_contents($API_url);
$JSON_API_data = json_decode($API_rates_output, true);


foreach ($JSON_API_data["conversion_rates"] as $v1 => $v2) {
    echo $v1 . " : " . $v2 . "<br>";
}

