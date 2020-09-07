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
    $post_order_num = (isset($_POST['order_num'])) ? strip_tags(htmlspecialchars($_POST['order_num'])) : NULL ;

    // var_dump($post_order_num);


    $s6 = (isset($_POST['s6'])) ? strip_tags(htmlspecialchars($_POST['s6'])) : NULL ;


    if($s6 == NULL){
      $s6 = "x";
    }

    $up_state="4";
    //db접속
    require("./config/conn.php");

    $query = "UPDATE order_before A INNER JOIN order_before_price_second B
    ON A.order_id = B.order_before_pk
    SET A.state  = :state ,B.delivery_way  = :delivery_way , B.name  = :name, B.email  = :email, B.address  = :address, B.post_number  = :post_number, B.phone  = :phone, B.text  = :text, B.s_option  = :s_option
    where A.order_num = :order_num";


    $st = $pdo->prepare($query);
    $st->bindparam(":order_num", $post_order_num);
    $st->bindparam(":state", $up_state);
    $st->bindparam(":delivery_way", $delivery_way);
    $st->bindparam(":name", $name);
    $st->bindparam(":email", $email);
    $st->bindparam(":address", $address);
    $st->bindparam(":post_number", $post_number);
    $st->bindparam(":phone", $phone);
    $st->bindparam(":text", $text);
    $st->bindparam(":s_option", $s6);

    //
    $st->execute();
    //
    // $toemail = "fairyfloss0909@gmail.com";
    // $to = $toemail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
    //
    // $email_subject = $name." 님 2차결제 정보 (from fairyfloss's homepage)";
    //
    // $email_body = "\n배송방법: ".$delivery_way." \n이름: ".$name." \n주소: ".$address." \n전화번호: ".$phone."\n이메일: ".$email."\n내용: ".$text.
    // "\n서비스 옵션: ".$s6."\n우편번호: ".$post_number;
    //
    // $headers = "From: fairyfloss(메일문의)\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    // $headers .= "Reply-To: ".$email."";  //답장하는 메일
    // mail($to,$email_subject,$email_body,$headers);


    // header('Location: ./Shipping_info_contents_process_three_part3_process_info.php');


    ?>
    <form id="auto_submit" action="./Shipping_info_contents_process.php" method="post">
      <input type="hidden" name="order_num" value="<?php echo $post_order_num;?>">
    </form>
    <script type="text/javascript">
      this.document.getElementById("auto_submit").submit();
    </script>

  </body>
</html>
