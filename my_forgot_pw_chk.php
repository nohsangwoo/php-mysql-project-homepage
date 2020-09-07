
<?
 $get_email = (isset($_GET['email'])) ? $_GET['email'] : NULL ;


 $get_email = strip_tags(htmlspecialchars($get_email));


 //db접속
 require("./config/conn.php");

// 쿼리를 담은 PDOStatement 객체 생성
 $stmt = $pdo -> prepare("SELECT user_email FROM user WHERE user_email = :user_email");


 // PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
 $stmt -> bindValue(":user_email", $get_email);


 // PDOStatement 객체가 가진 쿼리를 실행
 $stmt -> execute();

 // PDOStatement 객체가 실행한 쿼리의 결과값 가져오기
 $row = $stmt -> fetch();


 $dbmail = $row['user_email']; //db용

 if( $dbmail ) {
   $verify = 1;
 }else{
   $verify = 0;
 }




?>

<script>
  var verify = <?php  echo json_encode($verify); ?>;
  if(verify == "1"){
      parent.document.getElementById("chk_id2").value="1";
      parent.alert("メールが確認されました。");  //메일이 확인됐습니다.
    }else{
      parent.document.getElementById("chk_id2").value="0"; //메일이 존재하지 않습니다.
      parent.alert("メールが存在しません。");
    }
</script>
