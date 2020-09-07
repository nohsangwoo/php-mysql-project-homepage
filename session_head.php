
<?php
  session_start();
  $user_pk = (isset($_SESSION['PK'])) ? strip_tags(htmlspecialchars($_SESSION['PK'])) : NULL ;
  $user_id = (isset($_SESSION['ID'])) ? strip_tags(htmlspecialchars($_SESSION['ID'])) : NULL ;
  $user_name = (isset($_SESSION['username'])) ? strip_tags(htmlspecialchars($_SESSION['username'])) : NULL ;
  $user_age = (isset($_SESSION['age'])) ? strip_tags(htmlspecialchars($_SESSION['age'])) : NULL ;
  $user_address = (isset($_SESSION['address'])) ? strip_tags(htmlspecialchars($_SESSION['address'])) : NULL ;
  $user_post_code = (isset($_SESSION['post_code'])) ? strip_tags(htmlspecialchars($_SESSION['post_code'])) : NULL ;
  $user_phone = (isset($_SESSION['phone'])) ? strip_tags(htmlspecialchars($_SESSION['phone'])) : NULL ;
 ?>
