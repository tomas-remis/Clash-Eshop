<?php
require("../header.php");
require("../functions.php");
?>

<html>
    <head>
        <?php echo load_head();?>
    </head>
    <body>
        <?php echo load_body();?>
        <h1>Account successfully registered</h1>
        <a href="login.php">
            <input type="submit", value="Return to sign-up">
        </a>
    </body>
</html>