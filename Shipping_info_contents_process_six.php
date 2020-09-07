<!-- 6. 배송시 확인 내용 -->
<style media="screen">
.order_s{
  display: inline;
  word-break:break-all;
}
.order_c{
  display: inline;
  word-break:break-all;
}

</style>
<?php

$stmt = $pdo -> prepare("SELECT TransportNum FROM order_before where order_num = :order_num");

// PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
$stmt -> bindValue(":order_num", $order_num);
// PDOStatement 객체가 가진 쿼리를 실행
$stmt -> execute();

$row = $stmt->fetch();
$TransportNum = $row['TransportNum'];

 ?>
<div class="container">
  <div class="card" style="width: 18rem;">
    <img src="./img/brand.png" class="card-img-top" alt="fairyfloss">
    <div class="card-body">
      <h5 class="card-title">Step6 配送</h5>
      <p class="card-text order_c">
        こんばんは。fairyflossです。<br>
        郵便局からご注文の商品を発送完了いたしました。<br>
        ありがとうございます<br>
        <hr>
        追跡番号：<div class="order_s" style="color:blue;"><?php echo $TransportNum;?></div> です。<br>

        <!--메일주소카피 버튼-->
            <div class="text-center">
              <button type="button" class="btn btn-outline-success btn-lg contact_us_btn_Property">
                <div id='tn'>追跡番号をコピー</div>
              </button>
            </div>
        <!--메일주소카피기능-->
            <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
            <script>
            var transport = <?php  echo json_encode($TransportNum); ?>;
            function copyToClipboard(val) {
              var t = document.createElement("textarea");
              document.body.appendChild(t);
              t.value = val;
              t.select();
              document.execCommand('copy');
              document.body.removeChild(t);
            }
            $('#tn').click(function() {
              copyToClipboard(transport);
              alert('追跡番号をコピーしました。');
            });
            </script>


        <hr>


        <a href="https://www.17track.net/" class="btn btn-outline-primary" target="_blank">go 17track(配送追跡サイト)</a> <br>




      </p>
      <a href="http://www.ffss.kr" class="btn btn-outline-primary">Go ffss.kr</a>
    </div>
  </div>
</div>
