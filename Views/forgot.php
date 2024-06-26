<?php
require_once "../Includes/config_session.inc.php";
require_once "../Includes/reset_pass/pass_reset_view.inc.php";
require_once "../Includes/general_view.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
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
        <h1>Forgot Password</h1>
        <div class="text-form">
            <form action="../Includes/reset_pass/forgot.inc.php" method="post">
                <div class="text-field">
                    <input type="text" name="email-username" id="login_textField" placeholder="Username or Email">
                </div>

                <button type="submit" class="btn">Reset</button>
            </form>
        </div>
        <div class="errors">
            <?php
            errors_on_reset();
            verif_code_expired()
            ?>
        </div>
    </div>
</body>

</html>