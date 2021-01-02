<?php require_once('../../scripts/cp/connection.php'); ?>
<?php require_once('../../scripts/cp/getvalstring.php'); ?>
<?php require_once('../../scripts/cp/authnlogout.php'); ?>
<?php session_start(); ?>
<?php
mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RSUser = "SELECT * FROM tbl_usrs WHERE tbl_id=".$_GET["tbl_id"];
$RSUser = mysql_query($query_RSUser, $Wisdom_Mcr);
$row_RSUser = mysql_fetch_assoc($RSUser);
$totalRows_RSUser = mysql_num_rows($RSUser);

if (isset($_POST["Subject"])) {
  $from = "admin@likemyfanpage.com";
  $headers = "From:" . $from;
  mail($_POST["Email"],$_POST["Subject"],$_POST["Message"],$headers);
  
  header(sprintf("Location: index.php?msg=3"));
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
        <h1 class="lfloat"><!-- InstanceBeginEditable name="pageheader" -->Send Email To User<!-- InstanceEndEditable --></h1><br class="cboth">
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
          </div>
          <p class="centerme"><strong>Send Email To: <?php echo $row_RSUser["usr_fname"]." ".$row_RSUser["usr_sname"]; ?></strong></p>
          <div id="sendemailusr" class="sendemailform">
            <form method="post" action="">
              <label>Subject<span class="small">Email subject</span></label>
              <input name="Subject" type="text" id="Subject">
              <label>Message<span class="small">Message to user</span></label>
              <textarea name="Message" rows="10" id="Message"></textarea>
              <input name="Email" type="hidden" value="<?php echo $row_RSUser["usr_email"]; ?>">
              <br style='clear:both;'>
              <button type="submit">SEND EMAIL</button>&nbsp;&nbsp;or&nbsp;&nbsp;<button type="button" onClick="history.go(-1);">CANCEL</button>
            </form>
          </div>
		<!-- InstanceEndEditable -->
      </div>
    </div>
</div>
<?php include('../../scripts/cp/footer.php');?>
</div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($RSUser);
?>