<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_canteen1");
if(isset($_GET['item'])){
    $id = $_GET['item'];
}else{
    $id = 1;


}


$this_item_query = "SELECT PName, Cost, Calories, Stock, Description FROM items WHERE ItemID = '" .$id."'";
$this_item_result = mysqli_query($con, $this_item_query);
$this_item_record = mysqli_fetch_assoc($this_item_result);

$all_items_query = "SELECT ItemID, PName, Cost, Calories, Stock, Description FROM items";
$all_items_result = mysqli_query($con, $all_items_query);

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
        <main>
            <h2>Item Information</h2>
            <?php
            echo "<p> Item Name:". $this_item_record['PName']."<br>";
            echo "<p> Cost:".$this_item_record['Cost']."<br>";
            echo "<p> Calories:".$this_item_record['Calories']."<br>";
            echo "<p> Stock:".$this_item_record['Stock']."<br>";
            echo "<p> Description:".$this_item_record['Description']."<br>"

            ?>

        </main>



