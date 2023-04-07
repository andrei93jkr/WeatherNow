<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <title>WeatherNow App</title>
        <link rel="stylesheet" type="text/css" media="screen" href="css/template.css" />
        <link rel="icon" href="images/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <header>
            <div class="logo">
                <i class="fa fa-sun-o logo"> </i><a href="index.php" title="WeatherNow - Home page">WeatherNow</a>
            </div>

            <div class="location">
                <?php 
                    include_once 'php/getlocationAPI.php';
                    include_once 'php/locationAPI.php';
                ?>
            </div>
            
            <div class="searchBar">
                <form action="index.php" method="GET">
                    <input type="text" id="search" name="search" placeholder="Type your city" required>
                </form>
            </div>
        </header>

        <nav class="mobileNav">
            <ul>
                <li>
                    <form method="GET" action="forecast.php">
                    <label for="date">Select a date:</label>
                    <input type="date" id="date" name="dt" onchange="if(this.value != 0) {this.form.submit();}">
                    </form>
                </li>
            </ul>
        </nav>

        <main>
            <div class="forecastDiv" id="forecastDiv">
                <?php 
                    include_once 'php/currentWeatherAPI.php';
                ?>                                
            </div>
            <script src="js/changeBg.js" async></script>
        </main>

        <footer>
        <a href="index.php" title="WeatherNow - Home page">WeatherNow</a> 
        <p>Created from ♥️ by Serban Andrei-Cristian</p>
        </footer>
    </body>
</html>