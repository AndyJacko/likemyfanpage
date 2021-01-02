<?php require_once('scripts/cp/connection.php'); ?>
<?php require_once('scripts/logoutuser.php'); ?>
<?php session_start(); ?>
<?php
if (isset($_GET["o"])) {
  if ($_GET["o"] == 1) {
    $_SESSION["order"] = "page_name";	
  } else {
    $_SESSION["order"] = "tbl_id";	
  }	
} else {
  if (!isset($_SESSION["order"])) {
	 $_SESSION["order"] = "page_name";
  }
}
if (isset($_GET["d"])) {
  if ($_GET["d"] == 1) {
    $_SESSION["direction"] = "ASC";	
  } else {
    $_SESSION["direction"] = "DESC";	
  }	
} else {
  if (!isset($_SESSION["direction"])) {
	 $_SESSION["direction"] = "ASC";
  }
}
?>
<?php
if (isset($_GET["sub"])) {
  $maxRows_RSPages = 10;
  $p = 0;
  if (isset($_GET['p'])) {
    $p = $_GET['p'];
  }
  $startRow_RSPages = $p * $maxRows_RSPages;
  
  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  $query_RSPages = "SELECT * FROM tbl_pages WHERE page_active=1 AND sub_id = '".$_GET["sub"]."' ORDER BY ".$_SESSION["order"]." ".$_SESSION["direction"];
  $query_limit_RSPages = sprintf("%s LIMIT %d, %d", $query_RSPages, $startRow_RSPages, $maxRows_RSPages);
  $RSPages = mysql_query($query_limit_RSPages, $Wisdom_Mcr) or die(mysql_error());
  $row_RSPages = mysql_fetch_assoc($RSPages);
  
  if (isset($_GET['t'])) {
    $t = $_GET['t'];
  } else {
    $all_RSPages = mysql_query($query_RSPages);
    $t = mysql_num_rows($all_RSPages);
  }
  $totalPages_RSPages = ceil($t/$maxRows_RSPages)-1;
  
  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  $query_RSSubName = "SELECT * FROM tbl_subs WHERE tbl_id = '".$_GET["sub"]."'";
  $RSSubName = mysql_query($query_RSSubName, $Wisdom_Mcr) or die(mysql_error());
  $row_RSSubName = mysql_fetch_assoc($RSSubName);
  $totalRows_RSSubName = mysql_num_rows($RSSubName);
  mysql_free_result($RSSubName);
  
  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  $query_RSCatName = "SELECT * FROM tbl_cat WHERE tbl_id = '".$row_RSSubName['cat_id']."'";
  $RSCatName = mysql_query($query_RSCatName, $Wisdom_Mcr) or die(mysql_error());
  $row_RSCatName = mysql_fetch_assoc($RSCatName);
  $totalRows_RSCatName = mysql_num_rows($RSCatName);
  mysql_free_result($RSCatName);
  
  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  $query_RSSponsored = "SELECT *,rand() AS random_row FROM tbl_pages WHERE sub_id = '".$_GET["sub"]."' AND page_sponsored = 1 ORDER BY ".random_row." LIMIT 3";
  $RSSponsored = mysql_query($query_RSSponsored, $Wisdom_Mcr) or die(mysql_error());
  $row_RSSponsored = mysql_fetch_assoc($RSSponsored);
  $totalRows_RSSponsored = mysql_num_rows($RSSponsored);

  $queryString_RSPages = "";
  if (!empty($_SERVER['QUERY_STRING'])) {
	$params = explode("&", $_SERVER['QUERY_STRING']);
	$newParams = array();
	foreach ($params as $param) {
	  if (stristr($param, "p") == false && 
		  stristr($param, "t") == false) {
		array_push($newParams, $param);
	  }
	}
	if (count($newParams) != 0) {
	  $queryString_RSPages = "&" . htmlentities(implode("&", $newParams));
	}
  }
  $queryString_RSPages = sprintf("&t=%d%s", $t, $queryString_RSPages);
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
<meta name="description" content="<?php if (isset($_GET["sub"])) { echo $row_RSCatName["cat_name"]." - ".$row_RSSubName['cat_name'].": "; } ?>Browse Facebook Fan Pages by category. Easily find Facebook Fan Pages to like.">
<meta name="keywords" content="how to create a page facebook,how to create a facebook fan page,create facebook page,facebook how to create a page">
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="doctitle" -->
<?php if (isset($_GET["sub"])) { echo "<title>Viewing FanPages for: ".$row_RSCatName["cat_name"]." - ".$row_RSSubName['cat_name']."</title>"; } ?>
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
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" --><?php if (isset($_GET["sub"])) { echo $row_RSSubName['cat_name']; } ?><!-- InstanceEndEditable --></h1><div class="inlineBlock lfloat pleft"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=158364950909265&amp;xfbml=1"></script><fb:like href="http://likemyfanpage.com" send="false" layout="button_count" width="100" show_faces="false" action="like" font="lucida grande"></fb:like>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class="inlineBlock lfloat"><g:plusone size="medium" href="http://likemyfanpage.com"></g:plusone></div><br class="cboth">
        <div id="siteInfo"><span class='nameicon'></span>Name <a href="http://likemyfanpage.com">LikeMyFanPage.com</a> <span class='mindicon'></span>Created in the mind of <a href="http://andyjacko.com" target="_blank">Andy Jacko</a> <span class='madeicon'></span>Made using <a href="http://www.w3.org/html/logo/" target="_blank">HTML5</a>, <a href="http://www.w3schools.com/css3/default.asp" target="_blank">CSS3</a>, <a href="http://jquery.com/" target="_blank">jQuery</a>, <a href="http://www.php.net" target="_blank">PHP</a> and <a href="http://www.adobe.com/products/creativesuite.html" target="_blank">Adobe Creative Suite</a> <span class='fromicon'></span>Comes from <a href="http://www.wdyl.com/#manchester" target="_blank">Manchester, United Kingdom</a> <span class='bornicon'></span>Born <a href="http://en.wikipedia.org/wiki/August_1" target="_blank">1st August 2011</a></div>
        <a href="/realiconpic.php"><img src="/images/fbbanners.jpg"></a>
		<!-- InstanceBeginEditable name="pagebody" -->
        <?php if ($t > 0){ ?>
        <div class="paging">
		<?php if ($t > 9){ ?>          
          <?php if ($p > 0) { ?>
            <a href="<?php printf("%s?p=%d%s", $currentPage, 0, $queryString_RSPages); ?>"><span class='img firsticona'></span></a>
          <?php } else {?>
            <span class='img firsticon'></span>
          <?php } ?>
          <?php if ($p > 0) { ?>
            <a href="<?php printf("%s?p=%d%s", $currentPage, max(0, $p - 1), $queryString_RSPages); ?>"><span class='img previcona'></span></a>&nbsp;&nbsp;
          <?php } else {?>
            <span class='img previcon'></span>&nbsp;&nbsp;
          <?php } ?>
        <?php } ?>
        FanPages <?php echo ($startRow_RSPages + 1) ?> to <?php echo min($startRow_RSPages + $maxRows_RSPages, $t) ?> of <?php echo $t ?>
        <?php if ($t > 9){ ?>          
          <?php if ($p < $totalPages_RSPages) { ?>
            &nbsp;&nbsp;<a href="<?php printf("%s?p=%d%s", $currentPage, min($totalPages_RSPages, $p + 1), $queryString_RSPages); ?>"><span class='img nexticona'></span></a>
          <?php } else {?>
            &nbsp;&nbsp;<span class='img nexticon'></span>
          <?php } ?>
          <?php if ($p < $totalPages_RSPages) { ?>
            <a href="<?php printf("%s?p=%d%s", $currentPage, $totalPages_RSPages, $queryString_RSPages); ?>"><span class='img lasticona'></span></a>
          <?php } else {?>
            <span class='img lasticon'></span>
          <?php } ?>
        <?php } ?>
          &nbsp;|&nbsp;
		  <a href='?sub=<?php echo $_GET["sub"] ?>&o=1'><span class='img <?php if ($_SESSION["order"] != "page_name") { echo "bynaicono"; } else { echo "bynaicon"; } ?>'></span></a>&nbsp;
		  <a href='?sub=<?php echo $_GET["sub"] ?>&o=2'><span class='img <?php if ($_SESSION["order"] == "page_name") { echo "byalicono"; } else { echo "byalicon"; } ?>'></span></a>&nbsp;|&nbsp;
		  <a href='?sub=<?php echo $_GET["sub"] ?>&d=1'><span class='img <?php if ($_SESSION["direction"] != "ASC") { echo "byupicono"; } else { echo "byupicon"; } ?>'></span></a>&nbsp;
		  <a href='?sub=<?php echo $_GET["sub"] ?>&d=2'><span class='img <?php if ($_SESSION["direction"] == "ASC") { echo "byadncono"; } else { echo "byadncon"; } ?>'></span></a>
        </div>
		<?php if ($totalRows_RSSponsored > 0){ do { ?>
		    <div class="sponsoredItem"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="<?php echo $row_RSSponsored['page_url']; ?>" width="520" height="74" show_faces="false" border_color="#000" stream="false" header="false"></fb:like-box><div class="reportPage"><a onClick="confirmation('/reportbug.php?id=<?php echo $row_RSSponsored['tbl_id']; ?>','ReportDeadLink','width=300,height=100')"><span class="img rbugicon"></span></a></div></div>
		  <?php } while ($row_RSSponsored = mysql_fetch_assoc($RSSponsored)); } do { ?>
            <div class='nonSponsoredItem tbl'><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="<?php echo $row_RSPages['page_url']; ?>" width="520" height="74" show_faces="false" border_color="#000" stream="false" header="false"></fb:like-box><div class="reportPage"><a onClick="confirmation('/reportbug.php?id=<?php echo $row_RSPages['tbl_id']; ?>','ReportDeadLink','width=300,height=100')"><span class="img rbugicon"></span></a></div></div>
          <?php } while ($row_RSPages = mysql_fetch_assoc($RSPages)); ?> 
        <div class="paging">
		<?php if ($t > 9){ ?>          
          <?php if ($p > 0) { ?>
            <a href="<?php printf("%s?p=%d%s", $currentPage, 0, $queryString_RSPages); ?>"><span class='img firsticona'></span></a>
          <?php } else {?>
            <span class='img firsticon'></span>
          <?php } ?>
          <?php if ($p > 0) { ?>
            <a href="<?php printf("%s?p=%d%s", $currentPage, max(0, $p - 1), $queryString_RSPages); ?>"><span class='img previcona'></span></a>&nbsp;&nbsp;
          <?php } else {?>
            <span class='img previcon'></span>&nbsp;&nbsp;
          <?php } ?>
        <?php } ?>
        Fan Pages <?php echo ($startRow_RSPages + 1) ?> to <?php echo min($startRow_RSPages + $maxRows_RSPages, $t) ?> of <?php echo $t ?>
        <?php if ($t > 9){ ?>          
          <?php if ($p < $totalPages_RSPages) { ?>
            &nbsp;&nbsp;<a href="<?php printf("%s?p=%d%s", $currentPage, min($totalPages_RSPages, $p + 1), $queryString_RSPages); ?>"><span class='img nexticona'></span></a>
          <?php } else {?>
            &nbsp;&nbsp;<span class='img nexticon'></span>
          <?php } ?>
          <?php if ($p < $totalPages_RSPages) { ?>
            <a href="<?php printf("%s?p=%d%s", $currentPage, $totalPages_RSPages, $queryString_RSPages); ?>"><span class='img lasticona'></span></a>
          <?php } else {?>
            <span class='img lasticon'></span>
          <?php } ?>
        <?php } ?>
        </div>
		  <?php } else { ?>
		    <p>Sorry, no Fan Pages have been added to this category yet. Be the first! <a href='submityourfanpage.php'>Submit Your FanPage</a></p>
        <?php } ?>
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
<?php
mysql_free_result($RSPages);
mysql_free_result($RSSponsored);
?>