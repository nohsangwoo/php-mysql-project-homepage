<?php
  $post_pk = (isset($_POST['pk'])) ?  strip_tags(htmlspecialchars($_POST['pk'])) : NULL ;
  $post_state = (isset($_POST['state'])) ?  strip_tags(htmlspecialchars($_POST['state'])) : NULL ;
  $post_tn = (isset($_POST['tn'])) ?  strip_tags(htmlspecialchars($_POST['tn'])) : NULL ;

  var_dump($post_tn);

  //db접속
  require("./config/conn.php");

  //상태 update

  $query = "UPDATE order_before SET  state  = :state, TransportNum  = :TransportNum  WHERE order_id = :order_before_pk ";
  $st = $pdo->prepare($query);
  $st->bindparam(":order_before_pk", $post_pk);
  $st->bindparam(":state", $post_state);
  $st->bindparam(":TransportNum", $post_tn);
  $st->execute();


   header('Location: ./re_index.php');
 ?>
