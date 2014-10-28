jQuery( document ).ready( function ( $ ) {
  $( 'body > header .svg--hamburger' ).click( function () {
    $( '.menu-hamburger-container' ).toggleClass( 'expand' );
  } );
} );