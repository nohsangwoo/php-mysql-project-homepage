

<?php

$stmt = $pdo -> prepare("SELECT obps.weight,obps.exchange_rate FROM
  order_before AS ob inner join  order_before_price_second AS obps ON ob.order_id = obps.order_before_pk where ob.order_num = :order_num order by ob.order_num asc");


// PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
$stmt -> bindValue(":order_num", $order_num);


// PDOStatement 객체가 가진 쿼리를 실행
$stmt -> execute();


$row = $stmt->fetch();

$read_weight = $row['weight'];
$read_exchange_rate=$row['exchange_rate'];



if($read_weight===null){
?>
<!-- 3 2차 견적 아직 안냈을때 답변 -->
<div class="container">
  <div class="card" style="width: 18rem;">
    <img src="./img/brand.png" class="card-img-top" alt="fairyfloss">
    <div class="card-body">
      <h5 class="card-title">Step3 二次決済案内</h5>
      <p class="card-text">
        こんにちは。fairyflossです。<br>
        お客様の品物が韓国内の支店に到着しました。<br>
        2次案内までしばらくお待ちください。<br>
      </p>
      <a href="http://www.ffss.kr" class="btn btn-primary">Go ffss.kr</a>
    </div>
  </div>
</div>
<?php
}else{
  require("./Shipping_info_contents_process_three_part2.php");

  require("./Shipping_info_contents_process_three_part3.php");


  ?>
<!-- 2차견적냈을때 답변 -->




  <?php
}

 ?>
