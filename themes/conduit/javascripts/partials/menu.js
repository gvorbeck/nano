jQuery( document ).ready( function ( $ ) {
  var p = 0;
  $( '.menu' ).click( function () {
    if ( p == 0 ) {
      $( this ).addClass( 'animate-1' ).removeClass( 'animate-2' );
      p++;
      console.log( 'part 1' );
    } else if ( p == 1 ) {
      $( this ).addClass( 'animate-2' ).removeClass( 'animate-1' );
      p = 0;
      console.log( 'part 2' );
    }
    $( '.menu-hamburger-container' ).toggleClass( 'expand' );
  } );
} );