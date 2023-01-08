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
?>