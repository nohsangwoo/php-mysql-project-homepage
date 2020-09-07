<!-- <link rel= "stylesheet" type="text/css" href="./css/navBar.css"> -->




<?php

  if(!$_SERVER['HTTPS']) { //https로 접속하게 하기위해서
  echo"<meta http-equiv='refresh' content='0;url=https://".$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI']."'>";  //ex) http_host=ffss.kr, request_uri=/order.php
  exit;
  }
  require("./re_session_head.php");






 ?>


<?php
if(!isset($active)){ $active = null; }
if($admin_pk){

?>




<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./re_index.php">주문현황</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($active === "0"){  echo "active"; }else{echo "";} ?>">
        <a class="nav-link" href="./re_zero_list.php">[0]답변 미완료 <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item <?php if($active === "1"){  echo "active"; }else{echo "";} ?>">
        <a class="nav-link" href="./re_one_list.php">[1]답변 완료<br>(1차 입금대기) <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item <?php if($active === "2"){  echo "active"; }else{echo "";} ?>">
        <a class="nav-link" href="./re_two_list.php">[2]1차결제 입금확인<br>(한국내 주문진행) <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item <?php if($active === "3"){  echo "active"; }else{echo "";} ?>">
        <a class="nav-link" href="./re_three_list.php">[3]한국내 배송완료<br>(2차 입금대기) <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item <?php if($active === "4"){  echo "active"; }else{echo "";} ?>">
        <a class="nav-link" href="./re_four_list.php">[4]2차결제 입금확인<br>(국제배송 진행) <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item <?php if($active === "5"){  echo "active"; }else{echo "";} ?>">
        <a class="nav-link" href="./re_five_list.php">[5]국제 배송진행<br>(운송장번호 입력) <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item <?php if($active === "6"){  echo "active"; }else{echo "";} ?>">
        <a class="nav-link" href="./re_six_list.php">[6]배송완료<br>(운송장번호) <span class="sr-only">(current)</span></a>
      </li>


      <li class="nav-item <?php if($active === "7"){  echo "active"; }else{echo "";} ?>">
        <a class="nav-link" href="./re_seven.php">[7]장부<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item <?php if($active === "8"){  echo "active"; }else{echo "";} ?>">
        <a class="nav-link" href="./re_eight.php">세금<span class="sr-only">(current)</span></a>
      </li>




      <li class="nav-item ">
        <a class="nav-link" href="./re_logout.php">로그아웃<span class="sr-only">(current)</span></a>
      </li>


      <?php
      unset($active);
      }

      ?>



  </div>
</nav>
