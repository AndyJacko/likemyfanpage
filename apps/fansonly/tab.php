<?php
require 'scripts/facebook.php';

$app_id = "";
$app_secret = "";
$facebook = new Facebook(array('appId' => $app_id, 'secret' => $app_secret, 'cookie' => true));
$signed_request = $facebook->getSignedRequest();
$page_id = $signed_request["page"]["id"];
$page_admin = $signed_request["page"]["admin"];
$like_status = $signed_request["page"]["liked"];
$country = $signed_request["user"]["country"];
$locale = $signed_request["user"]["locale"];

if ($like_status) {
  switch ($country){
  case "gb":
    $random = rand(1,10) ;
	if ($random <=9){
      echo (file_get_contents("uklikes/liked0".($random).".php"));
	} else {
      echo (file_get_contents("uklikes/liked".($random).".php"));
	}
	break;
  default:
    $random = rand(1,10) ;
	if ($random <=9){
      echo (file_get_contents("uslikes/liked0".($random).".php"));
	} else {
      echo (file_get_contents("uslikes/liked".($random).".php"));
	}
  }   
} else {
  $a = file_get_contents("notliked.php");
echo ($a);
}
?>
<img src='http://ga.webdigi.co.uk/fbga.php?googlecode=UA-25117534-1&googledomain=facebook.com&pagelink=/facebookdoorway&pagetitle=FacebookDoorway'></img>