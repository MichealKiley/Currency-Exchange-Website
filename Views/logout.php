<?php
require_once "../Includes/config_session.inc.php";
require_once "../Includes/general_view.php";
session_unset();
session_destroy();
?>

<body>
    <header>
        <?php
        user_view();
        ?>
    </header>
    <h1>You have been logged out</h1>
</body>

</html>