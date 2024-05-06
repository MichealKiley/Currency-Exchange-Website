<?php
require_once "../Includes/config_session.inc.php";
require_once "../Includes/reset_pass/pass_reset_view.inc.php";
require_once "../Includes/general_view.php";

if (!isset($_SESSION["reset_user_email"])) {
    header("Location: forgot.php");
}

?>

<body>
    <h1>Verify Account</h1>
    <p>A verification code was sent to <?php echo $_SESSION["reset_user_email"] ?>...</p>
    <form action="../Includes/reset_pass/verify.inc.php" method="post">
        <input type="text" name="verification_code" id="login_textField" placeholder="6 digit code"><br>
        <input type="submit" value="Verify">
    </form>
    <?php
    errors_on_reset();
    ?>
</body>

</html>