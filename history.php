<?php
session_start();

try {


 require_once "Includes/dbh.inc.php";

    $query = "SELECT * FROM conversion_history; WHERE users_id =" . $_SESSION["user_id"] . ";";
    $dbstmt = $pdo->prepare($query);
    $dbstmt->execute();

    $results = $dbstmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    $dbstmt = null;
}catch () {
    echo "User not signed in!";
}

try {
    //code...
} catch (\Throwable $th) {
    //throw $th;
}
?>


<body>
    <h1><?php echo $_SESSION["username"]; ?> Conversion history</h1>
    <a href="/converter.php">Make Conversion</a></p>
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
                echo "<td>" . $data . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>