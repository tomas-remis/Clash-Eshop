<?php
$is_in_verified = gettype(strpos($_SERVER["REQUEST_URI"], "unverified")) == "boolean";
function add_header_elements(){
    GLOBAL $is_in_verified;

    if($is_in_verified){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
            $_SESSION["filter_options"] = array("sorting" => array("quantity", "DESC"), "filters" => array("rarities" => array(), "card_types" => array()));
        }

        if(sizeof($_SESSION["cart"]) == 0){
            $cart_img = "../images/cart_empty.png";
        }
        else{
            $cart_img = "../images/cart_full.png";
        }

        if(gettype(strpos($_SERVER["REQUEST_URI"], "cart.php")) == "boolean"){
            $cart = "<a id='cart' href='cart.php'><img alt='cart' src='".$cart_img."'></a>";
        }
        else{
            $cart = "";
        }

        return  "<nav id='header'><table>
            <tr>
                <td><a href='browse.php'>Browse cards</a></td>
                <td><a href='filters.php'>Filter settings</a></td>
                <td><a href='orders.php'>My orders</a></td>
                <td><a href='logout.php'>Log out</a></td>
            </tr>
        </table>
        </nav>
        ".$cart;
    }
    return "";
}

session_set_cookie_params(7200,'/');
session_start();

if(isset($_GET["sub"])){
    session_unset();
}

if(!isset($_SESSION["login"]) && $is_in_verified){
    header('Location: ../unverified/login.php');
}

function load_head(){
    return '<link rel="stylesheet" href="../style.css", type="text/css">';
}

function load_body(){
    $data = add_header_elements();
    return $data;
}
?>