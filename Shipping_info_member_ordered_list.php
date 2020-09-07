
<?php



      //db접속
      require("./config/conn.php");


      $stmt = $pdo -> prepare("SELECT ob.kind, ob.order_num, ob.state, ob.TransportNum, ob.date FROM
      user AS us inner join  order_before AS ob ON us.id = ob.user_id where us.id = :user_pk order by us.id asc");

      // PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
      $stmt -> bindValue(":user_pk", $user_pk);


       // PDOStatement 객체가 가진 쿼리를 실행
       $stmt -> execute();







       // Fetch 모드를 설정  전체 출력용
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        ?>



        <div class="container">
          <table class="table table-borderless" >
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col" >代行サービス</th>
                <th scope="col">注文番号</th>
                <th scope="col">状態</th>
                <th scope="col">運送状番号(郵便局)</th>
                <th scope="col">日付</th>
              </tr>
            </thead>
            <tbody>

          <?php
          $num=0;
          while($row = $stmt->fetch()) {
            $num++;
            ?>



            <tr onClick="submitON(<?php echo $num;?>)"  style="cursor:pointer;">
              <th scope="row"><?php echo $num;?></th>
              <td><?php
              if($row['kind']==="1"){
                echo "購買代行";
              }else if($row['kind']==="2"){
                echo "決済代行";
              }else if($row['kind']==="3"){
                echo "出張代行";
              }else if($row['kind']==="4"){
                echo "その他代行";
              }?></td>
              <td><?php echo $row['order_num'];?>

                <form id="tr<?php echo $num;?>" action="Shipping_info_contents_process.php" method="post">
                  <input type="hidden" name="order_num" value="<?php echo $row['order_num'];?>">
                </form>

              </td>
              <td><?php

              if($row['state']==="0"){
                echo "Step1";
              }else if($row['state']==="1"){
                echo "Step2";
              }else if($row['state']==="2"){
                echo "Step3";
              }else if($row['state']==="3"){
                echo "Step4";
              }else if($row['state']==="4"){
                echo "Step5";
              }else if($row['state']==="5"){
                echo "Step6";
              }else if($row['state']==="6"){
                echo "Step7";
              }

              ?></td>
              <td><?php echo $row['TransportNum'];?></td>
              <td><?php echo $row['date'];?></td>
            </tr>


            <?php

          }
          ?>


        </tbody>
      </table>
    </div>

    <script type="text/javascript">
    function submitON(i) {
      // alert(i);
      TempS=String(i);
        document.getElementById('tr'+TempS).submit();

      }





    </script>
