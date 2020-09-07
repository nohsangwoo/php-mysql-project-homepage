<style>
@media only screen and (min-width: 768px) { /*768보다 크면 아래내용 실행*/




  }


@media only screen and (max-width: 767px) { /*767보다 작으면 아래내용 실행*/

  }

  a.top {
    position: fixed;
    right: 12%;
    bottom: 13%;
    display: none;
  }

</style>


<script>
 $( document ).ready( function() {
   $( window ).scroll( function() {
     if ( $( this ).scrollTop() > 200 ) {
       $( '.top' ).fadeIn();
     } else {
       $( '.top' ).fadeOut();
     }
   } );

   $( '.top' ).click( function() {
     $( 'html, body' ).animate( { scrollTop : 0 }, 400 );
     return false;
   } );
 } );
</script>


<div></div>
<a href="#" class="top">
  <img height="50" src="./img/top_button.png" alt="">
</a>
