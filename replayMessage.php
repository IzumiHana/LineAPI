<?php

require_once 'vendor/autoload.php'; 

   $accessToken = "aAbIJBE20DNWjqeFCJMvEQzXfrAQxE4wW4NuwVrhU3zvB9G4wSP/mqM9hgPAnjtW6OlrEpwypNwKRDMXA/fHTFQD7a6iroxKzA35WSpmNqtV8dppfjsslu5uR7t8IwCLOLffF3O3xLm7FD0CHRlbsgdB04t89/1O/w1cDnyilFU=";
   
   
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];
   
   if($message == "getProfile")
   {
	   getProfile();
   }
   else
   {
	  echoMessage(); 
   }
   
   function echoMessage()
   {
		$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($accessToken);
		$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '792c96be503870a4427b961e3ea673fb']);

		$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
		$response = $bot->pushMessage($id, $textMessageBuilder);

		echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
   }
   
   function getProfile()
   {
		$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('<channel access token>');
		$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '<channel secret>']);
		$response = $bot->getProfile('<userId>');
		if ($response->isSucceeded()) {
			$profile = $response->getJSONDecodedBody();
			echo $profile['displayName'];
			echo $profile['pictureUrl'];
			echo $profile['statusMessage'];
		}
   }
   

?>