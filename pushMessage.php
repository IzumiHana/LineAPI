<?php

require_once 'vendor/autoload.php'; 

	$accessToken = "mseffG47b6f1E2Tun5BEKadQnhAMLK0hIZ48IN8TSD309Tc9JM3wA7RwHLKf/Z5u5kdHpaMP1t8CMo7sHVxkeOLEVRsx8GiFtX8634mtr4bzfib9AdNuUs3OOBcz+P5pRXSijKhDCaNGSzI6fF2y+QdB04t89/1O/w1cDnyilFU=";
    $channelSecret = "69f681980b4be247bc5fb821857acceb";
    $message = $_REQUEST["m"];
   
   
	$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($accessToken);
	$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

	$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
	$response = $bot->pushMessage('U987c895d7bbe6ca3ed81a1b194cb4a9c', $textMessageBuilder);

	echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>