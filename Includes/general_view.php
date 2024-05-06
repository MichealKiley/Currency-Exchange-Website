<?php

function user_view()
{
    if (isset($_SESSION["user_id"])) {
        echo "<a href=\"profile.php\">Profile</a>";
        echo "<a href=\"converter.php\">Make Conversion</a>";
        echo "<a href=\"logout.php\">Logout</a>";
    } else {
        echo "<a href=\"login.php\">Login</a>";
        echo "<a href=\"converter.php\">Make Conversion</a>";
    }
}
