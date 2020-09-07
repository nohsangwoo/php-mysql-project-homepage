<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>


  </head>
  <body>


<!--메일보내기-->

    <?php

    echo "loading...";

    ini_set('display_errors', '0'); //일단 에러메시지 출력 off


    //recaptchaV3적용
    $captcha=$_POST['g-recaptcha-response'];
    $secretKey = "6LeDu40UAAAAAIykAENXF3I-5awuZ9U_5a85vQkM";
    $ip = $_SERVER['REMOTE_ADDR'];
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);
    if($responseKeys["success"]) {
      //통과한 경우의 코드를 작성
     }
    else {
      ?>
      <script type="text/javascript">
        // alert('');
      </script>

        <?php
     }





    $kind = (isset($_POST['kind'])) ? strip_tags(htmlspecialchars($_POST['kind'])) : NULL ;   //배송종류
    $name = (isset($_POST['name'])) ? strip_tags(htmlspecialchars($_POST['name'])) : NULL ;    //이름
    $email = (isset($_POST['email'])) ? strip_tags(htmlspecialchars($_POST['email'])) : NULL ;   //email
    $url = (isset($_POST['url'])) ? strip_tags(htmlspecialchars(implode( '|', $_POST['url'] ))) : NULL ;    //url |를 기준으로 배열을 합쳐줌
    $text = (isset($_POST['text'])) ? strip_tags(htmlspecialchars($_POST['text'])) : NULL ;   //contents
    $user_pk = (isset($_POST['user_pk'])) ? strip_tags(htmlspecialchars($_POST['user_pk'])) : NULL ;   //회원인지 회원인경우 fk 설정을 위해서

    if($name===null || $email===null || $url===null || $text===null){

      // // 변수에 이전페이지 정보를 저장
      // header('location:'.$prevPage);
      header('Location: http://ffss.kr');
    }else{






    //주문번호 생성
    $now = date("ymdHis"); //오늘의 날짜 년월일시분초
    $rand = strtoupper(substr(md5(uniqid(time())),0,6)) ; //임의의난수발생 앞6자리
    $orderNum = $now . $rand ;
    //
    // // gen order no
    // $now = date("ymdHis"); //오늘의 날짜 년월일시분초
    // $rand = strtoupper(substr(uniqid(sha1(time())),0,4)) ; //임의의난수발생 앞6자리
    // $orderNum = $now . $rand ;


    //-----주문번호 끝



        //db접속
        require("./config/conn.php");





        //삽입문
        $stmt = $pdo -> prepare("

               INSERT INTO order_before (user_id, kind, name , email	, url , text , order_num)

               VALUE (:pk, :kind, :name , :email , :url, :text, :order_num)

         ");


         $stmt -> bindValue(":pk", $user_pk);

         $stmt -> bindValue(":kind", $kind);

         $stmt -> bindValue(":name", $name);

         $stmt -> bindValue(":email", $email);

         $stmt -> bindValue(":url", $url);

         $stmt -> bindValue(":text", $text);

         $stmt -> bindValue(":order_num", $orderNum);

         $stmt -> execute();


         $taskIdx = $pdo->lastInsertId();  //insert된 pk값 가져오기





         //2차결제 삽입
         $stmt = $pdo -> prepare("

                INSERT INTO order_before_price_second (order_before_pk)

                VALUE (:order_before_pk)

          ");

          $stmt -> bindValue(":order_before_pk", $taskIdx);


          $stmt -> execute();





    $subject = $email." 님 견적문의"; //name



    // $email_body = "<a href=\"http://ffss.kr/re_first.php?para=".$kind."ㅔ".$name."ㅔ".$email."ㅔ".$url."ㅔ".$text."ㅔ".$taskIdx."\">".$email."의 견적문의</a>";
    $email_body = "<a href=\"http://ffss.kr/re_first.php?para=".$taskIdx."\">".$email."의 견적문의</a>";




    $message = $email_body;  //text



    $total = count($_FILES['upload']['name']);  //전송된 파일의 갯수 파악


    //첨부 파일 읽기
    for($i=0 ; $i <$total ; $i++){
      $fp = fopen($_FILES['upload']['tmp_name'][$i], "r");
      $file[$i] = fread($fp, $_FILES["upload"]["size"][$i]);
      fclose($fp);
    }




    $to = "fairyfloss0909@gmail.com"; //!!!TEST CODE

    $subject = "=?utf-8?b?".base64_encode($subject)."?=";  //제목

    //$email_subject = ." 님 문의 (from fairyfloss's homepage)";

    $boundary = md5(time()); //적당히 unique하게 만들어주면 됨

    $header =
      "From: $email\r\nX-Sender: $email\r\n".
      "MIME-Version: 1.0\r\n".
      "Content-Type: Multipart/mixed; boundary=\"$boundary\""; //1





    $body =
      "This is a multi-part message in MIME format.\r\n\r\n".
      "--$boundary\r\n".

      "Content-Type: text/html; charset=UTF-8\r\n".
      "Content-Transfer-Encoding: 8bit\r\n\r\n".
      $message."\r\n".
      "--$boundary\r\n";     //구간이 끝날때마다 반복


      for($i=0 ; $i <$total ; $i++){

        if($i==($total-1)){  //마지막엔 끝내줘야해서
          $body .= "Content-Type: application/octet-stream; name=\"".$_FILES["upload"]["name"][$i]."\"\r\n".  //내용
          "Content-Transfer-Encoding: base64\r\n".   //암호화방식
          "Content-Disposition: attachment; filename=\"".$_FILES["upload"]["name"][$i]."\"\r\n\r\n".  //첨부파일이라는것을 알림
          base64_encode($file[$i])."\r\n\r\n".
          "--$boundary--";  //구간이 끝날때마다 반복

        }else{
          $body .=
          "Content-Type: application/octet-stream; name=\"".$_FILES["upload"]["name"][$i]."\"\r\n".  //내용
          "Content-Transfer-Encoding: base64\r\n".   //암호화방식
          "Content-Disposition: attachment; filename=\"".$_FILES["upload"]["name"][$i]."\"\r\n\r\n".  //첨부파일이라는것을 알림
          base64_encode($file[$i])."\r\n\r\n".
          "--$boundary\r\n";  //구간이 끝날때마다 반복
        }
      }






    mail($to, $subject, $body, $header);






    // header('Location: ./mail_info.php');


    ?>


    <form method="post" name="info_form" action="./order_agent_mail_send_info.php">

    <input type="hidden" name="ordernum" value="<?php echo $orderNum;?>">

    <script>document.info_form.submit();</script>

    </form>

    <?php

    }
    ?>


  </body>
</html>
