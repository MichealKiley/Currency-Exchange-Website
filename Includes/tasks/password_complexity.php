<?php

function password_complexity_checker(string $password, string $username)
{
    // declaring variables
    $cap_char = false;
    $special_char = false;
    $num_char = false;
    $min_length = false;
    $counter = 0;
    $errors = [];

    //checking for spaces 
    if (preg_match('/\s/', $password)) {
        $errors["pass_not_space"] = "Password cannot contain a space...";
        return $errors;
        die();
    }

    //checking for common password contents

    //username
    if (str_contains(strtolower($password), strtolower($username))) {
        $errors["pass_contain_username"] = "Password cannot contain your username...";
        return $errors;
        die();
    }

    //"password"
    if (str_contains(strtolower($password), "password")) {
        $errors["pass_contain_username"] = "Password cannot contain \"password\"";
        return $errors;
        die();
    }

    // spliting string into array
    $character_array = str_split($password);

    // looping through string
    foreach ($character_array as $char) {
        // checking for caps
        if (ctype_upper($char)) {
            $cap_char = true;
        }

        // checking for numbers
        if (ctype_digit($char)) {
            $num_char = true;
        }

        // checking for special characters
        if (strpos("!@#$%^&*()[]{};:'\"\|./?><,`~+=_-", $char) !== false) {
            $special_char = true;
        }

        $counter++;
    }

    // checking for min length
    if ($counter >= 8) {
        $min_length = true;
    }

    // if all complexity requirements arent met 
    if ($cap_char == false and $num_char == false and $special_char == false and $min_length == false) {
        $errors["pass_not_complex"] = "Password must be at least 8 characters long and include all of the following: capital letter, number, and a special character...";
        return $errors;
        die();
    }

    // individual errors
    if ($cap_char == false) {
        $errors["pass_not_cap"] = "Password must include a capital letter...";
    }

    if ($num_char == false) {
        $errors["pass_not_num"] = "Password must include a number...";
    }

    if ($special_char == false) {
        $errors["pass_not_special"] = "Password must include a special character...";
    }

    if ($min_length == false) {
        $errors["pass_not_long"] = "Password must be at least 8 characters long...";
    }

    return $errors;
}
