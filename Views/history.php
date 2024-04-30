<?php
require_once "../Config/config.php";


require_once "../Includes/dbh.inc.php";

if (isset($_SESSION["user_id"])) {
    $query = "SELECT * FROM conversion_history WHERE users_id = :users_id;";
    $dbstmt = $pdo->prepare($query);
    $dbstmt->bindParam(":users_id", $_SESSION["user_id"]);

    $dbstmt->execute();

    $results = $dbstmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    $dbstmt = null;
} else {
    echo "User not logged in! <br><a href=\"login.php\">Login</a>";
    die();
}


?>


<body>
    <header>
        <a href="profile.php">Profile</a>
        <a href="login.php">Login</a>
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
        foreach ($results as $value) {
            $conversion_data = array($value["pre_type"], $value["post_type"], $value["pre_amount"], $value["post_amount"], $value["time_of"]);
            echo "<tr>";
            foreach ($conversion_data as $data) {
                echo "<td>" . htmlspecialchars($data) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>