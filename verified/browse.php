<?php
require("../header.php");
require("../functions.php");

function apply_filters(){
    $sort_direction = $_SESSION["filter_options"]["sorting"][1];

    $filters = join(" AND card_rarity != ", $_SESSION["filter_options"]["filters"]["rarities"]).join(" AND card_type != ", $_SESSION["filter_options"]["filters"]["card_types"]);
    $sql = "SELECT * FROM cards LEFT JOIN card_indexes on cards.card_rarity = card_indexes.rarity_text WHERE card_stock > 0".$filters." ";
    switch($_SESSION["filter_options"]["sorting"][0]){
        case "rarity":
            $sql .= "ORDER BY card_indexes.index, card_name ";
            break;

        case "price":
            $sql .= "ORDER BY card_cost, card_indexes.index, card_name ";
            break;
        
        case "alphabet":
            $sql .= "ORDER BY card_name ";
            break;

        default:
            $sql .= "ORDER BY card_stock, card_indexes.index, card_name ";
    }
    return $sql.$sort_direction;
}

function populate_table(){
    $cards_per_page = 12;
    if(isset($_GET["page"]) && filter_var($_GET["page"], FILTER_VALIDATE_INT) && $_GET["page"] > 0){
        $cur_page = $_GET["page"];
    }
    else{
        $cur_page = 1;
    }

    $con=connect("localhost", "root", "", "clash");
    if($con==null){
        echo "Error when connecting to database";
    }
    else{
        $assembled_query = apply_filters();
        $sql = sprintf("%s LIMIT %d, %d;", $assembled_query, ($cur_page - 1) * $cards_per_page, $cards_per_page);
        $result = $con->query($sql);

        if($result->num_rows > 0){
            $card_table = "<table id='card_table'>";
            $cur_cell = 0;
            while($row = $result->fetch_assoc()){
                if($cur_cell == 0){
                    $card_table .= "<tr>";
                }
                $cur_cell += 1;
                $card = "<td><div class='card_holder ".$row["card_rarity"]."'><a href='card.php?id=".$row["CAID"]."'><img alt='Browse card' src='/clash/images/".$row["card_image"]."'><div class='name_holder'><h2>".$row["card_name"]."</h2></div></a></div></td>";
                $card_table.=$card;
                if($cur_cell == 4){
                    $card_table .= "</tr>";
                    $cur_cell = 0;
                }
            }
            $card_table .= "</table>";
            echo $card_table;
        }
    }
    $page_navigation = "<div id='page_nav'>";
    $sql = sprintf("%s LIMIT %d, %d", $assembled_query, $cur_page * $cards_per_page, 1); 
    $result = $con->query($sql);
    if($cur_page != 1){
        $page_navigation .= sprintf("<a href='browse.php?page=%d'><</a>", $cur_page - 1);
    }

    $page_navigation .= sprintf("<div style='margin: 0 100px;'>%d</div>", $cur_page);
    
    if($result->num_rows > 0){
        $page_navigation .= sprintf("<a href='browse.php?page=%d'>></a>", $cur_page + 1);
    }

    $page_navigation .= "</div>";
    echo $page_navigation;
}
?>

<html>
    <head>
        <?php echo load_head();?>
    </head>
    <body>
        <?php echo load_body();?>
        <h1 style="text-align:center;">Browse cards</h1>
        <?php populate_table(); ?>
    </body>
</html>

<?php
include("../footer.php");
?>