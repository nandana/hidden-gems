<?php
require __DIR__ .'/vendor/autoload.php';

use hotelbeds\hotel_api_sdk\HotelApiClient;
use hotelbeds\hotel_api_sdk\model\Destination;
use hotelbeds\hotel_api_sdk\model\Geolocation;
use hotelbeds\hotel_api_sdk\model\Occupancy;
use hotelbeds\hotel_api_sdk\model\Pax;
use hotelbeds\hotel_api_sdk\model\Rate;
use hotelbeds\hotel_api_sdk\model\Stay;
use hotelbeds\hotel_api_sdk\types\ApiVersion;
use hotelbeds\hotel_api_sdk\types\ApiVersions;
use hotelbeds\hotel_api_sdk\messages\AvailabilityRS;


function listClosebyHotels($lat, $long, $distance) {
    
    $reader = new Zend\Config\Reader\Ini();
    $config   = $reader->fromFile(__DIR__.'/HotelApiClient.ini');
    $cfgApi = $config["apiclient"];

    
    $apiClient = new HotelApiClient($cfgApi["url"],
                                $cfgApi["apikey"],
                                $cfgApi["sharedsecret"],
                                new ApiVersion(ApiVersions::V1_0),
                                $cfgApi["timeout"]);
    
    $rqData = new \hotelbeds\hotel_api_sdk\helpers\Availability();
    $startDate = new DateTime();
    $startDate->modify('+29 day');
    $endDate = clone $startDate;
    $endDate->modify('+30 day');
    
    $rqData->stay = new Stay($startDate,$endDate);

    //$rqData->destination = new Destination("PMI");
    $geolocation = new Geolocation();
    $geolocation->latitude = $lat;
    $geolocation->longitude= $long;
    $geolocation->radius= $distance;
    $geolocation->unit= Geolocation::KM;
    
    $rqData->geolocation = $geolocation;

    $occupancy = new Occupancy();
    $occupancy->adults = 1;
    $occupancy->children = 0;
    $occupancy->rooms = 1;

    $occupancy->paxes = [ ];
    $rqData->occupancies = [ $occupancy ];

    try {
        return $apiClient->Availability($rqData);
    } catch (\hotelbeds\hotel_api_sdk\types\HotelSDKException $e) {
        $auditData = $e->getAuditData();
        error_log( $e->getMessage() );
        error_log( "Audit remote data = ".json_encode($auditData->toArray()));
        exit();
    } catch (Exception $e) {
        error_log( $e->getMessage() );
        exit();
    }
    
    
}

$latitude = -32.949815300;
$longitude= -60.654034800;
$distance= 5.0;

$availRS = listClosebyHotels($latitude, $longitude, $distance);

// Check availability is empty or not!
if (!$availRS->isEmpty()) {

    foreach ($availRS->hotels->iterator() as $hotelCode => $hotelData)
    {
        echo "---------------------------------------------------------------------\t\n";
        echo "name: " . $hotelData->name . "\t\n";    
        echo "latitude: " . $hotelData->latitude . "\t\n";    
        echo "longitude: " . $hotelData->longitude . "\t\n";    
        echo "categoryName: " . $hotelData->categoryName . "\t\n";    
        echo "destinationName: " . $hotelData->destinationName . "\t\n";    
        echo "zoneName: " . $hotelData->zoneName . "\t\n";    
    }
    
} else {
   echo "There are no results!";
}

?>