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








    $email = (isset($_POST['email'])) ? $_POST['email'] : NULL ;
    $password = (isset($_POST['password'])) ? $_POST['password'] : NULL ;
    $name = (isset($_POST['name'])) ? $_POST['name'] : NULL ;
    $age = (isset($_POST['age'])) ? $_POST['age'] : NULL ;
    $address = (isset($_POST['address'])) ? $_POST['address'] : NULL ;
    $phone = (isset($_POST['phone'])) ? $_POST['phone'] : NULL ;
    $post_code = (isset($_POST['post_code'])) ? $_POST['post_code'] : NULL ;




    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);
    $name = htmlspecialchars($name);
    $age = htmlspecialchars($age);
    $address = htmlspecialchars($address);
    $phone = htmlspecialchars($phone);
    $post_code = htmlspecialchars($post_code);


    $password = password_hash($password, PASSWORD_DEFAULT);

    $is_e = isset($email);


    if( !($is_e) || $id_temp){   //아이디값이 없는경우(다른페이지에서 무작위로 접근한 경우) 접근거부
      echo "<script>alert('ページのアクセス方式が間違っております。');history.back();</script>";
      exit;
    }





    $customer_num=1;

    //db접속
    require("./config/conn.php");



    //삽입문
    $stmt = $pdo -> prepare("

           INSERT INTO user (user_email, pw	, username , age , address , post_code , phone)

           VALUE (:email, :pw, :name , :age , :address, :post_code, :phone )

     ");



     $stmt -> bindValue(":email", $email);

     $stmt -> bindValue(":pw", $password);

     $stmt -> bindValue(":name", $name);

     $stmt -> bindValue(":age", $age);

     $stmt -> bindValue(":address", $address);

     $stmt -> bindValue(":post_code", $post_code);

     $stmt -> bindValue(":phone", $phone);


     $stmt -> execute();






    header('Location: ./sign_up_infoPage.php');





     ?>

  </body>
</html>
