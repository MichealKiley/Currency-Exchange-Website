<?php

$dsn = "mysql:host=127.0.0.1;dbname=Currency_website";
$dbusername = "root";
$dbpassword = "Neuco5101*";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}
