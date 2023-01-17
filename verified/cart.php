<?php
require("../header.php");
require("../functions.php");

if(isset($_POST["remove"])){
    unset($_SESSION["cart"][$_POST["remove"]]);
}

function add_order($con){
    $sql = sprintf("INSERT INTO orders(customer_id, price) VALUES(%d, %d);", $_SESSION["customerID"], $_SESSION["price"]);
    $con->query($sql);
    $order_id = mysqli_insert_id($con);
    foreach($_SESSION['cart'] as $card_id => $amount){
        $insert_sql = sprintf("INSERT INTO order_list VALUES(%d, %d, %d);", $order_id, $card_id, $amount);
        $con->query($insert_sql);
        $update_sql = sprintf("UPDATE cards SET card_stock = card_stock - %d WHERE CAID = %d", $amount, $card_id);
        $con->query($update_sql);
    }
    $_SESSION["cart"] = array();
    header("Location: buy_success.php");
}

function populate_cart(){
    $con=connect("localhost", "root", "", "clash");
    if($con==null){
        echo "Error when connecting to database";
    }

    if(isset($_POST["cart_buy"])){
        add_order($con);
    }

    $cart_data = "<div id='cart_data'><table id='cart_table'>";
    $price = 0;

    foreach($_SESSION['cart'] as $card_id => $amount){
        $sql = "SELECT * FROM cards WHERE CAID=".$card_id;
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $price += $row["card_cost"] * $amount;
        $cart_data .= "<tr><td>
            <form method='POST'>
                <img alt='".$row["card_name"]."' src='../images/".$row['card_image']."'><p>Amount: ".$amount."x</p><br>
                <p>Price: ".$row["card_cost"] * $amount."</p>
                <button type='submit' value='".$card_id."' name='remove'>Remove</button>
            </form>
            </td></tr>";
    }
    $buy_form = "";
    if($price > 0){
        $_SESSION["price"] = $price;
        $buy_form = "<form method='POST'><p>Total cost: ".$price."</p><input type='submit' value='Buy' name='cart_buy'></form>";
    }
    $cart_data .= "</table>
    <br>".$buy_form."</div>";
    echo $cart_data;
}
?>


<html>
    <head>
        <?php echo load_head();?>
    </head>
    <body>
        <?php
        echo load_body();
        populate_cart();
        ?>
    </body>
</html>

<?php
include("../footer.php");
?>