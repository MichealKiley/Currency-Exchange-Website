<?php

declare(strict_types=1);

function display_profile_data(array $results)
{
    foreach ($results as $value) {
        echo "<li>Username: " . $value["username"] . "</li>";
        echo "<li>Email: " . $value["email"] . "</li>";
        echo "<li>Date Created: " . $value["created_at"] . "</li>";
        echo "<li><a href=\"history.php\">Conversion History</a></li>";
    }
}
