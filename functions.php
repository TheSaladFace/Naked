<?php
/**
 * naked functions and definitions
 *
 * @package naked
 */

/**
  * Generates hover string from the passed option array
  * @requires $opt_image_hover_item - multidimensional array containing user choice for hover
  */
function thshpr_get_image_hover_string($opt_image_hover_item)
{
	$hover_string='';
	if($opt_image_hover_item['template']=="1")//text
	{
		$hover_string=$opt_image_hover_item[1]['opt_image_hover_item_text'];
	}
	else if($opt_image_hover_item['template']=="2")//icon
	{
		$hover_string='<i class="'.$opt_image_hover_item[2]['opt_image_hover_item_icon'].'" data-value="'.$opt_image_hover_item['2']['opt_image_hover_item_icon'].'"></i>';
	}
	else if($opt_image_hover_item['template']=="3")//image
	{
		$hover_string='<img src="'.$opt_image_hover_item[3]['opt_image_hover_item_image']['url'].'">';
	}
	return $hover_string;
}

/**
 * Converts array of category id's into a comma delimited variable. Used when outputting category meta
 * @requires $post_categories - array containing category id's
 */
function thshpr_get_category_ids_string($post_categories)
{
	$strcats="";
	if(count($post_categories)>1)
	{
		foreach($post_categories as $value)
		{
			$strcats.=$value.",";
		}
	}
	else if(count($post_categories)==1)
	{
		$strcats=$post_categories[0];
	}
	else
	{
		$strcats=1;
	}
	return $strcats;
}

/**
 * Strips an excerpt to a desired length
 * @requires $limit - number of words maximum for the excerpt
 */
function thshpr_stripped_excerpt($limit)
{
	$excerpt = get_the_excerpt();
	$excerpt = strip_tags($excerpt);
	$excerpt = explode(' ', $excerpt, $limit);

	 if (count($excerpt)>=$limit) {
	 array_pop($excerpt);
	 $excerpt = implode(" ",$excerpt).'...';
	 } else {
	 $excerpt = implode(" ",$excerpt);
	 }
	 $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	 return $excerpt;
}

/**
 * Generates height given a width and aspect ratio
 * @requires $ratio,$width
 */
function thshpr_generate_aspect_height($ratio,$width)
{
	$height=round($ratio*$width);
	return $height;
}

/**
 * Generates an image given width, height and image id. If image already exists a new one won't be created
 * at those dimensions.
 * @requires $width,$height,$id
 */
function thshpr_generate_image($width,$height,$id)
{
	// Get upload directory info
	$upload_info = wp_upload_dir();
	$upload_dir  = $upload_info['basedir'];
	$upload_url  = $upload_info['baseurl'];

	// Get file path info
	$attachment_id = get_post_thumbnail_id($id);
	$path = get_attached_file( $attachment_id );
	$path_info = pathinfo( $path );
	$ext = $path_info['extension'];
	$rel_path  = str_replace( array( $upload_dir, ".$ext" ), '', $path );

	//large image
	$suffix    = "{$width}x{$height}";
	$dest_path = "{$upload_dir}{$rel_path}-{$suffix}.{$ext}";
	$image_url  = "{$upload_url}{$rel_path}-{$suffix}.{$ext}";

	if ( !file_exists( $dest_path ) )
	{
		// Generate thumbnail
		image_make_intermediate_size( $path, $width, $height, true );
	}

	$item_string='<img src="'.$image_url.'" width="'.$width.'" height="'.$height.'">';
	return($item_string);
}


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 880; /* pixels */




