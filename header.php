<?php
$is_in_verified = gettype(strpos($_SERVER["REQUEST_URI"], "unverified")) == "boolean";
function add_header_elements(){
    GLOBAL $is_in_verified;
    if($is_in_verified){
        return "<table>
            <tr>
                <td><a href='home.php'>Home</a></td>
                <td><a href='browse.php'>Browse cards</a></td>
                <td><a href='orders.php'>My orders</a></td>
                <td><a href='logout.php'>Log out</a></td>
            </tr>
        </table>";
    }
    return "";
}

session_set_cookie_params(7200,'/');
session_start();

if(isset($_GET["sub"])){
    session_unset();
}

if(!isset($_SESSION["login"]) && $is_in_verified){
    header('Location: /clash/unverified/login.php');
}

function load_head(){
    return '<link rel="stylesheet" href="/clash/style.css", type="text/css">';
}

function load_body(){
    $data = '<nav id="header">
        '.add_header_elements().'
    </nav>';
    return $data;
}
?>