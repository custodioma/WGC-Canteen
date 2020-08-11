<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_canteen1");
if (isset($_GET['drink'])) {
    $id = $_GET['drink'];
} else {
    $id = 1;
}

$this_drink_query = "SELECT PName, Cost, Calories, Stock, Description FROM drinks WHERE DrinkID = '" . $id . "'";
$this_drink_result = mysqli_query($con, $this_drink_query);
$this_drink_record = mysqli_fetch_assoc($this_drink_result);

$all_drinks_query = "SELECT DrinkID, PName, Cost, Calories, Stock, Description FROM drinks";
$all_drinks_result = mysqli_query($con, $all_drinks_query);

$drinks_AtoZ = "SELECT * FROM drinks ORDER BY PName ASC";
$drink_ZtoA = "SELECT * FROM drinks ORDER BY PName DESC";
$drinks_price_low_to_high = "SELECT * FROM drinks ORDER BY Cost ASC";
$drinks_price_high_to_low = "SELECT * FROM drinks ORDER BY Cost DESC";


?>

<!DOCTYPE html>

<head>

    <title>WGC Canteen</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='canteen.css'

</head>

<div class="section">
    <div class="container5">
        <h1>Drinks</h1>
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

<body>

<div class="section">
    <div class="container">

        <main>
            <h2>Drink Information</h2>
            <?php
            echo "<p> Item Name:" . $this_drink_record['PName'] . "<br>";
            echo "<p> Cost:" . $this_drink_record['Cost'] . "<br>";
            echo "<p> Calories:" . $this_drink_record['Calories'] . "<br>";
            echo "<p> Stock:" . $this_drink_record['Stock'] . "<br>";
            echo "<p> Description:" . $this_drink_record['Description'] . "<br>";

            ?>

        </main>

        <main>
            <h2>Select another drink</h2>
            <form name='drinks_form' id='drinks_form' method='get' action='canteen_drinks.php'>
                <select id='drink' name='drink'>
                    <!--options-->
                    <?php
                    while ($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)) {
                        echo "<option value = '" . $all_drinks_record['DrinkID'] . "'>";
                        echo $all_drinks_record['PName'];
                        echo "</option>";
                    }
                    ?>
                </select>
                <input type='submit' name='drinks_button' value='Show me the drink information'>
            </form>

            <main>
                <h2>Search a Drink</h2>

                <form action="" method="post">
                    <input type="text" name='search'>
                    <input type="submit" name="submit" value="Search">
                </form>
            </main>

            <?php

            if (isset($_POST['search'])) {
                $search = $_POST['search'];

                $query1 = "SELECT * FROM drinks WHERE PName LIKE '%$search%'";
                $query2 = "SELECT * FROM drinks WHERE Cost > 0";
                $query = mysqli_query($con, $query1, $query2);
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

            <h2> Drinks Available</h2>

            <p>Check out the full range of drinks available at the canteen below! You can find them up above in the select drink section to get more information. Information includes a brief product description and the dietary requirements the drink meets!
            <br><br>Sort by:
            </p>

            <form action="canteen_drinks.php" method="post">
                <input type='submit' name='drinks_AtoZ' value="From A-Z">
                <input type='submit' name='drinks_ZtoA' value="From Z-A">
                <input type='submit' name='drinks_price_low_to_high' value="Price Low to High">
                <input type='submit' name='drinks_price_high_to_low' value="High to Low">
                <input type='submit' name='in_stock' value="In Stock">
                <input type='submit' name='out_stock' value="Out of Stock">
            </
                form>


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
                if (isset($_POST['drinks_AtoZ'])) {
                    $result = mysqli_query($con, "SELECT * FROM drinks ORDER BY PName ASC");
                    if (mysqli_num_rows($result) != 0) {
                        while ($test = mysqli_fetch_array($result)) {
                            $id = $test['DrinkID'];
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
                if (isset($_POST['drinks_ZtoA'])) {
                    $result = mysqli_query($con, "SELECT * FROM drinks ORDER BY PName DESC");
                    if (mysqli_num_rows($result) != 0) {
                        while ($test = mysqli_fetch_array($result)) {
                            $id = $test['DrinkID'];
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
                if (isset($_POST['drinks_price_low_to_high'])) {
                    $result = mysqli_query($con, "SELECT * FROM drinks ORDER BY Cost ASC");
                    if (mysqli_num_rows($result) != 0) {
                        while ($test = mysqli_fetch_array($result)) {
                            $id = $test['DrinkID'];
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
                if (isset($_POST['drinks_price_high_to_low'])) {
                    $result = mysqli_query($con, "SELECT * FROM drinks ORDER BY Cost DESC");
                    if (mysqli_num_rows($result) != 0) {
                        while ($test = mysqli_fetch_array($result)) {
                            $id = $test['DrinkID'];
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
                    $result = mysqli_query($con, "SELECT * FROM drinks WHERE stock > 0");
                    if (mysqli_num_rows($result) != 0) {
                        while ($test = mysqli_fetch_array($result)) {
                            $id = $test['DrinkID'];
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
                    $result = mysqli_query($con, "SELECT * FROM drinks WHERE stock = 0");
                    if (mysqli_num_rows($result) != 0) {
                        while ($test = mysqli_fetch_array($result)) {
                            $id = $test['DrinkID'];
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


