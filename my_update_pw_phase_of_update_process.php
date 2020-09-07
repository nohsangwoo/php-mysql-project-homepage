    <?php

    require("./config/conn.php");

    session_start();
    $user_id = (isset($_SESSION['ID'])) ? $_SESSION['ID'] : NULL ;




    $post_id = (isset($_POST['email'])) ? strip_tags(htmlspecialchars($_POST['email'])) : NULL ;
    $post_password = (isset($_POST['password'])) ? strip_tags(htmlspecialchars($_POST['password'])) : NULL ;



    if($user_id==null || $post_id == null){   //비로그인 상태에서 접근 불가 || 이전단계에서 값을 못받을시 접근 불가
      echo "<script>alert('ページのアクセス方式が間違っております。');history.back();</script>";
        exit;
    }



    $Hash = password_hash($post_password, PASSWORD_DEFAULT);





    $query = "UPDATE user SET  pw = :pw WHERE user_email = :user_email ";
    $st = $pdo->prepare($query);
    $st->bindparam(":user_email", $post_id);
    $st->bindparam(":pw", $Hash);


    $st->execute();


    echo "<script>alert(\"パスワードの設定が完了しました。\");</script>";  //


    header('Location: ./my_pw_infoPage.php');


     ?>
