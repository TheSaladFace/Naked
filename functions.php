<?php
/**
 * naked functions and definitions
 *
 * @package naked
 */





/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 880; /* pixels */


function naked_template_generate_aspect_height($ratio,$width)
{
	if($ratio=="21:9")
	{
		$height=round(9/21*$width);
	}
	if($ratio=="16:9")
	{
		$height=round(9/16*$width);
	}
	else if($ratio=="3:2")
	{
		$height=round(2/3*$width);
	}
	else if($ratio=="4:3")
	{
		$height=round(3/4*$width);
	}
	else if($ratio=="1:1")
	{
		$height=round(1/1*$width);
	}
	else if($ratio=="3:4")
	{
		$height=round(4/3*$width);
	}
	else if($ratio=="2:3")
	{
		$height=round(3/2*$width);
	}
	else if($ratio=="9:16")
	{
		$height=round(16/9*$width);
	}

	return $height;

}
function naked_template_generate_image_from_options_url_only($width,$height,$id) //less chinanigans here with id
{
	// Get upload directory info
	$upload_info = wp_upload_dir();
	$upload_dir  = $upload_info['basedir'];
	$upload_url  = $upload_info['baseurl'];

	// Get file path info
	$path = get_attached_file( $id );
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

	$item_string=$image_url;
	return($item_string);
}
function naked_template_generate_image_from_options($width,$height,$id) //less chinanigans here with id
{
	// Get upload directory info
	$upload_info = wp_upload_dir();
	$upload_dir  = $upload_info['basedir'];
	$upload_url  = $upload_info['baseurl'];

	// Get file path info
	$path = get_attached_file( $id );
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
function naked_template_generate_image($width,$height,$id)
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

function nude_generate_image_height($ratio,$width)
{
	$height='';
	if($ratio=="21:9")
	{
		$height=9/21*$width;
	}
	if($ratio=="16:9")
	{
		$height=9/16*$width;
	}
	else if($ratio=="3:2")
	{
		$height=2/3*$width;
	}
	else if($ratio=="4:3")
	{
		$height=3/4*$width;
	}
	else if($ratio=="1:1")
	{
		$height=1/1*$width;
	}
	else if($ratio=="3:4")
	{
		$height=4/3*$width;
	}
	else if($ratio=="2:3")
	{
		$height=3/2*$width;
	}
	else if($ratio=="9:16")
	{
		$height=16/9*$width;
	}



	return $height;
}


/*add_action( 'widgets_init', 'naked_widgets_init' );

function generate_user_widgets($widget_components)
{
	foreach ($widget_components as $key=>$value)
	{
		switch($value['opt_header_element_type']['template'])
		{
			case 'Widget Row (Single Column)':

				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$layout="Single Column";
					$first_widget_name=$value['opt_header_element_type']['Widget Row (Single Column)']["widget_first"];
					$first_widget_id=str_replace(" ", "-", $first_widget_name);

					register_sidebar( array(
						'name'          =>$first_widget_name,
						'id'            => $first_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

				}
				else
				{

				}

			break;

			case 'Widget Row (1/2-1/2)':

				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$layout="1/2-1/2";
					$first_widget_name=$value['opt_header_element_type']['Widget Row (1/2-1/2)']["widget_first"];
					$second_widget_name=$value['opt_header_element_type']['Widget Row (1/2-1/2)']["widget_second"];
					$first_widget_id=str_replace(" ", "-", $first_widget_name);
					$second_widget_id=str_replace(" ", "-", $second_widget_name);

					register_sidebar( array(
						'name'          =>$first_widget_name,
						'id'            => $first_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

					register_sidebar( array(
						'name'          =>$second_widget_name,
						'id'            => $second_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

				}
				else
				{

				}

			break;

			case 'Widget Row (1/3-1/3-1/3)':

				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$layout="1/3-1/3-1/3";
					$first_widget_name=$value['opt_header_element_type']['Widget Row (1/3-1/3-1/3)']["widget_first"];
					$second_widget_name=$value['opt_header_element_type']['Widget Row (1/3-1/3-1/3)']["widget_second"];
					$third_widget_name=$value['opt_header_element_type']['Widget Row (1/3-1/3-1/3)']["widget_third"];
					$first_widget_id=str_replace(" ", "-", $first_widget_name);
					$second_widget_id=str_replace(" ", "-", $second_widget_name);
					$third_widget_id=str_replace(" ", "-", $third_widget_name);

					register_sidebar( array(
						'name'          =>$first_widget_name,
						'id'            => $first_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

					register_sidebar( array(
						'name'          =>$second_widget_name,
						'id'            => $second_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

					register_sidebar( array(
						'name'          =>$third_widget_name,
						'id'            => $third_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

				}
				else
				{

				}

			break;

			case 'Widget Row (1/4-1/4-1/2)':

				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$layout="1/4-1/4-1/2";
					$first_widget_name=$value['opt_header_element_type']['Widget Row (1/4-1/4-1/2)']["widget_first"];
					$second_widget_name=$value['opt_header_element_type']['Widget Row (1/4-1/4-1/2)']["widget_second"];
					$third_widget_name=$value['opt_header_element_type']['Widget Row (1/4-1/4-1/2)']["widget_third"];
					$first_widget_id=str_replace(" ", "-", $first_widget_name);
					$second_widget_id=str_replace(" ", "-", $second_widget_name);
					$third_widget_id=str_replace(" ", "-", $third_widget_name);

					register_sidebar( array(
						'name'          =>$first_widget_name,
						'id'            => $first_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

					register_sidebar( array(
						'name'          =>$second_widget_name,
						'id'            => $second_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

					register_sidebar( array(
						'name'          =>$third_widget_name,
						'id'            => $third_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

				}
				else
				{

				}

			break;

			case 'Widget Row (1/2-1/2-1/4)':

				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$layout="1/2-1/2-1/4";
					$first_widget_name=$value['opt_header_element_type']['Widget Row (1/2-1/2-1/4)']["widget_first"];
					$second_widget_name=$value['opt_header_element_type']['Widget Row (1/2-1/2-1/4)']["widget_second"];
					$third_widget_name=$value['opt_header_element_type']['Widget Row (1/2-1/2-1/4)']["widget_third"];
					$first_widget_id=str_replace(" ", "-", $first_widget_name);
					$second_widget_id=str_replace(" ", "-", $second_widget_name);
					$third_widget_id=str_replace(" ", "-", $third_widget_name);

					register_sidebar( array(
						'name'          =>$first_widget_name,
						'id'            => $first_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

					register_sidebar( array(
						'name'          =>$second_widget_name,
						'id'            => $second_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

					register_sidebar( array(
						'name'          =>$third_widget_name,
						'id'            => $third_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

				}
				else
				{

				}

			break;

			case 'Widget Row (1/4-1/4-1/4-1/4)':

				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$layout="1/4-1/4-1/4-1/4";
					$first_widget_name=$value['opt_header_element_type']['Widget Row (1/4-1/4-1/4-1/4)']["widget_first"];
					$second_widget_name=$value['opt_header_element_type']['Widget Row (1/4-1/4-1/4-1/4)']["widget_second"];
					$third_widget_name=$value['opt_header_element_type']['Widget Row (1/4-1/4-1/4-1/4)']["widget_third"];
					$fourth_widget_name=$value['opt_header_element_type']['Widget Row (1/4-1/4-1/4-1/4)']["widget_fourth"];
					$first_widget_id=str_replace(" ", "-", $first_widget_name);
					$second_widget_id=str_replace(" ", "-", $second_widget_name);
					$third_widget_id=str_replace(" ", "-", $third_widget_name);
					$fourth_widget_id=str_replace(" ", "-", $fourth_widget_name);

					register_sidebar( array(
						'name'          =>$first_widget_name,
						'id'            => $first_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

					register_sidebar( array(
						'name'          =>$second_widget_name,
						'id'            => $second_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

					register_sidebar( array(
						'name'          =>$third_widget_name,
						'id'            => $third_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

					register_sidebar( array(
						'name'          =>$fourth_widget_name,
						'id'            => $fourth_widget_id,
						'before_widget' => '',
						'after_widget'  => '',
						'before_title'  => '',
						'after_title'   => '',
					) );

				}
				else
				{

				}

			break;
		}
	}
}*/
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

	/*
	//localise option variables for use in the main javascript file
	global $nude_options;

	if($nude_options['opt_featured_thumbnail_slider_infinite'])				{$infinite='true';}
	else																	{$infinite='false';}

	if($nude_options['opt_featured_thumbnail_slider_scroll_visible_slides'])	{$scroll_visible='true';}
	else																	{$scroll_visible='false';}

	if($nude_options['opt_featured_thumbnail_slider_autoplay_speed']!=0)		{$autoplay='true';}
	else																	{$autoplay='false';}

	if($nude_options['opt_featured_thumbnail_slider_full_screen']!=0)			{$full_screen='true';}
	else																	{$full_screen='false';}


	$naked_php_to_javascript_variables = array(
	'infinite'				=> 	$infinite,
	//'slides_to_show'		=> $nude_options['opt_featured_thumbnail_slider_slides_to_show'],
	'scroll_visible'		=> $scroll_visible,
//	'center_mode'		=> $center_mode,
	'autoplay'			=> $autoplay,
	'full_screen'			=> $full_screen,
	'autoplay_speed'		=> $nude_options['opt_featured_thumbnail_slider_autoplay_speed']
	);
	wp_localize_script( 'naked-theme-js', 'php_vars', $naked_php_to_javascript_variables );*/

	wp_enqueue_script( 'naked-skip-link-focus-fix', get_template_directory_uri() . '/static/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'naked-keyboard-image-navigation', get_template_directory_uri() . '/static/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

	/**
	* Add custom styles
	*/

	//adjusts margins for the custom boostrap container in the featured slider.
	//using a custom container size. The slider calculates its width with margins, thus there is always padding both sides
	//the solution I have used is to make a slightly larger bootstrap container.
	//container is widened here by 2x margin, and the margin is also added here.



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
