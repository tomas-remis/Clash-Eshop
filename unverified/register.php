<?php
require("../header.php");
require("../functions.php");
?>

<body>
    <h1>Register</h1>
    <form method="POST" action="check.php">
        <input type="text" placeholder="Username" name="user" required/>
        <input type="text" placeholder="Nickname" name="name" required/>
        <input type="password" placeholder="Password" name="pass" required/>
        <input type="password" placeholder="Confirm password" name="pass_confirm" required/>
        <input type="email" placeholder="Email" name="email" required/>
        <input type="submit" name="r_sub"/>
    </form>
</body>

<?php
include("footer.php");
?>