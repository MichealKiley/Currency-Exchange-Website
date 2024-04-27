<?php
// function Conversion()
// {
//     // Grabbing form data
//     $chosen_currency = $_POST["chosen_currency"];
//     $amount_of_currency = $_POST["amount_of_currency"];

//     //need to insert currency names from db to html, 
//     // then once the form is submitted need to find matching the exhange rate from the db 
//     //and set it to a variable called exrate


//     // setting variables
// $loop_counter = 0;
// $decimal_bool = false;
// $formatted_total = 0;

//     // $exRates = array($chosen_currency => );

//     //making the conversion
//     foreach ($exRates as $type => $rate) {
//         if ($type == $chosen_currency) {
//             $converted_total = $amount_of_currency / $rate;
//         }
//     }

// //cutting off the decimal numbers past the first 2 digits
// $total_array = str_split($converted_total);
// foreach ($total_array as $value) {
//     if ($value == ".") {
//         $decimal_bool = true;
//     }
//     if ($decimal_bool == true and $value != ".") {
//         $loop_counter++;
//     }

//     $formatted_total .= $value;

//     if ($loop_counter >= 2) {
//         break;
//     }
// }

//     return $formatted_total;
// }

//locking page unless the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //assigning form data to variables
    $chosen_currency = $_POST["chosen_currency"];
    $amount_of_currency = $_POST["amount_of_currency"];
    $pre_currency = "USD";

    //quering db for matching currency, grabbing the correct exchange rate and making the calculation
    require_once "dbh.inc.php";

    $query = "SELECT * FROM currency_type;";
    $dbstmt = $pdo->prepare($query);
    $dbstmt->execute();

    $results = $dbstmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $value) {
        $currency = $value["currency"];
        $rate = $value["ex_rate"];

        if ($currency == $chosen_currency) {
            $converted_total = $amount_of_currency / $rate;
        }
    }

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
    $dbstmt->bindParam(":post_type", $chosen_currency);
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
