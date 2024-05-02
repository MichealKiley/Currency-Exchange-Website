<?php

function send_verify_code_email()
{
    require_once "../Includes/dbh.inc.php";
    

    // after email sent need to unset session variables, when the user inputs the verification code
    // it needs to update the users_id column in the verify codes db to NULL
}
