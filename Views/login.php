<?php
require_once "../Includes/config_session.inc.php";
require_once "../Includes/login_view.inc.php";

?>

<body>
    <h1>Log Into Account</h1>
    <a href="converter.php">Continue without account</a></p>
    <form action="../Includes/login.inc.php" method="post">
        <input type="text" name="email-username" id="login_textField" placeholder="Username or Email">
        <input type="password" name="password" id="login_textField" placeholder="Password">
        <input type="submit" value="Login">
    </form>
    <?php
    errors_on_login();
    ?>
    <p>Forgot Password? <a href="forgot.php">Reset Here!</a></p>
    <p>Dont have an account? <a href="../index.php">Create One Here!</a></p>
</body>

</html>