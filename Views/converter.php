<?php
require_once "../Includes/config_session.inc.php";
require_once "../Includes/general_view.php";
require_once "../Includes/conversion/converter_model.inc.php";
require_once "../Includes/conversion/converter_view.inc.php";
require_once "../Includes/dbh.inc.php";
get_currency_type($pdo)

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Money Converter</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <div class="wrapper">
        <h2>Money Converter</h2>
        <div class="text-form">
            <form action="../Includes/conversion/converter.inc.php" method="post">
                <div class="select-field">
                    <label>Before</label>
                    <select name="pre_currency">
                        <?php
                        display_currency_type();
                        ?>
                    </select>
                    <label>After</label>
                    <select name="post_currency">
                        <?php
                        display_currency_type();
                        ?>
                    </select>
                </div>
                <label id="amt-to">Amount to Convert</label>
                <div class="number-field">
                    <i class='bx bxs-dollar-circle' id="icon-left"></i>
                    <input type="number" name="amount_of_currency">
                </div>


                <button type="submit" class="btn">Convert</button>
            </form>
        </div>
        <div class="errors">
            <?php
            errors_on_convert();
            ?>
        </div>
        <div class="link-to-page">
            <p>Dont have an account? <a href="../index.php">Create One Here!</a></p>
        </div>
    </div>
</body>

</html>