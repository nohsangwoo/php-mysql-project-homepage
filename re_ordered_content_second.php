<?php

$name = $row['name'];
$email = $row['email'];
$address = $row['address'];
$phone = $row['phone'];
$text = $row['text'];
$s_option = $row['s_option'];
$delivery_way = $row['delivery_way'];

 ?>
<div style="margin-top:15em;"class="container">

  <div class="">
    <p>
      <h1>3-二次決済</h1>
    </p>
  </div>
  <hr>

  <div style="text-align: center; margin-top:5em; margin-bottom:2em;">
    <h2 class="Word_Color_orange">二次決済のための情報</h2>
  </div>

  <form name="form" action="re_ordered_content_second_process.php" method="post" enctype="multipart/form-data">
    <select name="delivery_way" class="custom-select custom-select-sm contact_string" required>
      <option value="">配送方法(選んでください!!)</option>
      <option value="1" <?php if($delivery_way==="1"){echo "selected";}?>>EMS</option>
      <option value="2" <?php if($delivery_way==="2"){echo "selected";}?>>国際小包(航空)</option>
      <option value="3" <?php if($delivery_way==="3"){echo "selected";}?>>国際小包(船便)</option>
      <!-- <option value="4">EMSプレミアム</option> -->
    </select>
    <input class="form-control form-control-sm second_payment_form_margin_top" name ="name" type="text" value="<?php echo $name;?>"  required >
    <input class="form-control form-control-sm second_payment_form_margin_top" name ="address" type="text" value="<?php echo $address;?>"  required >
    <input class="form-control form-control-sm second_payment_form_margin_top" name ="phone" type="text" value="<?php echo $phone;?>"  required >
    <input class="form-control form-control-sm second_payment_form_margin_top" name ="email" type="text" value="<?php echo $email;?>"  required >
    <textarea class="form-control" name="text"  rows="10" required ><?php echo $text;?></textarea>





    <!-- <div style="margin-top:1em;" class="">
      <div class="custom-control custom-switch">
        <input name ="s7" type="checkbox" value="O" class="custom-control-input" id="s7">
        <label class="custom-control-label" for="s7">EMS　保険加入</label>
      </div>
    </div>
    <hr> -->
    <input type="hidden" name="pk" value="<?php echo $post_pk;?>">

    <div style="margin-top:1em;" class="">
        ■ オプションサービス
      <!-- <div class="row second_payment_form_margin_top">
        <div class="col-sm">
          <div class="custom-control custom-switch">
            <input name ="s1" type="checkbox" value="O" class="custom-control-input" id="s1">
            <label class="custom-control-label" for="s1">まとめ梱包</label>
          </div>
        </div>
        <div class="col-sm">
          <div class="custom-control custom-switch">
            <input name ="s2" type="checkbox" value="O" class="custom-control-input" id="s2">
            <label class="custom-control-label" for="s2">再梱包</label>
          </div>
        </div> -->

        <div class="col-sm">
          <div class="custom-control custom-switch">
            <input name ="s6" type="checkbox" value="O" class="custom-control-input" id="s6"
            <?php
            if($s_option==="O"){
              echo "checked";
            }else{
              echo "";
            }
            ?>
            >
            <label class="custom-control-label" for="s6">有料保管サービス</label>
          </div>
        </div>
      </div>
    </div>
    <div style="text-align: center;">
      <input style="margin-top:30px;" class="btn btn-outline-secondary btn-lg"  value="2차 내용 수정하기" type="submit" />
    </div>

  </form>

</div>
