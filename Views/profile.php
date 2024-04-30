<?php
session_start();


if ($_SESSION["user_id"] != null) {

    //setting variables
    $conversion_stats = [];

    //getting user data
    require_once "../Includes/dbh.inc.php";
    $query = "SELECT * FROM users WHERE id = :users_id;";
    $dbstmt = $pdo->prepare($query);

    $dbstmt->bindParam(":users_id", $_SESSION["user_id"]);

    $dbstmt->execute();

    $results = $dbstmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $value) {
        $username = $value["username"];
        $email = $value["email"];
        $created = $value["created_at"];
    }

    //getting users conversion stats
    $query = "SELECT * FROM conversion_history WHERE users_id = :users_id;";
    $dbstmt = $pdo->prepare($query);
    $dbstmt->bindParam(":users_id", $_SESSION["user_id"]);

    $dbstmt->execute();

    $results = $dbstmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    $dbstmt = null;
} else {
    header("Location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <a href="converter.php">Make Conversion</a>
    <a href="logout.php">Logout</a>
    <h1>Account Details</h1>
    <ul>
        <li>Username: <?php echo htmlspecialchars($username); ?></li>
        <li>Email: <?php echo htmlspecialchars($email); ?></li>
        <li>Date Created: <?php echo htmlspecialchars($created); ?></li>
        <li><a href="history.php">Conversion History</a></li><br>
    </ul>
</body>

</html>