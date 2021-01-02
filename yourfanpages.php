<?php require_once('scripts/cp/connection.php'); ?>
<?php require_once('scripts/authnlogoutuser.php'); ?>
<?php session_start(); ?>
<?php
mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RSUser = "SELECT * FROM tbl_usrs WHERE usr_email = '".$_SESSION['MM_Username']."'";
$RSUser = mysql_query($query_RSUser, $Wisdom_Mcr) or die(mysql_error());
$row_RSUser = mysql_fetch_assoc($RSUser);
$totalRows_RSUser = mysql_num_rows($RSUser);

$maxRows_RSPages = 10;
$p = 0;
if (isset($_GET['p'])) {
  $p = $_GET['p'];
}
$startRow_RSPages = $p * $maxRows_RSPages;

mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RSPages = "SELECT * FROM tbl_pages WHERE usr_id = '".$row_RSUser['tbl_id']."' ORDER BY page_name ASC";
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
<title>These are the Fan Pages you have added to your likemyfanpage.com account</title>
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
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" --><?php echo $row_RSUser['usr_fname']. " " .$row_RSUser['usr_sname']; ?><!-- InstanceEndEditable --></h1><div class="inlineBlock lfloat pleft"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=158364950909265&amp;xfbml=1"></script><fb:like href="http://likemyfanpage.com" send="false" layout="button_count" width="100" show_faces="false" action="like" font="lucida grande"></fb:like>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class="inlineBlock lfloat"><g:plusone size="medium" href="http://likemyfanpage.com"></g:plusone></div><br class="cboth">
        <div id="siteInfo"><span class='nameicon'></span>Name <a href="http://likemyfanpage.com">LikeMyFanPage.com</a> <span class='mindicon'></span>Created in the mind of <a href="http://andyjacko.com" target="_blank">Andy Jacko</a> <span class='madeicon'></span>Made using <a href="http://www.w3.org/html/logo/" target="_blank">HTML5</a>, <a href="http://www.w3schools.com/css3/default.asp" target="_blank">CSS3</a>, <a href="http://jquery.com/" target="_blank">jQuery</a>, <a href="http://www.php.net" target="_blank">PHP</a> and <a href="http://www.adobe.com/products/creativesuite.html" target="_blank">Adobe Creative Suite</a> <span class='fromicon'></span>Comes from <a href="http://www.wdyl.com/#manchester" target="_blank">Manchester, United Kingdom</a> <span class='bornicon'></span>Born <a href="http://en.wikipedia.org/wiki/August_1" target="_blank">1st August 2011</a></div>
        <a href="/realiconpic.php"><img src="/images/fbbanners.jpg"></a>
		<!-- InstanceBeginEditable name="pagebody" -->
		<?php
		  if ($row_RSUser['usr_active'] == 0) {
		?>	  
			<p>Hey <?php echo $row_RSUser['usr_fname']; ?>, you haven't confirmed your email address yet.</p>
			<p>If you didnt recieve your account activation email, <a href='resendactivationemail.php'>click here</a> to resend it.</p>
		<?php 
          } else {
			if ($t > 0){
		?>		
        <?php
				switch ($_GET["s"]){
				case "1":
				  echo "<p>WooHoo, you successfully added a FanPage.</p>"; 
				  break;
				case "2":
				  echo "<p>Your FanPage has been been edited successfully.</p>"; 
				  break;
				case "3":
				  echo "<p>Your FanPage was deleted.</p>"; 
				  break;
				default:
				  echo "<p>&nbsp;</p>"; 
				}   
		  ?> 
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
		  </div>
		  <?php
        	  do {
		?>		  
			    <div class="aleft tbl"><div class="inlineBlock"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="<?php echo $row_RSPages['page_url']; ?>" width="400" height="75" show_faces="false" border_color="#000" stream="false" header="false"></fb:like-box></div><div class="inlineBlock editbutton"><a href="/editfanpage.php?id=<?php echo $row_RSPages['tbl_id']; ?>">Edit</a></div><div class="inlineBlock deletebutton"><a href="/deletefanpage.php?id=<?php echo $row_RSPages['tbl_id']; ?>">Delete</a></div></div>
		<?php	  
              } while ($row_RSPages = mysql_fetch_assoc($RSPages));
			} else {
		?>		
			  <p><?php echo $row_RSUser['usr_fname']; ?>, either you're new or you haven't submitted any FanPages yet.</p><br>
			  <p><a href="submityourfanpage.php">Submit Your FanPage</a> now.</p>
		<?php	
            }
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
<?php
mysql_free_result($RSUser);
mysql_free_result($RSPages);
?>