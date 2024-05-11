<?php

declare(strict_types=1);

$_SESSION["errors_login"] = array("error" => "");

function show_conversion_history(array $results)
{
    foreach ($results as $value) {
        $conversion_data = array("pre_type" => $value["pre_type"], "post_type" => $value["post_type"], "pre_amount" => $value["pre_amount"], "post_amount" => $value["post_amount"], "time_of" => $value["time_of"]);
        echo "<tr>";
        foreach ($conversion_data as $key => $data) {
            if ($key == "pre_amount" or $key == "post_amount") {
                $data = number_format($data, 2);
            }

            if ($key == "time_of") {
                $data = date("F j, Y, g:i a", strtotime($data));
            }

            echo "<td>" . $data . "</td>";
        }
        echo "</tr>";
    }
}
