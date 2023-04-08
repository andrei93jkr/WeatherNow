<?php 

    //get the ip adress
    $ip_adress = file_get_contents('https://api.ipify.org');

    //filter the ip to get ipv4
    $filtered_ip = filter_var($ip_adress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
  
    //endpoint url
    $api_url = "http://ip-api.com/json/" . $filtered_ip;

    // send get request to api endpoint url
    $response = file_get_contents($api_url);

    //parse json response into a php array
    $data = json_decode($response, true);

    if(isset($data['error'])) {

        echo "Error: " . $data['error']['info'];

    } else {

        $city = $data['city'];
        $region = $data['regionName'];
        $country = $data['country'];

        //start session
        session_start();

        //set the location to $_SESSION
        $_SESSION['city_location'] = $city;
        $_SESSION['region_location'] = $region;
        $_SESSION['country_location'] = $country;

        echo "<div>" . $_SESSION['city_location'] . ", " . $_SESSION['region_location'] . ", " . $_SESSION['country_location'] . "</div>. ";
    }

?>