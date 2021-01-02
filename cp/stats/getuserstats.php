<?php 
function getuserstats($thesearch) {
  $con = mysql_connect("dbHost","dbUser","dbPass");
  mysql_select_db("db", $con);
  $RSUsers = mysql_query("SELECT tbl_id FROM tbl_usrs".$thesearch);
  $row_RSUsers = mysql_fetch_assoc($RSUsers);
  $totalRows_RSUsers = mysql_num_rows($RSUsers);
  mysql_free_result($RSUsers);
  echo $totalRows_RSUsers;
}
function havepages() {
  $con = mysql_connect("dbHost","dbUser","dbPass");
  mysql_select_db("db", $con);
  $RSUsers = mysql_query("SELECT tbl_id FROM tbl_usrs");
  $row_RSUsers = mysql_fetch_assoc($RSUsers);
  $totalRows_RSUsers = mysql_num_rows($RSUsers);
  $usrswithpages = 0;
 
  do {
	mysql_select_db("db", $con);
	$RSPages = mysql_query("SELECT tbl_id FROM tbl_pages WHERE usr_id=".$row_RSUsers["tbl_id"]);
	$row_RSPages = mysql_fetch_assoc($RSPages);
	$totalRows_RSPages = mysql_num_rows($RSPages);
    if ($totalRows_RSPages > 0) {
	  $usrswithpages = $usrswithpages + 1;	
	}
	mysql_free_result($RSPages);
  } while ($row_RSUsers = mysql_fetch_assoc($RSUsers));
  echo $usrswithpages;
  mysql_free_result($RSUsers);
}
function donthavepages() {
  $con = mysql_connect("dbHost","dbUser","dbPass");
  mysql_select_db("db", $con);
  $RSUsers = mysql_query("SELECT tbl_id FROM tbl_usrs");
  $row_RSUsers = mysql_fetch_assoc($RSUsers);
  $totalRows_RSUsers = mysql_num_rows($RSUsers);
  $usrswithpages = 0;
 
  do {
	mysql_select_db("db", $con);
	$RSPages = mysql_query("SELECT tbl_id FROM tbl_pages WHERE usr_id=".$row_RSUsers["tbl_id"]);
	$row_RSPages = mysql_fetch_assoc($RSPages);
	$totalRows_RSPages = mysql_num_rows($RSPages);
    if ($totalRows_RSPages == 0) {
	  $usrswithpages = $usrswithpages + 1;	
	}
	mysql_free_result($RSPages);
  } while ($row_RSUsers = mysql_fetch_assoc($RSUsers));
  echo $usrswithpages;
  mysql_free_result($RSUsers);
}
?>