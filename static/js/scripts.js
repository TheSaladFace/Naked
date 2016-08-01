/**
 * Handles basic scripting by the theme
 * @package naked
 */

function calcHeaderHeight(){
    var currentLogoHeight=jQuery(".vcenter-topbar.logo-holder").outerHeight();
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
var extraYPosn=((menuLogoHeight/2)-(headerExtraHeight/2))+dataSpacing; //dataspacing added cos of top padding on body
var firstLevel;
var windowWidth;
var thisItemMaxEdge

jQuery('.logo').data('size','big');

jQuery(document).ready(function(jQuery) {

    menuLogoHeight=jQuery(".menu-logo").outerHeight();
    logoHeight=jQuery(".logo").outerHeight();
    extraTopbarHeight=jQuery(".extra-topbar").outerHeight();
    titleHeight=jQuery(".site-title").outerHeight();

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

    jQuery("#menu-main>li").mouseenter(function() { //all the rest happens on hover over top level meny items

        /* set variables */
        firstLevel=jQuery(this);
        var off = jQuery(this).offset();
        var topItemLeftX = off.left;
        var subItemWidth=jQuery(".primary-navigation li .menu-item-has-children > a").width();
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

        /* check for overlap */
        if(thisItemMaxEdge>windowWidth)
        {

            var distanceToShiftFirstSub=(firstLevelWidth-(topItemLeftPadding*2))-subItemWidth; //where to place the first level hover if its out of bounds
            jQuery(firstLevel).addClass('edge'); //adds class, 3rd level items dealt with in CSS with - width
            jQuery(firstLevel).find('ul').first().css("left",distanceToShiftFirstSub+6); //set adjusted backwards first level position
            jQuery(firstLevel).find('ul').first().stop().fadeIn(400); //fadein the first level for good measure (might as well as we are now reliant on js)
        }
        else
        {
            jQuery(firstLevel).removeClass('edge'); //make sure this item has no edge class
            jQuery(firstLevel).find('ul').first().css("left",6); //set normal position
            jQuery(firstLevel).find('ul').first().stop().fadeIn(400);
        }

    }).mouseleave(function() {
        jQuery(firstLevel).removeClass('edge');
        jQuery(firstLevel).find('ul').first().stop().fadeOut(150, function() {
            jQuery(this).css("left","-999em"); //shift the menu to prevent activation when user mouses over the area
        });
    });



    /**
     * Social icon expanding effect
     */
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
    /* click outside hides the opened social icons */
    jQuery(document).on('click',function (e) {
        footerUl = jQuery('.start-icon');
        if (!footerUl.is(e.target)
        && footerUl.has(e.target).length === 0){
            jQuery( ".header-share-boxes" ).removeClass( "social-hover");
            jQuery(".start-icon").data('clickState', 0).removeClass("background-dark").addClass("background-accent").removeClass("fa-minus").addClass("fa-plus");

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
    jQuery( ".body-main-content").css("padding-top", headerHeight);//set the body main content offset due to sticky header

    var topBarPosition=calcTopBarPosition();
    jQuery('.header-extra').stop().animate({ //reposition header extra vertical position
        top:topBarPosition
    },300);

    /**
     * Sticky Sidebar
     */
    jQuery(".sticky-element").sticky({topSpacing:dataStickyPosn});

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

    //jQuery( '.alignnone' ).closest('a').wrap('<div class="align-none-fix"></div>');


});

//resize absolute elements due to borders
jQuery( window ).resize(function() {
    jQuery( ".abs-container,.post-navigation,header" ).width(jQuery('body').width()); //recalculate row width 100% when resized
    var headerHeight=calcHeaderHeight();
    jQuery( "header").height(headerHeight);//set header height to the height of the menu-logo div (its absolutely positioned)
    jQuery( ".body-main-content").css("padding-top", headerHeight);//set the body main content offset due to sticky header

    var topBarPosition=calcTopBarPosition();
    jQuery('.header-extra').stop().animate({ //reposition header extra vertical position
        top:topBarPosition
    },300);
});



/**
 * User scroll header adjustments
 */
jQuery(window).scroll(function(){

    if(jQuery( "header" ).hasClass( "sticky-header" ))
    {
        if(jQuery(document).scrollTop() > 100)
        {
            if(jQuery('.logo').data('size') == 'big')
            {

                jQuery('.logo').data('size','small');
                jQuery('.vcenter-topbar.logo-holder').stop().animate({paddingTop: "5px",paddingBottom: "5px"},300);
                jQuery('.extra-topbar').stop().animate({height: "0px"},300);

                /* logo animates to small size */
                jQuery('.logo').stop().animate({
                    height:logoSmallHeight
                },300,function() {

                    /* the overlaying bar containing the slide in menu and search
                    * has to calculate the mid point position *after* the logo height
                    * has been animated (the final menu logo bar height). Items are then
                    * animated into their new mid bar positions
                    */
                    var topBarPosition=calcTopBarPosition();

                    jQuery('.header-extra').stop().animate({ //reposition header extra vertical position
                        top:topBarPosition
                    },300);

                    var headerHeight=calcHeaderHeight();
                    jQuery( "header").height(headerHeight);//set header height to the height of the menu-logo div (its absolutely positioned)
                    //jQuery('.body-main-content').stop().animate({ //reposition header extra vertical position
                    //    paddingTop: 0,
                    //},300);
                    //jQuery( ".body-main-content").css("padding-top", headerHeight);//set the body main content offset due to sticky header

                    jQuery("header").addClass("shadow"); //add a shadow class to the bottom of the header when scrolling
                    jQuery( ".progress-indicator" ).css("top",0); //set the position of the progress indicator
                    jQuery( ".progress-indicator" ).fadeIn(900); // fade in progress indicator after scroll


                });

                jQuery( ".site-description" ).hide(300);//hide can be done immediately no need to wait for logo to finish animating

            }
        }
        else
        {
            if(jQuery('.logo').data('size') == 'small')
            {

                jQuery('.logo').data('size','big');
                jQuery('.vcenter-topbar.logo-holder').stop().animate({paddingTop: "20px",paddingBottom: "20px"},300);
                jQuery('.extra-topbar').stop().animate({height: extraTopbarHeight},300);
                jQuery('.logo').stop().animate({
                    height:logoHeight
                },300,function() {

                    var topBarPosition=calcTopBarPosition();
                    jQuery('.header-extra').stop().animate({ //reposition header extra vertical position
                        top:topBarPosition
                    },300);

                    //jQuery('.body-main-content').stop().animate({ //reposition header extra vertical position
                    //    paddingTop: topBarPosition,
                    //},300);

                    var headerHeight=calcHeaderHeight();
                    jQuery( "header").height(headerHeight);//set header height to the height of the menu-logo div (its absolutely positioned)
                    //jQuery( ".body-main-content").css("padding-top", headerHeight);//set the body main content offset due to sticky header


                    //set the position of the progress indicator
                    jQuery("header").removeClass("shadow"); //add a shadow class to the bottom of the header when scrolling
                    jQuery( ".progress-indicator" ).css("top","-100px");
                    jQuery( ".progress-indicator" ).fadeOut();

                });

                jQuery( ".site-description" ).show(300);
            }
        }

    }

});
