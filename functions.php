<?php

function connect($host, $user, $pass, $db){
    $con = new mysqli($host, $user, $pass, $db);
    if($con->error){
        echo "Something went wrong with the connection";
        die();
        return null;
    }
    return $con;
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

    #$sql="SELECT * FROM users WHERE Username=? AND Password=?;";
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