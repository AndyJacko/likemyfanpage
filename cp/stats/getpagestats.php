<?php 
function getpagestats($thesearch) {
  $con = mysql_connect("dbHost","dbUser","dbPass");
  mysql_select_db("db", $con);
  $RSUsers = mysql_query("SELECT tbl_id FROM tbl_pages".$thesearch);
  $row_RSUsers = mysql_fetch_assoc($RSUsers);
  $totalRows_RSUsers = mysql_num_rows($RSUsers);
  mysql_free_result($RSUsers);
  echo $totalRows_RSUsers;
}

function getbuggypages($thesearch) {
  $con = mysql_connect("dbHost","dbUser","dbPass");
  mysql_select_db("db", $con);
  $RSUsers = mysql_query("SELECT tbl_id FROM tbl_dead".$thesearch);
  $row_RSUsers = mysql_fetch_assoc($RSUsers);
  $totalRows_RSUsers = mysql_num_rows($RSUsers);
  mysql_free_result($RSUsers);
  echo $totalRows_RSUsers;
}
?>