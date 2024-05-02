<?php
require_once "Includes/config_session.inc.php";
require_once "Includes/signup_view.inc.php";
?>

<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <!-- <header>
        <a href="Views/profile.php">Profile</a>
        <a href="Views/login.php">Login</a>
    </header> -->
    <h1>Create Account</h1>
    <a href="Views/converter.php">Continue without account</a>
    <form action="Includes/signup.inc.php" method="post">
        <input type="text" name="username" id="login_textField" placeholder="Enter Username here!" required>
        <input type="password" name="password" id="login_textField" placeholder="Enter password here!" required>
        <input type="text" name="email" id="login_textField" placeholder="Enter email here!" required>
        <input type="submit" value="Create">
    </form>
    <?php
    errors_on_signup();
    ?>
    <p>Already have an account? <a href="Views/login.php">Log in Here!</a></p>
</body>

</html>