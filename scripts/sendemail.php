<?php
  $YourName = $_POST["YourName"];
  $YourEmail = $_POST["YourEmail"];
  $YourSubject = $_POST["ContactSubject"];
  $YourComment = $_POST["YourComments"];
  switch ($YourSubject){
  case "General Enquiry":
	$to = "generalenquiry@likemyfanpage.com";
	break;
  case "Reporting A Bug":
	$to = "bugreport@likemyfanpage.com";
	break;
  case "Showing Some Love":
	$to = "somelove@likemyfanpage.com";
	break;
  case "Link Request":
	$to = "linkrequest@likemyfanpage.com";
	break;
  case "Request A Feature":
	$to = "featurerequest@likemyfanpage.com";
	break;
  }   
  $subject = $YourSubject;
  $message = $YourName." (".$YourEmail."), has sent the following comment:\r\n\n" . $YourComment . "\r\n";
  $headers =  "From: contactform@likemyfanpage.com \r\n";
  mail($to,$subject,$message,$headers);
  
  header("Location: /contactus.php?s=1"); 
?>