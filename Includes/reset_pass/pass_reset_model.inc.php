<?php

//links to forgot.inc.php, verify.inc.php, and reset.inc.php

declare(strict_types=1);

function check_user_email(object $pdo, string $username, string $email)
{
    $query = "SELECT username,email,id FROM users WHERE username = :username OR email = :email;";
    $db_stmt = $pdo->prepare($query);

    $db_stmt->bindPARAM(":username", $username);
    $db_stmt->bindPARAM(":email", $email);
    $db_stmt->execute();

    $results = $db_stmt->fetch(PDO::FETCH_ASSOC);

    return $results;
}

function update_users_db_post_reset($pdo, $new_password)
{
    //update password
    $query = "UPDATE users SET pwd = :new_pass WHERE id = :id;";
    $db_stmt = $pdo->prepare($query);

    $db_stmt->bindPARAM(":new_pass", $new_password);
    $db_stmt->bindPARAM(":id", $_SESSION["reset_user_id"]);
    $db_stmt->execute();
}



function update_verif_db_post_reset($pdo)
{
    //update verify codes db
    $query = "UPDATE verify_codes SET users_id = NULL WHERE users_id = :id;";
    $db_stmt = $pdo->prepare($query);

    $db_stmt->bindPARAM(":id", $_SESSION["reset_user_id"]);
    $db_stmt->execute();
}
