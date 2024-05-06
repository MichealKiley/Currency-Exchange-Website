<?php

function populate_verif_codes_db()
{
    require_once "../Includes/dbh.inc.php";

    //clearing existing codes
    $query = "TRUNCATE TABLE verify_codes";
    $db_stmt = $pdo->prepare($query);
    $db_stmt->execute();

    // filing db with unique codes
    $query = "INSERT INTO verify_codes (codes) VALUES (:codes);";
    $db_stmt = $pdo->prepare($query);

    $codes = [];
    $counter = 0;

    while ($counter <= 99) {

        if ($counter < 10) {
            $num = 4;
        } else {
            $num = 3;
        }

        $char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $code = substr(str_shuffle($char_list), 0, $num) . $counter;
        $codes[] = $code;
        $counter++;
    }

    foreach ($codes as $value) {
        $db_stmt->bindParam(":codes", $value);
        $db_stmt->execute();
    }
}
