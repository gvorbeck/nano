jQuery( document ).ready( function ( $ ) {
  $( 'body > header .svg--hamburger' ).on( 'click', function (e) {
    e.preventDefault();
    e.stopPropagation();

    $( '.menu-hamburger-container' ).toggleClass( 'expand' );

    $( document ).one( 'click', function (e) {
      if ( $( '.menu-hamburger-container' ).has( e.target ).length === 0 ) {
        $( '.menu-hamburger-container' ).removeClass( 'expand' );
      }
    } );
  } );
} );