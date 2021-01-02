<?php require_once('../../scripts/cp/connection.php'); ?>
<?php require_once('../../scripts/cp/getvalstring.php'); ?>
<?php require_once('../../scripts/cp/authnlogout.php'); ?>
<?php require_once('haspages.php'); ?>
<?php session_start(); ?>
<?php
$maxRows_RSUsers = 15;
$p = 0;
if (isset($_GET['p'])) {
  $p = $_GET['p'];
}
$startRow_RSUsers = $p * $maxRows_RSUsers;
  
mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RSUsers = "SELECT * FROM tbl_usrs";
$query_limit_RSUsers = sprintf("%s LIMIT %d, %d", $query_RSUsers, $startRow_RSUsers, $maxRows_RSUsers);
$RSUsers = mysql_query($query_limit_RSUsers, $Wisdom_Mcr) or die(mysql_error());
$row_RSUsers = mysql_fetch_assoc($RSUsers);
$totalRows_RSUsers = mysql_num_rows($RSUsers);
 
if (isset($_GET['t'])) {
  $t = $_GET['t'];
} else {
  $all_RSUsers = mysql_query($query_RSUsers);
  $t = mysql_num_rows($all_RSUsers);
}
$totalPages_RSUsers = ceil($t/$maxRows_RSUsers)-1;

