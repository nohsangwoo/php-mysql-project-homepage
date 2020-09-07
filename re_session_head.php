
<?php
  session_start();
  $admin_pk = (isset($_SESSION['AD_PK'])) ? strip_tags(htmlspecialchars($_SESSION['AD_PK'])) : NULL ;
  $admin_id = (isset($_SESSION['AD_ID'])) ? strip_tags(htmlspecialchars($_SESSION['AD_ID'])) : NULL ;

 ?>
