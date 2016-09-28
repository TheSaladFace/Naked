/**
 * Handles basic scripting by the theme
 * @package naked
 */

 /**
  * Mega Menu
  */
function hoverIn() {
 		var a = jQuery(this);
 		var nav = a.closest('.nav-menu');
 		var mega = a.find('.mega-menu');
 		var offset = rightSide(nav) - leftSide(a);
 		mega.width(Math.min(rightSide(nav), columns(mega)*245));
        var shiftLeft=Math.min(0, offset - mega.width());
 		mega.css('left', shiftLeft);
        mega.find('.mega-menu-row').fadeIn(400);

 	}

 	function hoverOut() {
        var a = jQuery(this);
 		var nav = a.closest('.nav-menu');
 		var mega = a.find('.mega-menu');
        mega.find('.mega-menu-row').fadeOut(0);
 	}

 	function columns(mega) {
 		var columns = 0;
 		mega.children('.mega-menu-row').each(function () {
 			columns = Math.max(columns, jQuery(this).children('.mega-menu-col').length);
 		});
 		return columns;
 	}

 	function leftSide(elem) {
 		return elem.offset().left;
 	}

 	function rightSide(elem) {
 		return elem.offset().left + elem.width();
 	}

 	jQuery('.primary-navigation .menu-item-has-mega-menu').hover(hoverIn, hoverOut);



function calcHeaderHeight(){
    var currentLogoHeight=jQuery(".menu-logo").outerHeight();
    var extraTopBarHeight=jQuery(".extra-topbar").outerHeight();
    var totalHeight=currentLogoHeight+extraTopBarHeight;
    return (totalHeight);
}

function calcTopBarPosition(){
    menuLogoHeight=jQuery(".vcenter-topbar.logo-holder").outerHeight();
    var extraTopBarHeight=jQuery(".extra-topbar").outerHeight();
    var topBarPosition=(menuLogoHeight/2)-(headerExtraHeight/2)+extraTopBarHeight;

    if(jQuery( "header" ).hasClass( "normal-header" ))
    {
        jQuery( ".header-extra" ).css("position","fixed"); //here we don't want the header with hamburger to go offscreen
        topBarPosition+=dataSpacing; // because of the adjustment to fixed, we need to add the extra border size (if enabled)
    }
    return (topBarPosition);
}

/**
 * Set initial global variables
 */

var headerExtraHeight=36;
var menuLogoHeight;
var logoHeight;
var extraTopbarHeight;
var titleHeight;
var logoSmallHeight=50;
var dataSpacing=parseInt(jQuery('body').attr('data-spacing'));
var dataStickyPosn=parseInt(jQuery('body').attr('data-stickyposn'));
var stickyPosn=106;
var extraYPosn=((menuLogoHeight/2)-(headerExtraHeight/2))+dataSpacing; //dataspacing added cos of top padding on body
var firstLevel;
var windowWidth;
var thisItemMaxEdge
var amountScrolled = 300;
var rightPosnScrollToTop;



