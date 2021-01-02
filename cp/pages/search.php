<?php require_once('../../scripts/cp/connection.php'); ?>
<?php require_once('../../scripts/cp/getvalstring.php'); ?>
<?php require_once('../../scripts/cp/authnlogout.php'); ?>
<?php require_once('pagefunctions.php'); ?>
<?php session_start(); ?>
<?php
mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RSPages = "SELECT * FROM tbl_pages WHERE page_name LIKE '%".$_POST["searchBox"]."%'";
$RSPages = mysql_query($query_RSPages, $Wisdom_Mcr) or die(mysql_error());
$row_RSPages = mysql_fetch_assoc($RSPages);
$totalRows_RSPages = mysql_num_rows($RSPages);
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
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" -->FanPage Manager<!-- InstanceEndEditable --></h1><br class="cboth">
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
		  <?php do { ?>
            <div class='nonSponsoredItem tbl'><strong><?php echo $row_RSPages['page_name']; ?></strong>
              <div class="options">
                <span id="buggy<?php echo $row_RSPages["tbl_id"]; ?>"><?php if (isbuggy($row_RSPages['tbl_id']) == 1) { echo "<span class='bugicon' onClick='buggypage(".$row_RSPages["tbl_id"].",".isbuggy($row_RSPages['tbl_id']).")'></span>"; } else { echo "<span class='bugnicon' onClick='buggypage(".$row_RSPages["tbl_id"].",".isbuggy($row_RSPages['tbl_id']).")'></span>"; } ?></span>
				<?php if ($row_RSPages["page_sponsored"] == 1) { echo "<span class='sponicon'></span>"; } else { echo "<span class='sponnicon'></span>"; } ?>
				<a href='setflag.php?tbl_id=<?php echo $row_RSPages["tbl_id"]; ?>'><?php if ($row_RSPages["page_flagged"] == 1) { echo "<span class='flagicon'></span>"; } else { echo "<span class='flagnicon'></span>"; } ?></a>
                <a href='edit.php?tbl_id=<?php echo $row_RSPages["tbl_id"]; ?>'><span class='editicon'></span></a>
                <a href='delete.php?tbl_id=<?php echo $row_RSPages["tbl_id"]; ?>' onClick="return deletepage();"><span class='deleteicon'></span></a>
                <span id="activ8<?php echo $row_RSPages["tbl_id"]; ?>"><?php if ($row_RSPages["page_active"] == 1) { echo "<span class='activeyicon' onClick='activ8page(".$row_RSPages["tbl_id"].",".$row_RSPages["page_active"].")'></span>"; } else { echo "<span class='activenicon' onClick='activ8page(".$row_RSPages["tbl_id"].",".$row_RSPages["page_active"].")'></span>"; } ?></span>
              </div>
            </div>
		  <?php } while ($row_RSPages = mysql_fetch_assoc($RSPages)); ?> 
        <?php } else { echo "<br><br><p class='centerme'><strong>No pages to display.</strong></p>"; } ?>
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
?>