if ( ! function_exists( 'naked_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function naked_setup() {
    global $cap, $content_width;

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();
    if ( function_exists( 'add_theme_support' ) )
    {
    	    /**
	 * Add default posts and comments RSS feed links to head
	*/
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable support for Title Tag
	*/
	add_theme_support( "title-tag" );

	/**
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery','status',
	) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'naked_get_featured_posts',
		'max_posts' => 6,
	) );

	/**
	 * Setup the WordPress core custom background feature.
	*/
	add_theme_support( 'custom-background', apply_filters( 'naked_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    }

    /**
    * Set up image sizes
    */


  add_theme_support( 'post-thumbnails' );






    //featured thumbnail


    add_image_size( 'prevnext', 100, 100, true );
    /**
    * Make theme available for translation
    * Translations can be filed in the /languages/ directory
    * If you're building a theme based on naked, use a find and replace
    * to change 'naked' to the name of your theme in all the template files
    */
    load_theme_textdomain( 'naked', get_template_directory() . '/languages' );

    /**
    * This theme uses wp_nav_menu() in one location.
    */
    register_nav_menus( array(
        'primary'  => __( 'Header bottom menu', 'naked' ),
    ) );



}
endif; // naked_setup
add_action( 'after_setup_theme', 'naked_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function naked_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'naked' ),
		'id'            => 'right-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'naked' ),
		'id'            => 'left-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Above Content', 'naked' ),
		'id'            => 'above-content-sidebar',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Below Content Sidebar', 'naked' ),
		'id'            => 'below-content-sidebar',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	//register sidebar widgets if they have been activated from the options.

	if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
	{
		//homepage
		$widget_components=fw_get_db_settings_option('opt_header_rows_frontpage');
		generate_user_widgets($widget_components);

	}
	else
	{
		//$sidebars=array("Single(1st)","1/2s","Single(2nd)");
	}

}

/**
 * Enqueue scripts and styles
 */
function naked_scripts() {


	// load theme styles
	wp_enqueue_style( 'naked-style', get_stylesheet_uri() );


	wp_enqueue_script( 'naked-fittext-js', get_template_directory_uri() . '/static/js/jquery.fittext.js', array('jquery'),'',true );

	// load theme js

	wp_enqueue_script( 'naked-ssm-breakpoints', get_template_directory_uri() . '/static/js/ssm.js', array('jquery'),'',true );
	wp_enqueue_script( 'naked-matchheights', get_template_directory_uri() . '/static/js/jquery.matchHeight-min.js', array('jquery'),'',true );
	wp_register_script( 'naked-stellar', get_template_directory_uri() . '/static/js/jquery.stellar.min.js', array('jquery'),'',true );
	wp_register_script( 'naked-stellar-init', get_template_directory_uri() . '/static/js/stellar-init.js', array('jquery','naked-stellar'),'',true );

	wp_enqueue_script( 'naked-theme-js', get_template_directory_uri() . '/static/js/theme.js', array('jquery','naked-fittext-js','naked-ssm-breakpoints','naked-matchheights'),'',true );
	wp_enqueue_script( 'naked-skip-link-focus-fix', get_template_directory_uri() . '/static/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'naked-keyboard-image-navigation', get_template_directory_uri() . '/static/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'naked_scripts' );


function wpb_add_google_fonts() {


	wp_register_style('wpb-googleFonts', 'http://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic|Droid+Serif:400,700,400italic,700italic|Roboto|Lato|Lora|PT+Sans|Ubuntu|Bitter|PT+Serif|Monda|Rokkitt|Libre+Baskerville|Maven+Pro');
    wp_enqueue_style( 'wpb-googleFonts');
}
add_action('wp_print_styles', 'wpb_add_google_fonts');

/**
 * Implement the Custom Header feature.
 */
/*require get_template_directory() . '/static/custom-header.php';*/

/**
 * Custom template tags for this theme.
 */
/*require get_template_directory() . '/static/template-tags.php';*/

/**
 * Custom functions that act independently of the theme templates.
 */
/*require get_template_directory() . '/static/extras.php';*/

/**
 * Customizer additions.
 */
/*require get_template_directory() . '/static/customizer.php';*/

/**
 * Load Jetpack compatibility file.
 */
/*require get_template_directory() . '/static/jetpack.php';*/

/**
 * Load modified nav walker for bootstrap
 */
/*require get_template_directory() . '/static/bootstrap-wp-navwalker.php';*/

/**
 * Load social icons
 */
//require get_template_directory() . '/static/widgets/social-icons.php';

/**
 * Load featured posts widgets
 */
//require get_template_directory() . '/static/widgets/featured-posts.php';

/**
 * Load popular posts widgets
 */
//require get_template_directory() . '/static/widgets/popular-posts.php';

/**
 * Load related posts widgets
 */
//require get_template_directory() . '/static/widgets/related-posts.php';

/**
 * Load recent posts widgets
 */
//require get_template_directory() . '/static/widgets/recent-posts.php';

/**
 * Load fullscreen search widget
 */
//require get_template_directory() . '/static/widgets/fullscreen-search.php';

/**
 * Load twitter widget
 */
//require get_template_directory() . '/static/widgets/twitter.php';

/**
 * Load ad 125
 */
//require get_template_directory() . '/static/widgets/ad-multiline.php';
