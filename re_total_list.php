<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--사이트 저작권자-->
    <meta name="author" content="fairyfloss">



    <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
    <title>all about korea fairyfloss</title>

    <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru&amp;subset=japanese" rel="stylesheet">

    <link rel="stylesheet" href="./wow/css/libs/animate.css">
    <script src="./wow/dist/wow.min.js"> </script>
    <script>  new WOW().init(); </script>



    <style>
    .kosugio_font{ font-family: 'Kosugi Maru', sans-serif; }
    .a {
       border: 1px solid black;
     }

     .border_guide{
       margin-top:1.5em;
       margin-bottom:1.5em;
       border: 3px solid black;
       font-size: 1.5em;
     }


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

   <!--캡쳐를 위해 필요한 링크 자바스크립트 플러그인은 위에 중복돼서 포함안시킴-->   <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->

   <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>


  </head>
  <body class="kosugio_font">






    <p><h1>총 문의현황</h1></p>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">PK</th>
          <th scope="col">회원번호</th>
          <th scope="col">구매대행종류</th>
          <th scope="col">이름</th>
          <th scope="col">email</th>
          <th scope="col">주문번호</th>
          <th scope="col">상태</th>
          <th scope="col">날짜</th>
        </tr>
      </thead>
      <tbody>



<?php



     //db접속
     require("./config/conn.php");


     // 쿼리를 담은 PDOStatement 객체 생성
     // $stmt = $pdo -> prepare("SELECT order_id, kind, email, order_num, state, date FROM order_before WHERE order_id = :order_id");



     $stmt = $pdo -> prepare("SELECT order_id, user_id, kind, name, email, order_num, state, date FROM order_before");


     // PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
     // $stmt -> bindValue(":order_id", $order_befire_pk);


     // PDOStatement 객체가 가진 쿼리를 실행
     $stmt -> execute();



     // Fetch 모드를 설정  전체 출력용
      $stmt->setFetchMode(PDO::FETCH_ASSOC);

      // 1 row 씩 가져오기
      while($row = $stmt->fetch()) {
        ?>

              <tr>
                <th scope="row"><?php echo $row['order_id']; ?></th>
                <td><?php
                if($row['user_id']==="0"){
                  echo "<div style=\"color:red;\">비회원</div>";
                }else{
                  echo $row['user_id'];
                }

                 ?></td>
                <td><?php
                if($row['kind']==="1"){
                  echo "1.구매대행";
                }else if($row['kind']==="2"){
                  echo "2.결제대행";
                }else if($row['kind']==="3"){
                  echo "3.출장대행";
                }else if($row['kind']==="4"){
                  echo "4.기타대행";
                }
                 ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['order_num']; ?></td>
                <td><?php
                if($row['state']==="0"){
                  echo "<div style=\"color:red;\">0 - 답변대기</div>";
                }else if($row['state']==="1"){
                  echo "1 - 문의완료<br>(1차 입금대기중)";
                }else if($row['state']==="2"){
                  echo "2 - 1차결제 입금확인<br>(한국내 주문진행)";
                }else if($row['state']==="3"){
                  echo "3 - 한국내 배송완료<br>(2차결제 입금대기중)";
                }else if($row['state']==="4"){
                  echo "4 - 2차결제 입금확인<br>(국제배송 진행)";
                }else if($row['state']==="5"){
                  echo "5 - 배송상태<br>(운송장번호)";
                }else if($row['state']==="6"){
                  echo "6 - 배송완료<br>(운송장번호)";
                }
                 ?></td>
                <td><?php echo $row['date']; ?></td>
              </tr>

          <?php
      }
      ?>

    </tbody>
  </table>


  <?php



     // // PDOStatement 객체가 실행한 쿼리의 결과값 가져오기
     // $row = $stmt -> fetch();
     //
     //
     // $temp = $row['order_id'];




    //top_button
    require("./top_button.php");
     ?>




  </body>
</html>
