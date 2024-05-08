<?php

function user_view()
{
    if (isset($_SESSION["user_id"])) {
?>
        <nav class="navbar">
            <ul>
                <li><a href="profile.php"><?php echo ucfirst($_SESSION["username"]); ?></a></li>
                <li><a href="converter.php">Make Conversion</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    <?php
    } else {
    ?>
        <nav class="navbar">
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="converter.php">Make Conversion</a></li>
            </ul>
        </nav>
<?php
    }
}

function verif_code_expired()
{
    if (isset($_SESSION["verif_code_expired"])) {

        require_once "reset_pass/pass_reset_model.inc.php";
        require_once "dbh.inc.php";

        update_verif_db_post_reset($pdo);

        unset($_SESSION["reset_user_code"]);
        unset($_SESSION["reset_user_id"]);
        unset($_SESSION["reset_user_email"]);
        unset($_SESSION["reset_user_username"]);
        unset($_SESSION["verif_code_timer"]);

        header("Location: login.php");

        $errors = [];
        $errors["code_expired"] = $_SESSION["verif_code_expired"];
        $_SESSION["errors_login"] = $errors;

        unset($_SESSION["verif_code_expired"]);
    }
}
