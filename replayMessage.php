<?php

require_once 'vendor/autoload.php'; 

   $accessToken = "aAbIJBE20DNWjqeFCJMvEQzXfrAQxE4wW4NuwVrhU3zvB9G4wSP/mqM9hgPAnjtW6OlrEpwypNwKRDMXA/fHTFQD7a6iroxKzA35WSpmNqtV8dppfjsslu5uR7t8IwCLOLffF3O3xLm7FD0CHRlbsgdB04t89/1O/w1cDnyilFU=";
   $channelSecret = "792c96be503870a4427b961e3ea673fb";
   
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];
   
   
   
   
   if($message == "getprofile")
   {
	   getProfile($accessToken,$channelSecret,$id);
   }
   else
   {
	  //echoMessage($accessToken,$channelSecret,$id); 
	  $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($accessToken);
		$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

		$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
		$response = $bot->pushMessage($id, $textMessageBuilder);

		echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
   }
   
   function echoMessage($_accessToken,$_channelSecret,$_id)
   {
		$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_accessToken);
		$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_channelSecret]);

		$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
		$response = $bot->pushMessage($_id, $textMessageBuilder);

		echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
   }
   
   function getProfile($_accessToken,$_channelSecret,$_id)
   {
		$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_accessToken);
		$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_channelSecret]);
		$response = $bot->getProfile($_id);
		if ($response->isSucceeded()) 
		{
			$profile = $response->getJSONDecodedBody();
			echo $profile['displayName'];
			echo $profile['pictureUrl'];
			echo $profile['statusMessage'];
		}
   }
   
  
   
	exit();
?>