<?php
mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RScats = "SELECT * FROM tbl_cat";
$RScats = mysql_query($query_RScats, $Wisdom_Mcr) or die(mysql_error());
$row_RScats = mysql_fetch_assoc($RScats);
$totalRows_RScats = mysql_num_rows($RScats);

mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
$query_RScats2 = "SELECT * FROM tbl_subs";
$RScats2 = mysql_query($query_RScats2, $Wisdom_Mcr) or die(mysql_error());
$row_RScats2 = mysql_fetch_assoc($RScats2);
$totalRows_RScats2 = mysql_num_rows($RScats2);

if(isset($_GET["sub"])) {
  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  $query_RSSubTmp = "SELECT * FROM tbl_subs WHERE tbl_id=".$_GET["sub"];
  $RSSubTmp = mysql_query($query_RSSubTmp, $Wisdom_Mcr) or die(mysql_error());
  $row_RSSubTmp = mysql_fetch_assoc($RSSubTmp);
  $totalRows_RSSubTmp = mysql_num_rows($RSSubTmp);
  mysql_free_result($RSSubTmp);

  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  $query_RSCatTmp = "SELECT * FROM tbl_cat WHERE tbl_id=".$row_RSSubTmp["cat_id"];
  $RSCatTmp = mysql_query($query_RSCatTmp, $Wisdom_Mcr) or die(mysql_error());
  $row_RSCatTmp = mysql_fetch_assoc($RSCatTmp);
  $totalRows_RSCatTmp = mysql_num_rows($RSCatTmp);
  mysql_free_result($RSCatTmp);
  
  $catselected = $row_RSCatTmp["tbl_id"];
}
?>
<div id="mainContainer">
  <div id="leftCol">
    <a href="about.php"><img src="/images/profilepic.jpg" alt="Like My FanPage"></a>
    <?php
	if (isset($_SESSION['MM_Username'])) {
	  echo "<p><strong>Account Navigation</strong></p>";
      echo "<ul class='uiFutureSideNavSection'>";
      echo "<li><span class='item'><div><span class='imgWrap img louticon'></span><a href='".$logoutAction."'>Logout</a></div></span></li>";
	  echo "<li><span class='item'><div><span class='imgWrap img accticon'></span><a href='account.php'>Account</a></div></span></li>";
	  echo "<li><span class='item'><div><span class='imgWrap img yfpsicon'></span><a href='yourfanpages.php'>Your FanPages</a></div></span></li>";
      echo "<li><span class='item'><div><span class='imgWrap img syfpicon'></span><a href='submityourfanpage.php'>Submit Your FanPage</a></div></span></li>";
	  echo "</ul>";	
	}
	?>
    <p><strong>FanPage Categories</strong></p>
    <div id="jQ-menu">
      <?php
        echo "<ul class='uiFutureSideNavSection'>";
        do {
		  if ($catselected == $row_RScats['tbl_id']) {
            echo "<li class='selectedItem'><span class=\"toggle\"><span class='item'><div><span class='imgWrap img ".$row_RScats['cat_icon']."'></span><strong>".$row_RScats['cat_name']."</strong></div></span></span>";
		  } else {
            echo "<li><span class=\"toggle\"><span class='item'><div><span class='imgWrap img ".$row_RScats['cat_icon']."'></span>".$row_RScats['cat_name']."</div></span></span>";
		  }
          echo "<ul>";
            do {
              if($row_RScats2['cat_id'] == $row_RScats['tbl_id']) {
				  if($_GET["sub"] == $row_RScats2['tbl_id']) {
                    echo "<li><span class='subitem'><div><span class='imgWrap img ".$row_RScats2['cat_icon']."'></span><a href='fanpages.php?sub=".$row_RScats2['tbl_id']."'><strong>".$row_RScats2['cat_name']."</strong></a></div></span></li>";
				  }else{
                    echo "<li><span class='subitem'><div><span class='imgWrap img ".$row_RScats2['cat_icon']."'></span><a href='fanpages.php?sub=".$row_RScats2['tbl_id']."'>".$row_RScats2['cat_name']."</a></div></span></li>";
				  }
              }
            } while ($row_RScats2 = mysql_fetch_assoc($RScats2));
            echo "</ul>";		
            mysql_data_seek($RScats2,0);
            echo "</li>";
        } while ($row_RScats = mysql_fetch_assoc($RScats));
        echo "</ul>";
      ?>
      </div>
  </div>
<?php
mysql_free_result($RScats);
mysql_free_result($RScats2);
?>
