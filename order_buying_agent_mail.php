

<form class="row" name="form" action="./order_agent_mail_send.php" method="post" enctype="multipart/form-data">


  <input type="hidden" name="kind" value="1">




  <input class="form-control form-control contact_string col-12" name ="name" type="text" placeholder="名前"  required autocomplete="off" style="margin-top:3px;"
  <?php if(isset($user_id)){ ?>
  readonly
  value="<?php echo $user_name;?>"

  <?php } ?>
   >


  <input class="form-control form-control contact_string" name ="email" type="text" placeholder="email"  required autocomplete="off" style="margin-top:3px;" ondragover=""
  <?php if(isset($user_id)){ ?>
  readonly
  value="<?php echo $user_id;?>"

  <?php } ?>
  >





  <input type="hidden" name="user_pk"
  <?php if(isset($user_id)){ ?>
  value="<?php echo $user_pk; ?>"
  <?php }else{
    ?>
    value="<?php echo "0"; ?>"
    <?php
}
   ?>
  >






  <div class="row col-12"  id="urlList">
    <input class="form-control form-control contact_string col-10" name ='url[]' type="text" placeholder="http://(製品のurl)"   required autocomplete="off" style="margin-top:3px;">
    <button class="col btn btn-primary"style="margin-left:15px; " type="button" onclick="urlBTN();"  name="button" >+</button>
  </div>



<!--&#13;&#10; placeholder안에서 enter기능-->
  <textarea class="form-control form-control form_margin_top col-12"  rows="10" name="text" placeholder="注文商品情報を詳しく入力してください。" required autocomplete="off" style="margin-top:3px;"></textarea>





  <label for="upload">写真を重複選択可能です。</label>
  <input class="form-control-file" type='file' name='upload[]' id='upload' multiple style="margin-top:3px;" >



  <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response"><!--리캡차 전송용-->



  <input type="submit" style="margin-top:30px;" class="btn btn-outline-secondary btn-lg col-12" name=""  value="送信" >

</form>


<script>


function urlBTN() {

  $("#urlList").append(`<input class="form-control form-control contact_string col-12" name ="url[]" type="text" placeholder="http://(製品のurl)"  autocomplete="off" style="margin-top:3px;">`); //id가 chat태그 하위 내용으로 이내용을 추가한다

}


</script>
