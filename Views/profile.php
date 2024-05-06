<?php
require_once "../Includes/config_session.inc.php";
require_once "../Includes/general_view.php";
require_once "../Includes/user_acc/profile_view.inc.php";
require_once "../Includes/user_acc/profile_model.inc.php";
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
        user_view();
        ?>
    </header>
    <h1>Account Details</h1>
    <ul>
        <?php display_profile_data(get_profile_data($pdo)) ?>
    </ul>
</body>

</html>