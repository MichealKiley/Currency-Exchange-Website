<?php
require_once "Includes/config_session.inc.php";
require_once "Includes/user_acc/signup_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="wrapper">
        <h1>Create Account</h1>
        <div class="text-form">
            <form action="Includes/user_acc/signup.inc.php" method="post">
                <div class="text-field">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class='bx bxs-user-circle' id="icon-right"></i>
                </div>
                <div class="text-field">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-key' id="icon-right"></i>
                </div>
                <div class="text-field">
                    <input type="text" name="email" placeholder="Email" required>
                    <i class='bx bxs-envelope' id="icon-right"></i>
                </div>

                <button type="submit" class="btn">Create</button>
            </form>
        </div>
        <div class="errors">
            <?php
            errors_on_signup();
            ?>
        </div>
        <div class="link-to-page">
            <p>Want to continue? <a href="Views/converter.php">Converter</a></p>
            <p>Already have an account? <a href="Views/login.php">Log in Here!</a></p>
        </div>
    </div>
</body>

</html>