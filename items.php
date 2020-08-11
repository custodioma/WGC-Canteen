<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_canteen1");
if (isset($_GET['item'])) {
    $id = $_GET['item'];
} else {
    $id = 1;


}


$this_item_query = "SELECT PName, Cost, Calories, Stock, Description FROM items WHERE ItemID = '" . $id . "'";
$this_item_result = mysqli_query($con, $this_item_query);
$this_item_record = mysqli_fetch_assoc($this_item_result);

$all_items_query = "SELECT ItemID, PName, Cost, Calories, Stock, Description FROM items";
$all_items_result = mysqli_query($con, $all_items_query);

$items_AtoZ = "SELECT * FROM items ORDER BY PName ASC";
$items_ZtoA = "SELECT * FROM items ORDER BY PName DESC";
$items_price__low_to_high = "SELECT * FROM items ORDER BY Cost ASC";
$items_price_high_to_low = "SELECT * FROM items ORDER BY Cost DESC";

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

<div class="section">
    <div class="container5">
        <h1>Items</h1>
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
    <div class="container">

        <h2>Item Information</h2>
        <?php
        echo "<p> Item Name:" . $this_item_record['PName'] . "<br>";
        echo "<p> Cost:" . $this_item_record['Cost'] . "<br>";
        echo "<p> Calories:" . $this_item_record['Calories'] . "<br>";
        echo "<p> Stock:" . $this_item_record['Stock'] . "<br>";
        echo "<p> Description:" . $this_item_record['Description'] . "<br>"

        ?>

        </main>

        <main>
            <h2>Select another item</h2>
            <form name='drinks_form' id='drinks_form' method='get' action='items.php'>
                <select id='item' name='item'>
                    <!--options-->
                    <?php
                    while ($all_items_record = mysqli_fetch_assoc($all_items_result)) {
                        echo "<option value = '" . $all_items_record['ItemID'] . "'>";
                        echo $all_items_record['PName'];
                        echo "</option>";
                    }
                    ?>
                </select>
                <input type='submit' name='items_button' value='Show me the item information'>
            </form>

            <main>
                <h2>Search an Item</h2>

                <form action="" method="post">
                    <input type="text" name='search'>
                    <input type="submit" name="submit" value="Search">
                </form>
            </main>

            <?php

            if (isset($_POST['search'])) {
                $search = $_POST['search'];

                $query1 = "SELECT * FROM items WHERE PName LIKE '%$search%'";
                $query = mysqli_query($con, $query1);
                $count = mysqli_num_rows($query);

                if ($count == 0) {
                    echo "There was no search results!";
                } else {

                    while ($row = mysqli_fetch_array($query)) {

                        echo $row ['PName'];
                        echo "<br>";
                    }
                }
            }
            ?>
            <h2> Items Available</h2>

            <p>Check out the full range of items available at the canteen below! You can find them up above in the
                select drink section to get more information. Information includes a brief product description and the
                dietary requirements the item meets!
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
                <tr>
                </tr>
                <?php
                if (isset($_POST['items_AtoZ'])) {
                    $result = mysqli_query($con, "SELECT * FROM items ORDER BY PName ASC");
                    if (mysqli_num_rows($result) != 0) {
                        while ($test = mysqli_fetch_array($result)) {
                            $id = $test['ItemID'];
                            echo "<tr>";
                            echo "<td>" . $test['PName'] . "</td>";
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
                    $result = mysqli_query($con, "SELECT * FROM items ORDER BY PName DESC");
                    if (mysqli_num_rows($result) != 0) {
                        while ($test = mysqli_fetch_array($result)) {
                            $id = $test['ItemID'];
                            echo "<tr>";
                            echo "<td>" . $test['PName'] . "</td>";
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
                            echo "<td>" . $test['PName'] . "</td>";
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
                            echo "<td>" . $test['PName'] . "</td>";
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
                            echo "<td>" . $test['PName'] . "</td>";
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
                            echo "<td>" . $test['PName'] . "</td>";
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
</div>
</body>
</html>



