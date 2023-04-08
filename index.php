<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <title>WeatherNow App</title>
        <link rel="stylesheet" type="text/css" media="screen" href="css/template.css" />
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
        </header>

        <nav>
            <form method="GET" action="distinctCity.php">
                <input type="text" name="q" placeholder="Type your city" required>
                <?php
                    // Check if the 'dt' parameter is set
                    if(isset($_GET['dt'])) {
                        $dt = $_GET['dt'];
                        // Use the $dt variable as the value of the date input
                        echo '<input type="date" name="dt" value="' . $dt . '" onchange="if(this.value != 0) {this.form.submit();}">';
                    } else {
                        // Set the default value of the date input to today's date
                        $today = date("Y-m-d");
                        echo '<input type="date" name="dt" value="' . $today . '" onchange="if(this.value != 0) {this.form.submit();}">';
                    }
                ?>
            </form>
        </nav>

        <main>
            <div class="forecastDiv" id="forecastDiv">
                <?php 
                    include_once 'php/currentWeatherAPI.php';
                ?>                                
            </div>

            <div class="hourForecast">
                <?php
                    include_once 'php/currentHourForecastAPI.php';
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