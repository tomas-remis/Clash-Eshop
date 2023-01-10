<?php
require("../header.php");
require("../functions.php");

function populate_cart(){
    $con=connect("localhost", "root", "", "clash");
    if($con==null){
        echo "Error when connecting to database";
    }
    if(isset($_POST["remove"])){
        unset($_SESSION["cart"][$_POST["remove"]]);
    }
    $cart_data = "<div id='cart_data'><table id='cart_table'>";
    $price = 0;

    foreach($_SESSION['cart'] as $card_id => $amount){
        $sql = "SELECT * FROM cards WHERE CAID=".$card_id;
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $price += $row["card_cost"];
        $cart_data .= "<tr><td>
            <form method='POST'>
                <img src='/clash/images/".$row['card_image']."'><p>Amount: ".$amount."x</p><br>
                <p>Price: ".$row["card_cost"]."</p>
                <button type='submit' value='".$card_id."' name='remove'>Remove</button>
            </form>
            </td></tr>";
    }
    $buy_form = "";
    if($price > 0){
        $buy_form = "<form><p>Total cost: ".$price."</p><input type='submit' value='Buy' name='cart_buy'></form>";
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