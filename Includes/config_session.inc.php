<?php

ini_set("session.use_only_cookies", 1);
ini_set("session.use_strict_mode", 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'Localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true,
]);

session_start();

// cookie generation
if (!isset($_SESSION["last_regeneration"])) {

    // refresh verif codes and rate history db's
    require_once "tasks/api_call.php";
    require_once "tasks/verif_codes.php";
    require_once "dbh.inc.php";

    populate_currency_type_db($pdo);
    populate_rate_history_db($pdo);
    populate_verif_codes_db($pdo);

    //generating cookie
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
} else {
    $interval = 60 * 30;
    if (time() - $_SESSION["last_regeneration"] >= $interval) {

        // generating new cookie after 30 mins
        session_regenerate_id(true);
        $_SESSION["last_regeneration"] = time();
    }
}


// verif code timer
if (isset($_SESSION["verif_code_timer"])) {
    $code_timer = 60 * 5;
    if (time() - $_SESSION["verif_code_timer"] >= $code_timer) {
        $_SESSION["verif_code_expired"] = "Took too long to verify, session expired!";
    }
}
