<?php
require("../header.php");
require("../functions.php");

if(!isset($_GET['id'])){
    header('Location: browse.php');
}

if(isset($_POST['cart_sub'])){
    $_SESSION['cart'][$_GET['id']] = $_POST['order_count'];
    header('Location: browse.php');
}

function get_rating($con, $CAID){
    $sql = "SELECT * FROM card_quality WHERE card_id=".$CAID.";";
    $result = $con->query($sql);

    $rating = 100;
    $count = $result->num_rows;
    if($count > 0){
        $rating = 0;
        while($row = $result->fetch_assoc()){
            $rating += $row["quality"];
        }
        $rating /= $count * 0.05;
        $rating = 100 - $rating;
    }
    return array($rating, $count);
}

function get_card($con, $CAID){
    $sql = "SELECT * from cards WHERE CAID=?";
    $state = $con->prepare($sql);
    $state->bind_param("i", $_GET["id"]);
    $state->execute();

    $result = $state->get_result();

    if($result->num_rows == 0){
        echo "Card does not exist";
        return;
    }
    $card = $result->fetch_assoc();
    return $card;
}

function post_comment($con){
    $sql = sprintf("INSERT INTO comments(contents, customer_id, card_id) VALUES(?, %d, %d);", $_SESSION["customerID"], $_GET["id"]);
    $state = $con->prepare($sql);
    $state->bind_param("s", $_POST["comment_text"]);
    $state->execute();
}

function delete_comment($con){
    $sql = "DELETE FROM comments WHERE COID=".$_POST["remove_sub"];
    $con->query($sql);
}

function display_comments($con){
    $sql = "SELECT * FROM comments WHERE card_id=".$_GET["id"].";";
    $result = $con->query($sql);

    $comment_table = "<table>";

    while($row = $result->fetch_assoc()){
        $author_sql = "SELECT * FROM customers WHERE CID=".$row["customer_id"].";";
        $author_name = $con->query($author_sql)->fetch_assoc()["Login"];

        $remove_button = "";
        if($_SESSION["customerID"] == $row["customer_id"]){
            $remove_button = "<form method='POST'><button type='submit' name='remove_sub' value='".$row["COID"]."'>Remove Comment</button></form>";
        }
        $comment_table .= "
        <tr>
            <td>
                <div class='author_info'>
                    <div class='author_name'>".$author_name."</div>
                    <div class='post_time'>".$row["comment_timestamp"]."</div>".
                    $remove_button."
                </div>
                <div class='comment_content'>".
                    $row["contents"]."
                </div>
            </td>
        </tr>";
    }
    $comment_table .= "</table>";   
    return $comment_table;
}

function populate_card_info()
{
    $con=connect("localhost", "root", "", "clash");
    if($con==null){
        echo "Error when connecting to database";
        return;
    }

    $card = get_card($con, $_GET["id"]);
    $card_url = "'card.php?id=".$card["CAID"]."'";

    $rating_response = "";
    if(isset($_POST["rating_sub"])){
        $rating_response = add_rating($con, $_POST["rating_sub"]);
    }

    elseif(isset($_POST["remove_sub"])){
        echo "a";
        delete_comment($con);
    }

    elseif(isset($_POST["comment_sub"])){
        post_comment($con);
    }

    $rating = get_rating($con, $card["CAID"]);

    if($rating[1] == 1){
        $rating_text = "1 Rating";
    }
    else{
        $rating_text = $rating[1]." Ratings";
    }

    $data = "
        <head>
            ".load_head()."
            <style>
                #clip_star_overlay{
                    clip-path: inset(0 ".$rating[0]."% 0 0);
                }
            </style>
        </head>
        <body>
            ".load_body()."
            ".$rating_response."
            <div id='card_container'>
                <img id='card_img' src='../images/".$card["card_image"]."'>
                <div id='card_info'>
                    <h1>".$card["card_name"]."</h1>
                    <div id='card_description'>".$card["card_description"]."</div>
                    <div id='bottom_card_data'>
                        <div id='card_form_container'>
                            <div>
                                Price: ".$card["card_cost"]." Gems
                            </div>
                            <div>Available: ".$card["card_stock"]."x</div>
                            <form method='POST' action=".$card_url.">
                                <input name='order_count' type='number' min='1' max='".$card["card_stock"]."' required>
                                <input type='submit' value='Add to cart' name='cart_sub'>
                            </form>
                        </div>
                        <form id='rating' method='POST' action=".$card_url.">
                            <img class='star' style='visibility: hidden;' src='../images/disabled_star.png'>
                            <div class='star_overlay'>
                                <div class='star_flex_box'>
                                    <img class='star' src='../images/disabled_star.png'>
                                    <img class='star' src='../images/disabled_star.png'>
                                    <img class='star' src='../images/disabled_star.png'>
                                    <img class='star' src='../images/disabled_star.png'>
                                    <img class='star' src='../images/disabled_star.png'>
                                </div>
                            </div>
                            <div class='star_overlay'> 
                                <div class='star_flex_box' id='clip_star_overlay'>
                                    <button class='star_button' value='1' name='rating_sub' type='submit' id='star0'>
                                    <img class='button_star' src='../images/star.png'>
                                    </button>
                                    <button class='star_button' value='2' name='rating_sub' type='submit' id='star1'>
                                    <img class='button_star' src='../images/star.png'>
                                    </button>
                                    <button class='star_button' value='3' name='rating_sub' type='submit' id='star2'>
                                    <img class='button_star' src='../images/star.png'>
                                    </button>
                                    <button class='star_button' value='4' name='rating_sub' type='submit' id='star3'>
                                    <img class='button_star' src='../images/star.png'>
                                    </button>
                                    <button class='star_button' value='5' name='rating_sub' type='submit' id='star4'>
                                    <img class='button_star' src='../images/star.png'>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div>".$rating_text."</div>
                    </div>
                </div>
            </div>
            <div id='comments_container'>
                <form method='POST'>
                    <textarea rows='5' cols='60' placeholder='Add comment' name='comment_text' required></textarea>
                    <br>
                    <input type='submit' name='comment_sub' value='Post comment'>
                </form>
                <div id='comment_section'>".
                    display_comments($con)."
                </div>
        </body>";

    echo $data;
}

function add_rating($con, $rating){
    $customer = $_SESSION["customerID"];
    $card_id = $_GET["id"];
    $sql = sprintf("SELECT * FROM card_quality WHERE customer_id=%d AND card_id=%d;", $customer, $card_id);
    $result = $con->query($sql);
    if($result->num_rows > 0){
        $update_sql = sprintf("UPDATE card_quality SET quality=%d WHERE customer_id=%d AND card_id=%d;", $rating, $customer, $card_id);
        $con->query($update_sql);
    }
    else{
        $insert_sql = sprintf("INSERT INTO card_quality VALUES(%d, %d, %d);", $customer, $card_id, $rating);
        $con->query($insert_sql);
    }
    return "Rating added successfully";
}

populate_card_info();
include("../footer.php");
?>