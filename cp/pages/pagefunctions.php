<?php
function isbuggy($id) {
  $con = mysql_connect("dbHost","dbUser","dbPass");
  mysql_select_db("db", $con);
  $RSBuggy = mysql_query("SELECT tbl_id FROM tbl_dead WHERE page_id=".$id);
  $row_RSBuggy = mysql_fetch_assoc($RSBuggy);
  $totalRows_RSBuggy = mysql_num_rows($RSBuggy);
  mysql_free_result($RSBuggy);

  if ($totalRows_RSBuggy > 0) {
	return 1;
  } else {
	return 0;
  }
}

function getusername($id) {
  $con = mysql_connect("dbHost","dbUser","dbPass");
  mysql_select_db("db", $con);
  $RSUser = mysql_query("SELECT usr_fname,usr_sname FROM tbl_usrs WHERE tbl_id=".$id);
  $row_RSUser = mysql_fetch_assoc($RSUser);
  $totalRows_RSUser = mysql_num_rows($RSUser);
  mysql_free_result($RSUser);
  
  echo $row_RSUser["usr_fname"]." ".$row_RSUser["usr_sname"];
}

function getuserfname($id) {
  $con = mysql_connect("dbHost","dbUser","dbPass");
  mysql_select_db("db", $con);
  $RSUser = mysql_query("SELECT usr_fname,usr_sname FROM tbl_usrs WHERE tbl_id=".$id);
  $row_RSUser = mysql_fetch_assoc($RSUser);
  $totalRows_RSUser = mysql_num_rows($RSUser);
  mysql_free_result($RSUser);
  
  echo $row_RSUser["usr_fname"];
}
?>