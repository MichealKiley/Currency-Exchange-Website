<?php

declare(strict_types=1);

$_SESSION["errors_login"] = array("error" => "");

function show_conversion_history(array $results)
{
    foreach ($results as $value) {
        $conversion_data = array($value["pre_type"], $value["post_type"], $value["pre_amount"], $value["post_amount"], $value["time_of"]);
        echo "<tr>";
        foreach ($conversion_data as $data) {
            echo "<td>" . $data . "</td>";
        }
        echo "</tr>";
    }
}
