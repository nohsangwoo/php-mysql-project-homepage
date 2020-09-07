
<?
 $get_email = (isset($_GET['email'])) ? $_GET['email'] : NULL ;
 $get_verify = (isset($_GET['verify'])) ? $_GET['verify'] : NULL ;


 $get_email = strip_tags(htmlspecialchars($get_email));
 $get_verify = strip_tags(htmlspecialchars($get_verify));


 //db접속
 require("./config/conn.php");

// 쿼리를 담은 PDOStatement 객체 생성
 $stmt = $pdo -> prepare("SELECT AN FROM user WHERE user_email = :user_email");


 // PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
 $stmt -> bindValue(":user_email", $get_email);


 // PDOStatement 객체가 가진 쿼리를 실행
 $stmt -> execute();

 // PDOStatement 객체가 실행한 쿼리의 결과값 가져오기
 $row = $stmt -> fetch();


 $hash = $row['AN']; //db용

 if( password_verify($get_verify, $hash) ) {
   $verify = 1;
 }else{
   $verify = 0;
 }




?>

<script>
  var verify = <?php  echo json_encode($verify); ?>;
  if(verify == "1"){
      parent.document.getElementById("chk_id2").value="1";
      parent.alert("認証番号が確認されました。");  //인증번호가 확인됐습니다.
    }else{
      parent.document.getElementById("chk_id2").value="0";
      parent.alert("認証番号が一致しません。");  //인증번호가 일치하지 않습니다.
    }
</script>
