<?php

function populate_verif_codes_db($pdo)
{

    // checking if day has already been recorded
    $query = "SELECT time_of FROM verify_codes WHERE id = (SELECT MAX(id) FROM verify_codes);";
    $db_stmt = $pdo->prepare($query);
    $db_stmt->execute();

    $results = $db_stmt->fetch(PDO::FETCH_ASSOC);

    if ($results["time_of"] != date("Y-m-d")) {

        //clearing existing codes
        $query = "TRUNCATE TABLE verify_codes;";
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
}
