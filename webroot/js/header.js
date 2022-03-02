function headerAccordion() {
    var x = document.getElementById("topNav");
    if (x.className === "top-nav") {
        x.className += " responsive";
    } else {
        x.className = "top-nav";
    }
}
$( function() {
    function log( message ) {
        $( "<div>" ).text( message ).prependTo( "#log" );
        $( "#result" ).scrollTop( 0 );
    }

    $( "#search_text" ).autocomplete({
        source: "searchauto.php",
        minLength: 2,
        select: function( event, ui ) {
            log( "Selected: " + ui.item.value + " aka " + ui.item.id );
        }
    });
} );