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
<meta name="description" content="Read the story behind LikeMyFanPage.com and learn how you can make facebook fan pages.">
<meta name="keywords" content="facebook fan,fan on facebook,fan book on facebook,facebook groups">
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="doctitle" -->
<title>What's the story behind likemyfanpage.com</title>
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
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" -->About<!-- InstanceEndEditable --></h1><div class="inlineBlock lfloat pleft"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=158364950909265&amp;xfbml=1"></script><fb:like href="http://likemyfanpage.com" send="false" layout="button_count" width="100" show_faces="false" action="like" font="lucida grande"></fb:like>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class="inlineBlock lfloat"><g:plusone size="medium" href="http://likemyfanpage.com"></g:plusone></div><br class="cboth">
        <div id="siteInfo"><span class='nameicon'></span>Name <a href="http://likemyfanpage.com">LikeMyFanPage.com</a> <span class='mindicon'></span>Created in the mind of <a href="http://andyjacko.com" target="_blank">Andy Jacko</a> <span class='madeicon'></span>Made using <a href="http://www.w3.org/html/logo/" target="_blank">HTML5</a>, <a href="http://www.w3schools.com/css3/default.asp" target="_blank">CSS3</a>, <a href="http://jquery.com/" target="_blank">jQuery</a>, <a href="http://www.php.net" target="_blank">PHP</a> and <a href="http://www.adobe.com/products/creativesuite.html" target="_blank">Adobe Creative Suite</a> <span class='fromicon'></span>Comes from <a href="http://www.wdyl.com/#manchester" target="_blank">Manchester, United Kingdom</a> <span class='bornicon'></span>Born <a href="http://en.wikipedia.org/wiki/August_1" target="_blank">1st August 2011</a></div>
        <a href="/realiconpic.php"><img src="/images/fbbanners.jpg"></a>
		<!-- InstanceBeginEditable name="pagebody" -->
        <p class="justify">This website came about for several different reasons and motives. The main reason being, that there seemed to be a distinct lack of a decent <strong>Facebook Fan Page Directory</strong> available on the web. The second reason being to help Facebook Page authors (such as <strong>LikeMyFanPage.com</strong>) to maximise the visibility of their Facebook Pages. Another reason was to teach people how to monetise and automate their Facebook Fan Pages.</p>
        <p class="justify">I (<a href="http://andyjacko.com" target="_blank">Andy Jacko</a>) make a living from various forms of <strong>Internet Marketing</strong> and one of my motives for making this website was obviously to make extra income for myself, but  I am also a <strong>big</strong> believer in positive thinking, personal development and<a href="http://en.wikipedia.org/wiki/Law_of_attraction" target="_blank"> The Law Of Attraction.</a> Part of my philosophy is to &quot;<em>share the wealth</em>&quot;, so my motives are not just for more income for myself, but to teach other people how to make money online for themselves too.</p>
        <p class="justify">This website offers Facebook Fan Page admins the opportunity to add their Pages to this directory &quot;<strong>Free of Charge</strong>&quot; and have other people browsing this website &quot;like&quot; them. It will also teach those who are willing to learn, how to maximise the impact of their Facebook Fan Pages, provide a quality service to their fans, automate their Pages, and at the same time make an income doing it.</p>
        <p class="justify">For non Facebook Fan Page admins, this website offers a directory of Facebook Pages which are arranged in such a way as to be easily &quot;liked&quot;. You can browse Facebook Pages by category or by entering &quot;search&quot; keywords to easily find new Fan Pages to &quot;like&quot;.</p>
        <p class="justify">Whatever your reason for visiting this website, we hope you find it useful. <strong>Thank You</strong>.</p>
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