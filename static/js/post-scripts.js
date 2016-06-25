
/**
 * Dropcap
 */
var dropcap = document.querySelectorAll(".dropcap");
window.Dropcap.layout(dropcap, 3);
jQuery( window ).resize(function() {
	window.Dropcap.layout(dropcap, 3);
});

/**
 * Blockquote
 */
/*jQuery( document ).ready(function() {
    jQuery( "blockquote" ).wrap( "<div class='blockquote-wrap'></div>" );
});*/
