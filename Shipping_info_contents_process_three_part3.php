
<div style="margin-top:5em;"class="container">

  <div class="">
    <p>
      <h1>step3-part2(入力) </h1>
      <h5>配送のための情報入力</h5>

    </p>
  </div>
  <hr>

  <div style="text-align: center; margin-top:5em; margin-bottom:2em;">
    <h2 class="Word_Color_orange">二次決済のための情報</h2>
  </div>

  <form name="form" action="Shipping_info_contents_process_three_part3_process.php" method="post" enctype="multipart/form-data">
    <select name="delivery_way" class="custom-select custom-select-sm contact_string" required>
      <option value="" selected>配送方法(選んでください!!)</option>
      <option value="1">EMS</option>
      <option value="2">国際小包(航空)</option>
      <option value="3">国際小包(船便)</option>
    </select>

    <input class="form-control form-control-sm second_payment_form_margin_top" name ="name" type="text" placeholder="名前(英文)"  required >
    <input class="form-control form-control-sm second_payment_form_margin_top" name ="address" type="text" placeholder="住所(英文)"  required >
    <input class="form-control form-control-sm second_payment_form_margin_top" name ="post_number" type="text" placeholder="郵便番号"  required >
    <input class="form-control form-control-sm second_payment_form_margin_top" name ="phone" type="text" placeholder="電話番号"  required >
    <input class="form-control form-control-sm second_payment_form_margin_top" name ="email" type="text" placeholder="email or LINE"  required >
    <textarea class="form-control form-control-sm second_payment_form_margin_top"  rows="10" name="text" placeholder="注文時要請事項" required ></textarea>


    <input type="hidden" name="order_num" value="<?php echo $order_num;?>">

    <div style="margin-top:1em;" class="">
        ■ オプションサービス


        <div class="col-sm">
          <div class="custom-control custom-switch">
            <input name ="s6" type="checkbox" value="O" class="custom-control-input" id="s6">
            <label class="custom-control-label" for="s6">有料保管サービス</label>
          </div>
        </div>
      </div>
    </div>
    <div style="text-align: center;">
      <input style="margin-top:30px;" class="btn btn-outline-secondary btn-lg" type="submit" />
    </div>

  </form>

</div>
