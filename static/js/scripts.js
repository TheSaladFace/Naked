
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





jQuery(function(){
  jQuery('.logo').data('size','big'); //sets initial size to big
});

//set initial global variables
var menuLogoHeight=jQuery(".menu-logo").height();
var headerExtraHeight=36;
var logoHeight=jQuery(".logo").height();
var titleHeight=jQuery(".site-title").height();
var logoSmallHeight=50;
var dataSpacing=parseInt(jQuery('body').attr('data-spacing'));
var extraYPosn=((menuLogoHeight/2)-(headerExtraHeight/2))+dataSpacing;//dataspacing added cos of top padding on body

jQuery(document).ready(function(jQuery) {

   jQuery('#nav-toggle').sidr({
   	name: 'sidr-left',
     side: 'left',
     source: '.logo-holder,#menu-main',
     displace: true,
     onOpen: function() {
         jQuery('#nav-toggle').find('.fa').removeClass('fa-bars');
         jQuery('#nav-toggle').find('.fa').addClass('fa-minus');
         //var sideWidth=jQuery('.sidr-left').width();
         //jQuery( "body").css("padding-left", 0);
         jQuery('.left-border').css('left','260px');
         jQuery( ".post-navigation" ).fadeOut("300ms");
     },
     onClose: function() {
         jQuery('#nav-toggle').find('.fa').addClass('fa-bars');
         jQuery('#nav-toggle').find('.fa').removeClass('fa-minus');
         jQuery('.left-border').css('left',0);
         //jQuery( "body").css("padding-left", dataSpacing);
        jQuery( ".post-navigation" ).fadeIn("300ms");
     },
 	});

    var fullScreenSearch = jQuery("#nav-search").animatedModal({
        animatedIn:'fadeInRight',
        animatedOut:'fadeOutLeft',
        color:'rgba(255, 255, 255, 1)',
        beforeOpen: function() {
        },
        afterClose: function() {
        }
    });

    jQuery(document).keyup(function(ev){
        if(ev.keyCode == 27) {
          fullScreenSearch.close();
        }
      });

 });

jQuery(document).ready(function() {
var firstLevel;
var windowWidth;
var thisItemMaxEdge

jQuery("#menu-main>li").find("ul").first().stop().fadeOut();
    //offscreen dropdown menu fixe
    jQuery("#menu-main>li").mouseenter(function() {
        firstLevel=jQuery(this);
        //determine number of levels
        var numLevels=1;
        if ( jQuery(this).find( "li li" ).length ) {
            numLevels=2;
        }


        var off = jQuery(this).offset();
        var topItemLeftX = off.left;
        var subItemWidth=jQuery(this).find("li").width();
        var firstLevelWidth=firstLevel.width();

        //multiplied by number of subs, max 3
        var safeWidth=subItemWidth*numLevels;
        thisItemMaxEdge=topItemLeftX+safeWidth;
        windowWidth = jQuery(window).width();



        if(thisItemMaxEdge>windowWidth)
        {
            var distanceToShiftFirstSub=firstLevelWidth-subItemWidth;
            jQuery(firstLevel).addClass('edge');
            jQuery(firstLevel).find('ul').first().css("left",distanceToShiftFirstSub+7);
            jQuery(firstLevel).find('ul').first().stop().fadeIn(400);
        }
        else
        {
            jQuery(firstLevel).removeClass('edge');
            jQuery(firstLevel).find('ul').first().css("left",6);
            jQuery(firstLevel).find('ul').first().stop().fadeIn(400);
        }

    }).mouseleave(function() {
            jQuery(firstLevel).removeClass('edge');

            jQuery(firstLevel).find('ul').first().stop().fadeOut(150, function() {
                jQuery(this).css("left","-999em");
            });
    });


    //set extra header initial position in the middle vertically
    jQuery( ".header-extra" ).offset({ top: extraYPosn, left: "auto" });

    //set extra header margins in accordance with body border (if set)
    //jQuery( ".header-extra" ).css({marginLeft: dataSpacing+"px", marginRight: dataSpacing+"px" });
    jQuery( ".abs-container,.post-navigation,header" ).width(jQuery('body').width());
    jQuery( ".post-navigation" ).css("top","50%");

    jQuery( ".progress-indicator" ).fadeOut();

    //set the height of the header equal to the height of the logo container
    jQuery( "header").height(menuLogoHeight);

    //set the padding of the sidr logo area to the height of the starting logo area
    jQuery( ".sidr-class-logo" ).parent().css("padding-top",jQuery( ".logo-holder" ).css("padding-top"));
    jQuery( ".sidr-class-logo" ).parent().css("padding-bottom",jQuery( ".logo-holder" ).css("padding-bottom"));

    //remove the bottom border on the sidr items
    jQuery( ".sidr a" ).last().css( "border-bottom", "0px" );


    //set the body main content offset due to sticky header
    jQuery( ".body-main-content").css("padding-top", menuLogoHeight);

    //display CSS hidden stuff to avoid FOUC
    jQuery( "#animatedModal").css("display", "block");

    //add class to social icons to trigger effect that was previously on hover
    jQuery(".start-icon").data('clickState', 0);
    jQuery(".start-icon").on("click", function(){
        if(jQuery(".start-icon").data('clickState')==0)
        {
            jQuery(this).closest(".header-share-boxes" ).addClass("social-hover");
            jQuery(".start-icon").data('clickState', 1).removeClass("background-accent").addClass("background-dark").removeClass("fa-plus").addClass("fa-minus");
        }
        else
        {
            jQuery(this).closest( ".header-share-boxes" ).removeClass( "social-hover");
            jQuery(".start-icon").data('clickState', 0).removeClass("background-dark").addClass("background-accent").removeClass("fa-minus").addClass("fa-plus");
        }
    });

    jQuery(document).on('click',function (e) {
      footerUl = jQuery('.start-icon');
      if (!footerUl.is(e.target)
          && footerUl.has(e.target).length === 0){
             jQuery( ".header-share-boxes" ).removeClass( "social-hover");
             jQuery(".start-icon").data('clickState', 0).removeClass("background-dark").addClass("background-accent").removeClass("fa-minus").addClass("fa-plus");

      }
    });



});

