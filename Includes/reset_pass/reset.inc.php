<?php

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $pwd_1 = $_POST["new_pwd_1"];
    $pwd_2 = $_POST["new_pwd_2"];

    try {
        require_once "../config_session.inc.php";
        require_once "pass_reset_contr.inc.php";
        require_once "pass_reset_model.inc.php";
        require_once "../tasks/password_complexity.php";
        require_once "../dbh.inc.php";

        $errors = [];

        if (is_input_empty($pwd_1, $pwd_2)) {
            $errors["input_errors"] = "Fill in all fields!";
        }

        if ($pwd_1 != $pwd_2) {
            $errors["wrong_pass"] = "Passwords do not match!";
        } else {
            if (!$errors) {
                foreach (password_complexity_checker($pwd_1, $_SESSION["reset_user_username"]) as $type => $msg) {
                    $errors[$type] = $msg;
                }
            }

            $new_password = password_hash($pwd_1, PASSWORD_BCRYPT, ['cost' => 12]);
        }



        if ($errors) {
            header("Location: /Views/reset.php");
            $_SESSION["errors_reset"] = $errors;
        } else {

            update_users_db_post_reset($pdo, $new_password);
            update_verif_db_post_reset($pdo);

            unset($_SESSION["reset_user_code"]);
            unset($_SESSION["reset_user_id"]);
            unset($_SESSION["reset_user_email"]);
            unset($_SESSION["reset_user_username"]);
            unset($_SESSION["verif_code_timer"]);

            header("Location: /Views/login.php");
            $_SESSION["pass_changed"] = "Password Changed";
        }
    } catch (Exception $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ./login.php");
    die();
}
