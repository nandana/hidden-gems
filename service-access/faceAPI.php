<?php
$ocp_apim_subscription_key = "e052fb51c0364622bb91285486286a54";
$face_detect_url = "https://westus.api.cognitive.microsoft.com/face/v1.0/detect";
$face_verify_url = "https://westus.api.cognitive.microsoft.com/face/v1.0/verify";
$master_image_url = "https://github.com/amiedes/hackatrip-imgs/raw/master/alberto.png";
$login_image_url = "https://github.com/amiedes/hackatrip-imgs/raw/master/alberto-2.png";

// ------------- DETECT FIRST FACE REQUEST -------------------------------------
$detect_first_face_request = curl_init($face_detect_url);

curl_setopt_array($detect_first_face_request, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $face_detect_url,
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => json_encode(array(
        "returnFaceId" => true,
        "returnFaceLandmarks" => false,
        "url" => $master_image_url
    )),
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Ocp-Apim-Subscription-Key: e052fb51c0364622bb91285486286a54'
    )
));

$resp = curl_exec($detect_first_face_request);  // Send request
$first_face_id = json_decode($resp, true)[0]['faceId'];
print_r($first_face_id . "\n");
curl_close($detect_first_face_request);         // Close request

// ------------- DETECT SECOND FACE REQUEST ------------------------------------
$detect_second_face_request = curl_init($face_detect_url);

curl_setopt_array($detect_second_face_request, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $face_detect_url,
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => json_encode(array(
        "returnFaceId" => true,
        "returnFaceLandmarks" => false,
        "url" => $login_image_url
    )),
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Ocp-Apim-Subscription-Key: e052fb51c0364622bb91285486286a54'
    )
));

$resp = curl_exec($detect_second_face_request);  // Send request
$second_face_id = json_decode($resp, true)[0]['faceId'];
print_r($second_face_id . "\n");
curl_close($detect_second_face_request);         // Close request

// ---------------------- COMPARE TWO FACES ------------------------------------
$compare_faces_request = curl_init($face_detect_url);

curl_setopt_array($compare_faces_request, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $face_verify_url,
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => json_encode(array(
        "faceId1" => $first_face_id,
        "faceId2" => $second_face_id
    )),
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Ocp-Apim-Subscription-Key: e052fb51c0364622bb91285486286a54'
    )
));

$resp = curl_exec($compare_faces_request);  // Send request
print_r(json_decode($resp, true));
curl_close($compare_faces_request);         // Close request

?>
