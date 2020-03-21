var sitebar = $( ".sitebar" );
$(".button").on( "click", function( event ) {
    sitebar.toggleClass('sitebar-active');
    $(".button").toggleClass('button-active');
    $(".container").toggleClass('container-active');
});