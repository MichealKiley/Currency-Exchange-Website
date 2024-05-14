<?php


function is_input_empty(string $currency_type)
{
    if (empty($currency_type)) {
        return true;
    } else {
        return false;
    }
}
