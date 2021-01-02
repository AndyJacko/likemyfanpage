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
<meta name="description" content="The privacy of our visitors to LikeMyFanPage.com is important. We will never sell or share your details">
<meta name="keywords" content="how to create a page in facebook,facebook create a page,how to create facebook page,facebook create page">
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="doctitle" -->
<title>What you need to know about how we handle your privacy</title>
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
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" -->Privacy Policy<!-- InstanceEndEditable --></h1><div class="inlineBlock lfloat pleft"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=158364950909265&amp;xfbml=1"></script><fb:like href="http://likemyfanpage.com" send="false" layout="button_count" width="100" show_faces="false" action="like" font="lucida grande"></fb:like>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class="inlineBlock lfloat"><g:plusone size="medium" href="http://likemyfanpage.com"></g:plusone></div><br class="cboth">
        <div id="siteInfo"><span class='nameicon'></span>Name <a href="http://likemyfanpage.com">LikeMyFanPage.com</a> <span class='mindicon'></span>Created in the mind of <a href="http://andyjacko.com" target="_blank">Andy Jacko</a> <span class='madeicon'></span>Made using <a href="http://www.w3.org/html/logo/" target="_blank">HTML5</a>, <a href="http://www.w3schools.com/css3/default.asp" target="_blank">CSS3</a>, <a href="http://jquery.com/" target="_blank">jQuery</a>, <a href="http://www.php.net" target="_blank">PHP</a> and <a href="http://www.adobe.com/products/creativesuite.html" target="_blank">Adobe Creative Suite</a> <span class='fromicon'></span>Comes from <a href="http://www.wdyl.com/#manchester" target="_blank">Manchester, United Kingdom</a> <span class='bornicon'></span>Born <a href="http://en.wikipedia.org/wiki/August_1" target="_blank">1st August 2011</a></div>
        <a href="/realiconpic.php"><img src="/images/fbbanners.jpg"></a>
		<!-- InstanceBeginEditable name="pagebody" -->
            <p class="justify">We recognize that the privacy of your personal information is as important to you as ours is to us. Here is some information on what types of personal information we receive and collect when you use or visit <strong>LikeMyFanPage.com</strong> and how we safeguard your information.</p>
            <h2 class="justify">We will never give or sell your information to third parties, we hate spam as much as you do.</h2>
            <br>
            <h2 class="justify">Personal Details</h2>
            <p class="justify">When you sign up for an account we collect your email address, password, forname and surname, which we use to ensure only authorised users can login and add Facebook Fan Pages. We may also periodically send you marketing emails. You may unsubscribe from these emails at any time, using the unsubscribe link contained within each email.</p>
            <h2 class="justify">Third Party Websites</h2>
            <p class="justify">Our website contains links to other websites. We are not responsible for the privacy policies or practices of third party websites. You should check every website's privacy policy before you continue to use the website.</p>
            <h2 class="justify">Cookies</h2>
            <p class="justify">Some of our pages may use cookies. A cookie is a text-only string of information that a website transfers to the cookie file on your computer. No personal information is stored in the cookie file.</p>
            <h2 class="justify">Disabling/Enabling Cookies</h2>
            <p class="justify">You can choose to disable or selectively turn off our cookies or third-party cookies in your browser settings, or by managing preferences in programs such as Norton Internet Security. However, this can affect how you are able to interact with our website as well as other websites. This could include the inability to login to services or programs, such as logging into forums or accounts.</p>
            <h2 class="justify">Advertisements</h2>
            <p class="justify">Some of the advertisers who display ads on <strong>LikeMyFanPage.com</strong> use technological methods (cookies) to measure the effectiveness of their ads and to personalize advertising content. <strong>LikeMyFanPage.com</strong> does not share any personally identifiable information with advertisers.</p>
            <h2 class="justify">Policy Amendments</h2>
            <p class="justify">We may update this privacy policy from time-to-time by posting a new version on this website. You should check this page occasionally to ensure you are happy with any changes.</p>
	        <p class="justify">Effective August 2011</p>
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