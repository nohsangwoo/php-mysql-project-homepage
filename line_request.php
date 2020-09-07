<style>
@media only screen and (min-width: 768px) { /*768보다 크면 아래내용 실행*/
  .left_side {
    position: fixed;
    left: 5%;
    bottom: 50%;

    display: none;
  }
  .left_side_line_word{  width:75px;}

  .left_side_line_qr{  width:100px; }


  }


@media only screen and (max-width: 1299px) { /*767보다 작으면 아래내용 실행*/
  .left_side_line_word{ display: none;}
  .left_side_line_qr{ display: none; }
  }






</style>


<script>
 $( document ).ready( function() {
   $( window ).scroll( function() {
     if ( $( this ).scrollTop() > 1600 ) {
       $( '.left_side' ).fadeIn();
     } else {
       $( '.left_side' ).fadeOut();
     }
   } );
 } );

</script>
<!--라인 안내-------------------------------------------------------->

<div class="left_side" id="left_side">
  <img src="./img/line_qr.png" class="left_side_line_qr"  alt="">
</div>


  <!--라인 글씨-->
