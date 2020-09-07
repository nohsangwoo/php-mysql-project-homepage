<?php


$stmt = $pdo -> prepare("SELECT obps.weight, obps.exchange_rate, obps.delivery_way, obps.name FROM
  order_before AS ob inner join  order_before_price_second AS obps ON ob.order_id = obps.order_before_pk where ob.order_num = :order_num");


// PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
$stmt -> bindValue(":order_num", $order_num);


// PDOStatement 객체가 가진 쿼리를 실행
$stmt -> execute();


$row = $stmt->fetch();


$weight = $row['weight'];





 ?>


    <div class="container EE_contents" style="margin-top:2em;">
      <div class="">
        <p>
          <h1>Step4 二次見積案内</h1>
        </p>
      </div>
      <hr>
      <div class="">
        <p>
          <form>
            <div class="form-row">

              <!--물건무게-->
              <div class="col-sm EE_talbe_margin_top">
                <label for="validationDefault02 ">重さ</label>
                <input type="text" name="weight" class="form-control" id="validationDefault02" placeholder="kg"  value="<?php echo $weight;?>"  readonly>
              </div>

            </div>
          </form>

          <br><br><br>

              <?php







              /*-------------------------------------------1차 결제 process start-------------------------------------------*/

              /*---------------------이체수수료---------------------*/
              $exchange_fee = 4000;


              /*---------------------환율---------------------*/
              //환율 계산
              $exchange_rate = $row['exchange_rate'];
              //환율계산 끝




              //2차결제 안내
              if($weight!=NULL){


              ?>

              <br><br><br>

              <h3><strong>お客様の2次決済金額</strong></h3>


              <table class="table table-bordered">
                <thead>

                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">配送方法</th>
                    <th scope="col">価格(KRW)</th>
                    <th scope="col">総金額<br>[(@ + 銀行手数料) * 為替レート]</th>
                  </tr>
                </thead>

                <tbody>

                  <?php if($row['delivery_way']==="1"){  ?>
                  <tr>
                    <th scope="row">1</th>
                    <td>
                      EMS<br>
                      （国際スピード郵便 - お届けまで約2日〜4日)
                    </td>
                    <td>
                      <?php

                      if($weight<=0.5){
                        echo $emsJPY=23500;
                      }else if($weight<=0.75){
                        echo $emsJPY=24500;
                      }else if($weight<=1.0){
                        echo $emsJPY=25500;
                      }else if($weight<=1.25){
                        echo $emsJPY=27500;
                      }else if($weight<=1.5){
                        echo $emsJPY=28500;
                      }else if($weight<=1.75){
                        echo $emsJPY=31000;
                      }else if($weight<=2.0){
                        echo $emsJPY=33000;
                      }else if($weight<=2.5){
                        echo $emsJPY=34500;
                      }else if($weight<=3.0){
                        echo $emsJPY=36500;
                      }else if($weight<=3.5){
                        echo $emsJPY=38000;
                      }else if($weight<=4.0){
                        echo $emsJPY=40000;
                      }else if($weight<=4.5){
                        echo $emsJPY=41500;
                      }else if($weight<=5.0){
                        echo $emsJPY=43000;
                      }else if($weight<=5.5){
                        echo $emsJPY=45000;
                      }else if($weight<=6.0){
                        echo $emsJPY=46500;
                      }else if($weight<=6.5){
                        echo $emsJPY=48500;
                      }else if($weight<=7.0){
                        echo $emsJPY=50000;
                      }  else if($weight<=7.5){
                        echo $emsJPY=51500;
                      }else if($weight<=8.0){
                        echo $emsJPY=53500;
                      }else if($weight<=8.5){
                        echo $emsJPY=55000;
                      }else if($weight<=9.0){
                        echo $emsJPY=57000;
                      }else if($weight<=9.5){
                        echo $emsJPY=58500;
                      }else if($weight<=10.0){
                        echo $emsJPY=60000;
                      }else if($weight<=10.5){
                        echo $emsJPY=62000;
                      }else if($weight<=11.0){
                        echo $emsJPY=63500;
                      }else if($weight<=11.5){
                        echo $emsJPY=65500;
                      }else if($weight<=12.0){
                        echo $emsJPY=67000;
                      }else if($weight<=12.5){
                        echo $emsJPY=69000;
                      }else if($weight<=13.0){
                        echo $emsJPY=70500;
                      }else if($weight<=13.5){
                        echo $emsJPY=71500;
                      }else if($weight<=14.0){
                        echo $emsJPY=73500;
                      }else if($weight<=14.5){
                        echo $emsJPY=75000;
                      }else if($weight<=15.0){
                        echo $emsJPY=76500;
                      }else if($weight<=15.5){
                        echo $emsJPY=78000;
                      }else if($weight<=16.0){
                        echo $emsJPY=79500;
                      }else if($weight<=16.5){
                        echo $emsJPY=81000;
                      }else if($weight<=17.0){
                        echo $emsJPY=82500;
                      }else if($weight<=17.5){
                        echo $emsJPY=84000;
                      }else if($weight<=18.0){
                        echo $emsJPY=85500;
                      }else if($weight<=18.5){
                        echo $emsJPY=87000;
                      }else if($weight<=19.0){
                        echo $emsJPY=88500;
                      }else if($weight<=19.5){
                        echo $emsJPY=90000;
                      }else if($weight<=20.0){
                        echo $emsJPY=91500;
                      }else if($weight<=20.5){
                        echo $emsJPY=93000;
                      }else if($weight<=21.0){
                        echo $emsJPY=94500;
                      }else if($weight<=21.5){
                        echo $emsJPY=96000;
                      }else if($weight<=22.0){
                        echo $emsJPY=97500;
                      }else if($weight<=22.5){
                        echo $emsJPY=99000;
                      }else if($weight<=23.0){
                        echo $emsJPY=100500;
                      }else if($weight<=23.5){
                        echo $emsJPY=102000;
                      }else if($weight<=24.0){
                        echo $emsJPY=103500;
                      }else if($weight<=24.5){
                        echo $emsJPY=105000;
                      }else if($weight<=25.0){
                        echo $emsJPY=106500;
                      }else if($weight<=25.5){
                        echo $emsJPY=108000;
                      }else if($weight<=26.0){
                        echo $emsJPY=109500;
                      }else if($weight<=26.5){
                        echo $emsJPY=111000;
                      }else if($weight<=27.0){
                        echo $emsJPY=112500;
                      }else if($weight<=27.5){
                        echo $emsJPY=114000;
                      }else if($weight<=28.0){
                        echo $emsJPY=115500;
                      }else if($weight<=28.5){
                        echo $emsJPY=117000;
                      }else if($weight<=29.0){
                        echo $emsJPY=118500;
                      }else if($weight<=29.5){
                        echo $emsJPY=120000;
                      }else if($weight<=30.0){
                        echo $emsJPY=121500;
                      }else{
                        echo "30Kg以内の荷物の発送が可能です。(別途お問い合わせ)";
                      }

                      echo"ウォン";
                      ?>
                    </td>
                    <td>
                      <?php
                      if($weight<=30.0){
                        $emsPrice=ceil(($exchange_fee + $emsJPY) * $exchange_rate);
                        echo $emsPrice."円";
                      }else{
                        echo "-";
                      }
                      ?>
                    </td>
                  </tr>
                <?php }else if($row['delivery_way']==="2"){ ?>
                  <tr>
                    <th scope="row">2</th>
                    <td>
                      国際小包(航空)<br>
                      (お届けまで約７日〜１５日)
                    </td>
                    <td>
                      <?php
                      if($weight<=0.5){
                        echo $nomalFJPY=17000;
                      }else if($weight<=1.0){
                        echo $nomalFJPY=18000;
                      }else if($weight<=1.5){
                        echo $nomalFJPY=19500;
                      }else if($weight<=2.0){
                        echo $nomalFJPY=21000;
                      }else if($weight<=2.5){
                        echo $nomalFJPY=22500;
                      }else if($weight<=3.0){
                        echo $nomalFJPY=23500;
                      }else if($weight<=3.5){
                        echo $nomalFJPY=25500;
                      }else if($weight<=4.0){
                        echo $nomalFJPY=26000;
                      }else if($weight<=4.5){
                        echo $nomalFJPY=27500;
                      }else if($weight<=5.0){
                        echo $nomalFJPY=28500;
                      }else if($weight<=5.5){
                        echo $nomalFJPY=30000;
                      }else if($weight<=6.0){
                        echo $nomalFJPY=31500;
                      }else if($weight<=6.5){
                        echo $nomalFJPY=32500;
                      }else if($weight<=7.0){
                        echo $nomalFJPY=34000;
                      }  else if($weight<=7.5){
                        echo $nomalFJPY=35000;
                      }else if($weight<=8.0){
                        echo $nomalFJPY=35500;
                      }else if($weight<=8.5){
                        echo $nomalFJPY=38000;
                      }else if($weight<=9.0){
                        echo $nomalFJPY=39000;
                      }else if($weight<=9.5){
                        echo $nomalFJPY=40500;
                      }else if($weight<=10.0){
                        echo $nomalFJPY=42000;
                      }else if($weight<=10.5){
                        echo $nomalFJPY=43000;
                      }else if($weight<=11.0){
                        echo $nomalFJPY=44500;
                      }else if($weight<=11.5){
                        echo $nomalFJPY=46000;
                      }else if($weight<=12.0){
                        echo $nomalFJPY=47000;
                      }else if($weight<=12.5){
                        echo $nomalFJPY=48500;
                      }else if($weight<=13.0){
                        echo $nomalFJPY=50000;
                      }else if($weight<=13.5){
                        echo $nomalFJPY=51000;
                      }else if($weight<=14.0){
                        echo $nomalFJPY=52500;
                      }else if($weight<=14.5){
                        echo $nomalFJPY=54000;
                      }else if($weight<=15.0){
                        echo $nomalFJPY=55000;
                      }else if($weight<=15.5){
                        echo $nomalFJPY=56500;
                      }else if($weight<=16.0){
                        echo $nomalFJPY=57500;
                      }else if($weight<=16.5){
                        echo $nomalFJPY=69000;
                      }else if($weight<=17.0){
                        echo $nomalFJPY=60500;
                      }else if($weight<=17.5){
                        echo $nomalFJPY=61500;
                      }else if($weight<=18.0){
                        echo $nomalFJPY=63000;
                      }else if($weight<=18.5){
                        echo $nomalFJPY=64500;
                      }else if($weight<=19.0){
                        echo $nomalFJPY=65500;
                      }else if($weight<=19.5){
                        echo $nomalFJPY=67000;
                      }else if($weight<=20.0){
                        echo $nomalFJPY=68000;
                      }else{
                        echo "20Kg以内の荷物の発送が可能です。(別途お問い合わせ)";
                      }

                      echo"ウォン";
                      ?>
                    </td>
                    <td>
                      <?php
                      if($weight<=20.0){
                        $nomalFPrice = ceil(($exchange_fee + $nomalFJPY) * $exchange_rate);
                        echo $nomalFPrice."円";
                      }else{
                        echo "-";
                      }

                      ?>
                    </td>
                  </tr>

                <?php }else if($row['delivery_way']==="3"){  ?>

                  <tr>
                    <th scope="row">3</th>
                    <td>
                      国際小包(船便) <br>
                      (お届けまで約２０日〜３０日)
                    </td>
                    <td>
                      <?php
                      if($weight<=1.0){
                        echo $nomalSJPY=9900;
                      }else if($weight<=2.0){
                        echo $nomalSJPY=15500;
                      }else if($weight<=4.0){
                        echo $nomalSJPY=20000;
                      }else if($weight<=6.0){
                        echo $nomalSJPY=24500;
                      }else if($weight<=8.0){
                        echo $nomalSJPY=29000;
                      }else if($weight<=10.0){
                        echo $nomalSJPY=24000;
                      }else if($weight<=12.0){
                        echo $nomalSJPY=28500;
                      }else if($weight<=14.0){
                        echo $nomalSJPY=43000;
                      }else if($weight<=16.0){
                        echo $nomalSJPY=47500;
                      }else if($weight<=18.0){
                        echo $nomalSJPY=52500;
                      }else if($weight<=20.0){
                        echo $nomalSJPY=57000;
                      }else{
                        echo "20Kg以内の荷物の発送が可能です。(別途お問い合わせ)";
                      }

                      echo"ウォン";
                      ?>
                    </td>
                    <td>
                      <?php
                      if($weight<=20.0){
                        $second_result = ceil(($exchange_fee + $nomalSJPY) * $exchange_rate);
                        echo $second_result."円";
                      }else{
                        echo "-";
                      }
                      ?>
                    </td>
                  </tr>
                <?php } ?>

                </tbody>
              </table>

              <?php

              }else{
                echo "please enter the price and weight";
              }


              ?>

              <p>
                ※国際送料は下記の料金表よりご確認ください。
                <a href="./Introduce_Shipping_Cost_Table.php" target="_blank">国際送料の料金表はこちら。</a><br>

              </p>
          <hr>

          <!-- 0. 미답변시 안내내용 -->
          <div class="container">
            <div class="card" style="width: 18rem;">
              <img src="./img/bank.png" class="card-img-top" alt="fairyfloss">
              <div class="card-body">
                <h5 class="card-title">銀行振込（三菱UFJ銀行）</h5>
                <p class="card-text">
                  こんにちは。fairyflossです。
                  <div class="" style="color:blue;">
                    <?php
                    if($row['delivery_way']==="1"){
                      echo "EMS,".$emsPrice."円です。 <br>";
                    }else if($row['delivery_way']==="2"){
                      echo "国際小包(航空),".$nomalFPrice."円です。 <br>";
                    }else if($row['delivery_way']==="3"){
                      echo "国際小包(船便),".$second_result."円です。 <br>";
                    }
                    ?>
                  </div>
                  こちらに送金していただければ確認後すぐ配送いたします。<br>
                </p>
                <a href="http://www.ffss.kr" class="btn btn-primary">Go ffss.kr</a>
              </div>
            </div>
          </div>




        </p>
      </div>

    </div>
