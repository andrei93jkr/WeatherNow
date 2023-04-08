<?php 

// set the endpoint URL
$endpoint_url = "http://api.weatherapi.com/v1/forecast.json";

$citylocation = $_SESSION['city_location'];

//set the request parameters

$params = array(
    "key" => "b4e003afb03746ba80a200219230504",
    "q" => $citylocation
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

curl_close($ch);

$data = json_decode($response, true);

if(!isset($data['forecast'])) {
    echo "No city was found!";
} else {

    echo "<table>";

    echo "<tr><th>" . $data['location']['name'] . ", " . $data['location']['region'] . ", " . $data['location']['country'] . ", " . $data['location']['localtime'] . "</th></tr>";
    echo "<tr><td>Temperatura actuala:</td> <td>" . $data['current']['temp_c'] . " °C</td></tr>";
    echo "<tr><td>Este zi:</td>"; if ($data['current']['is_day'] == 1) { echo "<td>Da</td></tr>"; } else { echo "<td>Nu</td></tr>"; }
    echo "<tr><td>Conditie vreme:</td> <td style='display: flex; align-items: center; align-content: center; justify-content: center;' id='tableWeather'>" . "<div id='tableWeather'>". $data['current']['condition']['text']. "</div>" . "<img src=". $data['current']['condition']['icon'] ." alt=". $data['current']['condition']['text'] ."></td></tr>";
    echo "<tr><td>Viteza vantului (kmh):</td> <td>" . $data['current']['wind_kph'] . "</td></tr>";
    echo "<tr><td>Unghiul vantului:</td> <td>" . $data['current']['wind_degree'] . "</td></tr>";
    echo "<tr><td>Directia vantului:</td> <td>" . $data['current']['wind_dir'] . "</td></tr>";
    echo "<tr><td>Presiune MB:</td> <td>" . $data['current']['pressure_mb'] . "</td></tr>";
    echo "<tr><td>Precipitatii mm:</td> <td>" . $data['current']['precip_mm'] . "</td></tr>";
    echo "<tr><td>Umiditate:</td> <td>" . $data['current']['humidity'] . "</td></tr>";
    echo "<tr><td>Nori:</td> <td>" . $data['current']['cloud'] . "</td></tr>";
    echo "<tr><td>Real feel celsius:</td> <td>" . $data['current']['feelslike_c'] . "</td></tr>";
    echo "<tr><td>Vizibilitate in km:</td> <td>" . $data['current']['vis_km'] . "</td></tr>";
    echo "<tr><td>Raze uv:</td> <td>" . $data['current']['uv'] . "</td></tr>";
    echo "<tr><td>Gust kph:</td> <td>" . $data['current']['gust_kph'] . "</td></tr>";

    echo "</table>";
}

?>