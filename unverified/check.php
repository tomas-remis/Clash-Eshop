<?php
require("../header.php");
require("../functions.php");

if(isset($_POST["r_sub"])){
    $con=connect("localhost", "root", "", "clash");
    if($con==null){
        echo "Error when connecting to database";
    }
    else{
        $sql="SELECT * FROM users WHERE Username=? AND Password=?;";
        $state = $con->prepare($sql);
        $state->bind_param("ss", $_POST["user"], $_POST["pass"]);
        $state->execute();
        $result = $state->get_result();
        
        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            $_SESSION["user"] = $row["Username"];
            $_SESSION["userID"] = $row["UID"];
            header('Location: welcome.php');
        }
        else{
            echo "Wrong credentials";
        }
    }
}

?>