<?php require_once('../../scripts/cp/connection.php'); ?>
<?php session_start(); ?>
<?php
mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RSRandomPages = "SELECT *,rand() AS random_row FROM tbl_pages ORDER BY ".random_row." LIMIT 8";
$RSRandomPages = mysql_query($query_RSRandomPages, $Wisdom_Mcr) or die(mysql_error());
$row_RSRandomPages = mysql_fetch_assoc($RSRandomPages);
$totalRows_RSRandomPages = mysql_num_rows($RSRandomPages);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link href="/scripts/likemyfanpage.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/scripts/likemyfanpage.js"></script> 
<title>Submit Your FanPage</title>
<style type="text/css">
body {
width:520px;
overflow:hidden;
margin:0; padding:0; border:0;
text-align:center;
}
</style>
</head>

<body>
<h1>Like My FanPage | Facebook FanPage Directory</h1><br style="clear:both;">
<p>Get more fans to like your Facebook FanPages.<br>Submit your FanPage to gain thousands of fans to any FanPage quickly.</p>
<p><a href="http://likemyfanpage.com/submityourfanpage.php" target="_blank"><img src="images/submityourfanpage.png" width="342" height="69" alt="Submit Your FanPage"></a></p>
<p><strong>A Selection Of FanPages Submitted By Our Fans:</strong></p>
<?php do { ?>
  <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="<?php echo $row_RSRandomPages['page_url'] ?>" width="520" height="74" show_faces="false" border_color="#000" stream="false" header="false"></fb:like-box>
<?php } while ($row_RSRandomPages = mysql_fetch_assoc($RSRandomPages)); ?>
</body>
</html>
<?php
mysql_free_result($RSRandomPages);
?>