//resize absolute elements due to borders
jQuery( window ).resize(function() {
    jQuery( ".abs-container,.post-navigation,header" ).width(jQuery('body').width());
});



jQuery(window).scroll(function(){

    if(jQuery(document).scrollTop() > 50)
    {
        if(jQuery('.logo').data('size') == 'big')
        {

            jQuery('.logo').data('size','small');
            jQuery('.vcenter-topbar').stop().animate({paddingTop: "5px",paddingBottom: "5px"},300);

            /* logo animates to small size */
            jQuery('.logo').stop().animate({
                height:logoSmallHeight
                },300,function() {
                /* the overlaying bar containing the slide in menu and search
                 * has to calculate the mid point position *after* the logo height
                 * has been animated (the final menu logo bar height).
                 */
                menuLogoHeight=jQuery(".menu-logo").height(); //height of the main menu / logo bar
                extraYPosn=((logoSmallHeight+10)/2)-(headerExtraHeight/2); //calculate the mid point of the main menu / logo bar
                jQuery('.header-extra').stop().animate({ //animate it
                    top:extraYPosn
                },300);

                //set the height of the header equal to the height of the logo container
                var currentLogoHeight=jQuery(".menu-logo").height();
                jQuery( "header").height(currentLogoHeight);
                jQuery("header").css("border-bottom", "1px solid #e3e3e3");

                //set the position of the progress indicator
                jQuery( ".progress-indicator" ).css("top",currentLogoHeight);
                jQuery( ".progress-indicator" ).fadeIn(900);

            });


            jQuery( ".site-description" ).hide(300);

        }
    }
    else
    {
        if(jQuery('.logo').data('size') == 'small')
        {

            jQuery('.logo').data('size','big');
            jQuery('.vcenter-topbar').stop().animate({paddingTop: "20px",paddingBottom: "20px"},300);

            jQuery('.logo').stop().animate({
                height:logoHeight
                },300,function() {
                /* same as above but when logo shrinks */
                menuLogoHeight=jQuery(".menu-logo").height();
                extraYPosn=(menuLogoHeight/2)-(headerExtraHeight/2);
                jQuery('.header-extra').stop().animate({
                    top:extraYPosn
                },300);

                //set the height of the header equal to the height of the logo container
                var currentLogoHeight=jQuery(".menu-logo").height();
                jQuery( "header").height(currentLogoHeight);

                //set the position of the progress indicator
                jQuery( ".progress-indicator" ).css("top","-100px");
                jQuery( ".progress-indicator" ).fadeOut();

            });

            jQuery("header").css("border-bottom", "0px solid #fff");
            jQuery( ".site-description" ).show(300);
        }
    }
    //set the height of the header equal to the height of the logo container
    //jQuery( "header").height(jQuery(".menu-logo").height());
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
