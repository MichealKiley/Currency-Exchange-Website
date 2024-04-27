<?php
require_once "Includes/dbh.inc.php";

$query = "SELECT * FROM currency_type;";
$dbstmt = $pdo->prepare($query);
$dbstmt->execute();

$results = $dbstmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = null;
$dbstmt = null;

?>


<!DOCTYPE html>
<html>

<body>
    <header>
        <h1>Money Converter</h1>
    </header>
    <div class="container">
        <a href="/index.php">Login Page</a>
        <form action="Includes/Currency_handler.php" method="post">
            <p>current => converted to</p>
            <select name="pre_currency" id="Currency_type" required>
                <?php
                foreach ($results as $value) {
                    $option = htmlspecialchars($value["currency"]);
                    echo "<option value=$option>$option</option>";
                }
                ?>
            </select>
            <select name="post_currency" id="Currency_type" required>
                <?php
                foreach ($results as $value) {
                    $option = htmlspecialchars($value["currency"]);
                    echo "<option value=$option>$option</option>";
                }
                ?>
            </select>
            <input type="text" id="amount" name="amount_of_currency" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>