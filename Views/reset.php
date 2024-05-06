<?php
require_once "../Includes/config_session.inc.php";
require_once "../Includes/reset_pass/pass_reset_view.inc.php";
require_once "../Includes/general_view.php";

?>

<body>
    <h1>Reset Password</h1>
    <form action="../Includes/reset_pass/reset.inc.php" method="post">
        <input type="password" name="new_pwd_1" id="login_textField" placeholder="New Password">
        <input type="password" name="new_pwd_2" id="login_textField" placeholder="Confirm Password">
        <input type="submit" value="Reset">
    </form>
    <?php
    errors_on_reset();
    ?>
    <p>Dont have an account? <a href="../index.php">Create One Here!</a></p>
</body>

</html>