
<?

  $stmt = $pdo -> prepare("SELECT order_id, user_id, kind, name, email, order_num, state, date FROM order_before where state = :state");


// PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
  $stmt -> bindValue(":state", $state);


// PDOStatement 객체가 가진 쿼리를 실행
  $stmt -> execute();
// Fetch 모드를 설정  전체 출력용
 $stmt->setFetchMode(PDO::FETCH_ASSOC);

 // 1 row 씩 가져오기
 $Tnum = 0;
 while($row = $stmt->fetch()) {
   $Tnum++;
   ?>

         <tr>
           <th scope="row">
             <?php
             echo $row['order_id'];

             if($row['state']==="0"){
           ?>


             <form class="" action="./re_first.php?para=<?php echo $row['order_id'];?>" name="check_for_ordered" method="post">
               <input type="hidden" name="pk" value="<?php echo $row['order_id']; ?>">
               <input  type="submit" value="1차 견적 안내">
             </form>



           <?php }else if($row['state']==="1"){
             ?>

             <form class="" action="./re_first_ordered.php" name="check_for_ordered" method="post">
               <input type="hidden" name="pk" value="<?php echo $row['order_id']; ?>">
               <input  type="submit" value="1차 견적확인">
             </form>

             <?php
           }else if($row['state']==="2"){
             ?>

             <form class="" action="./re_first_ordered.php" name="check_for_ordered" method="post">
               <input type="hidden" name="pk" value="<?php echo $row['order_id']; ?>">
               <input  type="submit" value="1차 견적확인">
             </form>

             <?php
           }else if($row['state']==="3"){ ?>


             <form class="" action="./re_second.php" name="check_for_ordered" method="post">

               <input type="hidden" name="pk" value="<?php echo $row['order_id']; ?>">

               <input  type="submit" value="2차 견적 안내">

             </form>






           <?php }else{?>

             <form class="" action="./re_ordered_content.php" name="check_for_ordered" method="post">

               <input type="hidden" name="pk" value="<?php echo $row['order_id']; ?>">

               <input  type="submit" value="견적확인">
             </form>

           <?php } ?>


           </th>
           <td><?php
           if($row['user_id']==="0"){
             echo "<div style=\"color:red;\">비회원</div>";
           }else{
             echo $row['user_id'];
           }

            ?></td>
           <td>
             <?php
           if($row['kind']==="1"){
             echo "1.구매대행";
           }else if($row['kind']==="2"){
             echo "2.결제대행";
           }else if($row['kind']==="3"){
             echo "3.출장대행";
           }else if($row['kind']==="4"){
             echo "4.기타대행";
           }
            ?></td>


           <td><?php echo $row['name']; ?></td>
           <td><?php echo $row['email']; ?></td>
           <td><?php echo $row['order_num']; ?></td>
           <td><?php
           if($row['state']==="0"){

             echo "<div style=\"color:red;\">0 - 답변대기</div>";

           }else if($row['state']==="1"){
             // echo "1 - 문의완료<br>(1차 입금대기중)";
             ?>

             <form class="<?php echo "update_one".$Tnum; ?>" action="./re_state_update.php" name="" method="post">

               <input type="hidden" name="pk" value="<?php echo $row['order_id']; ?>">

               <input class="" type="hidden" name="state" value="2">

               <input  type="button" value="1차 입금확인" onclick="DepositeCheck('<?php echo $Tnum;?>')">

             </form>


             <?php


           }else if($row['state']==="2"){
             // echo "2 - 1차결제 입금확인<br>(한국내 주문진행 시작)";

             ?>

             <form class="<?php echo "update_two".$Tnum; ?>" action="./re_state_update.php" name="" method="post">

               <input type="hidden" name="pk" value="<?php echo $row['order_id']; ?>">

               <input type="hidden" name="state" value="3">

               <input  type="button" value="상품 도착 완료" onclick="firstOrderCheck('<?php echo $Tnum;?>')">




             </form>


             <?php




           }else if($row['state']==="3"){
             // echo "3 - 한국내 배송완료<br>(2차결제 입금대기중)";
             ?>

             <form class="<?php echo "update_three".$Tnum; ?>" action="./re_state_update.php" name="" method="post">

               <input type="hidden" name="pk" value="<?php echo $row['order_id']; ?>">

               <input type="hidden" name="state" value="4">

               <input  type="button" value="2차결제 안내 확인" onclick="SPACheck('<?php echo $Tnum;?>')">


             </form>


             <?php

           }else if($row['state']==="4"){
             // echo "4 - 2차결제 입금확인<br>(국제배송 진행)";

             ?>

             <form class="<?php echo "update_four".$Tnum; ?>" action="./re_state_update.php" name="" method="post">

               <input type="hidden" name="pk" value="<?php echo $row['order_id']; ?>">

               <input type="hidden" name="state" value="5">

               <input  type="button" value="2차결제 입금확인" onclick="SPDCheck('<?php echo $Tnum;?>')"> <!--Second Payment Deposite Check 약자-->

             </form>


             <?php

           }else if($row['state']==="5"){
             // echo "5 - 배송상태<br>(운송장번호)";

             ?>

             <form class="<?php echo "update_five".$Tnum; ?>" action="./re_state_update_tn.php" name="" method="post">

               <input type="text" class="form-control" id="tn" name="tn" value="" required autocomplete="off" >

               <input type="hidden" name="pk" value="<?php echo $row['order_id']; ?>">

               <input type="hidden" name="state" value="6">

               <input  type="button" value="운송장번호 업데이트" onclick="TNUCheck('<?php echo $Tnum;?>')"> <!--transport Number Check 약자-->

             </form>


             <?php


           }
            ?></td>
           <td><?php echo $row['date']; ?></td>
         </tr>
     <?php
 }


 ?>



<script type="text/javascript">

var Tnum = <?php  echo json_encode($Tnum); ?>; //반복횟수 확인


function DepositeCheck(param1) {

  if (confirm("1차 입금을 확인했습니까?") == true){    //확인
    $('.update_one'+param1).submit();
  }else{   //취소
      return false;
  }
}






function firstOrderCheck(param1) {
  if (confirm("고객님의 물건이 도착 완료했습니까?") == true){    //확인
      $('.update_two'+param1).submit();
  }else{   //취소
      return false;
  }
}



function SPACheck(param1) {
  if (confirm("물품검수 및 2차 결제 안내를 완료했습니까?") == true){    //확인
      $('.update_three'+param1).submit();
  }else{   //취소
      return false;
  }
}




function SPDCheck(param1) {
  if (confirm("2차 결제금액의 입금확인을 하였습니까?") == true){    //확인
      $('.update_four'+param1).submit();
  }else{   //취소
      return false;
  }
}


function TNUCheck(param1) {
  if (confirm("2차 국제 배송을 완료 하였습니까?") == true){    //확인
      $('.update_five'+param1).submit();
  }else{   //취소
      return false;
  }
}




</script>
