<?php require_once('../../scripts/cp/connection.php'); ?>
<?php require_once('../../scripts/cp/getvalstring.php'); ?>
<?php require_once('../../scripts/cp/authnlogout.php'); ?>
<?php require_once('pagefunctions.php'); ?>
<?php session_start(); ?>
<?php
mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RSPages = "SELECT * FROM tbl_pages WHERE tbl_id=".$_GET["tbl_id"];
$RSPages = mysql_query($query_RSPages, $Wisdom_Mcr) or die(mysql_error());
$row_RSPages = mysql_fetch_assoc($RSPages);
$totalRows_RSPages = mysql_num_rows($RSPages);

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

if (isset($_POST["pageName"])) {
	echo $_POST["sub_id"];
}
?>
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
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" -->Edit Page<!-- InstanceEndEditable --></h1><br class="cboth">
		<!-- InstanceBeginEditable name="pagebody" -->
        <div><br>
        <form id="searchForm" action="search.php" method="post" onSubmit="return validate2();">
          <div class="inlineBlock">
            <a href="active.php"><span class='activeyicon'></span></a>
            <a href="inactive.php"><span class='activenicon'></span></a>
            <a href="flagged.php"><span class='flagicon'></span></a>
            <a href="buggy.php"><span class='bugicon'></span></a>
            <a href="sponsored.php"><span class='sponicon'></span></a>
          </div>
          <input name="searchBox" id="searchBox" class="searchBox" placeholder="Search Pages" type="search">
          <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
            <option selected>Pages</option><option value="index.php">All</option><option value="byname.php?s=a">A</option><option value="byname.php?s=b">B</option>
            <option value="byname.php?s=c">C</option><option value="byname.php?s=d">D</option><option value="byname.php?s=e">E</option><option value="byname.php?s=f">F</option><option value="byname.php?s=g">G</option><option value="byname.php?s=h">H</option>
            <option value="byname.php?s=i">I</option><option value="byname.php?s=j">J</option><option value="byname.php?s=k">K</option><option value="byname.php?s=l">L</option><option value="byname.php?s=m">M</option><option value="byname.php?s=n">N</option>
            <option value="byname.php?s=o">O</option><option value="byname.php?s=p">P</option><option value="byname.php?s=q">Q</option><option value="byname.php?s=r">R</option><option value="byname.php?s=s">S</option><option value="byname.php?s=t">T</option>
            <option value="byname.php?s=u">U</option><option value="byname.php?s=v">V</option><option value="byname.php?s=w">W</option><option value="byname.php?s=x">X</option><option value="byname.php?s=y">Y</option><option value="byname.php?s=z">Z</option>
          </select>
        </form>
        <strong>Total <?php echo $totalRows_RSPages; ?></strong>&nbsp;&nbsp;
        </div>
        <br>
        <?php if ($totalRows_RSPages > 0) { ?>
		  <div class="centerme">
          <div class='nonSponsoredItem tbl'><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="<?php echo $row_RSPages['page_url']; ?>" width="520" height="74" show_faces="false" border_color="#000" stream="false" header="false"></fb:like-box></div>
          <form action="" method="POST">
          <br><br><strong>Original User:</strong> <?php getusername($row_RSPages["usr_id"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<strong>New User:</strong> <span id="newuser"></span><br>
          <input name="userName" type="text" class="pageName" id="userName" onkeyup="findusers(this.value);" placeholder="User" value="<?php getuserfname($row_RSPages["usr_id"]); ?>">
          <p>Suggestions: <span id="userssuggestions"></span></p>
          <input type="hidden" name="pageowner" id="pageowner" value="<?php echo $row_RSPages["usr_id"]; ?>">
          <br><br>
          <input name="pageName" type="text" class="pageName" id="pageName" placeholder="Please Enter Your FanPage Name" value="<?php echo $row_RSPages["page_name"]; ?>">
          <br><br>
          <input name="pageURL" type="url" class="pageURL" id="pageURL" placeholder="Please Enter Your FanPage URL" value="<?php echo $row_RSPages["page_url"]; ?>">
          <div id="scats" style="display:none;"><p><span onClick="showcat();"><a>Change Category</a></span></p></div>
          <div id="scat"><p>Select A Category</p></div>
          <div id="cats" style="width:200px;text-align:left;margin:auto;">
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
          <input type="hidden" name="sub_id" id="sub_id" value="<?php echo $row_RSPages["sub_id"]; ?>">
          <p><input name="Submit" type="Submit" class="searchBox" id="Submit" style="width:75px;" value="Submit">&nbsp;&nbsp;&nbsp;<input name="Reset" type="reset" class="searchBox" id="Reset" style="width:75px;" value="Reset"></p>
          </form>
          </div>
		<?php } else { echo "<br><br><p class='centerme'><strong>No pages to display.</strong></p>"; } ?>
        <script language="javascript" type="text/javascript">setSub2();</script>
		<!-- InstanceEndEditable -->
      </div>
    </div>
</div>
<?php include('../../scripts/cp/footer.php');?>
</div>
</body>
<!-- InstanceEnd -->
</html>
<?php
mysql_free_result($RSPages);
mysql_free_result($RScatsIns);
mysql_free_result($RScats2Ins);
?>