$queryString_RSUsers = "";
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
	$queryString_RSUsers = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_RSUsers = sprintf("&t=%d%s", $t, $queryString_RSUsers);
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
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" -->User Manager<!-- InstanceEndEditable --></h1><br class="cboth">
		<!-- InstanceBeginEditable name="pagebody" -->
        <div><br>
        <form id="searchForm" action="search.php" method="post" onSubmit="return validate2();">
          <div class="inlineBlock">
            <a href="confirmed.php"><span class='activeyicon'></span></a>
            <a href="unconfirmed.php"><span class='activenicon'></span></a>
            <a href="gotpages.php"><span class='pageyicon'></span></a>
            <a href="nopages.php"><span class='pagenicon'></span></a>
            <a href="havesubscribed.php"><span class='subyicon'></span></a>
            <a href="haventsubscribed.php"><span class='subnicon'></span></a>
          </div>
          <input name="searchBox" id="searchBox" class="searchBox" placeholder="Search Users" type="search">
          <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
            <option selected>User</option><option value="index.php">All</option><option value="byname.php?s=a">A</option><option value="byname.php?s=b">B</option>
            <option value="byname.php?s=c">C</option><option value="byname.php?s=d">D</option><option value="byname.php?s=e">E</option><option value="byname.php?s=f">F</option><option value="byname.php?s=g">G</option><option value="byname.php?s=h">H</option>
            <option value="byname.php?s=i">I</option><option value="byname.php?s=j">J</option><option value="byname.php?s=k">K</option><option value="byname.php?s=l">L</option><option value="byname.php?s=m">M</option><option value="byname.php?s=n">N</option>
            <option value="byname.php?s=o">O</option><option value="byname.php?s=p">P</option><option value="byname.php?s=q">Q</option><option value="byname.php?s=r">R</option><option value="byname.php?s=s">S</option><option value="byname.php?s=t">T</option>
            <option value="byname.php?s=u">U</option><option value="byname.php?s=v">V</option><option value="byname.php?s=w">W</option><option value="byname.php?s=x">X</option><option value="byname.php?s=y">Y</option><option value="byname.php?s=z">Z</option>
          </select>
        </form>
        <strong>Users <?php if ($t > 0) { echo ($startRow_RSUsers + 1); } else { echo "0"; } ?> to <?php echo min($startRow_RSUsers + $maxRows_RSUsers, $t) ?> of <?php echo $t ?></strong>&nbsp;&nbsp;
		<?php if ($t > 14){ ?>          
          <?php if ($p > 0) { ?>
            <a href="<?php printf("%s?p=%d%s", $currentPage, 0, $queryString_RSUsers); ?>"><span class='img firsticona'></span></a>
          <?php } else {?>
            <span class='img firsticon'></span>
          <?php } ?>
          <?php if ($p > 0) { ?>
            <a href="<?php printf("%s?p=%d%s", $currentPage, max(0, $p - 1), $queryString_RSUsers); ?>"><span class='img previcona'></span></a>
          <?php } else {?>
            <span class='img previcon'></span>
          <?php } ?>
        <?php } ?>
        <?php if ($t > 14){ ?>          
          <?php if ($p < $totalPages_RSUsers) { ?>
            <a href="<?php printf("%s?p=%d%s", $currentPage, min($totalPages_RSUsers, $p + 1), $queryString_RSUsers); ?>"><span class='img nexticona'></span></a>
          <?php } else {?>
            <span class='img nexticon'></span>
          <?php } ?>
          <?php if ($p < $totalPages_RSUsers) { ?>
            <a href="<?php printf("%s?p=%d%s", $currentPage, $totalPages_RSUsers, $queryString_RSUsers); ?>"><span class='img lasticona'></span></a>
          <?php } else {?>
            <span class='img lasticon'></span>
          <?php } ?>
        <?php } ?>
        </div>
        <?php if ($_GET["msg"] == 1) { echo "<p class='centerme'><strong>User And Pages Deleted</strong></p>"; } ?>
        <?php if ($_GET["msg"] == 2) { echo "<p class='centerme'><strong>User Details Updated</strong></p>"; } ?>
        <?php if ($_GET["msg"] == 3) { echo "<p class='centerme'><strong>Email Sent To User</strong></p>"; } ?>
        <?php if ($totalRows_RSUsers > 0) { ?>
        <?php do { ?>
          <div class="userBox <?php if ($row_RSUsers["usr_active"] == 1) { echo "active"; } else { echo "inactive"; } ?>">
            <div class="options">
              <a href='edituser.php?tbl_id=<?php echo $row_RSUsers["tbl_id"]; ?>'><span class='editicon'></span></a>
              <a href='delete.php?tbl_id=<?php echo $row_RSUsers["tbl_id"]; ?>' onClick="return deleteuser();"><span class='deleteicon'></span></a><br>
              <a href='subscribed.php?tbl_id=<?php echo $row_RSUsers["tbl_id"]; ?>&s=<?php echo $row_RSUsers["usr_subscribed"]; ?>'><?php if ($row_RSUsers["usr_subscribed"] == 1) { echo "<span class='subyicon'></span>"; } else { echo "<span class='subnicon'></span>"; } ?></a>
              <a href='active.php?tbl_id=<?php echo $row_RSUsers["tbl_id"]; ?>&s=<?php echo $row_RSUsers["usr_active"]; ?>'><?php if ($row_RSUsers["usr_active"] == 1) { echo "<span class='activeyicon'></span>"; } else { echo "<span class='activenicon'></span>"; } ?></a>
            </div>
			<div class='clearfix'>
			  <?php echo "<strong>".ucwords($row_RSUsers["usr_fname"]." ".$row_RSUsers["usr_sname"])."</strong>"; ?><br>
              <a href="emailuser.php?tbl_id=<?php echo $row_RSUsers["tbl_id"]; ?>"><?php echo $row_RSUsers["usr_email"]; ?></a><br>
              <?php echo $row_RSUsers["usr_pass"]; ?><br>
              <?php haspages($row_RSUsers["tbl_id"]); ?>
            </div>
          </div>
        <?php } while ($row_RSUsers = mysql_fetch_assoc($RSUsers)); ?>
        <?php } else { echo "<br><br><p class='centerme'><strong>No users to display.</strong></p>"; } ?>
		<!-- InstanceEndEditable -->
      </div>
    </div>
</div>
<?php include('../../scripts/cp/footer.php');?>
</div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RSUsers);
?>