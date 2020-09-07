<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru&amp;subset=japanese" rel="stylesheet">

    <link rel="stylesheet" href="./wow/css/libs/animate.css">
    <script src="./wow/dist/wow.min.js"> </script>
    <script>  new WOW().init(); </script>


    <style media="screen">
    .kosugio_font{ font-family: 'Kosugi Maru', sans-serif; }
    .loading{
      position: absolute;
      top:50%;

      height: 100px;

      margin-left: auto;
      margin-right: auto;

    }
    </style>
  </head>
  <body class="kosugio_font">

    <?php

    require("./config/conn.php");

    session_start();
    $user_id = (isset($_SESSION['ID'])) ? $_SESSION['ID'] : NULL ;


    if($user_id){   //로그인 상태에서 접근 불가
      echo "<script>alert('ページのアクセス方式が間違っております。');history.back();</script>";
        exit;
    }


    $post_id = (isset($_POST['ID'])) ? strip_tags(htmlspecialchars($_POST['ID'])) : NULL ;
    

    $rand = generateRandomString(20);

    $RandHash = password_hash($rand, PASSWORD_DEFAULT);





    $query = "UPDATE user SET  AN = :AN WHERE user_email = :user_email ";
    $st = $pdo->prepare($query);
    $st->bindparam(":user_email", $post_id);
    $st->bindparam(":AN", $RandHash);


    $st->execute();




    //메일 보내기
    $to = $post_id;
    $subject = "fairyfloss 認証番号";
    $message = $rand;
    mail( $to, $subject, $message );





    //header('Location: ./my_forgot_pw_phase_of_verify.php');



    function generateRandomString($length) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }

     ?>


     <form class="" name="hiddenForm" action="./my_forgot_pw_phase_of_verify.php" method="post">
       <input type="hidden" name="email" value="<?php echo $post_id; ?>">
     </form>


     <div class="loading container-fluid text-center wow bounceInLeft">
       <div class="spinner-border text-primary text-center" style="width: 8rem; height: 8rem;" role="status ">
          <span class="sr-only" >Loading...</span>
       </div>
       <div class="" style="font-size:2.1em;">
        Loading...
       </div>

     </div>





     <script type="text/javascript">
       document.hiddenForm.submit();
     </script>

  </body>
</html>
