<?php
require_once "../Config/config.php";

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

    //rounding number to 0.00 format
    $converted_total = $pre_converted_amount * $post_rate;
    $formatted_total = round($converted_total, 2);

    //writing data to conversion_history db
    $query = "INSERT INTO conversion_history (pre_type,post_type,pre_amount,post_amount,users_id) VALUES (:pre_type,:post_type,:pre_amount,:post_amount,:users_id)";
    $dbstmt = $pdo->prepare($query);

    $dbstmt->bindParam(":pre_type", $pre_currency);
    $dbstmt->bindParam(":post_type", $post_currency);
    $dbstmt->bindParam(":pre_amount", $amount_of_currency);
    $dbstmt->bindParam(":post_amount", $formatted_total);
    $dbstmt->bindParam(":users_id", $_SESSION["user_id"]);

    $dbstmt->execute();

    $pdo = null;
    $dbstmt = null;
    echo $formatted_total;

    die();
} else {
    header("Location: ../Views/converter.php");
}
