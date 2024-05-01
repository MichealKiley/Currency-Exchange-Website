<?php
require_once "Includes/config_session.inc.php";
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
        <input type="submit" name="account_type" value="Create">
    </form>
    <?php
    if (isset($_SESSION["errors_signup"])) {
        foreach ($_SESSION["errors_signup"] as $type => $msg)
            echo "<p style=\"color:red;\">" . $msg . "</p>";
    }
    ?>
    <p>Already have an account? <a href="Views/login.php">Log in Here!</a></p>
</body>

</html>