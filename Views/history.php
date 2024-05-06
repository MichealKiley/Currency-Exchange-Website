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


<body>
    <header>
        <?php
        user_view();
        ?>
    </header>
    <h2><?php echo $_SESSION["username"]; ?> Conversion History</h2>
    <table>
        <tr>
            <td><strong>Original Currency</strong></td>
            <td><strong>Converted Currency</strong></td>
            <td><strong>Starting Amount</strong></td>
            <td><strong>Converted Amount</strong></td>
            <td><strong>Time of Conversion</strong></td>
        </tr>
        <?php
        show_conversion_history(get_conversion_history($pdo));
        ?>
    </table>
</body>

</html>