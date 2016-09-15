jQuery(document).ready(function(jQuery) {
	var leadText = jQuery('.fancy-drop-cap').text();
	jQuery('.fancy-drop-cap').attr('data-first-letter', leadText.charAt(0));
});
