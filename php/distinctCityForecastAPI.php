<?php 

// set the endpoint URL
$endpoint_url = "http://api.weatherapi.com/v1/forecast.json";
//set the location from $_GET
$citylocation = $_GET['q'];
//get todays date
$today = date('Y-m-d');
//get the date picked from ui
$datePicked = date('Y-m-d', strtotime($_GET['dt']));
//define the 7th day from today
$sevenDays = date('Y-m-d', strtotime('+7 days'));

//set the request parameters

$params = array(
    "key" => "b4e003afb03746ba80a200219230504",
    "q" => $citylocation,
    "days" => "7",
    "dt" => $today
);

//append the parameters to endpoint url
$request_url = $endpoint_url . "?" . http_build_query($params);

//initialize cURL
$ch = curl_init();

// set the cURL options
curl_setopt($ch, CURLOPT_URL, $request_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//send the http request and receive response
$response = curl_exec($ch);

//check for errors
if(curl_errno($ch)) {
    echo "Error:" . curl_errno($ch);
}

//close curl connection
curl_close($ch);

//decode the data from $response
$data = json_decode($response, true);

if(!isset($data['forecast'])) {

    echo "No city was found!";

} else if ($_GET['dt'] < $today) { 

    echo "<p style='color: black;'>Nu se pot cauta zile in trecut</p>";
     
    } else if ($_GET['dt'] > $sevenDays) {

        echo "<p style='color: black;'>Nu se pot cauta mai mult de 7 zile in viitor</p>";
    
    } else {

    echo "<table>";
    echo "<tr><th>" . $data['location']['name'] . ", " . $data['location']['region'] . ", " . $data['location']['country'] . "</th></tr>";
    echo "<tr><td>Vremea:</td> <td style='display: flex; align-items: center; align-content: center; justify-content: center;'><div id='tableWeather'>". $data['forecast']['forecastday'][0]['day']['condition']['text']. "</div>" ."<img src=". $data['forecast']['forecastday'][0]['day']['condition']['icon'] ." alt=". $data['current']['condition']['text'] ."></td></tr>";
    echo "<tr><td>Temperatura maxima:</td> <td>" . $data['forecast']['forecastday'][0]['day']['maxtemp_c'] . " °C</td></tr>";
    echo "<tr><td>Temperatura minima:</td> <td>". $data['forecast']['forecastday'][0]['day']['mintemp_c'] ."°C</td></tr>";
    echo "<tr><td>Media temperaturii:</td> <td>". $data['forecast']['forecastday'][0]['day']['avgtemp_c'] ."°C</td></tr>";
    echo "<tr><td>Vantul maxim kph:</td> <td>". $data['forecast']['forecastday'][0]['day']['maxwind_kph'] ."</td></tr>";
    echo "<tr><td>Total precipitatii mm:</td> <td>". $data['forecast']['forecastday'][0]['day']['totalprecip_mm'] ."</td></tr>";
    echo "<tr><td>Strat zapada in cm:</td> <td>". $data['forecast']['forecastday'][0]['day']['totalsnow_cm'] ."</td></tr>";
    echo "<tr><td>Medie umiditate:</td> <td>". $data['forecast']['forecastday'][0]['day']['avghumidity'] ."</td></tr>";
    echo "<tr><td>Sanse de ploaie:</td> <td>". $data['forecast']['forecastday'][0]['day']['daily_chance_of_rain'] ."</td></tr>";
    echo "<tr><td>Sanse de zapada:</td> <td>". $data['forecast']['forecastday'][0]['day']['daily_chance_of_snow'] ."</td></tr>";
    echo "</table>";
}
?>