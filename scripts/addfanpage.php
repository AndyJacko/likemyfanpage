<?php require_once('cp/connection.php'); ?>
<?php require_once('authnlogoutuser.php'); ?>
<?php require_once('cp/getvalstring.php'); ?>
<?php
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tbl_pages (page_name, page_url, usr_id, sub_id) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString(htmlspecialchars($_POST['pageName']), "text"),
                       GetSQLValueString($_POST['pageURL'], "text"),
                       GetSQLValueString($_POST['UsrId'], "int"),
                       GetSQLValueString($_POST['sub_id'], "int"));

  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  $Result1 = mysql_query($insertSQL, $Wisdom_Mcr) or die(mysql_error());
  
  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  $query_RSLatestPage = "SELECT *FROM tbl_pages WHERE page_name='".$_POST['pageName']."'";
  $RSLatestPage = mysql_query($query_RSLatestPage, $Wisdom_Mcr) or die(mysql_error());
  $row_RSLatestPage = mysql_fetch_assoc($RSLatestPage);
  $totalRows_RSLatestPage = mysql_num_rows($RSLatestPage);
  mysql_free_result($RSLatestPage);
  
  
  $to = "a";
  $subject = "New page just added: ".$_POST['pageName']." - http://likemyfanpage.com/latestpages.php?page=".$row_RSLatestPage["tbl_id"];
  $message = "";
  $from = "latestpages@likemyfanpage.com";
  $headers = "From:" . $from;
  mail($to,$subject,$message,$headers);

  header(sprintf("Location: /yourfanpages.php?s=1"));
}
?>
