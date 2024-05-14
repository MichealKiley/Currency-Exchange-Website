<?php
require_once "../Includes/exchange_history/rate_history_view.inc.php";
require_once "../Includes/exchange_history/rate_history_model.inc.php";
require_once "../Includes/config_session.inc.php";
require_once "../Includes/general_view.php";
require_once "../Includes/dbh.inc.php";

if (!isset($_SESSION["search_currency_type"])) {
    header("Location: rate_search.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rate Results</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <?php
    user_view();
    ?>
    <div class="table-wrapper">
        <h1><?php echo "\"" . $_SESSION["search_currency_type"] . "\""; ?> Rate History</h1>
        <table class="history-table">
            <thead>
                <tr>
                    <th>Currency</th>
                    <th>Rate -> USD</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                display_currency_history(get_rate_history($pdo));
                ?>
            </tbody>
        </table>
    </div>
</body>