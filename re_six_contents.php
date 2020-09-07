
<?

  $stmt = $pdo -> prepare("SELECT order_id, user_id, kind, name, email, order_num, TransportNum, date FROM order_before where state = :state");


// PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
  $stmt -> bindValue(":state", $state);


// PDOStatement 객체가 가진 쿼리를 실행
  $stmt -> execute();
// Fetch 모드를 설정  전체 출력용
 $stmt->setFetchMode(PDO::FETCH_ASSOC);

 // 1 row 씩 가져오기
 while($row = $stmt->fetch()) {
   ?>

         <tr>
           <th scope="row"><?php echo $row['order_id']; ?>

             <form class="" action="./re_ordered_content.php" name="check_for_ordered" method="post">

               <input type="hidden" name="pk" value="<?php echo $row['order_id']; ?>">

               <input  type="submit" value="견적확인">
             </form>


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
           <td><?php echo $row['TransportNum']; ?></td>
           <td><?php echo $row['date']; ?></td>
         </tr>
     <?php
 }
 ?>



<script type="text/javascript">



</script>
