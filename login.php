<?php require_once('scripts/cp/connection.php'); ?>
<?php require_once('scripts/cp/getvalstring.php'); ?>
<?php require_once('scripts/logoutuser.php'); ?>
<?php session_start(); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['Email'])) {
  $loginUsername=$_POST['Email'];
  $password=$_POST['Password'];
  $MM_fldUserAuthorization = "";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  
  $LoginRS__query=sprintf("SELECT usr_email, usr_pass FROM tbl_usrs WHERE usr_email=%s AND usr_pass=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $Wisdom_Mcr) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: account.php" );
  }
  else {
    header("Location: ?s=1" );
  }
}
?>
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/userside.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<!-- InstanceBeginEditable name="follow" -->
<meta name="robots" content="index,follow">
<!-- InstanceEndEditable -->
<meta property="og:title" content="Like My FanPage | Facebook Fan Page Directory">
<meta property="og:type" content="website">
<meta property="og:url" content="http://likemyfanpage.com">
<meta property="og:image" content="http://likemyfanpage.com/images/profilepic.jpg">
<meta property="og:site_name" content="Like My FanPage">
<meta property='og:description' content='Facebook Page admins, submit your fan page. Your page will be shown in the category you choose, randomly on the homepage and randomly on over 100 page tabs. Add your page and get more fans...submission is completely FREE.'>
<meta property="fb:admins" content="">
<!-- InstanceBeginEditable name="head" -->
<meta name="description" content="Login to your LikeMyFanPage.com account. Not a member? No problem sign up right here">
<meta name="keywords" content="how to make a page,facebook page,create a page,fan page,facebook page create">
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="doctitle" -->
<title>Login to your likemyfanpage.com account</title>
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
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" -->Login<!-- InstanceEndEditable --></h1><div class="inlineBlock lfloat pleft"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=158364950909265&amp;xfbml=1"></script><fb:like href="http://likemyfanpage.com" send="false" layout="button_count" width="100" show_faces="false" action="like" font="lucida grande"></fb:like>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class="inlineBlock lfloat"><g:plusone size="medium" href="http://likemyfanpage.com"></g:plusone></div><br class="cboth">
        <div id="siteInfo"><span class='nameicon'></span>Name <a href="http://likemyfanpage.com">LikeMyFanPage.com</a> <span class='mindicon'></span>Created in the mind of <a href="http://andyjacko.com" target="_blank">Andy Jacko</a> <span class='madeicon'></span>Made using <a href="http://www.w3.org/html/logo/" target="_blank">HTML5</a>, <a href="http://www.w3schools.com/css3/default.asp" target="_blank">CSS3</a>, <a href="http://jquery.com/" target="_blank">jQuery</a>, <a href="http://www.php.net" target="_blank">PHP</a> and <a href="http://www.adobe.com/products/creativesuite.html" target="_blank">Adobe Creative Suite</a> <span class='fromicon'></span>Comes from <a href="http://www.wdyl.com/#manchester" target="_blank">Manchester, United Kingdom</a> <span class='bornicon'></span>Born <a href="http://en.wikipedia.org/wiki/August_1" target="_blank">1st August 2011</a></div>
        <a href="/realiconpic.php"><img src="/images/fbbanners.jpg"></a>
		<!-- InstanceBeginEditable name="pagebody" -->
              <?php
				switch ($_GET["s"]){
				case "1":
				  echo "<p>Not so fast! You have typed something wrong. Wanna have another try?</p>"; 
				  break;
				case "2":
				  echo "<p>Easy tiger, you need to login to submit your FanPage.</p>"; 
				  break;
				case "3":
				  echo "<p class='justify'><strong>Thanks for registering, but you need to confirm your email address before you can add any pages.  You will soon recieve an email containing an activation link, please use this link to activate your account.</strong></p>"; 
				  break;
				default:
				  echo "<p>Login to your <strong>LikeMyFanPage.com</strong> account.</p>"; 
				}   
			  ?>              
              <br><br>
              <form name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
              <!--[if IE]>Enter Your Email Address:<br><![endif]-->
              <input name="Email" class="searchBox" placeholder="Enter Your Email Address" type="email" id="Email" style="width:175px;">
              <br><br>
              <!--[if IE]>Enter Your Password:<br><![endif]-->
              <input name="Password" type="password" class="searchBox" placeholder="Enter Your Password" id="Password" style="width:175px;">
              <br><br>
              <?php if ($_GET['s'] != "1"){ ?> 
              <input type="submit" name="Submit" id="Submit" value="Login" class="searchBox" style="width:75px;" onClick="MM_validateForm('Email','','RisEmail','Password','','R');return document.MM_returnValue">
              <?php }else{ ?>
              <input type="submit" name="Submit" id="Submit" value="Retry" class="searchBox" style="width:75px;" onClick="MM_validateForm('Email','','RisEmail','Password','','R');return document.MM_returnValue">
              <?php } ?> 
              </form>
              <br><br><div class="tbl"></div><br>
              <p>Not yet a member? No worries, register now.</p>
              <form name="form2" method="POST" action="/scripts/register.php">
              <!--[if IE]>Enter Your Forename:<br><![endif]-->
              <input name="Forename" class="searchBox" placeholder="Enter Your Forename" type="text" id="Forename" style="width:175px;">
              <br><br>
              <!--[if IE]>Enter Your Surname:<br><![endif]-->
              <input name="Surname" class="searchBox" placeholder="Enter Your Surname" type="text" id="Surname" style="width:175px;">
              <br><br>
              <!--[if IE]>Enter Your Email Address:<br><![endif]-->
              <input name="REmail" class="searchBox" placeholder="Enter Your Email Address" type="email" id="REmail" style="width:175px;">
              <br><br>
              <!--[if IE]>Enter Your Password:<br><![endif]-->
              <input name="RPassword" type="password" class="searchBox" placeholder="Enter Your Password" id="RPassword" style="width:175px;">
              <br><br>
              <p>Please "Like" us if you have not done so already:<br><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=158364950909265&amp;xfbml=1"></script><fb:like href="http://likemyfanpage.com" send="false" layout="button_count" show_faces="false" action="like" font="lucida grande"></fb:like></p>
              <input name="Terms" id="Terms" type="checkbox" value="">
              &nbsp;I accept the <a href="terms.php" target="_blank">Terms & Conditions</a><br><br>
              <input type="submit" name="Submit" id="Submit" value="Register" class="searchBox" style="width:75px;" onClick="return registerform();">
              </form>
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