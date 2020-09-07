
<?

 $id = (isset($_GET['userid'])) ? $_GET['userid'] : NULL ;
 $id = htmlspecialchars($id);

 //db접속
 require("./config/conn.php");


 // 쿼리를 담은 PDOStatement 객체 생성
 $stmt = $pdo -> prepare("SELECT user_email,Whitdraw FROM user WHERE user_email = :user_email");


 // PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
 $stmt -> bindValue(":user_email", $id);


 // PDOStatement 객체가 가진 쿼리를 실행
 $stmt -> execute();

 // PDOStatement 객체가 실행한 쿼리의 결과값 가져오기
 $row = $stmt -> fetch();




 $temp_id = $row['user_email'];
 $temp_Whitdraw = $row['Whitdraw'];





?>
<script>
 var id = <?php  echo json_encode($temp_id); ?>;
 var Whitdraw = <?php  echo json_encode($temp_Whitdraw); ?>;

 if(id != null && Whitdraw === "1" ){
 parent.document.getElementById("chk_id2").value="0";
 parent.alert("既に使用中のIDです。");
 }
 else{
 parent.document.getElementById("chk_id2").value="1";
 parent.alert("使用可能なIDです。");
}
</script>
