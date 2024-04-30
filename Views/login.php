<?php
require_once "../Config/config.php";

?>

<body>
    <!-- <header>
        <a href="profile.php">Profile</a>
        <a href="login.php">Login</a>
    </header> -->
    <h1>Log Into Account</h1>
    <a href="converter.php">Continue without account</a></p>
    <form action="../Includes/login_handler.php" method="post">
        <input type="text" name="email-password" id="login_textField" placeholder="Username or Email" required>
        <input type="password" name="password" id="login_textField" placeholder="Password" required>
        <input type="submit" name="account_type" value="Login">
    </form>
    <p>Dont have an account? <a href="../index.php">Create One Here!</a></p>
</body>

</html>