<?php
require("../header.php");
require("../functions.php");

if(isset($_POST["r_sub"]) && $_POST["pass"] == $_POST["pass_confirm"]){
    add_new_customer();
}
?>

<body>
    <h1>Register</h1>
    <form method="POST" action="register.php">
        <input type="text" placeholder="Username" name="login" required/>
        <input type="password" placeholder="Password" name="pass" required/>
        <input type="password" placeholder="Confirm password" name="pass_confirm" required/>
        <input type="email" placeholder="Email" name="email" required/>
        <input type="submit" name="r_sub"/>
    </form>
</body>

<?php
include("../footer.php");
?>