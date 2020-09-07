


    <div class="container EE_contents">
      <div class="">
        <p>
          <form  action="EE.php" method="post" enctype="multipart/form-data" >
            <div class="form-row">
              <div class="col-sm EE_talbe_margin_top wow bounceInLeft">
                <!--상품가격입력-->
                <label for="validationDefault01 ">商品価格</label>
                <input type="text" name ="price" class="form-control" id="validationDefault01" placeholder="KRW(WON)" >
              </div>

              <!--물건무게-->
              <div class="col-sm EE_talbe_margin_top wow bounceInRight">
                <label for="validationDefault02 ">重さ</label>
                <input type="text" name="weight" class="form-control" id="validationDefault02" placeholder="kg"  >
              </div>

            </div>


            <div style="margin-top:1em;" class="">
              <div class="custom-control custom-switch EE_talbe_margin_top">
                <input name ="s1" type="checkbox" value="O" class="custom-control-input" id="s1">
                <label class="custom-control-label" for="s1">EMS　保険加入</label>
              </div>
            </div>
            <hr>

            <div style="margin-top:1em;" class="">
                ■ オプションサービス
              <div class="row second_payment_form_margin_top">
                <div class="col-sm">
                  <div class="custom-control custom-switch EE_talbe_margin_top wow bounceInLeft">
                    <input name ="s2" type="checkbox" value="O" class="custom-control-input" id="s2">
                    <label class="custom-control-label" for="s2">まとめ梱包</label>
                  </div>
                </div>
                <div class="col-sm">
                  <div class="custom-control custom-switch EE_talbe_margin_top wow bounceIn">
                    <input name ="s3" type="checkbox" value="O" class="custom-control-input" id="s3">
                    <label class="custom-control-label" for="s3">再梱包</label>
                  </div>
                </div>
                <div class="col-sm">
                  <div class="custom-control custom-switch EE_talbe_margin_top wow bounceInRight">
                    <input name ="s4" type="checkbox" value="O" class="custom-control-input" id="s4">
                    <label class="custom-control-label" for="s4">有料保管サービス</label>
                  </div>
                </div>
              </div>
            </div>

            <div style="text-align: center; " class="wow bounceIn" >
              <input style="margin-top:30px;" class="btn btn-outline-secondary btn-lg" type="submit" />
            </div>
          </form>

          <br><br><br>

              <?php

              /*1차결제 process ==>>> )물건가격 + 대행수수료 + 보험 + 서비스옵션1 +서비스옵션2 + 서비스옵션3 + 은행이체수수료 + 한국내세금) x 환율 */

              $product_price = (isset($_POST['price'])) ? strip_tags(htmlspecialchars($_POST['price'])) : NULL ;
              $weight = (isset($_POST['weight'])) ? strip_tags(htmlspecialchars($_POST['weight'])) : NULL ;
              $s1 = (isset($_POST['s1'])) ? strip_tags(htmlspecialchars($_POST['s1'])) : NULL ;
              $s2 = (isset($_POST['s2'])) ? strip_tags(htmlspecialchars($_POST['s2'])) : NULL ;
              $s3 = (isset($_POST['s3'])) ? strip_tags(htmlspecialchars($_POST['s3'])) : NULL ;
              $s4 = (isset($_POST['s4'])) ? strip_tags(htmlspecialchars($_POST['s4'])) : NULL ;






              /*-------------------------------------------1차 결제 process start-------------------------------------------*/

              /*---------------------이체수수료---------------------*/
              $exchange_fee = 4000;


              /*---------------------환율---------------------*/

              //-------환율 크롤링 시작-----------
              ini_set("allow_url_fopen",1); //얼로우를 풀어줌

              include "./parsing_lib/simple_html_dom.php";  //클래스 참조

              $data = file_get_html("https://www.konest.com/m/rate_top.html");  //html을 그대로 가져오는 함수

              $i=0;

              foreach($data->find("em.emph_red") as $txtitem){
                $won_temp[$i] = $txtitem->plaintext; //태그 없애고 글씨만 가져옴
                //echo $won_temp[$i];
                //echo "<br>";
                $i++;

              }

              //크롤링 끝-----------


              $YEN = 100;
              $WON =  $won_temp[0];

              $exchange_rate = $YEN / $WON;



              if($product_price!=NULL){

                /*---------------------대행수수료---------------------*/
                if($product_price <= 50000){
                  $fee = 4000;
                }else if($product_price <= 100000){
                  $fee = 6000;
                }else if($product_price <= 300000){
                  $fee = 10000;
                }else{
                  $fee = $product_price * 0.05;
                }


                /*---------------------서비스옵션---------------------*/
                $Repackaging1=0;
                $Repackaging2=0;
                $storage_service=0;

                if($s2=='O'){  $Repackaging1 = 5000; }
                if($s3=='O'){  $Repackaging2 = 5000; }
                if($s4=='O'){  $storage_service = 10000; }


                /*---------------------보험료---------------------*/
                $Insurance=0;
                if($s1=='O'){
                  $Insurance = $product_price/114300 ;
                  $Insurance=550*(int)$Insurance;
                  $Insurance+=2800;
                }






                /*---------------------한국세금---------------------*/
                 $KR_TAX = $product_price * 0.044;





                $Calculation = ($product_price + $fee + $Insurance + $Repackaging1 + $Repackaging2 + $storage_service + $exchange_fee + $KR_TAX) * $exchange_rate;


                ?>
                <h3><strong>お客様の1次決済金額</strong></h3>
                <!--1차 결제 table start------------------------------------------->
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">仕分け</th>
                      <th scope="col">価格(KRW)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>商品価格</td>
                      <td><?php echo $product_price."ウォン";?></td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>代行手数料</td>
                      <td><?php echo $fee."ウォン";?></td>
                    </tr>

                    <tr>
                      <th scope="row">3</th>
                      <td>EMS　保険加入</td>
                      <td><?php echo $Insurance."ウォン";?></td>
                    </tr>

                    <tr>
                      <th scope="row">4</th>
                      <td>まとめ梱包</td>
                      <td><?php echo $Repackaging1."ウォン";?></td>
                    </tr>

                    <tr>
                      <th scope="row">5</th>
                      <td>再梱包</td>
                      <td><?php echo $Repackaging2."ウォン";?></td>
                    </tr>

                    <tr>
                      <th scope="row">6</th>
                      <td>有料保管サービス</td>
                      <td><?php echo $storage_service."ウォン";?></td>
                    </tr>
                    <tr>
                      <th scope="row">7</th>
                      <td>銀行手数料</td>
                      <td><?php echo $exchange_fee."ウォン";?></td>
                    </tr>

                    <tr>
                      <th scope="row">8</th>
                      <td>韓国内税金</td>
                      <td><?php echo $KR_TAX."ウォン";?></td>
                    </tr>

                    <tr>
                      <th scope="row">9</th>
                      <td>合計</td>
                      <td><?php echo ($product_price + $fee + $Insurance + $Repackaging1 + $Repackaging2 + $storage_service + $exchange_fee + $KR_TAX)."ウォン";?></td>
                    </tr>

                  </tbody>
                </table>


                <table class="table table-dark">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">仕分け</th>
                      <th scope="col">価格(JPY)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">10</th>
                      <td>為替レート( 円 -> ウォンへ両替時)</td>
                      <td><?php echo $YEN."円 -> ".$WON."ウォン";?></td>
                    </tr>

                    <tr>
                      <th scope="row">11</th>
                      <td>1次決済金額</td>
                      <td><?php echo ceil($Calculation)."円";?></td>
                    </tr>
                    <tr>
                      <th scope="row">12</th>
                      <td>Paypal 決済</td>
                      <td><?php echo ceil($Calculation+($Calculation*0.044)+40+150)."円";?></td>
                    </tr>
                  </tbody>
                </table>

                <!--1차 결제 table end------------------------------------------->

              <?php



              }else{
                echo "please enter the price and weight";
              }

              /*-------------------------------------------1차 결제 process end-------------------------------------------*/
              ?>
              <p>
                ※購入代行手数料は下記の料金表よりご確認ください。
                <a href="./Introduce_Agent_Fee.php" target="_blank">購入代行手数料の料金表はこちら</a><br>
              </p>









              <!--2차결제 안내-->
              <?php

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
                        echo ceil(($exchange_fee + $emsJPY) * $exchange_rate)."円";
                      }else{
                        echo "-";
                      }
                      ?>
                    </td>
                  </tr>

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
                        echo ceil(($exchange_fee + $nomalFJPY) * $exchange_rate)."円";
                      }else{
                        echo "-";
                      }

                      ?>
                    </td>
                  </tr>

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
                        echo ceil(($exchange_fee + $nomalSJPY) * $exchange_rate)."円";
                      }else{
                        echo "-";
                      }
                      ?>
                    </td>
                  </tr>
                </tbody>
              </table>

              <?php

              }else{
                echo "please enter the price and weight";
              }


              ?>

              <p>
                ※国際送料は下記の料金表よりご確認ください。
                <a href="./Introduce_Shipping_Cost_Table.php" target="_blank">国際送料の料金表はこちら</a><br>

              </p>



          <hr>




					<br><br><br>

          <h3><strong>KB-韓国銀行で認証したマーク</strong></h3>
          <!-- KB에스크로 이체 인증마크 적용 시작 -->
          <a href="https://okbfex.kbstar.com/quics?page=C021590&cc=b034066%3Ab035526&mHValue=f0f4addc6c64115728f9e442e2cbd511201902181019832"  targ et="_blank">
            <img src="http://img1.kbstar.com/img/escrow/escrowcmark.gif" border="0"/>
          </a>
          <!-- KB에스크로이체 인증마크 적용 종료 -->
					<br><br><br>




        </p>
      </div>

    </div>
