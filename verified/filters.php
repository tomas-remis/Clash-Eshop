<?php
require("../header.php");

if(isset($_POST["filter_sub"])){
    echo print_r($_POST);
    if(isset($_POST["rarity_filter"])){
        $_SESSION["filter_options"]["filters"]["rarities"] = $_POST["rarity_filter"];
    }
    if(isset($_POST["type_filter"])){
        $_SESSION["filter_options"]["filters"]["card_types"] = $_POST["type_filter"];
    }
    $_SESSION["filter_options"]["sorting"] = array($_POST["sort_type"], $_POST["sort_order"]);
    header("Location: browse.php");
}
?>

<html>
    <head>
        <?php echo load_head();?>
    </head>
    <body>
        <?php echo load_body();?>
        <form method='POST'>
            <h1>Change filter options</h1>
            <label>
                Ordering type
                <select name="sort_type" id="sort_type">
                    <option value="price">Price</option>
                    <option value="rarity">Rarity</option>
                    <option value="quantity">Quantity</option>
                    <option value="alphabet">Alphabetically</option>
                </select>
            </label>
            <br>
            <label>
                Sort order
                <select name="sort_order">
                    <option value="DESC">Descending</option>
                    <option value="ASC">Ascending</option>
                </select>
            </label>
            <h2>Blacklist rarities</h2>
            <input type="checkbox" name="rarity_filter[]" value="" checked style="display:none;">
            <label>
                <input type="checkbox" name="rarity_filter[]" value='"Common"'> Common
            </label>
            <br>
            <label>
                <input type="checkbox" name="rarity_filter[]" value='"Rare"'> Rare
            </label>
            <br>
            <label>
                <input type="checkbox" name="rarity_filter[]" value='"Epic"'> Epic
            </label>
            <br>
            <label>
                <input type="checkbox" name="rarity_filter[]" value='"Legendary"'> Legendary
            </label>
            <br>
            <label>
                <input type="checkbox" name="rarity_filter[]" value='"Champion"'> Champion
            </label>

            <h2>Blacklist card types</h2>
            <input type="checkbox" name="type_filter[]" value="" checked style="display:none">
            <label>
                <input type="checkbox" name="type_filter[]" value='"Troop"'>Troop
            </label>
            <br>
            <label>
                <input type="checkbox" name="type_filter[]" value='"Tower"'>Tower
            </label>
            <br>
            <label>
                <input type="checkbox" name="type_filter[]" value='"Spell"'>Spell
            </label>
            <br><br>
            <input type="submit" name="filter_sub" value="Apply settings">
        </form>
    </body>
</html>

<?php
include("../footer.php");
?>