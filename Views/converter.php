<?php
require_once "../Includes/config_session.inc.php";
require_once "../Includes/converter_model.inc.php";
require_once "../Includes/converter_view.inc.php";
require_once "../Includes/dbh.inc.php";
get_currency_type($pdo)

?>


<!DOCTYPE html>
<html>

<body>
    <header>
        <a href="profile.php">Profile</a>
        <a href="login.php">Login</a>
    </header>
    <h1>Money Converter</h1>
    <div class="container">
        <form action="../Includes/converter.inc.php" method="post">
            <p>current => converted to</p>
            <select name="pre_currency" id="Currency_type">
                <?php
                display_currency_type();
                ?>
            </select>
            <select name="post_currency" id="Currency_type">
                <?php
                display_currency_type();
                ?>
            </select>
            <input type="number" id="amount" name="amount_of_currency">
            <input type="submit" value="Submit">
        </form>
        <p>Dont have an account? <a href="../index.php">Create One Here!</a></p>
    </div>
    <?php
    errors_on_convert();
    ?>
</body>

</html>