
/**
 * Shrinking Header
 */
 /*jQuery(function() {
     jQuery(window).scroll(function() {
         var scroll = jQuery(window).scrollTop();
         var logoHeight=jQuery(".logo").height();
         if (scroll >= 300) {
             jQuery(".logo").animate({ height: 50 }, 600);
         } else {
              jQuery(".logo").animate({ height: 100 }, 600);
         }
     });
 });*/


 jQuery(document).ready(function($) {

   $('#nav-toggle').sidr({
   	name: 'sidr-left',
     side: 'left',
     source: '#menu-main',
     displace: true,
 	});
 });
jQuery(function(){
  jQuery('.logo').data('size','big');
});

var logoHeight=jQuery(".logo").height();
var titleHeight=jQuery(".site-title").height();
jQuery(window).scroll(function(){

  if(jQuery(document).scrollTop() > 0)
{
    if(jQuery('.logo').data('size') == 'big')
    {
        jQuery('.logo').data('size','small');
        jQuery('.logo').stop().animate({
            height:'50px'
        },600);
        jQuery('header').stop().animate({
            paddingTop:5,paddingBottom:5
        },600);
        jQuery("header").css("border-bottom", "1px solid #e3e3e3");
        jQuery( ".site-description" ).hide(600);
    }
}
else
  {
    if(jQuery('.logo').data('size') == 'small')
      {
        jQuery('.logo').data('size','big');
        jQuery('.logo').stop().animate({
            height:logoHeight
        },600);
        jQuery('header').stop().animate({
            paddingTop:20,paddingBottom:20
        },600);
        jQuery("header").css("border-bottom", "0px solid #fff");
        jQuery( ".site-description" ).show(600);
      }
  }
});

jQuery(document).ready(function(){
            var submitIcon = jQuery('.searchbox-icon');
            var inputBox = jQuery('.searchbox-input');
            var searchBox = jQuery('.searchbox');
            var isOpen = false;
            submitIcon.click(function(){
                if(isOpen == false){
                    searchBox.addClass('searchbox-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchBox.removeClass('searchbox-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });
             submitIcon.mouseup(function(){
                    return false;
                });
            searchBox.mouseup(function(){
                    return false;
                });
            jQuery(document).mouseup(function(){
                    if(isOpen == true){
                        jQuery('.searchbox-icon').css('display','block');
                        submitIcon.click();
                    }
                });
        });
            function buttonUp(){
                var inputVal = jQuery('.searchbox-input').val();
                inputVal = jQuery.trim(inputVal).length;
                //if( inputVal !== 0){
                    //jQuery('.searchbox-icon').css('display','none');
                //} else {
                    //jQuery('.searchbox-input').val('');
                    jQuery('.searchbox-icon').css('display','block');
                //}
            }
