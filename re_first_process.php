
    <?php
    $post_order_before_pk = (isset($_POST['order_before_pk'])) ? strip_tags(htmlspecialchars($_POST['order_before_pk'])) : NULL ;  // order_before_pk -> fk로 연결하기 위해서
    $post_price = (isset($_POST['price'])) ? strip_tags(htmlspecialchars(implode( '|', $_POST['price'] ))) : NULL ;    //price |를 기준으로 배열을 합쳐줌
    $post_DFIK = (isset($_POST['DFIK'])) ? strip_tags(htmlspecialchars(implode( '|', $_POST['DFIK'] ))) : NULL ;    //price |를 기준으로 배열을 합쳐줌
    $post_Myurl = (isset($_POST['Myurl'])) ? strip_tags(htmlspecialchars(implode( '|', $_POST['Myurl'] ))) : NULL ;    //Myurl |를 기준으로 배열을 합쳐줌
    $post_exchange_rate = (isset($_POST['exchange_rate'])) ? strip_tags(htmlspecialchars($_POST['exchange_rate'])) : NULL ;

    var_dump($post_order_before_pk);




    //db접속
    require("./config/conn.php");

    //답변완료 update 0 ->1로 바꿈
    $num = "1";

    $query = "UPDATE order_before SET  state  = :state  WHERE order_id = :order_before_pk ";
    $st = $pdo->prepare($query);
    $st->bindparam(":order_before_pk", $post_order_before_pk);
    $st->bindparam(":state", $num);
    $st->execute();




    //삽입문
    $stmt = $pdo -> prepare("

           INSERT INTO order_before_price (order_before_pk,	price, Delivery_fee, exchange_rate , my_url)

           VALUE (:order_before_pk, :price, :Delivery_fee , :exchange_rate, :my_url)

     ");


     $stmt -> bindValue(":order_before_pk", $post_order_before_pk);

     $stmt -> bindValue(":price", $post_price);

     $stmt -> bindValue(":Delivery_fee", $post_DFIK);

     $stmt -> bindValue(":exchange_rate", $post_exchange_rate);

     $stmt -> bindValue(":my_url", $post_Myurl);

     $stmt -> execute();


     $taskIdx = $pdo->lastInsertId();  //insert된 pk값 가져오기


     header('Location: ./re_index.php');
     ?>
