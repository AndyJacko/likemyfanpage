<?php require_once('cp/connection.php'); ?>
<?php require_once('cp/getvalstring.php'); ?>
<?php
$usrCode = mt_rand() ."". mt_rand() ."". mt_rand() ."". mt_rand() ."". mt_rand();
$insertSQL = sprintf("INSERT INTO tbl_usrs (usr_fname, usr_sname, usr_email, usr_pass, usr_code) VALUES (%s, %s, %s, %s, %s)",
					 GetSQLValueString($_POST['Forename'], "text"),
					 GetSQLValueString($_POST['Surname'], "text"),
					 GetSQLValueString($_POST['REmail'], "text"),
					 GetSQLValueString($_POST['RPassword'], "text"),
					 GetSQLValueString($usrCode, "text"));

mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$Result1 = mysql_query($insertSQL, $Wisdom_Mcr) or die(mysql_error());

$to = $_POST['REmail'];
$subject = "Please confirm your LikeMyFanPage.com account.";
$message = "Hey " . $_POST['Forename'] . ", thanks for registering your account.<br><br>Before you can login and submit your FanPages you will need to confirm your email address by clicking the following link or copying the URL below into your browsers address bar:<br><br><a href='http://likemyfanpage.com/confirm.php?usr=".$_POST['REmail']."&id=".$usrCode."'>Activate My Account</a><br><br>http://likemyfanpage.com/confirm.php?usr=".$_POST['REmail']."&id=".$usrCode."<br><br><br>Regards<br><br>LikeMyFanPage.com";
$headers =  "From: account@likemyfanpage.com \r\nContent-type: text/html\r\n";
mail($to,$subject,$message,$headers);

header(sprintf("Location: /login.php?s=3"));
?>
