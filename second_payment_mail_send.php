<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>


<!--메일보내기-->
    <?php
    $delivery_way = (isset($_POST['delivery_way'])) ? strip_tags(htmlspecialchars($_POST['delivery_way'])) : NULL ;
    $name = (isset($_POST['name'])) ? strip_tags(htmlspecialchars($_POST['name'])) : NULL ;
    $address = (isset($_POST['address'])) ? strip_tags(htmlspecialchars($_POST['address'])) : NULL ;
    $post_number = (isset($_POST['post_number'])) ? strip_tags(htmlspecialchars($_POST['post_number'])) : NULL ;
    $phone = (isset($_POST['phone'])) ? strip_tags(htmlspecialchars($_POST['phone'])) : NULL ;
    $email = (isset($_POST['email'])) ? strip_tags(htmlspecialchars($_POST['email'])) : NULL ;
    $text = (isset($_POST['text'])) ? strip_tags(htmlspecialchars($_POST['text'])) : NULL ;
    $order_before_pk = (isset($_POST['pk'])) ? strip_tags(htmlspecialchars($_POST['pk'])) : NULL ;


    // $s1 = (isset($_POST['s1'])) ? strip_tags(htmlspecialchars($_POST['s1'])) : NULL ;
    // $s2 = (isset($_POST['s2'])) ? strip_tags(htmlspecialchars($_POST['s2'])) : NULL ;

    $s6 = (isset($_POST['s6'])) ? strip_tags(htmlspecialchars($_POST['s6'])) : NULL ;
    // $s7 = (isset($_POST['s7'])) ? strip_tags(htmlspecialchars($_POST['s7'])) : NULL ;



    //
    // var_dump($get_parameter);
    // var_dump($delivery_way);
    // var_dump($name);
    // var_dump($address);
    // var_dump($phone);
    // var_dump($email);
    // var_dump($order_before_pk);
    // var_dump($s6);



    // if($delivery_way == "1"){
    //   $delivery_way="EMS";
    // }else if($delivery_way == "2"){
    //   $delivery_way="国際小包(航空)";
    // }else if($delivery_way == "3"){
    //   $delivery_way="国際小包(船便)";
    // }else{
    //   $delivery_way="선택안함";
    // }

    // if($s1 == NULL){
    //   $s1 = "x";
    // }
    //
    // if($s2 == NULL){
    //   $s2 = "x";
    // }


    if($s6 == NULL){
      $s6 = "x";
    }

    // if($s7 == NULL){
    //   $s7 = "x";
    // }

    //db접속
    require("./config/conn.php");
    //
    // $query = "UPDATE order_before_price_second SET  delivery_way  = :delivery_way, name  = :name, address  = :address, phone  = :phone, option  = :option WHERE order_before_pk = :order_before_pk ";
    // $st = $pdo->prepare($query);
    // $st->bindparam(":order_before_pk", $order_before_pk);
    // $st->bindparam(":delivery_way", $delivery_way);
    // $st->bindparam(":name", $name);
    // $st->bindparam(":address", $address);
    // $st->bindparam(":phone", $phone);
    // $st->bindparam(":option", $s6);
    // $st->execute();

    $query = "UPDATE order_before_price_second SET  delivery_way  = :delivery_way,name  = :name,email  = :email, address  = :address, post_number  = :post_number, phone  = :phone,text  = :text,s_option  = :s_option  WHERE order_before_pk = :order_before_pk ";
    $st = $pdo->prepare($query);
    $st->bindparam(":order_before_pk", $order_before_pk);
    $st->bindparam(":delivery_way", $delivery_way);
    $st->bindparam(":name", $name);
    $st->bindparam(":email", $email);
    $st->bindparam(":address", $address);
    $st->bindparam(":post_number", $post_number);
    $st->bindparam(":phone", $phone);
    $st->bindparam(":text", $text);
    $st->bindparam(":s_option", $s6);


    $st->execute();

    // $query = "UPDATE order_before_price_second SET  delivery_way = :delivery_way WHERE user_email = :user_email ";
    // $st = $pdo->prepare($query);
    // $st->bindparam(":user_email", $post_id);
    // $st->bindparam(":pw", $Hash);
    //
    //
    // $st->execute();






    //
    // $toemail = "fairyfloss0909@gmail.com";
    // $to = $toemail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
    //
    // $email_subject = $name." 님 2차결제 정보 (from fairyfloss's homepage)";
    //
    // $email_body = "\n배송방법: ".$delivery_way." \n이름: ".$name." \n주소: ".$address." \n전화번호: ".$phone."\n이메일: ".$email."\n내용: ".$text.
    // "\n보험가입: ".$s7."\n서비스 옵션1(まとめ梱包): ".$s1."\n서비스 옵션2(詳細写真): ".$s2."\n서비스 옵션6(有料保管サービス): ".$s6;
    //
    // $headers = "From: fairyfloss(메일문의)\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    // $headers .= "Reply-To: ".$email."";  //답장하는 메일
    // mail($to,$email_subject,$email_body,$headers);
    header('Location: ./second_payment_mail_info.php');
    ?>

  </body>
</html>
