


    <div class="container order_contents">
      <div class="">
        <p>
          <h1>step1</h1>
          <h5 class="Word_Color">ご希望の代行サービスを選択してください</h5>
          <hr>



          <div style=" background-color: #FF6F61">
            <!--구매대행-->
            <div class="text-center margin_of_between_order_contents " style="margin-top:0px; padding-top:50px;padding-bottom:50px;">
              <p>
                <button class="btn btn-outline-dark btn-lg wow bounceInDown " type="button" data-toggle="collapse" data-target="#Collapse_Buying_agent" aria-expanded="false" aria-controls="collapseExample" >
                  <h3 ><strong>購入代行</strong></h3>
                </button>
              </p>
              <p class="margin_zero " >
                韓国のすべての卸売、小売店の商品を購入代行致します。
              </p>
              <div style="margin-top:50px;"class="collapse" id="Collapse_Buying_agent">
                <div class="card card-body">

                  <?php
                  require("./order_buying_agent_mail.php");
                   ?>

                </div>
              </div>
            </div>
          </div>




          <div class="" style=" background-color: #FFB4AD">
            <!--결제대행-->
            <div class="text-center margin_of_between_order_contents" style="margin-top:0px; margin-bottom:0px; padding-top:50px;padding-bottom:50px;">
              <p>
                <button class="btn btn-outline-dark btn-lg wow bounceIn" type="button" data-toggle="collapse" data-target="#Collapse_payment_agent" aria-expanded="false" aria-controls="collapseExample">
                  <h3><strong>決済代行</strong></h3>
                </button>
              </p>
              <p class="margin_zero ">
                韓国の決済またはどこかの店舗や支店での送金を <br>
                お手頃な価格でご支援致します。
              </p>
              <div style="margin-top:50px;"class="collapse" id="Collapse_payment_agent">
                <div class="card card-body">

                  <?php
                  require("./order_payment_agent_mail.php");
                   ?>

                </div>
              </div>
            </div>
          </div>




          <div class="" style=" background-color: #803730">
            <!--출장대행-->
            <div class="text-center margin_of_between_order_contents"  style="margin-top:0px; padding-top:50px;padding-bottom:50px;">
              <p>
                <button style="color:white;" class="btn btn-outline-dark btn-lg wow bounceInUp" type="button" data-toggle="collapse" data-target="#Collapse_business_travel_agent" aria-expanded="false" aria-controls="collapseExample">
                  <h3><strong>出張代行</strong></h3>
                </button>
              </p>
              <p class="margin_zero white_color_word" style="color:white; ">
                韓国の卸売業者のコンタクト、お好きな商品のサンプルを購入、オフライン店舗利用、<br>
                内容伝達、ホテル予約、病院の予約など韓国の出張代行を致します。<br>
                （基本の手数料に加え、別途出張手数料がかかります。）
              </p>
              <div style="margin-top:50px;"class="collapse" id="Collapse_business_travel_agent">
                <div class="card card-body">

                  <?php
                  require("./order_business_travel_agent_mail.php");
                   ?>

                </div>
              </div>
            </div>
          </div>



          <div class="" style=" background-color: #805A57">
            <!--기타대행-->
            <div class="text-center margin_of_between_order_contents" style="margin-top:0px; padding-top:50px;padding-bottom:50px;">
              <p>
                <button style="color:white;" class="btn btn-outline-dark btn-lg wow tada" type="button" data-toggle="collapse" data-target="#Collapse_other_agent" aria-expanded="false" aria-controls="collapseExample">
                  <h3><strong>その他代行</strong></h3>
                </button>
              </p>
              <p class="margin_zero white_color_word" style="color:white;" >
                上記の内容に加えて、大量購入、団体購入、共同購入などの代行に関しても、お気軽にお問い合わせください。
              </p>
              <div style="margin-top:50px;"class="collapse" id="Collapse_other_agent">
                <div class="card card-body">

                  <?php
                  require("./order_other_agent_mail.php");
                   ?>

                </div>
              </div>
            </div>
          </div>




        </p>

      </div>
    </div>
