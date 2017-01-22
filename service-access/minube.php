<?php
//Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';


function getPointsOfInterest($lat, $long, $distance, $lang) {
    
    $url = 'http://papi.minube.com/pois';
    
    $minube = new Http_Request2($url);
    $minubeUrl = $minube->getUrl();
    
    $headers = array(
    "Accept" => "application/json"
    );
    $minube->setHeader($headers);
    
    $params = array(
        'latitude' => $lat, 
        'longitude' => $long,
        'max_distance' => $distance,
        'lang' => $lang,
        //'category_group' => '(tosee|eat)'
        'order_by' => 'score', // distance|score
        'api_key'  => 'Zb4e3CkFKNsgvZhr'
    );
    $minubeUrl->setQueryVariables($params);
    $minube->setMethod(HTTP_Request2::METHOD_GET);
    
    try
    {
        $minubeResponse = $minube->send();
        $places = $minubeResponse->getBody();
        return json_decode($places, true);
    }
    catch (HttpException $ex)
    {
        echo $ex;
    }  
    
}

// this is how to execute the function
$latitude = 40.420360;
$longitude = -3.696281;
$max_distance = 5000;
$language = 'es';

$placeArray = getPointsOfInterest($latitude, $longitude, $max_distance, $language);

//Use only the values that are of interest to you, I am returning everything
foreach ($placeArray as $place) {
    echo "---------------------------------------------------------------------\t\n";
    echo "id:" . $place['id'] . "\t\n";
    echo "name:" . $place['name'] . "\t\n";
    echo "latitude:" . $place['latitude'] . "\t\n";
    echo "longitude:" . $place['longitude'] . "\t\n";
    echo "country_id:" . $place['country_id'] . "\t\n";
    echo "zone_id:" . $place['zone_id'] . "\t\n";
    echo "city_id:" . $place['city_id'] . "\t\n";
    echo "subcategory_id:" . $place['subcategory_id'] . "\t\n";
    echo "distance:" . $place['distance'] . "\t\n";
    echo "picture_url:" . $place['picture_url'] . "\t\n";
}

?>