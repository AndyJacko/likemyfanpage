<?php require_once('scripts/cp/connection.php'); ?>
<?php require_once('scripts/logoutuser.php'); ?>
<?php require_once('scripts/cp/getvalstring.php'); ?>
<?php session_start(); ?>
<?php
if ($_GET["usr"] == "" || $_GET["id"] == "") {
  $usrStatus = 1;
} else {
  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  $query_RSusr = "SELECT * FROM tbl_usrs WHERE usr_email = '".$_GET["usr"]."' AND usr_code = '".$_GET["id"]."'";
  $RSusr = mysql_query($query_RSusr, $Wisdom_Mcr) or die(mysql_error());
  $row_RSusr = mysql_fetch_assoc($RSusr);
  $totalRows_RSusr = mysql_num_rows($RSusr);
  mysql_free_result($RSusr);
  if ($totalRows_RSusr >0){
	if ($row_RSusr["usr_active"] == 0) {
	  $updateSQL = sprintf("UPDATE tbl_usrs SET usr_active=1 WHERE tbl_id=%s", GetSQLValueString($row_RSusr['tbl_id'], "int"));
	  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
	  $Result1 = mysql_query($updateSQL, $Wisdom_Mcr) or die(mysql_error());
	  $usrStatus = 2;

	  $to = "userconfirmed@likemyfanpage.com";
	  $subject = "Confirmed Account";
	  $message = $row_RSusr['usr_fname']." ".$row_RSusr['usr_sname']." - ".$row_RSusr['usr_email']." has confirmed their account...";
	  $headers =  "From: userconfirmed@likemyfanpage.com \r\n";
	  mail($to,$subject,$message,$headers);
	} else {
	  $usrStatus = 5;
	}
  } else {
	mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
	$query_RSusr = "SELECT * FROM tbl_usrs WHERE usr_email = '".$_GET["usr"]."'";
	$RSusr = mysql_query($query_RSusr, $Wisdom_Mcr) or die(mysql_error());
	$row_RSusr = mysql_fetch_assoc($RSusr);
	$totalRows_RSusr = mysql_num_rows($RSusr);
	mysql_free_result($RSusr);
    if ($totalRows_RSusr <1){
	  $usrStatus = 3;
	} else {
	  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
	  $query_RSusr = "SELECT * FROM tbl_usrs WHERE usr_code = '".$_GET["id"]."'";
	  $RSusr = mysql_query($query_RSusr, $Wisdom_Mcr) or die(mysql_error());
	  $row_RSusr = mysql_fetch_assoc($RSusr);
	  $totalRows_RSusr = mysql_num_rows($RSusr);
	  mysql_free_result($RSusr);
	  if ($totalRows_RSusr <1){
	    $usrStatus = 4;
	  }
	}
  }
}
?>
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/userside.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<!-- InstanceBeginEditable name="follow" -->
<meta name="robots" content="noindex,nofollow">
<!-- InstanceEndEditable -->
<meta property="og:title" content="Like My FanPage | Facebook Fan Page Directory">
<meta property="og:type" content="website">
<meta property="og:url" content="http://likemyfanpage.com">
<meta property="og:image" content="http://likemyfanpage.com/images/profilepic.jpg">
<meta property="og:site_name" content="Like My FanPage">
<meta property='og:description' content='Facebook Page admins, submit your fan page. Your page will be shown in the category you choose, randomly on the homepage and randomly on over 100 page tabs. Add your page and get more fans...submission is completely FREE.'>
<meta property="fb:admins" content="">
<!-- InstanceBeginEditable name="head" -->
<meta name="description" content="">
<meta name="keywords" content="">
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="doctitle" -->
<title>Confirming your account...</title>
<!-- InstanceEndEditable -->
<link rel="icon" href="http://likemyfanpage.com/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://likemyfanpage.com/favicon.ico" type="image/x-icon">
<link href="/scripts/likemyfanpage.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script> 
<script type="text/javascript" src="/scripts/nav/jquery.color.js"></script> 
<script type="text/javascript" src="/scripts/nav/jMenu.js"></script> 
<script type="text/javascript" src="/scripts/likemyfanpage.js"></script> 
</head>

<body>
<div id="blueBar"></div>
<div id="globalContainer">
  <?php include('scripts/header.php');?>
  <?php include('scripts/leftnav.php');?>
    <div id="contentCol" class="clearfix">
      <div id="headerArea">
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" -->Account Confirmation<!-- InstanceEndEditable --></h1><div class="inlineBlock lfloat pleft"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=158364950909265&amp;xfbml=1"></script><fb:like href="http://likemyfanpage.com" send="false" layout="button_count" width="100" show_faces="false" action="like" font="lucida grande"></fb:like>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class="inlineBlock lfloat"><g:plusone size="medium" href="http://likemyfanpage.com"></g:plusone></div><br class="cboth">
        <div id="siteInfo"><span class='nameicon'></span>Name <a href="http://likemyfanpage.com">LikeMyFanPage.com</a> <span class='mindicon'></span>Created in the mind of <a href="http://andyjacko.com" target="_blank">Andy Jacko</a> <span class='madeicon'></span>Made using <a href="http://www.w3.org/html/logo/" target="_blank">HTML5</a>, <a href="http://www.w3schools.com/css3/default.asp" target="_blank">CSS3</a>, <a href="http://jquery.com/" target="_blank">jQuery</a>, <a href="http://www.php.net" target="_blank">PHP</a> and <a href="http://www.adobe.com/products/creativesuite.html" target="_blank">Adobe Creative Suite</a> <span class='fromicon'></span>Comes from <a href="http://www.wdyl.com/#manchester" target="_blank">Manchester, United Kingdom</a> <span class='bornicon'></span>Born <a href="http://en.wikipedia.org/wiki/August_1" target="_blank">1st August 2011</a></div>
        <a href="/realiconpic.php"><img src="/images/fbbanners.jpg"></a>
		<!-- InstanceBeginEditable name="pagebody" -->
        <?php
		  switch ($usrStatus){
		  case "1":
			echo "<p><strong>Unknown User.</strong> There was an error with the activation link or URL. Please <a href='/contactus.php'>Contact Us</a>.</p>"; 
			break;
		  case "2":
			echo "<p><strong>Account Activated.</strong> Thank you for confirming your email address. You may now <a href='/login.php'>Login</a>.</p>"; 
			break;
		  case "3":
			echo "<p><strong>Unknown User.</strong> The email address can not be found.</p>"; 
			break;
		  case "4":
			echo "<p><strong>Incorrect Code.</strong> The activation code does not match the registered email address.</p>"; 
			break;
		  case "5":
			echo "<p><strong>Already Confirmed.</strong> You have already confirmed this email address. Thank You.</p>"; 
			break;
		  }   
		?>
      <!-- InstanceEndEditable -->
      </div>
      <div id="rightAds">
        <?php include('scripts/rightads.php');?>
      </div>
    </div>
</div>
<?php include('scripts/footer.php');?>
</div>
</body>
<!-- InstanceEnd --></html>