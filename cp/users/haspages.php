<?php
function haspages($id) {
  $con = mysql_connect("dbHost","dbUser","dbPass");
  mysql_select_db("db", $con);
  $RSPages = mysql_query("SELECT * FROM tbl_pages WHERE usr_id=$id");
  $row_RSPages = mysql_fetch_assoc($RSPages);
  $totalRows_RSPages = mysql_num_rows($RSPages);
  mysql_free_result($RSPages);
  if ($totalRows_RSPages > 0) {
	  if ($totalRows_RSPages > 1) {
	    echo "<a href='/cp/pages/pagesbyuser.php?u=$id'>".$totalRows_RSPages." Pages</a>";
	  } else {
	    echo "<a href='/cp/pages/pagesbyuser.php?u=$id'>".$totalRows_RSPages." Page</a>";
	  }
  } else {
	  echo "No Pages";
  }
}
function haspages2($id) {
  $con = mysql_connect("dbHost","dbUser","dbPass");
  mysql_select_db("db", $con);
  $RSPages = mysql_query("SELECT * FROM tbl_pages WHERE usr_id=$id");
  $row_RSPages = mysql_fetch_assoc($RSPages);
  $totalRows_RSPages = mysql_num_rows($RSPages);
  if ($totalRows_RSPages > 0) {
	$haspages2 = true;
  } else {
	$haspages2 = false;
  }
  mysql_free_result($RSPages);
  return $haspages2;
}
?>