<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_canteen1");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
    die();
} else {


}

// Query to populate the dropdown form with items in my database
$all_items_query = "SELECT ItemID, IName, Cost, Calories, Stock, Description FROM items";
$all_items_result = mysqli_query($con, $all_items_query);

// Query to populate the dropdown form with drinks in my database
$all_drinks_query = "SELECT DrinkID, DName, Cost, Calories, Stock, Description FROM drinks";
$all_drinks_result = mysqli_query($con, $all_drinks_query);

?>

<!DOCTYPE html>

<head>
    <title>WGC Canteen</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='canteen.css'

</head>

<div class="section_header">
    <h1>WGC Canteen</h1>
</div>
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

</body>
<header>

</header>

</nav>
</div>
</div>

<div class="section divider-location"></div>
<div class="section">
    <div class="container">

        <h2>Items</h2>
        <p>Select an item and view the information!</p>
        <br>
        <main>
            <form name='items_form' id='items_form' method='get' action='items.php'>
                <select id='item' name='item'>
                    <?php
                    while ($all_items_record = mysqli_fetch_assoc($all_items_result)) {
                        echo "<option value = '" . $all_items_record['ItemID'] . "'>";
                        echo $all_items_record['IName'];
                        echo "</option>";
                    }
                    ?>

                </select>

                <input type='submit' name='items_button' value='show me the item information'>
            </form>
        </main>

    </div>

</div>

</div>

<div class="section divider-location"></div>
<div class="section">
    <div class="container">

        <h2>Drinks</h2>
        <p>Select an drink and view the information!</p>
        <br>
        <main>
            <form name='drinks_form' id='drinks_form' method='get' action='canteen_drinks.php'>
                <select id='drink' name='drink'>
                    <?php
                    while ($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)) {
                        echo "<option value = '" . $all_drinks_record['DrinkID'] . "'>";
                        echo $all_drinks_record['DName'];
                        echo "</option>";
                    }
                    ?>

                </select>

                <input type='submit' name='drinks_button' value='show me the drinks information'>
            </form>
        </main>
    </div>

</div>

<div class="section divider-location"></div>
<div class="section">
    <div class="container">

        <h2>Weekly Specials</h2>

        <p> To view the specials for the week </p>
            <a href="weekly_specials.php">Click here</a>
        </div>
        </main>
    </div>

</div>


</html>