jQuery(document).ready(function(jQuery) {

    jQuery('.logo').data('size','big');

    menuLogoHeight=jQuery(".menu-logo").outerHeight();
    logoHeight=jQuery(".logo").outerHeight();
    extraTopbarHeight=jQuery(".extra-topbar").outerHeight();
    titleHeight=jQuery(".site-title").outerHeight();
    headerImageHeight=jQuery(".header-image").outerHeight();
    rightPosnScrollToTop = jQuery('#scroll-to-top').css('right');
    jQuery(".menu-hover-icon").fadeOut(0);
    jQuery('.mega-menu-row').fadeOut(0);
    jQuery('.sub-menu').fadeOut(0);
    jQuery('.mega-menu-row .sub-menu').fadeIn(0);
    jQuery('.primary-navigation ul ul ul').css({display:"block"});



    /**
     * Scroll to Top Button Initialise. Button is initially invisible, but "in", since we have to place it via functions.php
     * because of variable borders. We collect the initial "out" position above (rightPosnScrollToTop) and use later to bring back out.
     */
    if ( jQuery(window).scrollTop() <= amountScrolled ) // Only hide it if the scroll is at the top of the page
    {
        jQuery('#scroll-to-top').data('state','out');
        jQuery('#scroll-to-top').stop().animate({right: "-70px"});
    }
    else
    {
        jQuery('#scroll-to-top').data('state','in');
        jQuery('#scroll-to-top').stop().css({opacity: "1"});
    }

    jQuery('.header-container').height(calcHeaderHeight());

    /**
     * IMPROVE COMMENT stuff
     * - no idea knows why WP decided to format the reply button differently for logged in vs non logged in users
     */
    jQuery('#cancel-comment-reply-link').addClass('background-dark background-dark-hover').html('<i class="fa fa-times-thin close-inner" aria-hidden="true"></i>');
    jQuery('.submit').addClass('background-dark background-dark-hover');
    jQuery('.comment-reply-link').addClass('background-dark background-dark-hover').html('<i class="fa fa-reply" aria-hidden="true"></i>');


    /*move the cancel button for logged in users*/
    var cancelButton = jQuery( "#cancel-comment-reply-link" ).detach();
    jQuery(cancelButton).insertAfter( "#reply-title" );


    /**
     * SIDR
     */
    jQuery('#nav-toggle').sidr({
        name: 'sidr-left',
        side: 'left',
        source: '.vcenter-topbar.logo-holder,#menu-main',
        displace: true,

        onOpen: function() {
            jQuery('.left-border').css('left','260px'); //shift the left border to the width of the sidr

        },
        onClose: function() {
            jQuery('.left-border').css('left',0); //shift the left border back
        },
        onOpenEnd: function() {
            jQuery('#nav-toggle').find('.fa').removeClass('fa-bars');
            jQuery('#nav-toggle').find('.fa').addClass('fa-minus');
            //jQuery('.left-border').css('left','260px'); //shift the left border to the width of the sidr
            jQuery( ".post-navigation" ).fadeOut("300ms");
            jQuery( ".hamburger" ).addClass("is-active");

        },
        onCloseEnd: function() {
            jQuery('#nav-toggle').find('.fa').addClass('fa-bars');
            jQuery('#nav-toggle').find('.fa').removeClass('fa-minus');
            //jQuery('.left-border').css('left',0); //shift the left border back
            jQuery( ".post-navigation" ).fadeIn("300ms");
            jQuery( ".hamburger" ).removeClass("is-active");
        },
    });

    /*fix the hover color problem due to non hoverout in css, bruteforce the hover with jquery*/
    jQuery("#nav-toggle").on('mouseover',function (e) {
        jQuery(this).removeClass("dark-button-color").addClass("accent-button-color");
    });
    jQuery("#nav-toggle").on('mouseout',function (e) {
        jQuery(this).removeClass("accent-button-color").addClass("dark-button-color");
    });
    jQuery("#nav-toggle").on('click',function (e) {
        jQuery(this).removeClass("accent-button-color").addClass("dark-button-color");
    });

    /*set the padding of the sidr logo area to the height of the starting logo area*/
    jQuery( ".sidr-class-logo" ).parent().css("padding-top",jQuery( ".vcenter-topbar.logo-holder" ).css("padding-top"));
    jQuery( ".sidr-class-logo" ).parent().css("padding-bottom",jQuery( ".vcenter-topbar.logo-holder" ).css("padding-bottom"));

    /*remove the bottom border on the last sidr items*/
    jQuery( ".sidr a" ).last().css( "border-bottom", "0px" );

    /*fix the mega menu structure not working in SIDR*/
    jQuery( ".sidr-class-mega-menu-row" ).unwrap();

    jQuery('.sidr li:not(:has(>ul))').find('a').addClass('hoverme');

    /**
     * sidr collapsible sub items
     */
    /*inject the collapsible button*/
    jQuery( "<span class='sidr-toggle'><i class='fa fa-angle-down'></i></span>" ).insertAfter( ".sidr-class-menu-item-has-children>a" );
    /*set initial conditions for hidden sub menus*/
    jQuery(".sidr-class-sub-menu").hide();
    jQuery('.sidr-toggle').data('clickState', 0);
    jQuery(".sidr-toggle").on('click',function (e) {

        if(jQuery(this).data('clickState')==0)
        {
            jQuery(this).next().find(".sidr-toggle").fadeOut(0);
            jQuery(this).addClass("sidr-toggle-on").next().slideToggle("slow","swing", function(){
                jQuery(this).find(".sidr-toggle").fadeIn(300); //only show the toggles of each level until the slidetoggle has completed (the are absolutely positioned so will appear in an ugly fashion over the top)
            });
            jQuery(this).data('clickState', 1);
        }
        else
        {
            jQuery(this).removeClass("sidr-toggle-on").next().slideToggle(300).find(".sidr-toggle").fadeOut(50);
            jQuery(this).data('clickState', 0);
        }

    });



    /**
     * Full Screen Search
     */
    /*display CSS hidden stuff to avoid FOUC*/
    jQuery( "#animatedModal").css("display", "block");
    var fullScreenSearch = jQuery("#nav-search").animatedModal({
        animatedIn:'fadeInRight',
        animatedOut:'fadeOutLeft',
        color:'rgba(255, 255, 255, 1)',
        beforeOpen: function() {
            jQuery('.fullscreen-input-container').addClass("fullscreen-sub-ready");
            jQuery('.fullscreen-submit-container').addClass("fullscreen-sub-ready");
        },
        afterClose: function() {
            jQuery('.fullscreen-input-container').removeClass("fullscreen-sub-ready");
            jQuery('.fullscreen-submit-container').removeClass("fullscreen-sub-ready");
        }
    });
    jQuery(document).keyup(function(ev){ //close on escape
        if(ev.keyCode == 27) {
            fullScreenSearch.close();
        }
    });



    /**
     * Main Menu adjustment for edge of screen (make menu go left instead of right)
     * Adds animation fadeout and in on menu
     */
    /* Global variables, needed because of hover out and in */
    jQuery("#menu-main>li").find("ul").first().stop().fadeOut(); //set initial fadeout of first level ul elements so they can be faded back in

    jQuery("#menu-main>li.menu-item-has-children").mouseenter(function() { //all the rest happens on hover over top level meny items

        /* set variables */
        firstLevel=jQuery(this);
        var off = jQuery(this).offset();
        var topItemLeftX = off.left;
        var subItemWidth=jQuery(firstLevel).find("ul a").first().width();
        var topItemLeftPadding=jQuery(firstLevel).find("a").first().css("paddingLeft").replace("px", "");
        var firstLevelWidth=jQuery(firstLevel).width();
        windowWidth = jQuery(window).width();



        /* determine number of levels */
        var numLevels=1;
        if ( jQuery(firstLevel).find( "li li" ).length ) {
            numLevels=2;
        }

        /* obtain far right edge of the items deepest hover */
        var safeWidth=subItemWidth*numLevels;
        thisItemMaxEdge=topItemLeftX+firstLevelWidth+safeWidth;
        console.log(subItemWidth);
        console.log(windowWidth);

        /* check for overlap */
        if(thisItemMaxEdge>windowWidth)
        {
            jQuery(".menu-hover-icon").prependTo(firstLevel).stop().fadeIn(400);
            var distanceToShiftFirstSub=(firstLevelWidth-(topItemLeftPadding*2))-subItemWidth; //where to place the first level hover if its out of bounds
            jQuery(firstLevel).addClass('edge'); //adds class, 3rd level items dealt with in CSS with - width
            jQuery(firstLevel).find('ul').first().css("left",distanceToShiftFirstSub-2); //set adjusted backwards first level position
            jQuery(firstLevel).find('ul').first().stop().fadeIn(400); //fadein the first level for good measure (might as well as we are now reliant on js)
        }
        else
        {
            jQuery(".menu-hover-icon").prependTo(firstLevel).stop().fadeIn(400);
            jQuery(firstLevel).removeClass('edge'); //make sure this item has no edge class
            jQuery(firstLevel).find('ul').first().css("left",-2); //set normal position
            jQuery(firstLevel).find('ul').first().stop().fadeIn(400);
        }


    }).mouseleave(function() {
        jQuery(firstLevel).removeClass('edge');
        jQuery(".menu-hover-icon").stop().fadeOut(0);
        jQuery(firstLevel).find('ul').first().stop().fadeOut(0, function() {
            jQuery(this).css("left","-999em"); //shift the menu to prevent activation when user mouses over the area
        });
    });



    /**
     * Social icon expanding effect normal share
     */
    jQuery(".start-icon.share").data('clickState', 0);
    jQuery(".start-icon.share").on("click", function(){
        var startIcon=jQuery(this);

        if(jQuery(startIcon).data('clickState')==0)
        {
            jQuery(this).closest(".share-boxes" ).addClass("social-hover");
            jQuery(startIcon).data('clickState', 1).removeClass("background-accent").addClass("background-dark").removeClass("fa-share-alt").addClass("fa-minus");
        }
        else
        {
            jQuery(this).closest( ".share-boxes" ).removeClass( "social-hover");
            jQuery(startIcon).data('clickState', 0).removeClass("background-dark").addClass("background-accent").removeClass("fa-minus").addClass("fa-share-alt");
        }

    });
    /**
     * Social icon expanding effect header
     */
    jQuery(".start-icon.header").data('clickState', 0);
    jQuery(".start-icon.header").on("click", function(){
        var startIcon=jQuery(this);

        if(jQuery(startIcon).data('clickState')==0)
        {
            jQuery(this).closest(".share-boxes" ).addClass("social-hover");
            jQuery(startIcon).data('clickState', 1).removeClass("background-accent").addClass("background-dark").removeClass("fa-plus").addClass("fa-minus");
        }
        else
        {
            jQuery(this).closest( ".share-boxes" ).removeClass( "social-hover");
            jQuery(startIcon).data('clickState', 0).removeClass("background-dark").addClass("background-accent").removeClass("fa-minus").addClass("fa-plus");
        }

    });
    /* click outside hides the opened social icons */
    jQuery(document).on('click',function (e) { //normal
        footerUl = jQuery('.start-icon.share');
        if (!footerUl.is(e.target)
        && footerUl.has(e.target).length === 0){
            jQuery(".start-icon.share").closest( ".share-boxes" ).removeClass( "social-hover");
            jQuery(".start-icon.share").data('clickState', 0).removeClass("background-dark").addClass("background-accent").removeClass("fa-minus").addClass("fa-share-alt");

        }

        footerUl2 = jQuery('.start-icon.header'); //header
        if (!footerUl2.is(e.target)
        && footerUl2.has(e.target).length === 0){
            jQuery(".start-icon.header").closest( ".share-boxes" ).removeClass( "social-hover");
            jQuery(".start-icon.header").data('clickState', 0).removeClass("background-dark").addClass("background-accent").removeClass("fa-minus").addClass("fa-plus");

        }
    });


    /**
     * Positional hacks
     */
    var topBarPosition=calcTopBarPosition();
    jQuery('.header-extra').stop().animate({ //reposition header extra vertical position
        top:topBarPosition
    },300);

    jQuery( ".abs-container,.post-navigation,header" ).width(jQuery('body').width()); //when body border is enabled force rows to 100% so sticky edge stuff works
    jQuery( ".post-navigation" ).css("top","50%");  //force post navigation to 50% up the page
    jQuery( ".primary-navigation li" ).first().css("margin-left","0px"); //remove margin from first main menu item

    var headerHeight=calcHeaderHeight();
    jQuery( "header").height(headerHeight);//set header height to the height of the menu-logo div (its absolutely positioned)


    var topBarPosition=calcTopBarPosition();
    jQuery('.header-extra').stop().animate({ //reposition header extra vertical position
        top:topBarPosition
    },300);



    /**
     * Remove p from blockquote
     */
    jQuery('blockquote').text(jQuery('blockquote').text());

    /**
     * Magnific Popup
     */
    jQuery('img[class*="wp-image"]').closest('a').magnificPopup({
        type: 'image',
		closeOnContentClick: true,
		closeBtnInside: true,
        showCloseBtn:true,
		fixedContentPos: true,
        removalDelay: 400,
        callbacks: {
        open: function() {
            jQuery('.mfp-close').fadeIn();
            jQuery('.close-icon.background-dark.background-dark-hover.mfp-close').remove();
            jQuery( '.mfp-close' ).replaceWith( '<div class="close-icon background-dark background-dark-hover mfp-close"><i class="fa fa-times-thin close-inner" aria-hidden="true"></i></div>' );

        },


      }
    });

    /**
     * Stellar
     */
    jQuery.stellar({ horizontalScrolling: false, verticalOffset: -150});


    /**
     * Magnific Popup icon
     */
    jQuery('img[class*="wp-image"]').closest('a').css({ "position": "relative", "display": "inline-block" }).attr('data-effect', 'zoomInUp');;
    jQuery( '<i class="fa fa-expand icon thumb-enlarge dark-button-color"></i>' ).insertBefore( jQuery('img[class*="wp-image"]'));
    jQuery('img[class*="wp-image"]').closest('a').on('mouseover',function (e) {
        jQuery(this).find('.thumb-enlarge').removeClass("dark-button-color").addClass("accent-button-color");
    });
    jQuery('img[class*="wp-image"]').closest('a').on('mouseout',function (e) {
        jQuery(this).find('.thumb-enlarge').removeClass("accent-button-color").addClass("dark-button-color");
    });

    /**
     * WordPress no caption fix (replicate the caption class layout so everything works ok)
     */

    jQuery( 'img.alignleft' ).removeClass('alignleft').closest('a').wrap('<div class="alignleft wp-caption"></div>');
    jQuery( 'img.alignright' ).removeClass('alignright').closest('a').wrap('<div class="alignright wp-caption"></div>');
    jQuery( 'img.aligncenter' ).removeClass('aligncenter').closest('a').wrap('<div class="aligncenter wp-caption special-align-center"></div>');

    /**
     * Remove the hardcoded WordPress image widths from the images so they can be set by their containing div Widths
     * via css
     */
    jQuery('.wp-caption').find('img').removeAttr('style').removeAttr('width').removeAttr('height');
    jQuery('.wp-caption').removeAttr('style').removeAttr('width').removeAttr('height');

    /**
     * Sticky Sidebar
     */

    //resize the sticky sidebar because applying fixed means its not relative to its parent
    jQuery(".sticky-sidebar").width(jQuery(".sticky-sidebar").parent().width());

    /**
     * Scroll to Top Button - Press
     */
    jQuery('a#scroll-to-top').click(function() {
	jQuery('html, body').animate({
		scrollTop: 0
	}, 700);
	return false;
    });

});


