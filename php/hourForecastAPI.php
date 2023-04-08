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


$forecast = $data["forecast"]["forecastday"][0];
foreach($forecast['hour'] as $hour) {
        
    echo "<ul>";
    echo "<li>".$hour['time']."</li>";
    echo "<li style='display: flex; align-items: center; align-content: center; justify-content: flex-start;'>Vremea:".$hour['condition']['text']."<img src='".$hour['condition']['icon']."' alt=''></li>";
    echo "<li>Temperatura : ".$hour['temp_c']."°C</li>";
    echo "<li>Vantul kph: ".$hour['wind_kph']."</li>";
    echo "<li>Unghiul vantului: ".$hour['wind_degree']."</li>";
    echo "<li>Total precipitatii mm: ".$hour['precip_mm']."</li>";
    echo "<li>Total presiune atmosferica mb: ".$hour['pressure_mb']."</li>";
    echo "<li>Medie umiditate: ".$hour['humidity']."</li>";
    echo "<li>Real fell: ".$hour['feelslike_c']."</li>";
    echo "<li>Sanse de ploaie: ".$hour['chance_of_rain']."</li>";
    echo "<li>Sanse de zapada: ".$hour['chance_of_snow']."</li>";
    echo "</ul>";
    }

?>