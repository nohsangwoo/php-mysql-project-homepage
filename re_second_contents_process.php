<?php
  $post_pk = (isset($_POST['pk'])) ?  strip_tags(htmlspecialchars($_POST['pk'])) : NULL ;
  $post_weight = (isset($_POST['weight'])) ?  strip_tags(htmlspecialchars($_POST['weight'])) : NULL ;
  $post_er = (isset($_POST['exchange_rate'])) ?  strip_tags(htmlspecialchars($_POST['exchange_rate'])) : NULL ;

  //db접속
  require("./config/conn.php");

  //상태 update

  $query = "UPDATE order_before_price_second SET  weight  = :weight, exchange_rate  = :exchange_rate  WHERE order_before_pk = :order_before_pk ";
  $st = $pdo->prepare($query);
  $st->bindparam(":order_before_pk", $post_pk);
  $st->bindparam(":weight", $post_weight);
  $st->bindparam(":exchange_rate", $post_er);
  $st->execute();


   header('Location: ./re_three_list.php');
 ?>
