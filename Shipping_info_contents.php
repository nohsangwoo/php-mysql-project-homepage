<div class="container">
  <form action="Shipping_info_contents_process.php" method="post">
    <div class="form-group">
      <label for="formGroupExampleInput">注文番号</label>
      <input type="text" name="order_num" class="form-control" id="formGroupExampleInput" placeholder="注文番号を入力してください。" require>
    </div>
    <div class="container" style="text-align:center;">
      <p style="margin-top:30px;">
        <input type="button" class="btn btn-outline-dark" value="Cancel" onclick="location.href='./index.php'" style="width:100px;">
        <input type="submit" class="btn btn-outline-dark" name="" onclick="" value="注文照会" style="width:100px;">
      </p>
    </div>
  </form>
</div>
