<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $request_type = $_POST["account_type"];

    if ($request_type == "Create") {

        require_once "dbh.inc.php";

        $query = ("INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email)");
        $db_stmt = $pdo->prepare($query);

        $db_stmt->bindParam(":username", $username);
        $db_stmt->bindParam(":pwd", $password);
        $db_stmt->bindParam(":email", $email);

        $db_stmt->execute();

        $pdo = null;
        $db_stmt = null;

        echo "User " . $username . " has been created!";

        die();
    }
} else {
    header("Location: ../index.php");
}
