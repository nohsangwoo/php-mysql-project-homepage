
    <?php
    $post_order_before_pk = (isset($_POST['order_before_pk'])) ? strip_tags(htmlspecialchars($_POST['order_before_pk'])) : NULL ;  // order_before_pk -> fk로 연결하기 위해서
    $post_price = (isset($_POST['price'])) ? strip_tags(htmlspecialchars(implode( '|', $_POST['price'] ))) : NULL ;    //price |를 기준으로 배열을 합쳐줌
    $post_DFIK = (isset($_POST['DFIK'])) ? strip_tags(htmlspecialchars(implode( '|', $_POST['DFIK'] ))) : NULL ;    //price |를 기준으로 배열을 합쳐줌
    $post_url = (isset($_POST['Purl'])) ?  strip_tags(htmlspecialchars($_POST['Purl'])) : NULL ; //기존배열
    $post_Apurl = (isset($_POST['Apurl'])) ? strip_tags(htmlspecialchars(implode( '|', $_POST['Apurl'] ))) : NULL ;    //Apurl |를 기준으로 배열을 합쳐줌
    $post_Myurl = (isset($_POST['Myurl'])) ? strip_tags(htmlspecialchars(implode( '|', $_POST['Myurl'] ))) : NULL ;    //Myurl |를 기준으로 배열을 합쳐줌




    //db접속
    require("./config/conn.php");

    //
    $query = "UPDATE order_before_price SET  price  = :price, Delivery_fee  = :Delivery_fee, my_url  = :my_url  WHERE order_before_pk = :order_before_pk ";
    $st = $pdo->prepare($query);
    $st->bindparam(":order_before_pk", $post_order_before_pk);
    $st->bindparam(":price", $post_price);
    $st->bindparam(":Delivery_fee", $post_DFIK);
    $st->bindparam(":my_url", $post_Myurl);
    $st->execute();


    $post_url = $post_url.'|'.$post_Apurl; //추가 url 합치기
    $query = "UPDATE order_before SET  url  = :url  WHERE order_id = :order_id ";
    $st = $pdo->prepare($query);
    $st->bindparam(":order_id", $post_order_before_pk);
    $st->bindparam(":url", $post_url);
    $st->execute();




     header('Location: ./re_index.php');
     ?>
