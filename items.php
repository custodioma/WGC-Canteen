<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_canteen1");
if (isset($_GET['item'])) {
    $id = $_GET['item'];
} else {
    $id = 1;


}

// Query to display selected a selected item's information
$this_item_query = "SELECT IName, Cost, Calories, Stock, Description FROM items WHERE ItemID = '" . $id . "'";
$this_item_result = mysqli_query($con, $this_item_query);
$this_item_record = mysqli_fetch_assoc($this_item_result);

// Query to populate the dropdown form with items in my database
$all_items_query = "SELECT ItemID, IName, Cost, Calories, Stock, Description FROM items";
$all_items_result = mysqli_query($con, $all_items_query);

// Query to order items from A to Z in the table
$items_AtoZ = "SELECT * FROM items ORDER BY IName ASC";
// Query to order items from Z to A in the table
$items_ZtoA = "SELECT * FROM items ORDER BY IName DESC";
// Query to order items from the lowest to highest price
$items_price_low_to_high = "SELECT * FROM items ORDER BY Cost ASC";
// Query to order the items from the highest to lowest price
$items_price_high_to_low = "SELECT * FROM items ORDER BY Cost DESC";
// Query to display the items that are in stock
$items_in_stock = "SELECT * FROM items WHERE stock > 0";
// Query to display the items that are out of stock
$items_out_of_stock = "SELECT * FROM items WHERE stock = 0";

?>

<!DOCTYPE html>

<head>

    <title>WGC Canteen</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='canteen.css'

</head>

<body>

</nav>
</div>
</div>


</div>

</div>

<div class="section_header">
            <h1>Items</h1>
        </div>
        <nav>
            <ul>
                <a href='index.php'> HOME </a>
                <a href='items.php'> ITEMS </a>
                <a href='canteen_drinks.php'> DRINKS </a>
                <a href='weekly_specials.php'> WEEKLY SPECIALS </a>
            </ul>
        </nav>
    </div>
</div>


<div class="section">

        <h2>Item Information</h2>
        <?php
        echo "<p> Item Name: " . $this_item_record['IName'] . "<br>";
        echo "<p> Cost: $" . $this_item_record['Cost'] . "<br>";
        echo "<p> Calories: " . $this_item_record['Calories'] . "<br>";
        echo "<p> Stock: " . $this_item_record['Stock'] . "<br>";
        echo "<p> Description: " . $this_item_record['Description'] . "<br>"

        ?>
    </div>

    <main>
        <h2>Select another item</h2>
        <br>
        <form name='items_form' id='items_form' method='get' action='items.php'>
            <select id='item' name='item'>
                <!--options-->
                <?php
                while ($all_items_record = mysqli_fetch_assoc($all_items_result)) {
                    echo "<option value = '" . $all_items_record['ItemID'] . "'>";
                    echo $all_items_record['IName'];
                    echo "</option>";
                }
                ?>
            </select>
            <input type='submit' name='items_button' value='Show me the item information'>
        </form>
        <br>

            <h2>Search an Item</h2>

            <form action="" method="post">
                <input type="text" name='search'>
                <input type="submit" name="submit" value="Search">
            </form>
        </main>

        <?php

        if (isset($_POST['search'])) {
            $search = $_POST['search'];

            $query1 = "SELECT * FROM items WHERE IName LIKE '%$search%'";
            $query = mysqli_query($con, $query1);
            $count = mysqli_num_rows($query);

            if ($count == 0) {
                echo "There was no search results!";
            } elseif ($search == "") {
                echo "There was no search results";
            } else {

                while ($row = mysqli_fetch_array($query)) {

                    echo $row ['IName'];
                    echo "<br>";
                }
            }
        }
        ?>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h2> Items Available</h2>

        <p>Display all the items available by sorting them out using the buttons
            <br><br>Sort by:
        </p>

        <form action="items.php" method="post">
            <input type='submit' name='items_AtoZ' value="From A-Z">
            <input type='submit' name='items_ZtoA' value="From Z-A">
            <input type='submit' name='item_price_low_to_high' value="Price Low to High">
            <input type='submit' name='item_price_high_to_low' value="Price High to Low">
            <input type='submit' name='in_stock' value="In Stock">
            <input type='submit' name='out_stock' value="Out of Stock">
        </form>


        <table style="width:75%">
            <tr>
                <th>Item Name</th>
                <th>Cost</th>
                <th>Calories</th>
                <th>Stock</th>
            </tr>

            <?php
            if (isset($_POST['items_AtoZ'])) {
                $result = mysqli_query($con, "SELECT * FROM items ORDER BY IName ASC");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['ItemID'];
                        echo "<tr>";
                        echo "<td>" . $test['IName'] . "</td>";
                        echo "<td>" . $test['Cost'] . "</td>";
                        echo "<td>" . $test['Calories'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
            <?php
            if (isset($_POST['items_ZtoA'])) {
                $result = mysqli_query($con, "SELECT * FROM items ORDER BY IName DESC");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['ItemID'];
                        echo "<tr>";
                        echo "<td>" . $test['IName'] . "</td>";
                        echo "<td>" . $test['Cost'] . "</td>";
                        echo "<td>" . $test['Calories'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['item_price_low_to_high'])) {
                $result = mysqli_query($con, "SELECT * FROM items ORDER BY Cost ASC");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['ItemID'];
                        echo "<tr>";
                        echo "<td>" . $test['IName'] . "</td>";
                        echo "<td>" . $test['Cost'] . "</td>";
                        echo "<td>" . $test['Calories'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>


            <?php
            if (isset($_POST['item_price_high_to_low'])) {
                $result = mysqli_query($con, "SELECT * FROM items ORDER BY Cost DESC");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['ItemID'];
                        echo "<tr>";
                        echo "<td>" . $test['IName'] . "</td>";
                        echo "<td>" . $test['Cost'] . "</td>";
                        echo "<td>" . $test['Calories'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['in_stock'])) {
                $result = mysqli_query($con, "SELECT * FROM items WHERE stock > 0");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['ItemID'];
                        echo "<tr>";
                        echo "<td>" . $test['IName'] . "</td>";
                        echo "<td>" . $test['Cost'] . "</td>";
                        echo "<td>" . $test['Calories'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['out_stock'])) {
                $result = mysqli_query($con, "SELECT * FROM items WHERE stock = 0");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['ItemID'];
                        echo "<tr>";
                        echo "<td>" . $test['IName'] . "</td>";
                        echo "<td>" . $test['Cost'] . "</td>";
                        echo "<td>" . $test['Calories'] . "</td>";
                        echo "<td>" . $test['Stock'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
        </table>
    </main>
</div>
</body>
</html>



