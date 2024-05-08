<?php
require_once "../Includes/config_session.inc.php";
require_once "../Includes/user_acc/login_view.inc.php";
require_once "../Includes/reset_pass/pass_reset_view.inc.php";
require_once "../Includes/general_view.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <div class="wrapper">
        <h1>Login</h1>
        <div class="text-form">
            <form action="../Includes/user_acc/login.inc.php" method="post">
                <div class="text-field">
                    <input type="text" name="email-username" placeholder="Username or Email">
                    <i class='bx bxs-user-circle' id="icon-right"></i>
                </div>
                <div class="text-field">
                    <input type="password" name="password" placeholder="Password">
                    <i class='bx bxs-key' id="icon-right"></i>
                </div>

                <button type="submit" class="btn">Login</button>
            </form>
        </div>
        <div class="errors">
            <?php
            errors_on_login();
            user_signup_on_login();
            pass_changed_on_login();
            verif_code_expired()
            ?>
        </div>
        <div class="link-to-page">
            <p>Forgot Password? <a href="forgot.php">Reset Here!</a></p>
            <p>Want to continue? <a href="converter.php">Converter</a></p>
            <p>Dont have an account? <a href="../index.php">Create One Here!</a></p>
        </div>
    </div>
</body>

</html>