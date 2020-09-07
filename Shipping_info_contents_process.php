<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--사이트 저작권자-->
    <meta name="author" content="fairyfloss">

    <!--사이트 설명-->
  	<meta name="description" content="韓国購買代行 韓国代行">

    <!--사이트 키워드-->
  	<meta name="keywords" content="韓国購買代行,韓国,韓国代行,韓国決済代行,ffss,fairyfloss,korea,soeul,shopping,koreashopping,koreatravel,koreacosmetic,cosmetics,koreansinger,kpop,k-pop,koreadrama,韓国旅行,韓国ドラマ,
    韓国俳優,韓国歌手,韓国化粧品,韓国食べ物,ソウル,韓国好き,韓国購買代行,購入代行,韓国ファッション,韓国コスメ,KBEAUTY,pokorea,jastipkorea,bistipkorea,kangdaniel,koreahandcarry,koreabuyingservice
    ,韓国ドラマ,ウォノウォン,防弾少年団,エクスオ,kpopgoods,preorderkoreakoreapersonalshopper,koreapersonalshopping,handcarrykorea,koreatrip,旅行,seoul,kdram,trip,korea,ソウル">



    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
    <title>all about korea fairyfloss</title>
    <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru&amp;subset=japanese" rel="stylesheet">

    <link rel="stylesheet" href="./wow/css/libs/animate.css">
    <script src="./wow/dist/wow.min.js"> </script>
    <script>  new WOW().init(); </script>


    <style>
    .kosugio_font{ font-family: 'Kosugi Maru', sans-serif; }





    @media only screen and (min-width: 768px) { /*768보다 크면 아래내용 실행*/


      }


    @media only screen and (max-width: 767px) { /*767보다 작으면 아래내용 실행*/
      }

    </style>

    <!-- 부트스트랩 -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- IE8 에서 HTML5 요소와 미디어 쿼리를 위한 HTML5 shim 와 Respond.js -->
    <!-- WARNING: Respond.js 는 당신이 file:// 을 통해 페이지를 볼 때는 동작하지 않습니다. -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>  -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->

    <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
   <script src="./js/bootstrap.min.js"></script>




  </head>
  <body class="kosugio_font">
    <?php

    $order_num = (isset($_POST['order_num'])) ? strip_tags(htmlspecialchars($_POST['order_num'])) : NULL ;   //배송종류
    

    if($order_num===null){ //혹시나 번호가 없이 접근시 접근거부
      echo "<script>alert('異常接近。');history.back();</script>";
    }else{  //문제없으면 진행

      //db접속
      require("./config/conn.php");


      // $stmt = $pdo -> prepare("SELECT ob.kind,ob.name,ob.email,ob.url,ob.text,obp.price,obp.Delivery_fee,obp.exchange_rate,obp.my_url, obps.weight, obps.exchange_rate,obps.name,obps.email,obps.address,obps.phone,obps.text,obps.s_option,obps.delivery_way  FROM
      //   order_before AS ob inner join  order_before_price AS obp ON ob.order_id = obp.order_before_pk inner join order_before_price_second as obps on ob.order_id = obps.order_before_pk where ob.order_id = :order_id order by ob.order_id asc");

      $stmt = $pdo -> prepare("SELECT state FROM order_before where order_num = :order_num order by order_num asc");

      // PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
      $stmt -> bindValue(":order_num", $order_num);
      // PDOStatement 객체가 가진 쿼리를 실행
      $stmt -> execute();

      $row = $stmt->fetch();
      $order_state = $row['state'];
      // var_dump($order_state);

      if($order_state==="0"){

    // 0. 미답변시 안내내용
    require("./Shipping_info_contents_process_zero.php");

    }else if($order_state==="1"){
      require("./Shipping_info_contents_process_one.php");

    }else if($order_state==="2"){
      require("./Shipping_info_contents_process_two.php");
    }else if($order_state==="3"){
      require("./Shipping_info_contents_process_three.php");
    }else if($order_state==="4"){
      require("./Shipping_info_contents_process_four.php");
    }else if($order_state==="5"){
      require("./Shipping_info_contents_process_five.php");
    }else if($order_state==="6"){
      require("./Shipping_info_contents_process_six.php");
    }


      //contact_us
      require("./contact_us.php");


      //footer
      require("./footer.php");

      //top_button
      require("./top_button.php");

      //line_request
      require("./line_request.php");


    }
    ?>



  </body>
</html>
