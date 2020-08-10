<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_canteen1");
if(isset($_GET['drink'])){
    $id = $_GET['drink'];
}else{
    $id = 1;
}

$this_drink_query = "SELECT PName, Cost, Calories, Stock, Description FROM drinks WHERE DrinkID = '" .$id ."'";
$this_drink_result = mysqli_query($con, $this_drink_query);
$this_drink_record = mysqli_fetch_assoc($this_drink_result);

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
<header>

</header>

<hr>
</nav>
</div>
</div>


<div class="section">
    <div class="container">

        <main>
            <h2>Drink Information</h2>
            <?php
            echo "<p> Item Name:". $this_drink_record['PName']."<br>";
            echo "<p> Cost:".$this_drink_record['Cost']."<br>";
            echo "<p> Calories:".$this_drink_record['Calories']."<br>";
            echo "<p> Stock:".$this_drink_record['Stock']."<br>";
            echo "<p> Description:".$this_drink_record['Description']."<br>";

            ?>

        </main>

        <main>
            <h2>Select another drink</h2>
            <form name='drinks_form' id='drinks_form' method='get' action='drinks.php'>
                <select id='drink' name='drink'>
                    <!--options-->
                    <?php
                    while($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)){
                        echo "<option value = '".$all_drinks_record['DrinkID']."'>";
                        echo $all_drinks_record['PName'];
                        echo"</option>";
                    }
                    ?>
                </select>
                <input type='submit' name='drinks_button' value='Show me the drink information'>
            </form>

        <main>
            <h2>Select a Drink</h2>

            <form action = "" method="post">
                <input type="text" name='search'>
                <input type="submit" name="submit" value="Search">
            </form>
        </main>

        <?php

        if(isset($_POST['search'])){
            $search = $_POST['search'];

            $query1 = "SELECT * FROM drinks WHERE PName LIKE '%$search%'";
            $query = mysqli_query($con, $query1);
            $count = mysqli_num_rows($query);

            if($count == 0){
                echo "There was no search results!";
            }else{

                while ($row = mysqli_fetch_array($query)) {

                    echo $row ['PName'];
                    echo"<br>";
                }
            }
        }
        ?>


