<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

function getAccessToken() {
    
    $request = new Http_Request2('https://api.cognitive.microsoft.com/sts/v1.0/issueToken');
    $url = $request->getUrl();
    
    $headers = array(
    // subscription key from Azure
    'Ocp-Apim-Subscription-Key' => '7e542189e45f4e96b336dc360a4a5a36',
    );
    
    $request->setHeader($headers);
    
    $request->setMethod(HTTP_Request2::METHOD_POST);
    
    // Request body
    $request->setBody("{body}");

    try
    {
        $response = $request->send();
        return $response->getBody();
    }
    catch (HttpException $ex)
    {
        echo $ex;
    }
    
}

function translate($accessToken, $text, $targetLang) {
    // prepare the authentication header
    $bearer = 'Bearer ' . $accessToken;
    
    $translate = new Http_Request2('https://api.microsofttranslator.com/v2/http.svc/Translate');


    $translateHeaders = array(
    "Authorization" => $bearer
    );
    $translate->setHeader($translateHeaders);
    
    $translateParams = array(
    //'from' => 'en',
    'to' => $targetLang, 
    'text' => $text
    );
    
    $translateUrl = $translate->getUrl();
    $translateUrl->setQueryVariables($translateParams);
    $translate->setMethod(HTTP_Request2::METHOD_GET);
    
    try
    {
        $translateResponse = $translate->send();
        $resp = $translateResponse->getBody();
        $xml=simplexml_load_string($resp);
        return $xml;
    }
    catch (HttpException $ex)
    {
        echo $ex;
    }

    
}

$text1 = "Como te llamas?";
$text2 = "Joyas ocultas es una muy buena aplicación";
$text3 = "I am quite impressed by the quality of the translation";

// First you need to get an access token, once obtained it is valid for 10 minutes.
$token = getAccessToken();
$translated1 = translate($token, $text1 , "en");
$translated2 = translate($token, $text2 , "en");
$translated3 = translate($token, $text3 , "es");

echo $text1 . ' -> ' . $translated1 . "\t\n";
echo $text2 . ' -> ' . $translated2 . "\t\n";
echo $text3 . ' -> ' . $translated3 . "\t\n";

?>