<?php

$con = mysqli_connect("localhost", "custodioma", "bentsun82", "custodioma_cafe1");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
    die();
} else {
    echo "connected to database";

}
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

<div class="section divider-home"></div>
<div class="section">
    <div class="container">

        <img class="center w80" src="houseicon.png" alt=" white house icon">

        <h3>Item</h3>

        <p>At the WGC Canteen we make sure that we have a range of different foods to for lunch or easy to eat snacks for a quick bite. We try and do our best to make sure that we cater to all dietary requirements so everyone can have an enjoyable lunch at the canteen!</p>

        <div class="container6">
            <nav>
                <a href="items.php">View the full menu! >></a>
            </nav>
        </div>

    </div>

</div>

<div class="section divider-location"></div>
<div class="section">
    <div class="container">


        <img class="center w80" src="pinicon.png" alt=" white location pin icon">


        <h2>Drinks</h2>

        <p>Our cafe is loacted in a cozy corner, in the heart of Wellington if town just a few metres away from the hustle and bustle of the city. Not too far, but not too close either!</p>

        <div class="container3">
            <nav>
                <a href="location.html">Where to find us >></a>
            </nav>
        </div>

    </div>

    <div class="section divider-menu"></div>
    <div class="section">
        <div class="container">


            <img class="center w80" src="coffeeicon.png" alt="white coffee cup icon">

            <h4>Weekly Specials</h4>

            <p>We provide a range of different meals to suit your everyday needs. A quick on the go breakfast, lunch with the family or collegues or a warm drink to start the day. We have meals to satisfy all ages, don't worry we've got everything covered!</p>

            <div class="container4">
                <nav>
                    <a href="menu.html">View our menu >></a>
                </nav>
            </div>
        </div>
    </div>
</div>
</html>

