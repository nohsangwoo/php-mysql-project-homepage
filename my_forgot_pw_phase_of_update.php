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

    $active="";

    //네비게이션
    require("./navBar.php");


    $post_id = (isset($_POST['email'])) ? strip_tags(htmlspecialchars($_POST['email'])) : NULL ;




    if($user_id || $post_id == null ){   //로그인 상태에서 접근 불가 || 이전 단계에서 값을 받아오지 못하면 접근불가
      echo "<script>alert('ページのアクセス方式が間違っております。');history.back();</script>";
        exit;
    }



    ?>

    <script language="javascript">
       function validate(e) {
           var re = /^[a-zA-Z0-9]{4,12}$/igm; // 아이디와 패스워드가 적합한지 검사할 정규식



           var pw = document.getElementById("password");
           var checkpw = document.getElementById("check_Password");



           // ------------ 이메일 까지 -----------


           if(!check(re,pw,"パスワードは4~12者の英大文字・小文字と数字だけで入力してください。")) {  //패스워드는 4~12자의 영문 대소문자와 숫자로만 입력해주세요
               return false;
           }





          // 입력안했을때

           if(password.value == "") {
              alert("パスワードを入力してください。");  //비밀번호를 입력해주세요
              name.focus();
              return false;
           }



           if(pw.value != checkpw.value) {
               alert("確認パスワードが異なります。"); //확인 비밀번호가 다릅니다.
               checkpw.value = "";
               checkpw.focus();
               return false;
           }



       }


       function check(re, what, message) {
           if(re.test(what.value)) {
               return true;
           }
           alert(message);
           what.value = "";
           what.focus();
           //return false;
       }
    </script>





    <div class="container" style="margin-top: 30px;">  <!--name으로 전달값 식별-->
      <form class="" action="./my_forgot_pw_phase_of_update_process.php" method="post" onsubmit="return validate();">




        <div class="form-row">

          <!--PW-->
          <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="off"  maxlength="12">
          </div>

          <!--PW 확인-->
          <div class="form-group col-md-6">
            <label for="check_Password">Password check</label>
            <input type="password" class="form-control" id="check_Password" placeholder="check_Password" required autocomplete="off"  maxlength="12">
          </div>
        </div>


        <div class="form-group">
          <input name="email" type="hidden" class="form-control" id="email" required autocomplete="off" value="<?php echo $post_id;?>">
        </div>






        <div class="container" style="text-align:center;">
          <input type="submit" class="btn btn-outline-dark" value="次" style="width:100px;">
        </div>
     </form>

    </div>




    <?php


    //contact_us
    require("./contact_us.php");


    //footer
    require("./footer.php");

    //top_button
    require("./top_button.php");

    //line_request
    require("./line_request.php");


     ?>







       </script>

  </body>
</html>
