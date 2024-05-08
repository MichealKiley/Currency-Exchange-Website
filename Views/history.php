<?php
require_once "../Includes/config_session.inc.php";
require_once "../Includes/general_view.php";
require_once "../Includes/conversion/history_view.inc.php";
require_once "../Includes/conversion/history_model.inc.php";
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
    <title>Conversion History</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <?php
    user_view();
    ?>
    <div class="table-wrapper">
        <h1><?php echo ucfirst($_SESSION["username"]); ?> Conversion History</h1>
        <table class="history-table">
            <thead>
                <tr>
                    <th>Original Currency</th>
                    <th>Converted Currency</th>
                    <th>Starting Amount</th>
                    <th>Converted Amount</th>
                    <th>Time of Conversion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                show_conversion_history(get_conversion_history($pdo));
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>