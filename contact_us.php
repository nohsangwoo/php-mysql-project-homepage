<link rel= "stylesheet" type="text/css" href="./css/contact_us.css">
<link rel= "stylesheet" type="text/css" href="./css/Orange_Line.css">



<!--Orange_Line-->
<div class="line" id="order">
  <img src="./img/line.png" class="d-block w-100" alt="">
</div>


<!--메일 및 라인 안내-------------------------------------------------------->

    <!--메일-->
    <div class="text-center">
      <p class="order_word_size order_Word_margin mail_Word_Color wow swing"><strong>メール</strong></p>
      <a href="mailto:fairyfloss0909@gmail.com">fairyfloss0909@gmail.com</a><br>
    </div>



<!--메일주소카피 버튼-->
    <div class="text-center">
      <button type="button" class="btn btn-outline-success btn-lg contact_us_btn_Property">
        <div id='Mail_Copy_Btn'>メールをコピー</div>
      </button>
    </div>
<!--메일주소카피기능-->
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
    function copyToClipboard(val) {
      var t = document.createElement("textarea");
      document.body.appendChild(t);
      t.value = val;
      t.select();
      document.execCommand('copy');
      document.body.removeChild(t);
    }
    $('#Mail_Copy_Btn').click(function() {
      copyToClipboard('fairyfloss0909@gmail.com');
      alert('メールアドレスをコピーしました。');
    });
    </script>

<!--------------------------------------->




    <!--라인-->

    <div class="text-center">
      <p class="order_word_size order_Word_margin line_Word_Color wow swing"><strong>LINE</strong></p>
    </div>


    <p class="text-center" style="margin-top:1em;">ID : @oly2993a</p>




    <!--라인아이디카피버튼-->
    <div class="text-center">
      <button id='' type="button" class="btn btn-outline-success btn-lg contact_us_btn_Property">
        <div id='btn1'>LINE IDをコピー</div>
      </button>
    </div>
<!--라인아이디카피기능-->
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
    function copyToClipboard(val) {
      var t = document.createElement("textarea");
      document.body.appendChild(t);
      t.value = val;
      t.select();
      document.execCommand('copy');
      document.body.removeChild(t);
    }
    $('#btn1').click(function() {
      copyToClipboard('@oly2993a');
      alert('LINE IDをコピーしました。');
    });
    </script>


    <!--qr코드-->
    <img src="./img/line_qr.png" class="line_qr" style="margin-top:1em;" alt="">
