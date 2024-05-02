<?php
require_once "../Includes/config_session.inc.php";
require_once "../Includes/pass_reset_view.inc.php";

?>

<body>
    <h1>Forgot Password</h1>
    <form action="../Includes/forgot.inc.php" method="post">
        <input type="text" name="email-username" id="login_textField" placeholder="Username or Email">
        <input type="submit" value="Reset">
    </form>
    <?php
    errors_on_reset();
    ?>
    <p>Dont have an account? <a href="../index.php">Create One Here!</a></p>
</body>

</html>