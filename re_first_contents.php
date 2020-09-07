


    <?php




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




        $YEN = 100; //엔
        $WON =  $won_temp[0];  //원

        $exchange_rate = $YEN / $WON;  //100엔당 얼마(환율  엔->원  환전시)

    ?>

      <script language='javascript'>


      var exchange_rate = <?php  echo json_encode($exchange_rate)?>;  //php의 환율계산한 값을 가져옴


      function focusrepackaging(){
        SumPrice();

      }

      function Sumrepackaging(){
        SumPrice();
      }




      function agent_fee(product_price){   //구매대행수수료
        if(product_price > 300000){    //30만원이상 수수료 5%
          return fee = product_price * 0.05;
        }else if(product_price > 100000){  //10만원~30만원 수수료 1만원
          return fee = 10000;
        }else if(product_price > 50000){   //5만원~10만원 수수료 6천원
          return fee = 6000;
        }else {    //5만원 미만 수수료 4천원
          return fee = 4000;
        }
      }

      function kr_tax(product_price){  //한국내세금
        return Math.ceil(product_price * 0.044);

      }

      function Repackaging(){
        var count = parseInt(document.getElementById("count").value); //url 갯수 지역변수
        if (count>1){
          return 5000;
        }else{
          return 0;
        }
      }



        function SumPrice()  //상품가격 자동합계
        {
          var count = parseInt(document.getElementById("count").value);  //url 갯수 세려고

          if(count > 0){
            var temSum = 0;

            for(i=0 ; i<count ; i++){
              var parseString = String(i);
              var tempP;
              if(document.getElementById('price'+parseString).value==""  || document.getElementById('price'+parseString).value=="0"){
                tempP = 0;
              }else{
                tempP = parseInt(document.getElementById('price'+parseString).value);
              }
               temSum = temSum + tempP;
            }

            var commodityV = temSum;  //상품가격

             var agent_feeV = agent_fee(temSum);  //대행 수수료 계산
             document.getElementById('agent_fee').value = agent_feeV;


            var RepackagingV = Repackaging();  //재포장 비용
            document.getElementById('Repackaging').value = RepackagingV;



             var exchange_feeV = 4000;   //은행수수료
             document.getElementById('exchange_fee').value = exchange_feeV;


             var kr_taxV = kr_tax(commodityV); //한국내 세금
             document.getElementById('kr_tax').value = kr_taxV;



             var totalSum = commodityV + agent_feeV + RepackagingV + exchange_feeV + kr_taxV;  //상품가격   + 대행수수료 + 재포장비용(상자+뽁뽁이) + 은행 수수료 + 한국내 세금
             document.getElementById('totalPrice').value = totalSum;


             var totalDFIK = parseInt(document.getElementById('totalDFIK').value);  //한국내 배송료


             jpyV = Math.ceil((totalSum + totalDFIK)*exchange_rate);   //환율을 적용한 값 총계
             document.getElementById('JPYV').value = jpyV;


             var paypalV = Math.ceil((jpyV + (((jpyV*0.044)+40)+150)));
             document.getElementById('paypal').value = paypalV;
          }
        }




        function SumDFIK()     //한국내 배송료 자동합계
        {
          var count = parseInt(document.getElementById("count").value);  //url 갯수 세려고

          if(count > 0){
            var temSum = 0;
            for(i=0 ; i<count ; i++){
              var parseString = String(i);
              var tempP;
              if(document.getElementById('DFIK'+parseString).value=="" || document.getElementById('DFIK'+parseString).value=="0"){
                tempP = 0;
              }else{
                tempP = parseInt(document.getElementById('DFIK'+parseString).value);
              }
               temSum = temSum + tempP;
            }
            document.getElementById('totalDFIK').value = temSum;
            SumPrice();
          }
        }



        function focusPrice(i){    //커서를 상품가격 입력창을 클릭했을때 발동
          parseString = String(i);
          document.getElementById('price'+parseString).value="";
          SumPrice();
        }



        function focusDFIK(i){  //커서를 한국내 배송가격 입력창을 클릭했을때 발동
          parseString = String(i);
          document.getElementById('DFIK'+parseString).value="";
          SumDFIK();

        }






        </script>




    <?php



    $get_parameter = (isset($_GET['para'])) ? $_GET['para'] : NULL ;
    $get_parameter = strip_tags(htmlspecialchars($get_parameter));

    var_dump($get_parameter);




    //db접속
    require("./config/conn.php");


    // 쿼리를 담은 PDOStatement 객체 생성
    $stmt = $pdo -> prepare("SELECT kind,name,email,url,text FROM order_before WHERE order_id = :order_id");


    // PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
    $stmt -> bindValue(":order_id", $get_parameter);


    // PDOStatement 객체가 가진 쿼리를 실행
    $stmt -> execute();

    // PDOStatement 객체가 실행한 쿼리의 결과값 가져오기
    $row = $stmt -> fetch();




    $kind = $row['kind'];
    $name = $row['name'];
    $email = $row['email'];
    $url = $row['url'];
    $text = $row['text'];


    // $strPR = explode('ㅔ',$get_parameter);  //,를 기준으로 배열을 나눠줌
    // kine(문의종류)   1.구매대행 , 2결제대행, 3출장대행 , 4기타대행
    // name(이름)
    // email(이메일)
    // URL   | 를 기준으로 다시 explode해줘야함
    // text  내용












    if($kind === "1"){
      $kind = "1.구매대행";
    }else if($kind === "2"){
      $kind = "2.결제대행";
    }else if($kind === "3"){
      $kind = "3.출장대행";
    }else if($kind === "4"){
      $kind = "4.기타대행";
    }

    //---------------------url구하기-----------------------------------
    $strURL = explode('|',$url);  //| 을 기준으로 배열로 나눔 (URL)

    //------------------------------------url구하기 끝----------------------








