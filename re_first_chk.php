
<?

 $order_befire_pk = (isset($_GET['order_befire_pk'])) ? $_GET['order_befire_pk'] : NULL ;
 $order_befire_pk = htmlspecialchars($order_befire_pk);

 //db접속
 require("./config/conn.php");


 // 쿼리를 담은 PDOStatement 객체 생성
 $stmt = $pdo -> prepare("SELECT state FROM order_before WHERE order_id = :order_id");


 // PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
 $stmt -> bindValue(":order_id", $order_befire_pk);


 // PDOStatement 객체가 가진 쿼리를 실행
 $stmt -> execute();

 // PDOStatement 객체가 실행한 쿼리의 결과값 가져오기
 $row = $stmt -> fetch();




 $temp_order_befire_pk = $row['state'];






?>
<script>
 var order_befire_pk = <?php  echo json_encode($temp_order_befire_pk); ?>;

 if(order_befire_pk === "0" ){
 parent.document.getElementById("chk_id2").value="0";
 parent.alert("답변 미완료!");
 }
 else{
 parent.document.getElementById("chk_id2").value="1";
 parent.alert("답변 완료");
}
</script>
