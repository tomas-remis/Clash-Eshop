<?php
require("../header.php");
require("../functions.php");

function load_orders(){
    $con=connect("localhost", "root", "", "clash");
    if($con==null){
        echo "Error when connecting to database";
    }
    $sql = "SELECT * FROM orders WHERE customer_id = ".$_SESSION["customerID"].";";
    $result = $con->query($sql);
    $order_table = "<table id='orders_table'><tr><th>Price</th><th>Card amount</th><th>Date</th></tr>";
    while($row = $result->fetch_assoc()){
        $amount_sql = "SELECT SUM(amount) as amount FROM order_list WHERE order_id = ".$row["OID"].";";
        $amount = $con->query($amount_sql)->fetch_assoc()["amount"];
        $order_table .= sprintf("<tr><td>%d</td><td>%d</td><td>%s</td><td><a href='order_view.php?id=%d'>View</a></tr>", $row["price"], $amount, $row["timestamp"], $row["OID"]);
    }
    $order_table .= "</table>";
    echo $order_table;
}

?>

<html>
    <head>
        <?php echo load_head();?>
    </head>
    <body>
        <?php echo load_body();
        load_orders();
        ?>
    </body>
</html>