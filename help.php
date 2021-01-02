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
<meta name="description" content="Need a little help? Read through some of our FAQ's or contact us and we will do our best">
<meta name="keywords" content="how to create a facebook page,create a page facebook,create page on facebook,how do you create a facebook page">
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="doctitle" -->
<title>Need a little help? Check out our FAQ's</title>
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
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" -->Help<!-- InstanceEndEditable --></h1><div class="inlineBlock lfloat pleft"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=158364950909265&amp;xfbml=1"></script><fb:like href="http://likemyfanpage.com" send="false" layout="button_count" width="100" show_faces="false" action="like" font="lucida grande"></fb:like>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class="inlineBlock lfloat"><g:plusone size="medium" href="http://likemyfanpage.com"></g:plusone></div><br class="cboth">
        <div id="siteInfo"><span class='nameicon'></span>Name <a href="http://likemyfanpage.com">LikeMyFanPage.com</a> <span class='mindicon'></span>Created in the mind of <a href="http://andyjacko.com" target="_blank">Andy Jacko</a> <span class='madeicon'></span>Made using <a href="http://www.w3.org/html/logo/" target="_blank">HTML5</a>, <a href="http://www.w3schools.com/css3/default.asp" target="_blank">CSS3</a>, <a href="http://jquery.com/" target="_blank">jQuery</a>, <a href="http://www.php.net" target="_blank">PHP</a> and <a href="http://www.adobe.com/products/creativesuite.html" target="_blank">Adobe Creative Suite</a> <span class='fromicon'></span>Comes from <a href="http://www.wdyl.com/#manchester" target="_blank">Manchester, United Kingdom</a> <span class='bornicon'></span>Born <a href="http://en.wikipedia.org/wiki/August_1" target="_blank">1st August 2011</a></div>
        <a href="/realiconpic.php"><img src="/images/fbbanners.jpg"></a>
		<!-- InstanceBeginEditable name="pagebody" -->
        <p class="justify">If you are experiencing any problems with our website, please check these FAQ's:</p>
        <h2 class="justify">General Website Issues</h2>
        <p class="justify"><strong>Q.</strong> The layout of the pages on your website is messed up, how come?</p>
        <p class="justify tbl"><strong>A.</strong> Our website uses the latest web design standards (HTML5, CSS3 & jQuery) which may not be fully supported in some older browsers. We suggest that you upgrade your current browser or choose from any of these browsers which all fully support our code: <a href="http://www.mozilla.org/en-US/firefox/fx/" target="_blank">Firefox</a>, <a href="http://www.opera.com/download/" target="_blank">Opera</a>, <a href="http://www.google.com/chrome/" target="_blank">Chrome</a>, <a href="http://www.apple.com/safari/download/" target="_blank">Safari</a> or <a href="http://internet-explorer.uk.msn.com/" target="_blank">Internet Explorer</a></p>
        <p class="justify"><strong>Q.</strong> I see red error boxes where Fan Pages should be, what's going on?</p>
        <p class="justify tbl"><strong>A.</strong> There could be a few different reasons you are seeing the red boxes but it generally means that the Fan Page can't be found on Facebook. This could be due to an incorrect address being submitted by the page owner, the Fan Page is no longer available on Facebook or the connection from our website to the Fan Page may be experiencing problems.&nbsp; If the issue persists after refreshing the page, there is a small &quot;<strong>bug</strong>&quot; icon located at the bottom-right of each listing&nbsp;that you can use to report the error to us.</p>
        <p class="justify"><strong>Q.</strong> I can't find the Fan Pages I want when I use the search bar, is there something I am doing wrong?</p>
        <p class="justify tbl"><strong>A.</strong> The search feature of our website works by searching through the <span class="justify">Facebook</span> Page names that our users enter while submitting their Pages to find the &quot;phrase&quot; you entered into the search box.&nbsp;Sometimes a user may enter an incorrect name or make a typo when doing this, which is beyond our control. Your best bet is to try other search phrases to find the <span class="justify">Facebook</span> Pages you are looking for or by searching through the Fan Page categories.</p>
        <h2 class="justify">Account Issues</h2>
        <p class="justify"><strong>Q.</strong> I can't login to my account even though I am using the correct details, why?</p>
        <p class="justify tbl"><strong>A.</strong> Our website uses &quot;session cookies&quot; to handle the login and authentication process. If you are experiencing difficulties logging in to your account, you may need to check your browser  settings, to enable third-party cookies.</p>
        <p class="justify"><strong>Q.</strong> I can login to my account, but I can't submit my Fan Page, I get a message telling me to confirm my email address?</p>
        <p class="justify tbl"><strong>A.</strong> To make sure we have your&nbsp;correct email address and to comply with email spam prevention standards, we ask every user to confirm their email address. This is generally called a &quot;double opt-in&quot; and most internet services that you sign up for will use this kind of feature. Once you confirm your email address you will be granted full access to our website.</p>
        <p class="justify"><strong>Q.</strong> I clicked the link in your welcome email to confirm my email address but nothing happened, did something go wrong?</p>
        <p class="justify tbl"><strong>A.</strong> When you clicked the link, a new page should have opened up stating if your email address has been found and activated. If you did not see this page, try clicking the confirm link again or try copy &amp; pasting the URL into your browsers address bar. If the page still fails to load&nbsp;it could be because your browser is setup to block popup windows, please check your settings and try again.</p>
        <p class="justify"><strong>Q.</strong> I tried everything you said above, but I just can't get my email address confirmed, is there any other way?</p>
        <p class="justify tbl"><strong>A.</strong> If you have tried all the  options above, please send us an email <strong>from the address you signed up with</strong>, including your name, the date you signed up and any error messages you may have encountered to confirm@likemyfanpage.com and we will authorise your account manually.</p>
        <p class="justify"><strong>Q.</strong> I have more than one Fan Page, do I need a new account for each Page?</p>
        <p class="justify tbl"><strong>A.</strong> No. Once you have confirmed your account with us you may add as many fan pages as you wish.&nbsp;We are aware that many people manage multiple pages (as do we), and made sure this was one of our main features. To add more FanPages just use the &quot;Submit Your FanPage&quot; link&nbsp;on your account navigation.</p>
        <p class="justify"><strong>Q.</strong> When I try to add my Fan Page I get an error message that my Page has already been added, why?</p>
        <p class="justify tbl"><strong>A.</strong> It is possible that another admin of the <span class="justify">Facebook</span> Page has already created an account and added the Page. We do not allow a <span class="justify">Facebook</span> Page to be added more than once to deter spammers submitting the same Page multiple times. If you are the only admin, and can prove it, we can transfer the Fan Page to your account. Please <span class="justify"><a href="contactus.php">Contact Us</a></span> to start this process, but <strong> we will require proof of <span class="justify">Facebook</span> Fan Page ownership</strong>.</p>
        <p class="justify"><strong>Q.</strong> I deleted one of my Facebook Fan Pages by accident, can I get it back?</p>
        <p class="justify tbl"><strong>A.</strong> No, once a Fan Page has been deleted it is permanently removed from our database. If needed, you can always add your Page back again using the "Submit Your FanPage" link on your account navigation.</p>
        <p class="justify">If you still need assistance after reading through these FAQ's, please <a href="contactus.php">Contact Us</a> and we will do our best to help solve your problem.</p>
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