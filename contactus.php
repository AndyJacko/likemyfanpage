<?php require_once('scripts/cp/connection.php'); ?>
<?php require_once('scripts/logoutuser.php'); ?>
<?php session_start(); ?>
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
<meta name="description" content="If you want to get in touch with LikeMyFanPage.com you can use our form provided.">
<meta name="keywords" content="how to facebook fan page, how to fan page facebook,fan facebook page,facebook page fan">
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="doctitle" -->
<title>How to contact likemyfanpage.com</title>
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
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" -->Contact Us<!-- InstanceEndEditable --></h1><div class="inlineBlock lfloat pleft"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=158364950909265&amp;xfbml=1"></script><fb:like href="http://likemyfanpage.com" send="false" layout="button_count" width="100" show_faces="false" action="like" font="lucida grande"></fb:like>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class="inlineBlock lfloat"><g:plusone size="medium" href="http://likemyfanpage.com"></g:plusone></div><br class="cboth">
        <div id="siteInfo"><span class='nameicon'></span>Name <a href="http://likemyfanpage.com">LikeMyFanPage.com</a> <span class='mindicon'></span>Created in the mind of <a href="http://andyjacko.com" target="_blank">Andy Jacko</a> <span class='madeicon'></span>Made using <a href="http://www.w3.org/html/logo/" target="_blank">HTML5</a>, <a href="http://www.w3schools.com/css3/default.asp" target="_blank">CSS3</a>, <a href="http://jquery.com/" target="_blank">jQuery</a>, <a href="http://www.php.net" target="_blank">PHP</a> and <a href="http://www.adobe.com/products/creativesuite.html" target="_blank">Adobe Creative Suite</a> <span class='fromicon'></span>Comes from <a href="http://www.wdyl.com/#manchester" target="_blank">Manchester, United Kingdom</a> <span class='bornicon'></span>Born <a href="http://en.wikipedia.org/wiki/August_1" target="_blank">1st August 2011</a></div>
        <a href="/realiconpic.php"><img src="/images/fbbanners.jpg"></a>
		<!-- InstanceBeginEditable name="pagebody" -->
        <p class="justify">This form can be used to contact us for several different reasons. Please select the correct subject of your communication from the "<strong>Subject</strong>" drop-down menu. <strong>If you are reporting a bug or problem, please also include any error messages you may have encountered in the comments box</strong>.</p>
        <br>
        <?php if ($_GET["s"] == "1") { echo "<h2>Your Email Was Sent OK!</h2>"; } ?>
        <form action="scripts/sendemail.php" method="POST" name="form1">
        <br><br>
        <!--[if IE]>Please Enter Your Name:<br><![endif]-->
        <input name="YourName" id="YourName" class="YourName" placeholder="Please Enter Your Name" type="text">
        <br><br>
        <!--[if IE]>Please Enter Your Email Address:<br><![endif]-->
        <input name="YourEmail" id="YourEmail" class="YourEmail" placeholder="Please Enter Your Email Address" type="email">
        <br><br>
        <!--[if IE]>Please Select A Subject:<br><![endif]-->
        <select name="ContactSubject" id="ContactSubject" class="ContactSubject">
          <option selected>Please Select A Subject...</option>
          <option value="General Enquiry">General Enquiry</option>
          <option value="Reporting A Bug">Reporting A Bug</option>
          <option value="Showing Some Love">Showing Some Love</option>
          <option value="Link Request">Link Request</option>
          <option value="Request A Feature">Request A Feature</option>
        </select>
        <br><br>
        <!--[if IE]>Please Enter Your Comments:<br><![endif]-->
        <textarea name="YourComments" class="YourComments" id="YourComments" placeholder="Please Enter Your Comments"></textarea>
        <br><br>
        <input name="Submit" type="Submit" class="searchBox" id="Submit" style="width:75px;" onClick="return contactform();" value="Submit">
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