<?php require_once('../scripts/cp/connection.php'); ?>
<?php require_once('../scripts/cp/getvalstring.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['Username'])) {
  $loginUsername=$_POST['Username'];
  $password=$_POST['Password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "/cp/stats/";
  $MM_redirectLoginFailed = "/cp/index.php?s=1";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_Wisdom_Mcr, $Wisdom_Mcr);
  
  $LoginRS__query=sprintf("SELECT Username, Password FROM tbl_admin WHERE Username=%s AND Password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $Wisdom_Mcr) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE HTML>
<html>
<head xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex,nofollow">
<title>Like My Fan Page</title>
<link rel="icon" href="http://likemyfanpage.com/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://likemyfanpage.com/favicon.ico" type="image/x-icon">
<link href="/scripts/likemyfanpage.css" rel="stylesheet" type="text/css">
<link href="/scripts/cp/cp.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script> 
<script type="text/javascript" src="/scripts/nav/jquery.color.js"></script> 
<script type="text/javascript" src="/scripts/nav/jMenu.js"></script> 
<script type="text/javascript" src="/scripts/likemyfanpage.js"></script>
</head>

<body>
<div id="blueBar"></div>
<div id="globalContainer">
  <?php include('../scripts/cp/header.php');?>
  <?php include('../scripts/cp/cpnav.php');?>
    <div id="contentCol" class="clearfix">
      <div id="headerArea">
        <h1 class="lfloat">Login To Controlpanel</h1><br style="cboth">
          <?php
          if (isset($_GET['s'])){
            $popo = $_GET['s'];
            if ($popo == 1){
              echo "<p><h1 class='centerme'>Sorry, the details you entered were incorrect.</h1></p>";
            }else{
              echo"";
            }
            if ($popo == 2){
              echo "<p><h1 class='centerme'>To log back in, please re-enter your details.</h1></p>";
            }else{
              echo"";
            }
            if ($popo == 3){
              echo "<p><h1 class='centerme'>Sorry, you are not authorised to view that page unless you login first.</h1></p>";
            }else{
              echo"";
            }
          }
          ?>      
          <form name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
            <br>
            <br>
            <table width="100" border="0" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <td align="left" valign="top"><strong>Username</strong></td>
                <td align="left" valign="top"><input name="Username" class="searchBox" placeholder="Username" type="text" id="Username" style="width:175px;"></td>
              </tr>
              <tr>
                <td align="left" valign="top"><strong>Password</strong></td>
                <td align="left" valign="top"><input name="Password" type="password" class="searchBox" placeholder="Password" id="Password" style="width:175px;"></td>
              </tr>
              <tr>
                <td colspan="2" align="center" valign="top">
                  <table border="0" cellpadding="5" cellspacing="0">
                    <tr>
                      <td align="left" valign="middle">
                        <?php
                      if ($_GET['s'] != "1"){
                        echo "<input type='submit' name='Submit' id='Submit' value='Login' class='searchBox' style='width:75px;'>";
                      }else{
                        echo "<input type='submit' name='Submit' id='Submit' value='Retry' class='searchBox' style='width:75px;'>";
                      }
                      ?> 
                        </td>
                      <td align="left" valign="middle"><input name="Reset" type="reset" id="Reset" value="Reset" class="searchBox" style="width:75px;"></td>
                      </tr>
                  </table> 
                  </td>
                </tr>
            </table>
            <br>
            <br>
          </form>
          <h1 class="centerme">--- Unauthorised Access Is Not Permitted ---</h1>
	  </div>
    </div>
</div>
<?php include('../scripts/cp/footer.php');?>
</div>
</body>
</html>