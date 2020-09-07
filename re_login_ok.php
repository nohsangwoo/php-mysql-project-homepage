<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    <?php



      $user_id = (isset($_POST['ID'])) ?  strip_tags(htmlspecialchars($_POST['ID'])) : NULL ;
      $user_pw = (isset($_POST['PW'])) ?  strip_tags(htmlspecialchars($_POST['PW'])) : NULL ;



      //아이디 or 비번 입력안했을때 되돌림
        if( ($user_id==null) ||  ($user_pw==null) ) {
          echo "<script>alert('아뒤랑 비번 입력하셈');history.back();</script>";
          exit;
        }


      //db접속
      require("./config/conn.php");




      // 쿼리를 담은 PDOStatement 객체 생성
      $stmt = $pdo -> prepare("SELECT pk,id,pw FROM ffss_admin where id = :id");


      // PDOStatement 객체가 가진 쿼리의 파라메터에 변수 값을 바인드
      $stmt -> bindValue(":id", $user_id);

      // PDOStatement 객체가 가진 쿼리를 실행
      $stmt -> execute();

      // PDOStatement 객체가 실행한 쿼리의 결과값 가져오기
      $row = $stmt -> fetch();





      $hash = $row['pw'];



      //비밀번호 확인
      if( password_verify($user_pw, $hash) ) {
        //로긴 성공시 세션값 저장
        session_start();

        //초광역변수에 아이디값 저장
        $_SESSION['AD_PK'] = $row['pk'];
        $_SESSION['AD_ID'] = $row['id'];




        header('Location: ./re_index.php');

      }else{
        //로긴 실패시 돌아감
        echo "<script>alert('로그인실패');history.back();</script>";
        exit;
      }


      ?>

  </body>
</html>