//
//
//     if($product_price!=NULL){
//
//
//
//       /*---------------------서비스옵션---------------------*/
//       $Repackaging1=0;
//       $Repackaging2=0;
//       $storage_service=0;
//
//       if($s2=='O'){  $Repackaging1 = 500; }     //정리포장
//       if($s3=='O'){  $Repackaging2 = 500; }    //재포장
//       if($s4=='O'){  $storage_service = 1000; }  //보관서비스
//
//
//       /*---------------------보험료---------------------*/
//       $Insurance=0;
//       if($s1=='O'){
//         $Insurance = $product_price/114300 ;
//         $Insurance=550*(int)$Insurance;
//         $Insurance+=2800;
//       }
//
//
//
// }




    ?>



    <div class="container">
      <button class="btn btn-primary" onclick="myCaptureFunction()">캡쳐</button> <!--캡쳐 작동시키는 버튼이 최상단에 와야지만 작동함..왠진 모름-->
    </div>



    <a id="target" style="display: none"></a>



    <script type="text/javascript">


    // *****중요!!!!
    //캡쳐기능이 왜인지는 모르겠지만 버튼이랑 스크립트가 최상단에 와야 작동함...
    function myCaptureFunction() {

      var email = <?php  echo json_encode($email)?>;


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

       el.download = email+'|'+today +'.jpg';   //다운로드 파일명 지정

       el.click();

        });
    }

    </script>



    <div class="container" style="margin-top: 30px;">  <!--name으로 전달값 식별-->
      <form class="" action="./re_first_process.php" method="post" onsubmit="return validate();">


        <div class="form-group">
          <label for="kind">배송종류</label>
          <input name="kind" type="text" class="form-control" id="kind"  required value="<?php echo $kind;?>">
        </div>



        <div class="form-group">
          <label for="name">이름</label>
          <input name="name" type="text" class="form-control" id="name"  required value="<?php echo $name;?>">
        </div>


        <div class="form-group">
          <label for="email">email</label>
          <input name="email" type="text" class="form-control" id="email"  required value="<?php echo $email;?>">
        </div>


        <div class="form-group">
          <label for="content">내용</label>
          <textarea class="form-control"  rows="10" required readonly placeholder="<?php echo $text;?>" value="<?php echo $text;?>"></textarea>
        </div>


        <div class="" id="ct">

          <div class="text-center border_guide">
            <?php echo $name;?>様 こんにちは。Fairyflossです。<br>
            ご依頼の見積り金額をお知らせ致します。<br>
          （送料は含まれていないため、別途お知らせいたします）

          </div>

          <div class=""  style="text-align:center;">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">URL</th>
                  <th scope="col">PRICE</th>
                  <th scope="col">Delivery fee<br>in Korea</th>
                </tr>
              </thead>
              <tbody>
                <?php  //url 표시


                $strURL = array_filter($strURL); //빈 배열제거


                $http="http";
                $https="https";
                for($i=0 ; $i < count($strURL) ;  $i++){

                  if(strpos($strURL[$i],'http') ===  false ){   //http, https가 포함이 안됐다면
                    $strURL[$i] = $http."://".$strURL[$i];   //http:// 를 추가해줌
                  }

                ?>




                <tr>
                  <th scope="row"><?php echo ($i+1); ?></th>
                  <td><a href="<?php echo $strURL[$i];?>" target="_blank"><?php echo $strURL[$i];?></a></td>
                  <th><input type="text" class="form-control" id="price<?php echo $i; ?>"  name="price[]"  required onclick="focusPrice(<?php echo $i; ?>)" onkeyup='SumPrice()' value="0"></td>
                  <td><input type="text" class="form-control" id="DFIK<?php echo $i; ?>"   name="DFIK[]"  onclick="focusDFIK(<?php echo $i; ?>)" onkeyup='SumDFIK()' value="0"></td>

                </tr>
                  <?php  }  ?>

                  <input type="hidden" name="" id="count" value="<?php echo $i; ?>">



                  <tr>
                    <th scope="row"><?php echo ++$i; ?></th>
                    <td>代行手数料</td>
                    <td><input type="text" class="form-control" readonly  id="agent_fee" name="" value="0"> </td>
                    <td><input type="hidden" class="form-control" id="" value="0"></td>
                  </tr>


                  <tr>
                    <th scope="row"><?php echo ++$i; ?></th>
                    <td>再包装</td>
                    <td><input type="text" class="form-control" readonly id="Repackaging" onclick="focusrepackaging()" onkeyup='Sumrepackaging()' name="" value="0"> </td>
                    <td><input type="hidden" class="form-control" id="" value="0"></td>
                  </tr>


                  <tr>
                    <th scope="row"><?php echo ++$i; ?></th>
                    <td>銀行手数料</td>
                    <td><input type="text" class="form-control"  readonly id="exchange_fee" name="exchange_fee" value="0"> </td>
                    <td><input type="hidden" class="form-control" id="" value="0"></td>
                  </tr>



                  <tr>
                    <th scope="row"><?php echo ++$i; ?></th>
                    <td>韓国内税金	</td>
                    <td><input type="text" class="form-control" readonly id="kr_tax" name="" value="0"> </td>
                    <td><input type="hidden" class="form-control" id="" value="0"></td>
                  </tr>




                  <tr>
                    <th scope="row"><?php echo ++$i; ?></th>
                    <td>total(KRW)</td>
                    <th><input type='text' name='totalPrice' readonly id='totalPrice' value="0"></td>
                    <td><input type='text' name='totalDFIK' readonly id='totalDFIK' value="0"></td>
                  </tr>



                  <div class="form-group a">
                    <input name="order_before_pk" type="hidden" class="form-control" required value="<?php echo $get_parameter;?>">
                    <input name="exchange_rate" type="hidden" class="form-control" required value="<?php echo $exchange_rate;?>">
                  </div>



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
                  <th scope="row"><?php echo ++$i; ?></th>
                  <td>為替レート( 円 -> ウォンへ両替時)</td>
                  <td><?php echo $YEN."円 -> ".$WON."ウォン";?></td>
                </tr>



                <tr>
                  <th scope="row"><?php echo ++$i; ?></th>
                  <td>銀行振込（三菱UFJ銀行）</td>
                  <td><input type="text" class="form-control" readonly id="JPYV" name="" value="0"> </td>
                </tr>



                <!-- <tr>
                  <th scope="row"><?php //echo ++$i; ?></th>
                  <td>Paypal 決済利用料 ( 4.4% + 40円 ) + paypal 手数料 (150円)</td>
                  <td><input type="text" class="form-control" readonly id="paypal" name="" value="0"> </td>
                </tr> -->

              </tbody>
            </table>

          </div>

          <div class="text-center border_guide" >
            決済は、Paypalまたは銀行振込（三菱UFJ銀行）をご選択いただけます。
          </div>




          <div class="text-center border_guide" >
            お客様の1次決済金額は、こちらになります。<br>
            （配送料は、実際に商品が到着して重さを計らないと分からないため、1次決済では配送料を頂いておりません。<br>
            商品がこちらに到着後、重さを測定して正式な配送料の値段が確定しましたら、2次決済で配送料のみお振込みをお願いしております。）
          </div>


          <div class="container text-center">
            <img src="./img/bank.png" width="50%"; height="auto" alt="">
          </div>

          <div class="text-center border_guide">
            こちらに送金していただければ確認後すぐ注文いたします。
          </div>


        </div>  <!--end of capture area-->





          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">MY URL</th>
              </tr>
            </thead>
            <tbody>
              <?php  //내가 따로 알아본 상품의 url 저장
              for($i=0 ; $i < count($strURL) ;  $i++){
               ?>

               <input type="text" class="form-control" name="Myurl" value="">

               <tr>
                 <th scope="row"><?php echo ($i+1); ?></th>
                 <td><input type="text" class="form-control"  name="Myurl[]"  value=""></td>
               </tr>

               <?php
             }
                ?>

            </tbody>
          </table>



          <script language="javascript">






           function chid(){ //아이디(email) 중복체크 기능

            document.getElementById("chk_id2").value=0  //히든 값 0으로 일단

            var order_befire_pk = <?php  echo json_encode($get_parameter); ?>;

            ifrm1.location.href="re_first_chk.php?order_befire_pk="+order_befire_pk;  //해당 페이지로 get방식으로보냄\
            // ifrm1.location.href="re_first_chk.php?email=" + id + "&verify=" + verify;  //해당 페이지로 get방식으로보냄
           }


           function validate() {
               if(chk_id2.value == "1") {
                  alert("답변이 완료된 문의입니다."); //인증번호를 확인해주세요
                  return false;
               }
               if(chk_id2.value == "3") {
                  alert("답변 확인 체크를 해주세요"); //인증번호를 확인해주세요
                  return false;
               }
           }
          </script>

          <iframe src="" id="ifrm1" scrolling=no frameborder=no width=0 height=0 name="ifrm1"></iframe> <!--눈에 안보이는 iframe 생성-->





          <input type=button class="btn btn-danger" value="문의 여부 체크" onclick=chid();>
          <input type=hidden id="chk_id2" name=chk_id2 value="3">






        <div class="container" style="text-align:center;">
          <p style="margin-top:100px;">
            <input type="submit" class="btn btn-outline-dark" name="" value="답변완료 체크" style="width:200px;">
          </p>
        </div>

     </form>

    </div>
