<?php
require_once "../config_session.inc.php";

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;


function send_verify_code_email($pdo)
{
    if (isset($_SESSION["reset_user_email"])) {
        require_once "../dbh.inc.php";
        require "../../vendor/autoload.php";

        //getting verif code
        $query = "SELECT id,codes FROM verify_codes WHERE users_id is NULL;";
        $db_stmt = $pdo->prepare($query);
        $db_stmt->execute();

        $results = $db_stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION["reset_user_code"] = $results["codes"];

        //updating verif code in db
        $query = "UPDATE verify_codes SET users_id = :users_id WHERE id=:id;";
        $db_stmt = $pdo->prepare($query);

        $db_stmt->bindPARAM(":users_id", $_SESSION["reset_user_id"]);
        $db_stmt->bindPARAM(":id", $results["id"]);
        $db_stmt->execute();


        //sending email
        $mail = new PHPMailer(true);

        $mail->IsSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->Username = "moneyconverterweb@gmail.com";
        $mail->Password = "gnfjxdsgiljkbety";

        $mail->setFrom("moneyconverterweb@gmail.com");
        $mail->addAddress($_SESSION["reset_user_email"], $_SESSION["reset_user_username"]);

        $mail->Subject = "Verification Code for Password Reset!";
        $mail->Body = "Your one time verification code is: " . $_SESSION["reset_user_code"];

        $mail->send();

        $_SESSION["verif_code_timer"] = time();
    }
}
