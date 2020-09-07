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






    if($user_id){   //로그인상태로 접근했을때 거부
      echo "<script>alert('ページのアクセス方式が間違っております。');history.back();</script>";
        exit;
    }



    //약관에 동의해야 가입할수있는 조건
    $check_agree = (isset($_POST['check_agree'])) ? intval($_POST['check_agree']) : NULL ;
    if(!($check_agree == 1)){
      echo "<script>alert('利用規約に同意していただける場合会員登録ができます。');history.back();</script>";
        exit;
    }

    ?>

    <script language="javascript">
       function validate(e) {
           var re = /^[a-zA-Z0-9]{4,12}$/igm; // 아이디와 패스워드가 적합한지 검사할 정규식
           var re_eng = /[a-zA-Z]/igm; //영문만 가능
           var re2 = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/igm;
           var re_num = /^[0-9]{4,12}$/igm; // 아이디와 패스워드가 적합한지 검사할 정규식
           var re_address = /[0-9a-zA-Z,.;-]/igm; // 숫자와 영어 몇개의 특수문자 표현
           var re_post_code = /[0-9,.;-]/igm; // 숫자와 몇개의 특수문자 표현 post_code
           var regexp = /[0-9a-zA-Z,!@#$%^&*().;-]/igm; // 숫자,영문,특수문자
           var re_phone = /[0-9,.;-]/igm; // 숫자와 몇개의 특수문자 표현 post_code


           //var ppp = /[a-zA-Z0-9,]/g;


           var email = document.getElementById("email");
           var pw = document.getElementById("password");
           var checkpw = document.getElementById("check_Password");
           var name = document.getElementById("name");
           var age = document.getElementById("age");
           var address = document.getElementById("address");
           var post_code = document.getElementById("post_code");
           var phone = document.getElementById("phone");
           var chk_id2 = document.getElementById("chk_id2");





           // ------------ 이메일 까지 -----------

           if(!check(re2, email, "適合しないメール形式です。")) {  //적합하지 않은 이메일 형식입니다.
               return false;
           }


           if(!check(re,pw,"パスワードは4~12者の英大文字・小文字と数字だけで入力。")) { //패스워드는 4~12자의 영문 대소문자와 숫자로만 입력
               return false;
           }

           if(!check(re_eng,name,"名前は英語だけで入力してください。")) { //이름은 영어로만 입력해주세요
               return false;
           }


           if(!check(re_num, age, "生年月日を正しく入力してください。")) { // 생년월일을 제대로 입력하세요
               return false;
           }


           if(!check(regexp, address, "住所は英文と数字と ',' '-' で入力が可能です。")) { //주소는 영문과 숫자  ','  '-' 로 입력이 가능합니다.
               return false;
           }

           if(!check(re_post_code,post_code,"郵便番号は数字と '-' でのみ表現可能です。")) {
               return false;
           }

           if(!check(re_phone,phone,"電話番号は数字と '-' で表現可能です。")) { //전화번호는 숫자와 - 로만 표현가능합니다.
               return false;
           }



          // 입력안했을때

           if(name.value == "") {
              alert("名前を入力してください。"); //이름을 입력해주세요.
              name.focus();
              return false;
           }


           if(chk_id2.value == "0") {
              alert("IDを重複チェックしてください。"); // 아이디를 중복체크해주세요.
              return false;
           }



           if(email.value=="") {
               alert("メールを入力してください。");　　//이메일을 입력해 주세요.
               email.focus();
               return false;
           }

           if(pw.value != checkpw.value) {
               alert("暗証番号が違います。 もう一度確認をお願いします。");  //비밀번호가 다릅니다. 다시 확인해 주세요.
               checkpw.value = "";
               checkpw.focus();
               return false;
           }

           if(age.value == "") {
              alert("生年月日を入力してください。");  //생년월일을 입력해주세요
              age.focus();
              return false;
           }

           if(address.value == "") {
              alert("住所を入力してください。");　//주소를 입력해주세요.
              address.focus();
              return false;
           }

           if(post_code.value == "") {
              alert("郵便番号を入力してください。"); //우편번호를 입력해주세요
              post_code.focus();
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






    <script>
     function chid(){ //아이디(email) 중복체크 기능

      document.getElementById("chk_id2").value=0  //히든 값 0으로 일단
      var id=document.getElementById("email").value;  //입력값

      ifrm1.location.href="signup_email_chk.php?userid="+id;  //해당 페이지로 get방식으로보냄
     }
    </script>



    <iframe src="" id="ifrm1" scrolling=no frameborder=no width=0 height=0 name="ifrm1"></iframe> <!--눈에 안보이는 iframe 생성-->





    <div class="container" style="margin-top: 30px;">  <!--name으로 전달값 식별-->
      <form class="" action="./signup_process.php" method="post" onsubmit="return validate();">


        <input type=button class="btn btn-danger" value="メール重複検査" onclick=chid();>
        <input type=hidden id="chk_id2" name=chk_id2 value="0">

        <div class="form-row">
          <!--emain(id)-->
          <div class="form-group col-md-4">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="例) email@example.com" required autocomplete="off">
          </div>


          <!--PW-->
          <div class="form-group col-md-4">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="off"  maxlength="12">
          </div>

          <!--PW 확인-->
          <div class="form-group col-md-4">
            <label for="check_Password">Password check</label>
            <input type="password" class="form-control" id="check_Password" placeholder="check_Password" required autocomplete="off"  maxlength="12">
          </div>

        </div>




        <!--이름-->
        <div class="form-group">
          <label for="inputAddress">名前(英語)</label>
          <input type="text" name="name" class="form-control" placeholder="例) ogura keiko" maxlength="20" id="name" value="" >
        </div>


        <!--나이-->
        <div class="form-group">
          <label for="inputAddress">出生年度</label>
          <input type="text" name="age" class="form-control" placeholder="例) 1996" maxlength="4" id="age"  >
        </div>


        <!--주소(영어)-->
        <div class="form-group">
          <label for="inputAddress">住所(英語)</label>
          <input type="text" name="address" class="form-control" placeholder="例) 2-3-1, Nagata-cho, chiyoda-ku, Tokyo, Japan 100-8968"  maxlength="200" id="address">
        </div>




        <!--우편번호-->
        <div class="form-group">
          <label for="inputAddress">郵便番号</label>
          <input type="text" name="post_code" class="form-control"  placeholder="例) 123-1234" maxlength="16" id="post_code">
        </div>

        <!--전화번호-->
        <div class="form-group">
          <label for="inputAddress">電話番号</label>
          <input type="text" name="phone" class="form-control" placeholder="例) 080-1234-1234" maxlength="16" id="phone" >
        </div>



        <div class="container" style="text-align:center;">

          <p style="margin-top:30px;">
            <input type="button" class="btn btn-outline-dark" value="Cancel" onclick="location.href='./index.php'" style="width:100px;">

            <input type="submit" class="btn btn-outline-dark" name="" onclick="" value="会員登録" style="width:100px;">
          </p>
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
