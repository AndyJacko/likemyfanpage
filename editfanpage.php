<?php require_once('scripts/cp/connection.php'); ?>
<?php require_once('scripts/authnlogoutuser.php'); ?>
<?php session_start(); ?>
<?php
mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RSUser = "SELECT * FROM tbl_usrs WHERE usr_email = '".$_SESSION['MM_Username']."'";
$RSUser = mysql_query($query_RSUser, $Wisdom_Mcr) or die(mysql_error());
$row_RSUser = mysql_fetch_assoc($RSUser);
$totalRows_RSUser = mysql_num_rows($RSUser);

mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RSPage = "SELECT * FROM tbl_pages WHERE tbl_id = '".$_GET['id']."'";
$RSPage = mysql_query($query_RSPage, $Wisdom_Mcr) or die(mysql_error());
$row_RSPage = mysql_fetch_assoc($RSPage);
$totalRows_RSPage = mysql_num_rows($RSPage);

mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RScatsIns = "SELECT * FROM tbl_cat";
$RScatsIns = mysql_query($query_RScatsIns, $Wisdom_Mcr) or die(mysql_error());
$row_RScatsIns = mysql_fetch_assoc($RScatsIns);
$totalRows_RScatsIns = mysql_num_rows($RScatsIns);

mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RScats2Ins = "SELECT * FROM tbl_subs";
$RScats2Ins = mysql_query($query_RScats2Ins, $Wisdom_Mcr) or die(mysql_error());
$row_RScats2Ins = mysql_fetch_assoc($RScats2Ins);
$totalRows_RScats2Ins = mysql_num_rows($RScats2Ins);
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
<title>You can make changes right here</title>
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
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" -->Edit Your FanPage<!-- InstanceEndEditable --></h1><div class="inlineBlock lfloat pleft"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=158364950909265&amp;xfbml=1"></script><fb:like href="http://likemyfanpage.com" send="false" layout="button_count" width="100" show_faces="false" action="like" font="lucida grande"></fb:like>&nbsp;&nbsp;&nbsp;&nbsp;</div><div class="inlineBlock lfloat"><g:plusone size="medium" href="http://likemyfanpage.com"></g:plusone></div><br class="cboth">
        <div id="siteInfo"><span class='nameicon'></span>Name <a href="http://likemyfanpage.com">LikeMyFanPage.com</a> <span class='mindicon'></span>Created in the mind of <a href="http://andyjacko.com" target="_blank">Andy Jacko</a> <span class='madeicon'></span>Made using <a href="http://www.w3.org/html/logo/" target="_blank">HTML5</a>, <a href="http://www.w3schools.com/css3/default.asp" target="_blank">CSS3</a>, <a href="http://jquery.com/" target="_blank">jQuery</a>, <a href="http://www.php.net" target="_blank">PHP</a> and <a href="http://www.adobe.com/products/creativesuite.html" target="_blank">Adobe Creative Suite</a> <span class='fromicon'></span>Comes from <a href="http://www.wdyl.com/#manchester" target="_blank">Manchester, United Kingdom</a> <span class='bornicon'></span>Born <a href="http://en.wikipedia.org/wiki/August_1" target="_blank">1st August 2011</a></div>
        <a href="/realiconpic.php"><img src="/images/fbbanners.jpg"></a>
		<!-- InstanceBeginEditable name="pagebody" -->
		<?php
		  if ($row_RSUser['usr_active'] == 0) {
		?>	  
			<p>Hey <?php echo $row_RSUser['usr_fname']; ?>, you haven't activated your account yet.</p>
			<p>If you didnt recieve your account activation email, <a href='resendactivationemail.php'>click here</a> to resend it.</p>
		<?php  
          } else {
		?>	  
		    <p>Something wrong <?php echo $row_RSUser['usr_fname']; ?>?, if so you can use this form to correct it.</p><br>
			<p><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="<?php echo $row_RSPage['page_url']; ?>" width="510" height="75" show_faces="false" border_color="#000" stream="false" header="false"></fb:like-box></p>
            <form action="scripts/editfanpage.php" method="POST" name="form1">
		    <p>Your Fan Page Name</p>
		    <p><input name="pageName" id="pageName" class="pageName" placeholder="Your FanPage Name" value="<?php echo $row_RSPage['page_name']; ?>" type="text"></p>
            <p>Your Fan Page URL</p>
		    <p><input name="pageURL" id="pageURL" class="pageURL" placeholder="Your FanPage URL" value="<?php echo $row_RSPage['page_url']; ?>" type="url"></p>
            <div id="scats"><p><span onClick="showcat();"><a>Change Category</a></span></p></div>
            <div id="scat" style="display:none;"><p>Select A Category</p></div>
            <div id="cats" style="width:200px;text-align:left;margin:auto;display:none;">
            <?php 
			echo "<ul class='uiFutureSideNavSection'>";
			do {
				echo "<li><span class=\"toggle\"><span class='item'><div><span class='imgWrap img ".$row_RScatsIns['cat_icon']."'></span>".$row_RScatsIns['cat_name']."</div></span></span>";
			  echo "<ul>";
				do {
				  if($row_RScats2Ins['cat_id'] == $row_RScatsIns['tbl_id']) {
						echo "<li><span class='subitem'><div><span class='imgWrap img ".$row_RScats2Ins['cat_icon']."'></span><a><span onClick='setSub(". $row_RScats2Ins['tbl_id'] .");'>".$row_RScats2Ins['cat_name']."</span></a></div></span></li>";
				  }
				} while ($row_RScats2Ins = mysql_fetch_assoc($RScats2Ins));
				echo "</ul>";		
				mysql_data_seek($RScats2Ins,0);
				echo "</li>";
			} while ($row_RScatsIns = mysql_fetch_assoc($RScatsIns));
			echo "</ul>";
			?>
            </div>
            <input type="hidden" name="sub_id" id="sub_id" value="<?php echo $row_RSPage['sub_id']; ?>">
            <p><input name="Submit" type="Submit" class="searchBox" id="Submit" style="width:75px;" onClick="return pageeditform();" value="Submit">&nbsp;&nbsp;&nbsp;<input name="Cancel" type="button" class="searchBox" id="Cancel" style="width:75px;" value="Cancel" onClick="javascript:history.go(-1);"></p>
		    <input type="hidden" name="MM_update" value="form1"><input type="hidden" name="id" id="id" value="<?php echo $row_RSPage['tbl_id']; ?>"></form>
		<?php  
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
mysql_free_result($RSPage);
mysql_free_result($RSUser);
mysql_free_result($RScatsIns);
mysql_free_result($RScats2Ins);
?>