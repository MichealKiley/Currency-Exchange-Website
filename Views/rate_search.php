<?php
require_once "../Includes/exchange_history/rate_history_view.inc.php";
require_once "../Includes/config_session.inc.php";
require_once "../Includes/general_view.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rate Search</title>
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
    <div class="wrapper">
        <h1>Exchange Rate History</h1>
        <div class="text-form">
            <form action="../Includes/exchange_history/rate_history.inc.php" method="post">
                <div class="select-field-lg">
                    <label>Currency Type</label>
                    <select name="currency_history_choice">
                        <?php
                        display_currency_type();
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn">Search</button>
            </form>
        </div>
        <div class="errors">
            <?php
            errors_on_search();
            ?>
        </div>
        <div class="link-to-page">
            <p>Dont have an account? <a href="../index.php">Create One Here!</a></p>
        </div>
    </div>
</body>

</html>