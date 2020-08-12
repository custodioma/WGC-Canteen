<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_canteen1");
if (isset($_GET['special'])) {
    $id = $_GET['special'];
} else {
    $id = 1;
}

$this_specials_query = "SELECT DayID, ItemID FROM weekly specials WHERE ItemID = '" . $id . "'";
$this_specials_result = mysqli_query($con, $this_specials_query);
$this_specials_record = mysqli_fetch_assoc($this_specials_result);

$all_specials_query = "SELECT DayID, ItemID FROM weekly specials";
$all_specials_result = mysqli_query($con, $all_specials_query);


?>

<!DOCTYPE html>

<head>

    <title>WGC Canteen</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='canteen.css'

</head>

<div class="section">
    <div class="container5">
        <h1>Weekly Specials</h1>
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
<header>

</header>

<hr>
</nav>
</div>
</div>

<div class="section">

    </main>

    <h2>Select a Day:</h2>

    <main>
        <form action="weekly_specials.php" method="post">
            <input type='submit' name='monday_special' value="Monday">
            <input type='submit' name='tuesday_special' value="Tuesday">
            <input type='submit' name='wednesday_special' value="Wednesday">
            <input type='submit' name='thursday_special' value="Thursday">
            <input type='submit' name='friday_special' value="Friday">
        </form>

        <table style="width:80%">
            <tr>
                <th>Weekday</th>
                <th>Item Special</th>
                <th>Drink Special</th>
            </tr>

            <?php
            if (isset($_POST['monday_special'])) {
                $result = mysqli_query($con, "SELECT specials.DayID, items.IName, drinks.DName
                FROM specials, items, drinks WHERE specials.DayID = 'MON'
                AND items.ItemID = specials.ItemID
                AND drinks.DrinkID = specials.DrinkID");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['DayID'];
                        echo "<tr>";
                        echo "<td>" . $test['DayID'] . "</td>";
                        echo "<td>" . $test['IName'] . "</td>";
                        echo "<td>" . $test['DName'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['tuesday_special'])) {
                $result = mysqli_query($con, "SELECT specials.DayID, items.IName, drinks.DName
                FROM specials, items, drinks WHERE specials.DayID = 'TUE'
                AND items.ItemID = specials.ItemID
                AND drinks.DrinkID = specials.DrinkID");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['DayID'];
                        echo "<tr>";
                        echo "<td>" . $test['DayID'] . "</td>";
                        echo "<td>" . $test['IName'] . "</td>";
                        echo "<td>" . $test['DName'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['wednesday_special'])) {
                $result = mysqli_query($con, "SELECT specials.DayID, items.IName, drinks.DName
                FROM specials, items, drinks WHERE specials.DayID = 'WED'
                AND items.ItemID = specials.ItemID
                AND drinks.DrinkID = specials.DrinkID");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['DayID'];
                        echo "<tr>";
                        echo "<td>" . $test['DayID'] . "</td>";
                        echo "<td>" . $test['IName'] . "</td>";
                        echo "<td>" . $test['DName'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['thursday_special'])) {
                $result = mysqli_query($con, "SELECT specials.DayID, items.IName, drinks.DName
                FROM specials, items, drinks WHERE specials.DayID = 'THU'
                AND items.ItemID = specials.ItemID
                AND drinks.DrinkID = specials.DrinkID");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['DayID'];
                        echo "<tr>";
                        echo "<td>" . $test['DayID'] . "</td>";
                        echo "<td>" . $test['IName'] . "</td>";
                        echo "<td>" . $test['DName'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['friday_special'])) {
                $result = mysqli_query($con, "SELECT specials.DayID, items.IName, drinks.DName
                FROM specials, items, drinks WHERE specials.DayID = 'FRI'
                AND items.ItemID = specials.ItemID
                AND drinks.DrinkID = specials.DrinkID");
                if (mysqli_num_rows($result) != 0) {
                    while ($test = mysqli_fetch_array($result)) {
                        $id = $test['DayID'];
                        echo "<tr>";
                        echo "<td>" . $test['DayID'] . "</td>";
                        echo "<td>" . $test['IName'] . "</td>";
                        echo "<td>" . $test['DName'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>


    </main>
</div>
</body>
</html>