/**
 * Scroll to Top Button slide out and in
 */
jQuery(window).scroll(function() {
	if ( jQuery(window).scrollTop() > amountScrolled ) {
        if(jQuery('#scroll-to-top').data('state') == 'in')
        {
            jQuery('#scroll-to-top').stop().css({opacity: "1"}); //is set opacity = 0 in css so force to 1 here.
            jQuery('#scroll-to-top').data('state','out');
            jQuery('#scroll-to-top').stop().animate({right: rightPosnScrollToTop}, 300);
        }

	} else {
        if(jQuery('#scroll-to-top').data('state') == 'out')
        {
            jQuery('#scroll-to-top').data('state','in');
            jQuery('#scroll-to-top').stop().animate({right: "-70px"}, 300);
        }
	}
});

//resize absolute elements due to borders
jQuery( window ).resize(function() {
    jQuery( ".abs-container,.post-navigation,header" ).width(jQuery('body').width()); //recalculate row width 100% when resized
    var headerHeight=calcHeaderHeight();
    jQuery( "header").height(headerHeight);//set header height to the height of the menu-logo div (its absolutely positioned)
    jQuery('.header-container').height(headerHeight);
    var topBarPosition=calcTopBarPosition();
    jQuery('.header-extra').stop().animate({ //reposition header extra vertical position
        top:topBarPosition
    },300);

    //resize the sticky sidebar because applying fixed means its not relative to its parent
    jQuery(".sticky-sidebar").width(jQuery(".sticky-sidebar").parent().width());



});



