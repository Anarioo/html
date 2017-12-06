<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

// NOTE: You must use the same location in your REST call as you used to obtain your subscription keys.
//   For example, if you obtained your subscription keys from westus, replace "westcentralus" in the 
//   URL below with "westus".
$request = new Http_Request2('https://westcentralus.api.cognitive.microsoft.com/vision/v1.0');
$url = $request->getUrl();

$headers = array(
    // Request headers
    'Content-Type' => 'application/json',

    // NOTE: Replace the "Ocp-Apim-Subscription-Key" value with a valid subscription key.
    'Ocp-Apim-Subscription-Key' => 'ad59f57fb1714495848af7faa522f03a',
);

$request->setHeader($headers);

$parameters = array(
    // Request parameters
    'visualFeatures' => 'Categories',
    'details' => '{string}',
    'language' => 'en',
);

$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_POST);

// Request body
$request->setBody("url" "http://bethpark.org/wp-content/uploads/2016/06/meterPic.png");  // Replace with the body, for example, "{"url": "http://www.example.com/images/image.jpg"}

try
{
    $response = $request->send();
    echo $response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}

?>