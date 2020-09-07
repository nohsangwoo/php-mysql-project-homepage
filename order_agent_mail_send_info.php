<!DOCTYPE html>
<html lang="ko" dir="ltr">
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





    @media only screen and (min-width: 768px) { /*768보다 크면 아래내용 실행*/


      #ct_s{  font-size:3em;  }


      }


    @media only screen and (max-width: 767px) { /*767보다 작으면 아래내용 실행*/
      #ct_s{ font-size:1.5em;  word-break:break-all;}
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
    <?php
    $ordernum = (isset($_POST['ordernum'])) ? strip_tags(htmlspecialchars($_POST['ordernum'])) : NULL ;   //주문번호
    ?>



    <a id="target" style="display: none"></a>



    <script type="text/javascript">


    // *****중요!!!!
    //캡쳐기능이 왜인지는 모르겠지만 버튼이랑 스크립트가 최상단에 와야 작동함...
    function myCaptureFunction() {

      var ordernum = <?php  echo json_encode($ordernum)?>;


      //오늘날짜구하기 시작
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();

      if(dd<10) {
          dd='0'+dd
      }

      if(mm<10) {
          mm='0'+mm
      }

      today = mm+'/'+dd+'/'+yyyy;
      //오늘 날짜 구하기 끝



      html2canvas(document.querySelector("#ct")).then(canvas => {  //해당 태그의 범위안에것을 다 캡쳐

      var el = document.getElementById("target");

       el.href = canvas.toDataURL("image/jpeg");  //이미지파일을 다운로드 다른포멧도 가능함

       el.download = ordernum+'_'+today +'.jpg';   //다운로드 파일명 지정

       el.click();

        });
    }

    </script>
    <!--주문번호 그림저장 기능 끝-->



    <div class="jumbotron container">
      <div class=""  id="ct">



        <img src="./img/brand.png" width="200px" height="auto" alt="">
        <p class="lead ct_size" id="ct_s" >注文番号 : <?php echo $ordernum;?></p>
        <p class="lead">ありがとうございます。メールまたはラインで返事します。</p>
        <hr class="my-4">
      </div>
      <p>注文番号をぜひ覚えてください。!!!</p>


        <div class="container">

        </div>


  <!--주문번호 그림저장 기능-->
      <div class="text-center">
        <button class="btn btn-outline-success btn-lg contact_us_btn_Property" onclick="myCaptureFunction()">画像で保存</button> <!--캡쳐 작동시키는 버튼이 최상단에 와야지만 작동함..왠진 모름-->
      </div>
  <!--주문번호 그림저장 기능-->



  <!--주문번호 카비 버튼-->
      <div class="text-center" style="margin-top:4em;">
        <button type="button" class="btn btn-outline-success btn-lg contact_us_btn_Property">
          <div id='ordernum_Copy_Btn'>注文番号をコピー</div>
        </button>
      </div>
  <!--주문 번호 카피 기능-->
      <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
      <script>
      function copyToClipboard(val) {
        var t = document.createElement("textarea");
        document.body.appendChild(t);
        t.value = val;
        t.select();
        document.execCommand('copy');
        document.body.removeChild(t);
      }

      var order_num = <?php  echo json_encode($ordernum); ?>;
      $('#ordernum_Copy_Btn').click(function() {
        copyToClipboard(order_num);
        alert('注文番号をコピーしました。');
      });
      </script>



      <div class="text-center">
        <a style="margin-top:4em;"class="btn btn-outline-primary" href="./index.php" role="button">HOME</a>
      </div>

    </div>


  </body>
</html>
