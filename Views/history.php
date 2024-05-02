<?php
require_once "../Includes/config_session.inc.php";
require_once "../Includes/history_view.inc.php";
require_once "../Includes/history_model.inc.php";
require_once "../Includes/dbh.inc.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: ../Views/login.php");
    $_SESSION["errors_login"] = array("error" => "Not signed in!");
}
?>


<body>
    <header>
        <?php
        if (isset($_SESSION["user_id"])) {
            echo "<a href=\"profile.php\">" . $_SESSION["username"] . "</a>";
            echo "<a href=\"converter.php\">Converter</a>";
            echo "<a href=\"logout.php\">Logout</a>";
        } else {
            echo "<a href=\"login.php\">Login</a>";
            echo "<a href=\"converter.php\">Converter</a>";
        }
        ?>
    </header>
    <h2><?php echo $_SESSION["username"]; ?> Conversion History</h2>
    <a href="converter.php">Make Conversion</a></p>
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