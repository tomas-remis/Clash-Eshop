<?php
require("../header.php");
require("../functions.php");

function can_view_order($con){
    $sql = "SELECT * FROM orders WHERE OID = ? AND customer_id = ".$_SESSION["customerID"].";";
    $state = $con->prepare($sql);
    $state->bind_param("i", $_GET["id"]);
    $state->execute();
    $result = $state->get_result();
    return $result->num_rows > 0;
}

function load_order_cards(){
    $con=connect("localhost", "root", "", "clash");
    if($con==null){
        echo "Error when connecting to database";
    }

    if(!isset($_GET["id"]) | !can_view_order($con)){
        header("Location: orders.php");
    }

    $sql = "SELECT * FROM order_list WHERE order_id = ?;";
    $state = $con->prepare($sql);
    $state->bind_param("i", $_GET["id"]);
    $state->execute();
    $result = $state->get_result();

    $order_table = "<table id='orders_table'><tr><th>Card</th><th>Amount</th><th>Price</th></tr>";
    while($row = $result->fetch_assoc()){
        $card_sql = "SELECT * FROM cards WHERE CAID = ".$row["card_id"].";";
        $card_result = $con->query($card_sql)->fetch_assoc();
        $order_table .= sprintf("<tr><td><img src='../images/%s'><p>%s</p></td><td>%d</td><td>%d</d></tr>", $card_result["card_image"], $card_result["card_name"], $row["amount"], $row["amount"] * $card_result["card_cost"]);
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
        load_order_cards();
        ?>
    </body>
</html>