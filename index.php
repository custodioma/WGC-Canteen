<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_canteen1");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
    die();
} else {
    echo "connected to database";

}

$all_items_query = "SELECT ItemID, PName, Cost, Calories, Stock, Description FROM items";
$all_items_result = mysqli_query($con, $all_items_query);

$all_drinks_query = "SELECT DrinkID, PName, Cost, Calories, Stock, Description FROM drinks";
$all_drinks_result = mysqli_query($con, $all_drinks_query);

?>

<!DOCTYPE html>

<head>

    <title>WGC Canteen</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='canteen.css'

    </head>

<div class="section">
    <div class="container5">
        <h1>WGC Canteen</h1>
        <nav>
            <ul>
                <a href='home.php'> HOME </a>
                <a href='items.php'> ITEMS </a>
                <a href='canteen_drinks.php'> DRINKS </a>
                <a href='weekly_specials.php'> WEEKLY SPECIALS </a>
            </ul>
        </nav>
    </div>
</div>

<body>
<header>

</header>

<hr>
</nav>
</div>
</div>

<div class="section divider-location"></div>
<div class="section">
    <div class="container">

        <h2>Items</h2>

        <main>
        <form name='items_form' id='items_form' method = 'get' action = 'items.php'>
            <select id = 'item' name = 'item'>
                <?php
                while($all_items_record = mysqli_fetch_assoc($all_items_result)){
                    echo "<option value = '". $all_items_record['ItemID']. "'>";
                    echo $all_items_record['PName'];
                    echo "</option>";
                }
                ?>

            </select>

            <input type='submit' name='items_button' value='show me the item information'>
        </form>
        </main>

        <div class="container6">
        </div>

    </div>

</div>

<div class="section divider-location"></div>
<div class="section">
    <div class="container">

        <h2>Drinks</h2>

        <main>
            <form name='drinks_form' id='drinks_form' method = 'get' action = 'canteen_drinks.php'>
                <select id = 'drink' name = 'drink'>
                    <?php
                    while($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)){
                        echo "<option value = '". $all_drinks_record['DrinkID']. "'>";
                        echo $all_drinks_record['PName'];
                        echo "</option>";
                    }
                    ?>

                </select>

                <input type='submit' name='drinks_button' value='show me the drinks information'>
            </form>
        </main>
        </div>

    </div>


</html>

