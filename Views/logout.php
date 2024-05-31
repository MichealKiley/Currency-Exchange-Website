<?php
require_once "../Includes/tasks/popular_rates.php";
require_once "../Includes/config_session.inc.php";
require_once "../Includes/general_view.php";
require_once "../Includes/dbh.inc.php";

$top_currencies = array(
    "US dollar" => "USD",
    "Euro" => "EUR",
    "Japanese yen" => "JPY",
    "British pound sterling" => "GBP",
    "Chinese renminbi" => "CNY",
    "Australian dollar" => "AUD",
    "Canadian dollar" => "CAD",
    "Swiss franc" => "CHF",
    "Hong Kong dollar" => "HKD",
    "New Zealand dollar" => "NZD",
);

session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logout</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <?php
    user_view()
    ?>
    <div class="table-wrapper">
        <h1>User logged out!</h1>
        <h3>Top 10 Most Traded Currencies</h3>
        <table class="history-table">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Rate -> USD</th>
                </tr>
            </thead>
            <tbody>
                <?php
                display_top_currencies(populate_ex_rates($pdo, $top_currencies), $top_currencies);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>