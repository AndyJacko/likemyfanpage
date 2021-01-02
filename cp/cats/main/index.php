<?php require_once('../../../scripts/cp/connection.php'); ?>
<?php require_once('../../../scripts/cp/getvalstring.php'); ?>
<?php require_once('../../../scripts/cp/authnlogout.php'); ?>
<?php session_start(); ?>
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
  <?php include('../../../scripts/cp/header.php');?>
  <?php include('../../../scripts/cp/cp-nav.php');?>
    <div id="contentCol" class="clearfix">
      <div id="headerArea">
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" -->Category Manager<!-- InstanceEndEditable --></h1><br class="cboth">
		<!-- InstanceBeginEditable name="pagebody" -->
        &nbsp;
		<!-- InstanceEndEditable -->
      </div>
    </div>
</div>
<?php include('../../../scripts/cp/footer.php');?>
</div>
</body>
<!-- InstanceEnd --></html>