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

//close curl connection
curl_close($ch);

//decode data from json and store in $data variable
$data = json_decode($response, true);

//if no $data['forecast'] was found display error message
if(!isset($data['forecast'])) {
    echo "No data was found!";
    //if $data['forecast'] is found display the location celsius degrees and current condition icon
} else {
    echo " " . $data['current']['temp_c'] . "°C"  . "<div><img src=".$data['current']['condition']['icon']."></div>";
}

?>