<?php
require_once "../Includes/config_session.inc.php";
require_once "../Includes/profile_view.inc.php";
require_once "../Includes/profile_model.inc.php";
require_once "../Includes/dbh.inc.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: ../Views/login.php");
    $_SESSION["errors_login"] = array("error" => "Not signed in!");
}
?>

<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <header>
        <?php
        if (isset($_SESSION["user_id"])) {
            echo "<a href=\"converter.php\">Converter</a>";
            echo "<a href=\"logout.php\">Logout</a>";
        } else {
            echo "<a href=\"login.php\">Login</a>";
            echo "<a href=\"converter.php\">Converter</a>";
        }
        ?>
    </header>
    <h1>Account Details</h1>
    <ul>
        <?php display_profile_data(get_profile_data($pdo)) ?>
    </ul>
</body>

</html>