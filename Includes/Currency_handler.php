<?php

//locking page unless the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //assigning form data to variables
    $pre_currency = $_POST["pre_currency"];
    $post_currency = $_POST["post_currency"];
    $amount_of_currency = $_POST["amount_of_currency"];

    //quering db for matching currency, grabbing the correct exchange rate and making the calculation
    require_once "dbh.inc.php";

    $query = "SELECT * FROM currency_type;";
    $dbstmt = $pdo->prepare($query);
    $dbstmt->execute();

    $results = $dbstmt->fetchAll(PDO::FETCH_ASSOC);

    // check for pre and post currency rates and make the conversion
    foreach ($results as $value) {
        $currency = $value["currency"];
        $rate = $value["ex_rate"];

        if ($currency == $pre_currency) {
            $pre_converted_amount = $amount_of_currency / $rate;
        }
        if ($currency == $post_currency) {
            $post_rate = $rate;
        }
    }
    $converted_total = $pre_converted_amount * $post_rate;


    //cutting off the decimal numbers past the first 2 digits
    $loop_counter = 0;
    $decimal_bool = false;
    $formatted_total = 0;

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

    //deleteing leading 0's unless its a number < 1.
    if ($formatted_total[0] == 0 and $formatted_total[1] != ".") {
        $formatted_total = ltrim($formatted_total, '0');
    }

    //writing data to conversion_history db
    $query = "INSERT INTO conversion_history (pre_type,post_type,pre_amount,post_amount) VALUES (:pre_type,:post_type,:pre_amount,:post_amount)";
    $dbstmt = $pdo->prepare($query);

    $dbstmt->bindParam(":pre_type", $pre_currency);
    $dbstmt->bindParam(":post_type", $post_currency);
    $dbstmt->bindParam(":pre_amount", $amount_of_currency);
    $dbstmt->bindParam(":post_amount", $formatted_total);

    $dbstmt->execute();

    $pdo = null;
    $dbstmt = null;
    die();

    echo $formatted_total;
} else {
    header("Location: ../index.php");
}
