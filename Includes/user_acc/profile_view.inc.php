<?php

declare(strict_types=1);

function display_profile_data(array $results)
{
    foreach ($results as $value) {
        echo "<div class=\"list-items\">";
        echo "<label>Username</label>";
        echo "<p>" . $value["username"] . "<p>";
        echo "</div>";
        echo "<div class=\"list-items\">";
        echo "<label>Email</label>";
        echo "<p>" . $value["email"] . "</p>";
        echo "</div>";
        echo "<div class=\"list-items\">";
        echo "<label>Date Created</label>";
        echo "<p>" . $value["created_at"] . "</p>";
        echo "</div>";
    }
}
