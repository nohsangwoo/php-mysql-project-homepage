<?php
if(!$_SERVER['HTTPS']) { //https로 접속하게 하기위해서
echo"<meta http-equiv='refresh' content='0;url=https://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']."'>";  //ex) http_host=ffss.kr, request_uri=/order.php
exit;
}

  require("./session_head.php");


 ?>
<link rel= "stylesheet" type="text/css" href="./css/navBar.css">







<nav class="navbar navbar-expand-lg navbar-light bg-white navBar_padding_top">
  <div class="container">
    <a class="navbar-brand" href="./index.php">
      <img src="./img/brand.png" width="200px" height="auto" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav" style="margin:auto;">

        <!--자동견적-->
        <li class="nav-item <?php if($active=="service"){ echo "active";}else{ echo "";}?>"  >
          <a class="nav-link navMenu " href="EE.php"  style="font-size:1.4em;">
            自動見積
          </a>
        </li>

        <!--무료견적-->
        <li class="nav-item <?php if($active=="order"){ echo "active";}else{ echo"";}?> " >
          <a class="nav-link navMenu " href="./order.php" style="font-size:1.4em;">
            無料見積依頼
          </a>
        </li>


        <!--비용안내 드롭다운-->
        <li class="nav-item dropdown <?php
        if($active=="fee" || $active=="shipping_cost" || $active=="payment"){
           echo "active";
         }

        ?> text-center" >
           <a class="nav-link dropdown-toggle" style="font-size:1.4em;" href="#" id="DMF" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             費用案内
           </a>

           <div class="dropdown-menu text-center" aria-labelledby="DMF">
             <a class="dropdown-item <?php if($active=="fee"){ echo "active";}?>" href="./Introduce_Agent_Fee.php">代行手数料</a>  <!--대행수수료 안내-->
             <a class="dropdown-item <?php if($active=="shipping_cost"){ echo "active";}?>" active href="./Introduce_Shipping_Cost_Table.php">国際送料</a>   <!--배송료안내-->
             <a class="dropdown-item <?php if($active=="payment"){ echo "active";}?>" href="./Introduce_Payment_way.php">決済方法</a> <!--결제방법안내-->
           </div>
         </li>




        <?php

        if( $user_id != NULL){  //로그인 상태일때

         ?>




         <!--My menu-->
         <li class="dropdown nav-item text-center">
            <a class="nav-link dropdown-toggle" style="font-size:1.4em;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              マイメニュー           <!--마이메뉴-->
            </a>
            <div class="dropdown-menu text-center">
              <a class="dropdown-item" href="./my_page.php">個人情報</a>
              <a class="dropdown-item" href="./my_update_pw_phase_of_verifyn.php"> パスワード変更 </a>
              <a class="dropdown-item" href="./Shipping_info_member.php">会員配送情報</a> <!--회원 배송정보(구현중)-->
            </div>
          </li>


          <!--로그아웃-->
          <li class="dropdown nav-item ">
            <a class="nav-link navMenu " href="logout.php">
              ログアウト
            </a>
          </li>







         <?php
       }else{  //로그아웃 상태일때
         ?>

         <!--로그인 관련-->
         <li class="dropdown nav-item text-center">
            <a class="nav-link dropdown-toggle" style="font-size:1.4em;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ログイン
            </a>
            <div class="dropdown-menu">
              <form class="px-4 py-3" method='post' action='./login_ok.php'>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input name="ID" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@example.com" autocomplete="off">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input name="PW" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="off">
                </div>

                <button type="submit" class="btn btn-primary">ログイン</button>
              </form>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./signup_agree.php">会員加入</a>                          <!--회원가입-->
              <a class="dropdown-item" href="./my_forgot_pw.php">パスワードを忘れたのですか?</a>        <!--비밀번호찾기-->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" style="color:blue;" href="./Shipping_info.php">非会員配送情報</a>        <!--비회원 배송정보(구현)-->

            </div>
          </li>


         <?php



       }

          ?>

      </ul>
    </div>
  </div>
</nav>
