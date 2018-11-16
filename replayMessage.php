<?php

require_once 'vendor/autoload.php'; 

   $accessToken = "mseffG47b6f1E2Tun5BEKadQnhAMLK0hIZ48IN8TSD309Tc9JM3wA7RwHLKf/Z5u5kdHpaMP1t8CMo7sHVxkeOLEVRsx8GiFtX8634mtr4bzfib9AdNuUs3OOBcz+P5pRXSijKhDCaNGSzI6fF2y+QdB04t89/1O/w1cDnyilFU=";
   $channelSecret = "69f681980b4be247bc5fb821857acceb";
   
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];
   
   
   function echoMessage($_accessToken,$_channelSecret,$_id,$_message)
   {
		$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_accessToken);
		$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_channelSecret]);

		$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($_message);
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
			
			$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($profile['displayName']);
			$response = $bot->pushMessage($_id, $textMessageBuilder);
			
			$imageMessageBuilder = new \LINE\LINEBot\MessageBuilder\ImageMessageBuilder($profile['pictureUrl'],$profile['pictureUrl']);
			$response = $bot->pushMessage($_id, $imageMessageBuilder);
		}
   }
   
   if($message == "getprofile")
   {
	   getProfile($accessToken,$channelSecret,$id);
   }
   else
   {
	  echoMessage($accessToken,$channelSecret,$id,$message); 
   }
   
   
   
  
   
	exit();
?>