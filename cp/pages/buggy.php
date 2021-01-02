<?php require_once('../../scripts/cp/connection.php'); ?>
<?php require_once('../../scripts/cp/getvalstring.php'); ?>
<?php require_once('../../scripts/cp/authnlogout.php'); ?>
<?php require_once('pagefunctions.php'); ?>
<?php session_start(); ?>
<?php
$maxRows_RSPages = 50;
$p = 0;
if (isset($_GET['p'])) {
  $p = $_GET['p'];
}
$startRow_RSPages = $p * $maxRows_RSPages;

mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RSPages = "SELECT tbl_pages.tbl_id,tbl_pages.page_name,tbl_pages.page_url,tbl_pages.page_sponsored,tbl_pages.page_active,tbl_pages.page_flagged FROM tbl_pages INNER JOIN tbl_dead ON tbl_pages.tbl_id = tbl_dead.page_id GROUP BY tbl_pages.tbl_id";
$query_limit_RSPages = sprintf("%s LIMIT %d, %d", $query_RSPages, $startRow_RSPages, $maxRows_RSPages);
$RSPages = mysql_query($query_limit_RSPages, $Wisdom_Mcr) or die(mysql_error());
$row_RSPages = mysql_fetch_assoc($RSPages);
$totalRows_RSPages = mysql_num_rows($RSPages);
 
if (isset($_GET['t'])) {
  $t = $_GET['t'];
} else {
  $all_RSPages = mysql_query($query_RSPages);
  $t = mysql_num_rows($all_RSPages);
}
$totalPages_RSPages = ceil($t/$maxRows_RSPages)-1;

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
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" -->Buggy Pages<!-- InstanceEndEditable --></h1><br class="cboth">
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
        <strong>Pages <?php if ($t > 0) { echo ($startRow_RSPages + 1); } else { echo "0"; } ?> to <?php echo min($startRow_RSPages + $maxRows_RSPages, $t) ?> of <?php echo $t ?></strong>&nbsp;&nbsp;
		<?php if ($t > ($maxRows_RSPages-1)){ ?>          
          <?php if ($p > 0) { ?>
            <a href="<?php printf("%s?p=%d%s", $currentPage, 0, $queryString_RSPages); ?>"><span class='img firsticona'></span></a>
          <?php } else {?>
            <span class='img firsticon'></span>
          <?php } ?>
          <?php if ($p > 0) { ?>
            <a href="<?php printf("%s?p=%d%s", $currentPage, max(0, $p - 1), $queryString_RSPages); ?>"><span class='img previcona'></span></a>
          <?php } else {?>
            <span class='img previcon'></span>
          <?php } ?>
        <?php } ?>
        <?php if ($t > ($maxRows_RSPages-1)){ ?>          
          <?php if ($p < $totalPages_RSPages) { ?>
            <a href="<?php printf("%s?p=%d%s", $currentPage, min($totalPages_RSPages, $p + 1), $queryString_RSPages); ?>"><span class='img nexticona'></span></a>
          <?php } else {?>
            <span class='img nexticon'></span>
          <?php } ?>
          <?php if ($p < $totalPages_RSPages) { ?>
            <a href="<?php printf("%s?p=%d%s", $currentPage, $totalPages_RSPages, $queryString_RSPages); ?>"><span class='img lasticona'></span></a>
          <?php } else {?>
            <span class='img lasticon'></span>
          <?php } ?>
        <?php } ?>
        </div>
        <br>
        <?php if ($totalRows_RSPages > 0) { ?>
		  <?php do { ?>
            <div class='nonSponsoredItem tbl'><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="<?php echo $row_RSPages['page_url']; ?>" width="520" height="74" show_faces="false" border_color="#000" stream="false" header="false"></fb:like-box>
              <br class="cboth"><a href="<?php echo $row_RSPages["page_url"]; ?>" target="_blank"><?php echo $row_RSPages["page_url"]; ?></a>
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