<?php
     // depending on your hosting provider, you may need to include
     // the entire path to the directory you added this file to, for example
     // if your FTP login is, 'tommy', it may be, consult your ISP's docs
     // for additional assistance:
     // require_once('/home/tommy/public_html/includes/facebook.php');
     require_once('scripts/facebook.php');
     $facebook = new Facebook(array(
          'appId'=>'',     // from Facebook
          'secret'=>'',     // from Facebook
          'cookie'=>true
     ));
?>