<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>



    <?php

    require("./session_head.php");


    //왜그런진 모르겠는데 이걸가지고 조건문쓰려면  isset($user_id) 이상태로는 에러나서 변수에 저장함
    $id_temp = isset($user_id);



    $name = (isset($_POST['name'])) ? $_POST['name'] : NULL ;
    $age = (isset($_POST['age'])) ? $_POST['age'] : NULL ;
    $address = (isset($_POST['address'])) ? $_POST['address'] : NULL ;
    $phone = (isset($_POST['phone'])) ? $_POST['phone'] : NULL ;
    $post_code = (isset($_POST['post_code'])) ? $_POST['post_code'] : NULL ;




    $name = htmlspecialchars($name);
    $age = htmlspecialchars($age);
    $address = htmlspecialchars($address);
    $phone = htmlspecialchars($phone);
    $post_code = htmlspecialchars($post_code);





    if( !($name) || $id_temp==null){   //아이디값이 없는경우(다른페이지에서 무작위로 접근한 경우) 접근거부 || 비로그인시 접근불가
      echo "<script>alert('ページのアクセス方式が間違っております。');history.back();</script>";
      exit;
    }







    //db접속
    require("./config/conn.php");



    //업데이트문
    $query = "UPDATE `user`
    SET
    `username` =:username,
    `age` =:age,
    `address` =:address,
    `post_code` =:post_code,
    `phone` =:phone

    WHERE `user_email` = :user_email ";
    $st = $pdo->prepare($query);
    $st->bindparam(":user_email", $user_id);
    $st->bindparam(":username", $name);
    $st->bindparam(":age", $age);
    $st->bindparam(":address", $address);
    $st->bindparam(":post_code", $post_code);
    $st->bindparam(":phone", $phone);
    $st->execute();






    header('Location: ./my_page_update_infoPage.php');





     ?>

  </body>
</html>
