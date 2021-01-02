<?php require_once('scripts/cp/connection.php'); ?>
<?php
$deadID = $_GET['id'];
$RSCheckID = "SELECT * FROM tbl_dead WHERE page_id=".$deadID;
mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$CheckIDRS=mysql_query($RSCheckID, $Wisdom_Mcr) or die(mysql_error());
$foundID = mysql_num_rows($CheckIDRS);

if ($foundID){
  echo "";
}else{
  $RSInsID = "INSERT INTO tbl_dead (page_id) VALUES (".$deadID.")";
  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  $InsIDRS=mysql_query($RSInsID, $Wisdom_Mcr) or die(mysql_error());
}
?>
<!DOCTYPE HTML>
<html>
<head xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="content-language" content="en">
<meta name="robots" content="noindex,nofollow">
<title>Report Dead Links</title>
<link href="/scripts/likemyfanpage.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
windowWidth=300;
windowHeight=100;
if (parseInt(navigator.appVersion) >= 4) window.moveTo((screen.width/2)-(windowWidth/2+10),(screen.height/2)-(windowHeight/2+20));
</script>
</head>
<body>
  <p class="bugReportThanks"><br><strong>Thank You For Reporting This Bug</strong><br><br><a href="javascript:window.close();">Close Window</a></p>
</body>
</html>