<?php
require("../header.php");
require("../functions.php");

if(isset($_POST["r_sub"]) && $_POST["pass"] == $_POST["pass_confirm"]){
    add_new_customer();
}

function add_new_customer(){
    $con=connect("localhost", "root", "", "clash");
    if($con==null){
        echo "Error when connecting to database";
        return;
    }
    
    if(check_if_duplicate($con)){
        return;
    }

    $sql="INSERT INTO customers (Login, Password, Email) VALUES (?, ?, ?);";
    $state = $con->prepare($sql);
    $state->bind_param("sss", $_POST["login"], $_POST["pass"], $_POST["email"]);
    $state->execute();
    header('Location: success.php');
}


function check_if_duplicate($con){
    foreach(array("login", "email") as $check_type){
        $check_sql="SELECT * FROM customers WHERE ".$check_type."=?;";
        $check_state = $con->prepare($check_sql);
        $check_state->bind_param("s", $_POST[$check_type]);
        $check_state->execute();
    
        if(mysqli_num_rows($check_state->get_result()) > 0){
            echo $check_type." is already taken";
            return true;
        }
    }
    return false;
}
?>
<html>
    <head>
        <?php echo load_head();?>
    </head>
    <body>
        <?php echo load_body();?>
        <h1>Register</h1>
        <form method="POST" action="register.php">
            <input type="text" placeholder="Username" name="login" required/>
            <input type="password" placeholder="Password" name="pass" required/>
            <input type="password" placeholder="Confirm password" name="pass_confirm" required/>
            <input type="email" placeholder="Email" name="email" required/>
            <input type="submit" name="r_sub"/>
        </form>
    </body>
</html>

<?php
include("../footer.php");
?>