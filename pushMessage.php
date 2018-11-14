<?php

require_once 'vendor/autoload.php'; 

   
	$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('aAbIJBE20DNWjqeFCJMvEQzXfrAQxE4wW4NuwVrhU3zvB9G4wSP/mqM9hgPAnjtW6OlrEpwypNwKRDMXA/fHTFQD7a6iroxKzA35WSpmNqtV8dppfjsslu5uR7t8IwCLOLffF3O3xLm7FD0CHRlbsgdB04t89/1O/w1cDnyilFU=');
	$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '792c96be503870a4427b961e3ea673fb']);

	$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
	$response = $bot->pushMessage('U987c895d7bbe6ca3ed81a1b194cb4a9c', $textMessageBuilder);

	echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>