/**
 * User scroll header adjustments
 */
jQuery(window).scroll(function(){

    //image header fadeout
    var scrollVar = (jQuery(document).scrollTop()); //distance from top
    var distanceToBottomHeader=headerImageHeight-scrollVar
    var distanceToBottomHeaderPercentage=(Math.round((distanceToBottomHeader/headerImageHeight)*10)/10);//round to 1 dp, maybe not necessary

    if(distanceToBottomHeaderPercentage>=0)
    {
        jQuery('.parallax-fade').css({'opacity':distanceToBottomHeaderPercentage});
    }

    if(jQuery( "header" ).hasClass( "sticky-header" ))
    {
        var barHeight;
        if(jQuery(document).scrollTop() > 50)
        {

            if(jQuery('.logo').data('size') == 'big')
            {


                jQuery('.logo').data('size','small');
                jQuery('.vcenter-topbar.logo-holder').stop().animate({paddingTop: "5px",paddingBottom: "5px"},100);
                jQuery('.extra-topbar').stop().animate({height: "0px"},100);

                jQuery( ".logo" ).stop().animate({
                  height:logoSmallHeight
                    }, {
                    step: function( now, fx ) {
                    headerHeight=calcHeaderHeight();
                    topBarPosition=calcTopBarPosition();
                    jQuery('.header-extra').css({ top:topBarPosition });
                    jQuery( "header").height(headerHeight);
                    jQuery('.header-container').height(headerHeight);


                    // jQuery(".sticky-sidebar").css('padding-top',headerHeightPlus+'px');


                },complete: function () {

                    //var stickPosnTop=calcHeaderHeight()+45;
                    //jQuery('.sticky-sidebar').stop().animate({paddingTop:stickPosnTop },300);


                }
                });

                jQuery( ".progress-indicator" ).css("top",0); //set the position of the progress indicator
                jQuery( ".progress-indicator" ).fadeIn(900);
                jQuery( ".site-description" ).hide(300);//hide can be done immediately no need to wait for logo to finish animating

            }

        }
        else
        {

            if(jQuery('.logo').data('size') == 'small')
            {
                jQuery('.logo').data('size','big');
                jQuery('.vcenter-topbar.logo-holder').stop().animate({paddingTop: "20px",paddingBottom: "20px"},300);
                jQuery('.extra-topbar').stop().animate({height: extraTopbarHeight},200);

                jQuery( ".logo" ).stop().animate({
                  height:logoHeight
                }, {
                  step: function( now, fx ) {
                    headerHeight=calcHeaderHeight();
                    topBarPosition=calcTopBarPosition();
                    jQuery('.header-extra').css({ top:topBarPosition });
                    jQuery( "header").height(headerHeight);
                    jQuery('.header-container').height(headerHeight);


                },complete: function () {



                }
                });
                //var stickPosnTop=calcHeaderHeight()+40;
                //jQuery('.sticky-sidebar').stop().animate({paddingTop:0 },400);

                jQuery( ".progress-indicator" ).css("top","-100px");
                jQuery( ".progress-indicator" ).fadeOut();
                jQuery( ".site-description" ).show(300);
            }
        }
    }

});
