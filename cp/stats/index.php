<?php require_once('../../scripts/cp/connection.php'); ?>
<?php require_once('../../scripts/cp/getvalstring.php'); ?>
<?php require_once('../../scripts/cp/authnlogout.php'); ?>
<?php require_once('getuserstats.php'); ?>
<?php require_once('getpagestats.php'); ?>
<?php session_start(); ?>
<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/cp.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex,follow">
<title>Controlpanel</title>
<link rel="icon" href="http://likemyfanpage.com/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://likemyfanpage.com/favicon.ico" type="image/x-icon">
<link href="/scripts/likemyfanpage.css" rel="stylesheet" type="text/css">
<link href="/scripts/cp/cp.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script> 
<script type="text/javascript" src="/scripts/nav/jquery.color.js"></script> 
<script type="text/javascript" src="/scripts/nav/jMenu.js"></script> 
<script type="text/javascript" src="/scripts/likemyfanpage.js"></script> 
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div id="blueBar"></div>
<div id="globalContainer">
  <?php include('../../scripts/cp/header.php');?>
  <?php include('../../scripts/cp/cp-nav.php');?>
    <div id="contentCol" class="clearfix">
      <div id="headerArea">
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" -->Site Statistics<!-- InstanceEndEditable --></h1><br class="cboth">
		<!-- InstanceBeginEditable name="pagebody" -->
        <br>
        <div class="statbox">
          <div class="centerme statheader"><strong>User Stats</strong></div>
          <a href="/cp/users/">Total</a>: <?php getuserstats(""); ?><br>
          <a href="/cp/users/confirmed.php">Confirmed</a>: <?php getuserstats(" WHERE usr_active=1"); ?><br>
          <a href="/cp/users/unconfirmed.php">Unconfirmed</a>: <?php getuserstats(" WHERE usr_active=0"); ?><br>
          <a href="/cp/users/havesubscribed.php">Subscribed</a>: <?php getuserstats(" WHERE usr_subscribed=1"); ?><br>
          <a href="/cp/users/haventsubscribed.php">Unsubscribed</a>: <?php getuserstats(" WHERE usr_subscribed=0"); ?><br>
          <a href="/cp/users/gotpages.php">With Pages</a>: <?php havepages(); ?><br>
          <a href="/cp/users/nopages.php">Without Pages</a>: <?php donthavepages(); ?>
        </div>
        
        <div class="statbox">
          <div class="centerme statheader"><strong>Page Stats</strong></div>
          <a href="/cp/pages/">Total</a>: <?php getpagestats(""); ?><br>
          <a href="/cp/pages/active.php">Active</a>: <?php getpagestats(" WHERE page_active=1"); ?><br>
          <a href="/cp/pages/inactive.php">Inactive</a>: <?php getpagestats(" WHERE page_active=0"); ?><br>
          <a href="/cp/pages/sponsored.php">Sponsored</a>: <?php getpagestats(" WHERE page_sponsored=1"); ?><br>
          <a href="/cp/pages/flagged.php">Flagged</a>: <?php getpagestats(" WHERE page_flagged=1"); ?><br>
          <a href="/cp/pages/buggy.php">Buggy</a>: <?php getbuggypages(""); ?><br>
        </div>
		<!-- InstanceEndEditable -->
      </div>
    </div>
</div>
<?php include('../../scripts/cp/footer.php');?>
</div>
</body>
<!-- InstanceEnd --></html>