<?php
require("../header.php");
require("../functions.php");
$con=connect("localhost", "root", "", "clash");
    if($con==null){
        echo "Error when connecting to database";
    }

$sql = "UPDATE cards SET card_stock=2;";
$con->query($sql);
?>
