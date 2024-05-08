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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <?php
    user_view()
    ?>
    <div class="wrapper">
        <h1>Account Details</h1>
        <div class="list">
            <?php display_profile_data(get_profile_data($pdo)) ?>
        </div>
        <div class="link-to-page">
            <a href="history.php">Conversion History</a>
        </div>
    </div>
</body>

</html>