<?php
require_once "../Includes/config_session.inc.php";
session_unset();
session_destroy();
?>

<body>
    <header>
        <a href="profile.php">Profile</a>
        <a href="login.php">Login</a>
    </header>
    <h1>You have been logged out</h1>
    <a href="converter.php">Continue without account</a></p>
</body>

</html>