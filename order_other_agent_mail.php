

<form class="row" name="form" action="./order_agent_mail_send.php" method="post" enctype="multipart/form-data">


  <input type="hidden" name="kind" value="4">


  <input class="form-control form-control contact_string col-12" name ="name" type="text" placeholder="名前"  required autocomplete="off" style="margin-top:3px;"
  <?php if(isset($user_id)){ ?>

  value="<?php echo $user_name;?>"

  <?php } ?>
  >


  <input class="form-control form-control contact_string" name ="email" type="text" placeholder="email"  required autocomplete="off" style="margin-top:3px;"
  <?php if(isset($user_id)){ ?>

  value="<?php echo $user_id;?>"

  <?php } ?>
  >

  <div class="row col-12"  id="urlList4">
    <input class="form-control form-control contact_string col-10" name ='url[]' type="text" placeholder="http://(製品のurl)"   required autocomplete="off" style="margin-top:3px;">
    <button class="col btn btn-primary"style="margin-left:15px; " type="button" onclick="urlBTN4();"  name="button" >+</button>

  </div>




  <textarea class="form-control form-control form_margin_top col-12"  rows="10" name="text" placeholder="注文商品情報を詳しく入力してください。" required autocomplete="off" style="margin-top:3px;"></textarea>


  <label for="upload">写真を重複選択可能です。</label>
  <input class="form-control-file col-12" type='file' name='upload[]' id='upload' multiple style="margin-top:3px;">


  <input type="submit" style="margin-top:30px;" class="btn btn-outline-secondary btn-lg col-12" name=""  value="送信" >

</form>


<script>


function urlBTN4() {
  $("#urlList4").append(`<input class="form-control form-control contact_string col-12" name ="url[]" type="text" placeholder="http://(製品のurl)"  autocomplete="off" style="margin-top:3px;">`); //id가 chat태그 하위 내용으로 이내용을 추가한다
}


</script>
