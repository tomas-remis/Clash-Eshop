<?php
require("../header.php");
require("../functions.php");

function populate_table(){
    $cards_per_page = 12;
    if(isset($_GET["page"])){
        $cur_page = $_GET["page"];
    }
    else{
        $cur_page = 0;
    }

    $con=connect("localhost", "root", "", "clash");
    if($con==null){
        echo "Error when connecting to database";
    }
    else{
        $sql = sprintf("SELECT * FROM cards LIMIT %d, %d", $cur_page * $cards_per_page, $cards_per_page); 
        $result = $con->query($sql);

        if($result->num_rows > 0){
            $card_table = "<table id='card_table'>";
            $cur_cell = 0;
            while($row = $result->fetch_assoc()){
                if($cur_cell == 0){
                    $card_table .= "<tr>";
                }
                $cur_cell += 1;
                $card = "<td><div class='card_holder'><a href='card.php?id=".$row["CAID"]."'><img src='/clash/images/".$row["card_image"]."'><div class='name_holder'><h2>".$row["card_name"]."</h2></div></a></div></td>";
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
    $sql = sprintf("SELECT * FROM cards LIMIT %d, %d", ($cur_page + 1) * $cards_per_page, 1); 
    $result = $con->query($sql);
    if($cur_page != 0){
        $page_navigation .= sprintf("<a href='browse.php?page=%d'><</a>", $cur_page - 1);
    }

    $page_navigation .= sprintf("<div style='margin: 0 100px;'>%d</div>", $cur_page + 1);
    
    if($result->num_rows > 0){
        $page_navigation .= sprintf("<a href='browse.php?page=%d'>></a>", $cur_page + 1);
    }

    $page_navigation .= "</div>";
    echo $page_navigation;
}
?>


<body>
    <h1 style="text-align:center;">Browse cards</h1>
    <?php populate_table(); ?>
</body>

<?php
include("../footer.php");
?>