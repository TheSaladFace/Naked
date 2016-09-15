<?php
/**
 * naked functions and definitions
 *
 * @package naked
 */

/**
  * Enable shortcodes for editor
  */

if (defined('FW'))
{
    function thshpr_set_default_shortcodes($previous_shortcodes)
    {
        var_dump($previous_shortcodes);
        return array( 'posts_block', 'spacer', 'about_the_author','header','post_navigation','post_slider_3','5_posts_featured','lead_paragraph' );
    }
    add_filter('fw:ext:wp-shortcodes:default-shortcodes', 'thshpr_set_default_shortcodes');
}
/**
  * Adds styles for the editor
  */
/*function thshpr_add_editor_styles()
{
    add_editor_style( 'custom-editor-styles.css' );
}
add_action( 'init', 'thshpr_add_editor_styles' );

/**
  * Special Styles in Posts
  */
/*function thshpr_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'thshpr_mce_buttons_2');

/**
  * Callback function to filter the MCE settings
  */
/*function thshpr_before_init_insert_formats( $init_array )
{
	// Define the style_formats array
	$style_formats = array(
		// Each array child is a format with it's own settings
		array(
			'title' => 'Post Lead',
			'inline' => 'span',
			'classes' => 'post-lead',
			'wrapper' => true,
		),
		array(
			'title' => 'Drop Cap',
			'inline' => 'span',
			'classes' => 'dropcap',
			'wrapper' => true,
		),

	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );
	return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'thshpr_before_init_insert_formats' );*/




/**
  * Add extra form info for users
  */
function thshpr_show_extra_profile_fields( $user )
{
	?>
	<h3>Theme Special Information</h3>
	<table class="form-table">
		<tr>
			<th><label for="extrainfo">Extra Info</label></th>
			<td>
				<input type="text" name="extrainfo" id="extrainfo" value="<?php echo esc_attr( get_the_author_meta( 'extrainfo', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter extra info (this goes below the user name).</span>
			</td>
		</tr>
		<tr>
			<th><label for="twitter">Twitter URL</label></th>
			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Twitter URL (enter entire URL).</span>
			</td>
		</tr>
		<tr>
			<th><label for="facebook">Facebook</label></th>
			<td>
				<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Facebook URL (enter entire URL).</span>
			</td>
		</tr>
		<tr>
			<th><label for="googleplus">Google Plus</label></th>
			<td>
				<input type="text" name="googleplus" id="googleplus" value="<?php echo esc_attr( get_the_author_meta( 'googleplus', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Google Plus URL (enter entire URL).</span>
			</td>
		</tr>
		<tr>
			<th><label for="linkedin">Linked In</label></th>
			<td>
				<input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Linked In URL (enter entire URL).</span>
			</td>
		</tr>
        <tr>
			<th><label for="youtube">Youtube</label></th>
			<td>
				<input type="text" name="youtube" id="youtube" value="<?php echo esc_attr( get_the_author_meta( 'youtube', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Youtube URL (enter entire URL).</span>
			</td>
		</tr>
		<tr>
			<th><label for="pinterest">Pinterest</label></th>
			<td>
				<input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Pinterest URL (enter entire URL).</span>
			</td>
		</tr>
        <tr>
			<th><label for="instagram">Instagram</label></th>
			<td>
				<input type="text" name="instagram" id="instagram" value="<?php echo esc_attr( get_the_author_meta( 'instagram', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Instagram URL (enter entire URL).</span>
			</td>
		</tr>
        <tr>
			<th><label for="tumblr">Tumblr</label></th>
			<td>
				<input type="text" name="tumblr" id="tumblr" value="<?php echo esc_attr( get_the_author_meta( 'tumblr', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Tumblr URL (enter entire URL).</span>
			</td>
		</tr>
        <tr>
			<th><label for="vine">Vine</label></th>
			<td>
				<input type="text" name="vine" id="vine" value="<?php echo esc_attr( get_the_author_meta( 'vine', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Vine URL (enter entire URL).</span>
			</td>
		</tr>
        <tr>
			<th><label for="snapchat">Snapchat</label></th>
			<td>
				<input type="text" name="snapchat" id="snapchat" value="<?php echo esc_attr( get_the_author_meta( 'snapchat', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Snapchat URL (enter entire URL).</span>
			</td>
		</tr>
        <tr>
			<th><label for="reddit">Reddit</label></th>
			<td>
				<input type="text" name="reddit" id="reddit" value="<?php echo esc_attr( get_the_author_meta( 'reddit', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Reddit URL (enter entire URL).</span>
			</td>
		</tr>
        <tr>
			<th><label for="flickr">Flickr</label></th>
			<td>
				<input type="text" name="flickr" id="flickr" value="<?php echo esc_attr( get_the_author_meta( 'flickr', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Flickr URL (enter entire URL).</span>
			</td>
		</tr>
        <tr>
			<th><label for="email">Email</label></th>
			<td>
				<input type="text" name="email" id="email" value="<?php echo esc_attr( get_the_author_meta( 'email', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Email URL (enter entire URL).</span>
			</td>
		</tr>

	</table>
	<?php
}
add_action( 'show_user_profile', 'thshpr_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'thshpr_show_extra_profile_fields' );

/**
  * Save extra form info for users
  */
function thshpr_save_extra_profile_fields( $user_id )
{
	if ( !current_user_can( 'edit_user', $user_id ) )
	return false;
    update_usermeta( $user_id, 'extrainfo', $_POST['extrainfo'] );
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
	update_usermeta( $user_id, 'googleplus', $_POST['googleplus'] );
	update_usermeta( $user_id, 'linkedin', $_POST['linkedin'] );
	update_usermeta( $user_id, 'pinterest', $_POST['pinterest'] );
    update_usermeta( $user_id, 'youtube', $_POST['youtube'] );
    update_usermeta( $user_id, 'instagram', $_POST['instagram'] );
	update_usermeta( $user_id, 'tumblr', $_POST['tumblr'] );
	update_usermeta( $user_id, 'vine', $_POST['vine'] );
	update_usermeta( $user_id, 'snapchat', $_POST['snapchat'] );
	update_usermeta( $user_id, 'reddit', $_POST['reddit'] );
    update_usermeta( $user_id, 'flickr', $_POST['flickr'] );
	update_usermeta( $user_id, 'email', $_POST['email'] );

}
add_action( 'personal_options_update', 'thshpr_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'thshpr_save_extra_profile_fields' );

/**
  * Add placeholders to WordPress comment info fields
  */
function thshpr_update_fields($fields)
{
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req = ($req ? " aria-required='true'" : '');

	$fields['author'] =
	'<p class="comment-form-author">
	<input required minlength="3" maxlength="30" placeholder="' . __("Name*", "thshpr") . '" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .
	'" size="30"' . $aria_req . ' />
	</p>';

	$fields['email'] =
	'<p class="comment-form-email">
	<input required placeholder="' . __("Email*", "thshpr") . '" id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) .
	'" size="30"' . $aria_req . ' />
	</p>';

	$fields['url'] =
	'<p class="comment-form-url">
	<input placeholder="' . __("Website", "thshpr") . '" id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) .
	'" size="30" />
	</p>';

	return $fields;
}
add_filter('comment_form_default_fields', 'thshpr_update_fields');

/**
  * Add placeholders to WordPress comment field
  */
function thshpr_comment_field($comment_field)
{
	$comment_field =
	'<p class="comment-form-comment">
	<textarea required placeholder="Enter Your Comment…" id="comment" name="comment" aria-required="true"></textarea>
	</p>';

	return $comment_field;
}
add_filter('comment_form_field_comment', 'thshpr_comment_field');

/**
  * Generates and outputs google fonts string
  */
function thshpr_load_fonts()
{
	$include_from_google = array();
	$google_fonts = fw_get_google_fonts();

	$h1 = fw_get_db_customizer_option('opt_h1');
	$h2 = fw_get_db_customizer_option('opt_h2');
	$h3 = fw_get_db_customizer_option('opt_h3');
	$h4 = fw_get_db_customizer_option('opt_h4');
	$h5 = fw_get_db_customizer_option('opt_h5');
	$h6 = fw_get_db_customizer_option('opt_h6');
	$body = fw_get_db_customizer_option('opt_body');
    $small_italic = fw_get_db_customizer_option('opt_small_italic');
    $categories_tags = fw_get_db_customizer_option('opt_category_tag');
	$large_description = fw_get_db_customizer_option('opt_large_description');
	$other_meta = fw_get_db_customizer_option('opt_other_meta');
    $article_lead = fw_get_db_customizer_option('opt_article_lead');

	/* gets google fonts and adds to the array */
	if( isset($google_fonts[$h1['family']]) ){
		$include_from_google[$h1['family']] = $google_fonts[$h1['family']];
	}
	if( isset($google_fonts[$h2['family']]) ){
		$include_from_google[$h2['family']] = $google_fonts[$h2['family']];
	}
	if( isset($google_fonts[$h3['family']]) ){
		$include_from_google[$h3['family']] = $google_fonts[$h3['family']];
	}
	if( isset($google_fonts[$h4['family']]) ){
		$include_from_google[$h4['family']] = $google_fonts[$h4['family']];
	}
	if( isset($google_fonts[$h5['family']]) ){
		$include_from_google[$h5['family']] = $google_fonts[$h5['family']];
	}
	if( isset($google_fonts[$h6['family']]) ){
		$include_from_google[$h6['family']] = $google_fonts[$h6['family']];
	}
	if( isset($google_fonts[$body['family']]) ){
		$include_from_google[$body['family']] = $google_fonts[$body['family']];
	}
    if( isset($google_fonts[$small_italic['family']]) ){
		$include_from_google[$small_italic['family']] = $google_fonts[$small_italic['family']];
	}
    if( isset($google_fonts[$article_lead['family']]) ){
		$include_from_google[$article_lead['family']] = $google_fonts[$article_lead['family']];
	}

	if( isset($google_fonts[$categories_tags['family']]) ){
		$include_from_google[$categories_tags['family']] = $google_fonts[$categories_tags['family']];
	}
	if( isset($google_fonts[$large_description['family']]) ){
		$include_from_google[$large_description['family']] = $google_fonts[$large_description['family']];
	}
	if( isset($google_fonts[$other_meta['family']]) ){
		$include_from_google[$other_meta['family']] = $google_fonts[$other_meta['family']];
	}
	if ( ! sizeof( $include_from_google ) ) {
		return '';
	}

	$font_string='http://fonts.googleapis.com/css?family=';
	foreach ( $include_from_google as $font => $styles )
	{
		$font_string .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variants'] ) . '|';
	}

	$font_string = substr( $font_string, 0, - 1 );
	wp_register_style('thshpr-google-fonts',  esc_url( $font_string ));
	wp_enqueue_style( 'thshpr-google-fonts');
}

if (defined('FW'))
{
	add_action('wp_print_styles', 'thshpr_load_fonts');
}

/**
  * Separates Google fonts font-style and font-weight
  */
function thshpr_google_font_style_weight_split($field) {

    $output = '';

    if ( isset($field) ) {

        $pattern = '/(\d+)|(regular|italic)/i';

        preg_match_all($pattern, $field, $matches);

        foreach ($matches[0] as $value) {
            if ( $value == 'italic' ) {
                $output .= 'font-style:' . $value . ';';
            } else if ( $value == 'regular' ) {
                $output .= 'font-style:normal;';
            } else {
                $output .= 'font-weight:' . $value . ';';
            }
        }

    }

    if ( isset($field['family']) ) {
        $output .= 'font-family:' . $field['family'] . ';';
    }

    return $output;

}

/**
  * Adds classes to the body based on user options.
  * Site borders will be used in thshpr_print_styles to control borders
  * Sticky Sidebars is called in scripts.js if the body class is present to make the sidebar sticky.
  */
function thshpr_body_classes( $classes )
{
    if(function_exists( 'fw_get_db_customizer_option' ))
    {
        $site_borders_size=fw_get_db_customizer_option('opt_site_borders_size');
        if($site_borders_size>0)
        {
            $classes[] = "site-borders";
        }
    }
    return $classes;
}
add_filter( 'body_class','thshpr_body_classes' );

/**
  * Generates and outputs google fonts string, enqueues styles
  */
function thshpr_print_styles()
{
	// load theme styles
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/static/css/normalize.css','', '', 'all');
    wp_enqueue_style( 'thshpr-animate', get_template_directory_uri(). '/static/css/animate-min.css', array('normalize'), '', 'all');
	wp_enqueue_style( 'thshpr-style', get_stylesheet_uri(), array('normalize','thshpr-animate'), '', 'all');

    if (!defined('FW')) return;
	$h1 = fw_get_db_customizer_option('opt_h1');
    $h1_medium_devices_desktops=fw_get_db_customizer_option('opt_h1_medium_devices_desktops');
	$h1_small_devices_tablets=fw_get_db_customizer_option('opt_h1_small_devices_tablets');
    $h1_extra_small_devices_phones=fw_get_db_customizer_option('opt_h1_extra_small_devices_phones');
    $h1_tiny_devices_phones=fw_get_db_customizer_option('opt_h1_tiny_devices_phones');
	$h2 = fw_get_db_customizer_option('opt_h2');
    $h2_medium_devices_desktops=fw_get_db_customizer_option('opt_h2_medium_devices_desktops');
	$h2_small_devices_tablets=fw_get_db_customizer_option('opt_h2_small_devices_tablets');
    $h2_extra_small_devices_phones=fw_get_db_customizer_option('opt_h2_extra_small_devices_phones');
    $h2_tiny_devices_phones=fw_get_db_customizer_option('opt_h2_tiny_devices_phones');
	$h3 = fw_get_db_customizer_option('opt_h3');
    $h3_medium_devices_desktops=fw_get_db_customizer_option('opt_h3_medium_devices_desktops');
	$h3_small_devices_tablets=fw_get_db_customizer_option('opt_h3_small_devices_tablets');
    $h3_extra_small_devices_phones=fw_get_db_customizer_option('opt_h3_extra_small_devices_phones');
    $h3_tiny_devices_phones=fw_get_db_customizer_option('opt_h3_tiny_devices_phones');
	$h4 = fw_get_db_customizer_option('opt_h4');
    $h4_medium_devices_desktops=fw_get_db_customizer_option('opt_h4_medium_devices_desktops');
	$h4_small_devices_tablets=fw_get_db_customizer_option('opt_h4_small_devices_tablets');
    $h4_extra_small_devices_phones=fw_get_db_customizer_option('opt_h4_extra_small_devices_phones');
    $h4_tiny_devices_phones=fw_get_db_customizer_option('opt_h4_tiny_devices_phones');
	$h5 = fw_get_db_customizer_option('opt_h5');
    $h5_medium_devices_desktops=fw_get_db_customizer_option('opt_h5_medium_devices_desktops');
	$h5_small_devices_tablets=fw_get_db_customizer_option('opt_h5_small_devices_tablets');
    $h5_extra_small_devices_phones=fw_get_db_customizer_option('opt_h5_extra_small_devices_phones');
    $h5_tiny_devices_phones=fw_get_db_customizer_option('opt_h5_tiny_devices_phones');
	$h6 = fw_get_db_customizer_option('opt_h6');
    $h6_medium_devices_desktops=fw_get_db_customizer_option('opt_h6_medium_devices_desktops');
	$h6_small_devices_tablets=fw_get_db_customizer_option('opt_h6_small_devices_tablets');
    $h6_extra_small_devices_phones=fw_get_db_customizer_option('opt_h6_extra_small_devices_phones');
    $h6_tiny_devices_phones=fw_get_db_customizer_option('opt_h6_tiny_devices_phones');
	$body = fw_get_db_customizer_option('opt_body');
    $body_medium_devices_desktops=fw_get_db_customizer_option('opt_body_medium_devices_desktops');
	$body_small_devices_tablets=fw_get_db_customizer_option('opt_body_small_devices_tablets');
    $body_extra_small_devices_phones=fw_get_db_customizer_option('opt_body_extra_small_devices_phones');
    $body_tiny_devices_phones=fw_get_db_customizer_option('opt_body_tiny_devices_phones');
    $small_italic = fw_get_db_customizer_option('opt_small_italic');
    $small_italic_hover = fw_get_db_customizer_option('opt_small_italic_font_hover_color');
    $small_italic_medium_devices_desktops=fw_get_db_customizer_option('opt_small_italic_medium_devices_desktops');
	$small_italic_small_devices_tablets=fw_get_db_customizer_option('opt_small_italic_small_devices_tablets');
    $small_italic_extra_small_devices_phones=fw_get_db_customizer_option('opt_small_italic_extra_small_devices_phones');
    $small_italic_tiny_devices_phones=fw_get_db_customizer_option('opt_small_italic_tiny_devices_phones');

	$sidebar_h3 = fw_get_db_customizer_option('opt_sidebar_h3');
    $sidebar_h3_medium_devices_desktops=fw_get_db_customizer_option('opt_sidebar_h3_medium_devices_desktops');

	$sidebar_paragraph = fw_get_db_customizer_option('opt_sidebar_paragraph');
    $sidebar_paragraph_medium_devices_desktops=fw_get_db_customizer_option('opt_sidebar_paragraph_medium_devices_desktops');

    $article_lead = fw_get_db_customizer_option('opt_article_lead');
    $article_lead_medium_devices_desktops=fw_get_db_customizer_option('opt_article_lead_medium_devices_desktops');
	$article_lead_small_devices_tablets=fw_get_db_customizer_option('opt_article_lead_small_devices_tablets');
    $article_lead_extra_small_devices_phones=fw_get_db_customizer_option('opt_article_lead_extra_small_devices_phones');
    $article_lead_tiny_devices_phones=fw_get_db_customizer_option('opt_article_lead_tiny_devices_phones');

    $site_description = fw_get_db_customizer_option('opt_site_description');
	$categories_tags = fw_get_db_customizer_option('opt_tags_categories');
	$categories_tags_font_hover_color = fw_get_db_customizer_option('opt_tags_categories_font_hover_color');
	$categories_tags_background = fw_get_db_customizer_option('opt_tags_categories_background_color');
	$categories_tags_background_hover = fw_get_db_customizer_option('opt_tags_categories_background_color_hover');
	$large_description = fw_get_db_customizer_option('opt_large_description');
	$small_description = fw_get_db_customizer_option('opt_small_description');
	$other_meta = fw_get_db_customizer_option('opt_other_meta');
	$other_meta_hover = fw_get_db_customizer_option('opt_other_meta_hover');
    $accent_color = fw_get_db_customizer_option('opt_accent_color');
    $accent_contents_color = fw_get_db_customizer_option('opt_accent_contents_color');
    $dark_color = fw_get_db_customizer_option('opt_dark_color');
    $dark_contents_color = fw_get_db_customizer_option('opt_dark_contents_color');

    $site_borders_size=fw_get_db_customizer_option('opt_site_borders_size');
    $scroll_to_top_bottom_position=$site_borders_size+12;
	$option_styles =
	'
    @media only screen and (min-width : 320px)
    {'
        .'h1{ font-family:'.esc_html($h1['family']).';'. thshpr_google_font_style_weight_split($h1['variation']) . 'font-size:'.esc_html($h1_tiny_devices_phones['size']).'px;'. 'color:'.esc_html($h1['color']).';'. 'letter-spacing:'.esc_html($h1['letter-spacing']).'px;'. 'line-height:'.esc_html($h1_tiny_devices_phones['line-height']).'px; }'
        .'h2,.comments-title{ font-family:'.esc_html($h2['family']).';'. thshpr_google_font_style_weight_split($h2['variation']) . 'font-size:'.esc_html($h2_tiny_devices_phones['size']).'px;'. 'color:'.esc_html($h2['color']).';'. 'letter-spacing:'.esc_html($h2['letter-spacing']).'px;'. 'line-height:'.esc_html($h2_tiny_devices_phones['line-height']).'px; }'
    	.'h3, .component-element h3, .component-element h3 a{ font-family:'.esc_html($h3['family']).';'. thshpr_google_font_style_weight_split($h3['variation']) . 'font-size:'.esc_html($h3_tiny_devices_phones['size']).'px;'. 'color:'.esc_html($h3['color']).';'. 'letter-spacing:'.esc_html($h3['letter-spacing']).'px;'. 'line-height:'.esc_html($h3_tiny_devices_phones['line-height']).'px; }'
		.'h3.widget-title, h3.widget-title a{ font-family:'.esc_html($sidebar_h3['family']).';'. thshpr_google_font_style_weight_split($sidebar_h3['variation']) . 'color:'.esc_html($sidebar_h3['color']).';'. 'letter-spacing:'.esc_html($sidebar_h3['letter-spacing']).'px;'. 'line-height:'.esc_html($sidebar_h3['line-height']).'px; }'
		.'.sidebar, .sidebar p, .sidebar a, .sidebar li{ font-family:'.esc_html($sidebar_paragraph['family']).';'. thshpr_google_font_style_weight_split($sidebar_paragraph['variation']) . 'color:'.esc_html($sidebar_paragraph['color']).';'. 'letter-spacing:'.esc_html($sidebar_paragraph['letter-spacing']).'px;'. 'line-height:'.esc_html($sidebar_paragraph['line-height']).'px; }'
    	.'h4, .component-element h4, .component-element h4 a, .post-lead, .sub-title-header, blockquote{ font-family:'.esc_html($h4['family']).';'. thshpr_google_font_style_weight_split($h4['variation']) . 'font-size:'.esc_html($h4_tiny_devices_phones['size']).'px;'. 'color:'.esc_html($h4['color']).';'. 'letter-spacing:'.esc_html($h4['letter-spacing']).'px;'. 'line-height:'.esc_html($h4_tiny_devices_phones['line-height']).'px; }'
    	.'h5{ font-family:'.esc_html($h5['family']).';'. thshpr_google_font_style_weight_split($h5['variation']) . 'font-size:'.esc_html($h5_tiny_devices_phones['size']).'px;'. 'color:'.esc_html($h5['color']).';'. 'letter-spacing:'.esc_html($h5['letter-spacing']).'px;'. 'line-height:'.esc_html($h5_tiny_devices_phones['line-height']).'px; }'
    	.'h6{ font-family:'.esc_html($h6['family']).';'. thshpr_google_font_style_weight_split($h6['variation']) . 'font-size:'.esc_html($h6_tiny_devices_phones['size']).'px;'. 'color:'.esc_html($h6['color']).';'. 'letter-spacing:'.esc_html($h6['letter-spacing']).'px;'. 'line-height:'.esc_html($h6_tiny_devices_phones['line-height']).'px; }'
    	.'body{ font-family:'.esc_html($body['family']).';'. thshpr_google_font_style_weight_split($body['variation']) . 'font-size:'.esc_html($body_tiny_devices_phones['size']).'px;'. 'color:'.esc_html($body['color']).';'. 'letter-spacing:'.esc_html($body['letter-spacing']).'px;'. 'line-height:'.esc_html($body_tiny_devices_phones['line-height']).'px; }'
        .'.lead-text{ font-family:'.esc_html($article_lead['family']).';'. thshpr_google_font_style_weight_split($article_lead['variation']) . 'font-size:'.esc_html($article_lead_tiny_devices_phones['size']).'px;'. 'color:'.esc_html($article_lead['color']).';'. 'letter-spacing:'.esc_html($article_lead['letter-spacing']).'px;'. 'line-height:'.esc_html($article_lead_tiny_devices_phones['line-height']).'px; }'
		.'.post-date, .rss-date, .rssSummary{ font-family:'.esc_html($small_italic['family']).';'. thshpr_google_font_style_weight_split($small_italic['variation']) . 'color:'.esc_html($small_italic['color']).';}'
		.'.sidebar .widget ul.children li:before{ color:'.esc_html($small_italic['color']).';}'
		.'.tags, .tags a{ font-family:'.esc_html($categories_tags['family']).';'. thshpr_google_font_style_weight_split($categories_tags['variation']) . 'font-size:'.esc_html($categories_tags['size']).'px;'. 'color:'.esc_html($categories_tags['color']).';'. 'letter-spacing:'.esc_html($categories_tags['letter-spacing']).'px;'. 'line-height:'.esc_html($categories_tags['line-height']).'px; }'
    	.'.tags a{ background-color:'.esc_html($categories_tags_background).';}'
    	.'.tags a:hover{ background-color:'.esc_html($categories_tags_font_hover_color).';}'
    	.'.tags a:hover{ background-color:'.esc_html($categories_tags_background_hover).';}'
		.'.tagcloud{ line-height:'.esc_html($categories_tags['line-height']).'px; }'
		.'.tagcloud a{ font-family:'.esc_html($categories_tags['family']).';'. thshpr_google_font_style_weight_split($categories_tags['variation']) . 'font-size:'.esc_html($categories_tags['size']).'px !important;'. 'color:'.esc_html($categories_tags['color']).';'. 'letter-spacing:'.esc_html($categories_tags['letter-spacing']).'px;'. 'line-height:'.esc_html($categories_tags['line-height']).'px; }'
    	.'.tagcloud a{ background-color:'.esc_html($categories_tags_background).';}'
    	.'.tagcloud a:hover{ background-color:'.esc_html($categories_tags_font_hover_color).';}'
    	.'.tagcloud a:hover{ background-color:'.esc_html($categories_tags_background_hover).';}'
		.'.small-italic, .small-italic a, .sidebar .small-italic ,.sidebar .small-italic a{ font-family:'.esc_html($small_italic['family']).';'. thshpr_google_font_style_weight_split($small_italic['variation']) . 'font-size:'.esc_html($small_italic_tiny_devices_phones['size']).'px;'. 'color:'.esc_html($small_italic['color']).';'. 'letter-spacing:'.esc_html($small_italic['letter-spacing']).'px;'. 'line-height:'.esc_html($small_italic_tiny_devices_phones['line-height']).'px; }'
        .'.small-italic a:hover{ color:'.esc_html($small_italic_hover).';}'
        .'#cancel-comment-reply-link,input,textarea{ font-family:'.esc_html($body['family']).';}'
        .'.focus .meta-excerpt,.focus .meta-excerpt a{ font-family:'.esc_html($large_description['family']).';'. thshpr_google_font_style_weight_split($large_description['variation']) . 'font-size:'.esc_html($large_description['size']).'px;'. 'color:'.esc_html($large_description['color']).';'. 'letter-spacing:'.esc_html($large_description['letter-spacing']).'px;'. 'line-height:'.esc_html($large_description['line-height']).'px; }'
    	.'.primary-navigation ul li ul li a:hover{ background-color:'.esc_html($accent_color).'; color:'.esc_html($accent_contents_color).';  }'
        .'.background-accent{ background-color:'.esc_html($accent_color).'; color:'.esc_html($accent_contents_color).'; }'
        .'.background-accent-hover{ background-color:'.esc_html($dark_color).'; color:'.esc_html($dark_contents_color).'; }'
        .'.offset-title,{ border-top:10px solid '.esc_html($dark_color).'; }'
        .'.sidr a:hover{ background-color:'.esc_html($accent_color).'; color:'.esc_html($accent_contents_color).'; }'
        .'.sidr-toggle:hover{ background-color:'.esc_html($accent_color).'; color:'.esc_html($accent_contents_color).';border-color:'.esc_html($accent_color).'!important; }'
        .'.dark-button-color{ background-color:'.esc_html($dark_color).'; color:'.esc_html($dark_contents_color).';}'
        .'.dark-button-color .hamburger-inner,.dark-button-color .hamburger-inner:before, .dark-button-color .hamburger-inner:after{ background-color:'.esc_html($dark_contents_color).';}'
        .'.accent-button-color .hamburger-inner,.accent-button-color .hamburger-inner:before, .accent-button-color .hamburger-inner:after{ background-color:'.esc_html($accent_contents_color).';}'
        .'.accent-button-color{ background-color:'.esc_html($accent_color).'; color:'.esc_html($accent_contents_color).';}'
        .'progress{ color:'.esc_html($accent_color).'; }'
        .'progress::-webkit-progress-value{ background-color:'.esc_html($accent_color).'; }'
        .'progress::-moz-progress-bar{ background-color:'.esc_html($accent_color).'; }'
        .'.fancy-header.special-header:before,.widget h3:before{ background-color:'.esc_html($dark_color).'; }'
        .'.fancy-header.special-header.accent-line:after{ background-color:'.esc_html($accent_color).'; }'
        .'#scroll-to-top{right:'.$site_borders_size.'px; bottom:'.$scroll_to_top_bottom_position.'px;}'
        .'.background-dark-hover:hover{ background-color:'.esc_html($accent_color).'; color:'.esc_html($accent_contents_color).';}


    }

    /* Extra Small Devices, Phones */
    @media only screen and (min-width : 480px)
    {'
        .'h1{ font-size:'.esc_html($h1_extra_small_devices_phones['size']).'px; line-height:'.esc_html($h1_extra_small_devices_phones['line-height']).'px; }'
    	.'h2,.comments-title{ font-size:'.esc_html($h2_extra_small_devices_phones['size']).'px; line-height:'.esc_html($h2_extra_small_devices_phones['line-height']).'px; }'
    	.'h3, .component-element h3, .component-element h3 a{ font-size:'.esc_html($h3_extra_small_devices_phones['size']).'px; line-height:'.esc_html($h3_extra_small_devices_phones['line-height']).'px; }'
		.'h4, .component-element h4, .component-element h4 a, .post-lead, .sub-title-header, blockquote{ font-size:'.esc_html($h4_extra_small_devices_phones['size']).'px; line-height:'.esc_html($h4_extra_small_devices_phones['line-height']).'px; }'
    	.'h5{ font-size:'.esc_html($h5_extra_small_devices_phones['size']).'px; line-height:'.esc_html($h5_extra_small_devices_phones['line-height']).'px; }'
    	.'h6{ font-size:'.esc_html($h6_extra_small_devices_phones['size']).'px; line-height:'.esc_html($h6_extra_small_devices_phones['line-height']).'px; }'
    	.'body{ font-size:'.esc_html($body_extra_small_devices_phones['size']).'px; line-height:'.esc_html($body_extra_small_devices_phones['line-height']).'px; }'
        .'.small-italic, .small-italic a, .sidebar .small-italic ,.sidebar .small-italic a{ font-size:'.esc_html($small_italic_extra_small_devices_phones['size']).'px; '. thshpr_google_font_style_weight_split($small_italic['variation']) . 'line-height:'.esc_html($small_italic_extra_small_devices_phones['line-height']).'px; }'
        .'.lead-text{ font-size:'.esc_html($article_lead_extra_small_devices_phones['size']).'px; line-height:'.esc_html($article_lead_extra_small_devices_phones['line-height']).'px; }'
		.'.tagcloud{ line-height:'.esc_html($categories_tags['line-height']).'px; }'
		.'.tagcloud a{ font-family:'.esc_html($categories_tags['family']).';'. thshpr_google_font_style_weight_split($categories_tags['variation']) . 'font-size:'.esc_html($categories_tags['size']).'px !important;'. 'color:'.esc_html($categories_tags['color']).';'. 'letter-spacing:'.esc_html($categories_tags['letter-spacing']).'px;'. 'line-height:'.esc_html($categories_tags['line-height']).'px; }'
    	.'.tagcloud a{ background-color:'.esc_html($categories_tags_background).';}'
    	.'.tagcloud a:hover{ background-color:'.esc_html($categories_tags_font_hover_color).';}'
    	.'.tagcloud a:hover{ background-color:'.esc_html($categories_tags_background_hover).';}'
		.'.tags, .tags a{ font-family:'.esc_html($categories_tags['family']).';'. thshpr_google_font_style_weight_split($categories_tags['variation']) . 'font-size:'.esc_html($categories_tags['size']).'px;'. 'color:'.esc_html($categories_tags['color']).';'. 'letter-spacing:'.esc_html($categories_tags['letter-spacing']).'px;'. 'line-height:'.esc_html($categories_tags['line-height']).'px; }'
    	.'.tags a{ background-color:'.esc_html($categories_tags_background).';}'
    	.'.tags a:hover{ background-color:'.esc_html($categories_tags_font_hover_color).';}'
    	.'.tags a:hover{ background-color:'.esc_html($categories_tags_background_hover).';}'
    .'}

    /* Small Devices, Tablets */
    @media only screen and (min-width : 768px)
    {'
        .'h1{ font-size:'.esc_html($h1_small_devices_tablets['size']).'px; line-height:'.esc_html($h1_small_devices_tablets['line-height']).'px; }'
    	.'h2,.comments-title{ font-size:'.esc_html($h2_small_devices_tablets['size']).'px; line-height:'.esc_html($h2_small_devices_tablets['line-height']).'px; }'
    	.'h3, .component-element h3, .component-element h3 a{ font-size:'.esc_html($h3_small_devices_tablets['size']).'px; line-height:'.esc_html($h3_small_devices_tablets['line-height']).'px; }'
		.'h4, .component-element h4, .component-element h4 a, .post-lead, .sub-title-header, blockquote{ font-size:'.esc_html($h4_small_devices_tablets['size']).'px; line-height:'.esc_html($h4_small_devices_tablets['line-height']).'px; }'
    	.'h5{ font-size:'.esc_html($h5_small_devices_tablets['size']).'px; line-height:'.esc_html($h5_small_devices_tablets['line-height']).'px; }'
    	.'h6{ font-size:'.esc_html($h6_small_devices_tablets['size']).'px; line-height:'.esc_html($h6_small_devices_tablets['line-height']).'px; }'
    	.'body{ font-size:'.esc_html($body_small_devices_tablets['size']).'px; line-height:'.esc_html($body_small_devices_tablets['line-height']).'px; }'
        .'.site-borders{padding:'.$site_borders_size.'px; }'
        .'.small-italic, .small-italic a, .sidebar .small-italic ,.sidebar .small-italic a{ font-size:'.esc_html($small_italic_small_devices_tablets['size']).'px; '. thshpr_google_font_style_weight_split($small_italic['variation']) . 'line-height:'.esc_html($small_italic_small_devices_tablets['line-height']).'px; }'
        .'.lead-text{ font-size:'.esc_html($article_lead_small_devices_tablets['size']).'px; line-height:'.esc_html($article_lead_small_devices_tablets['line-height']).'px; }'
		.'.tagcloud{ line-height:'.esc_html($categories_tags['line-height']).'px; }'
		.'.tagcloud a{ font-family:'.esc_html($categories_tags['family']).';'. thshpr_google_font_style_weight_split($categories_tags['variation']) . 'font-size:'.esc_html($categories_tags['size']).'px !important;'. 'color:'.esc_html($categories_tags['color']).';'. 'letter-spacing:'.esc_html($categories_tags['letter-spacing']).'px;'. 'line-height:'.esc_html($categories_tags['line-height']).'px; }'
    	.'.tagcloud a{ background-color:'.esc_html($categories_tags_background).';}'
    	.'.tagcloud a:hover{ background-color:'.esc_html($categories_tags_font_hover_color).';}'
    	.'.tagcloud a:hover{ background-color:'.esc_html($categories_tags_background_hover).';}'
		.'.tags, .tags a{ font-family:'.esc_html($categories_tags['family']).';'. thshpr_google_font_style_weight_split($categories_tags['variation']) . 'font-size:'.esc_html($categories_tags['size']).'px;'. 'color:'.esc_html($categories_tags['color']).';'. 'letter-spacing:'.esc_html($categories_tags['letter-spacing']).'px;'. 'line-height:'.esc_html($categories_tags['line-height']).'px; }'
    	.'.tags a{ background-color:'.esc_html($categories_tags_background).';}'
    	.'.tags a:hover{ background-color:'.esc_html($categories_tags_font_hover_color).';}'
    	.'.tags a:hover{ background-color:'.esc_html($categories_tags_background_hover).';}'

    .'}

    /* Medium Devices, Desktops */
    @media only screen and (min-width : 992px)
    {'
        .'h1{ font-size:'.esc_html($h1_medium_devices_desktops['size']).'px; line-height:'.esc_html($h1_medium_devices_desktops['line-height']).'px; }'
    	.'h2,.comments-title{ font-size:'.esc_html($h2_medium_devices_desktops['size']).'px; line-height:'.esc_html($h2_medium_devices_desktops['line-height']).'px; }'
    	.'h3, .component-element h3, .component-element h3 a{ font-size:'.esc_html($h3_medium_devices_desktops['size']).'px; line-height:'.esc_html($h3_medium_devices_desktops['line-height']).'px; }'
		.'h3.widget-title, h3.widget-title a{ font-family:'.esc_html($sidebar_h3_medium_devices_desktops['family']).';'. thshpr_google_font_style_weight_split($sidebar_h3_medium_devices_desktops['variation']) . 'font-size:'.esc_html($sidebar_h3_medium_devices_desktops['size']).'px;'. 'color:'.esc_html($sidebar_h3_medium_devices_desktops['color']).';'. 'letter-spacing:'.esc_html($sidebar_h3_medium_devices_desktops['letter-spacing']).'px;'. 'line-height:'.esc_html($sidebar_h3['line-height']).'px; }'
		.'.sidebar, .sidebar p, .sidebar a, .sidebar li{ font-family:'.esc_html($sidebar_paragraph_medium_devices_desktops['family']).';'. thshpr_google_font_style_weight_split($sidebar_paragraph_medium_devices_desktops['variation']) . 'font-size:'.esc_html($sidebar_paragraph_medium_devices_desktops['size']).'px;'. 'color:'.esc_html($sidebar_paragraph_medium_devices_desktops['color']).';'. 'letter-spacing:'.esc_html($sidebar_paragraph_medium_devices_desktops['letter-spacing']).'px;'. 'line-height:'.esc_html($sidebar_paragraph['line-height']).'px; }'
    	.'h4, .component-element h4, .component-element h4 a, .post-lead, .sub-title-header, blockquote{ font-size:'.esc_html($h4_medium_devices_desktops['size']).'px; line-height:'.esc_html($h4_medium_devices_desktops['line-height']).'px; }'
    	.'h5{ font-size:'.esc_html($h5_medium_devices_desktops['size']).'px; line-height:'.esc_html($h5_medium_devices_desktops['line-height']).'px; }'
    	.'h6{ font-size:'.esc_html($h6_medium_devices_desktops['size']).'px; line-height:'.esc_html($h6_medium_devices_desktops['line-height']).'px; }'
    	.'body{ font-size:'.esc_html($body_medium_devices_desktops['size']).'px; line-height:'.esc_html($body_medium_devices_desktops['line-height']).'px; }'
        .'.small-italic, .small-italic a, .sidebar .small-italic ,.sidebar .small-italic a{ font-size:'.esc_html($small_italic_medium_devices_desktops['size']).'px; '. thshpr_google_font_style_weight_split($small_italic['variation']) . 'line-height:'.esc_html($small_italic_medium_devices_desktops['line-height']).'px; }'
        .'.lead-text{ font-size:'.esc_html($article_lead_medium_devices_desktops['size']).'px; line-height:'.esc_html($article_lead_medium_devices_desktops['line-height']).'px; }'
		.'.tagcloud{ line-height:'.esc_html($categories_tags['line-height']).'px; }'
		.'.tagcloud a{ font-family:'.esc_html($categories_tags['family']).';'. thshpr_google_font_style_weight_split($categories_tags['variation']) . 'font-size:'.esc_html($categories_tags['size']).'px !important;'. 'color:'.esc_html($categories_tags['color']).';'. 'letter-spacing:'.esc_html($categories_tags['letter-spacing']).'px;'. 'line-height:'.esc_html($categories_tags['line-height']).'px; }'
    	.'.tagcloud a{ background-color:'.esc_html($categories_tags_background).';}'
    	.'.tagcloud a:hover{ background-color:'.esc_html($categories_tags_font_hover_color).';}'
    	.'.tagcloud a:hover{ background-color:'.esc_html($categories_tags_background_hover).';}'
		.'.tags, .tags a{ font-family:'.esc_html($categories_tags['family']).';'. thshpr_google_font_style_weight_split($categories_tags['variation']) . 'font-size:'.esc_html($categories_tags['size']).'px;'. 'color:'.esc_html($categories_tags['color']).';'. 'letter-spacing:'.esc_html($categories_tags['letter-spacing']).'px;'. 'line-height:'.esc_html($categories_tags['line-height']).'px; }'
    	.'.tags a{ background-color:'.esc_html($categories_tags_background).';}'
    	.'.tags a:hover{ background-color:'.esc_html($categories_tags_font_hover_color).';}'
    	.'.tags a:hover{ background-color:'.esc_html($categories_tags_background_hover).';}'
    .'}

    /* Large Devices, Wide Screens */
    @media only screen and (min-width : 1200px)
    {'
        .'h1{ font-size:'.esc_html($h1['size']).'px; line-height:'.esc_html($h1['line-height']).'px; }'
    	.'h2,.comments-title{ font-size:'.esc_html($h2['size']).'px; line-height:'.esc_html($h2['line-height']).'px; }'
    	.'h3, .component-element h3, .component-element h3 a{ font-size:'.esc_html($h3['size']).'px; line-height:'.esc_html($h3['line-height']).'px; }'
		.'h3.widget-title, h3.widget-title a{ font-family:'.esc_html($sidebar_h3['family']).';'. thshpr_google_font_style_weight_split($sidebar_h3['variation']) . 'font-size:'.esc_html($sidebar_h3['size']).'px;'. 'line-height:'.esc_html($sidebar_h3['line-height']).'px; }'
		.'.sidebar, .sidebar p, .sidebar a, .sidebar li{ font-family:'.esc_html($sidebar_paragraph['family']).';'. thshpr_google_font_style_weight_split($sidebar_paragraph['variation']) . 'font-size:'.esc_html($sidebar_paragraph['size']).'px;'. 'line-height:'.esc_html($sidebar_paragraph['line-height']).'px; }'
    	.'h4, .component-element h4, .component-element h4 a, .post-lead, .sub-title-header, blockquote{ font-size:'.esc_html($h4['size']).'px; line-height:'.esc_html($h4['line-height']).'px; }'
    	.'h5{ font-size:'.esc_html($h5['size']).'px; line-height:'.esc_html($h5['line-height']).'px; }'
    	.'h6{ font-size:'.esc_html($h6['size']).'px; line-height:'.esc_html($h6['line-height']).'px; }'
    	.'body{ font-size:'.esc_html($body['size']).'px; line-height:'.esc_html($body['line-height']).'px; }'
        .'.small-italic, .small-italic a, .sidebar .small-italic ,.sidebar .small-italic a{ font-size:'.esc_html($small_italic['size']).'px; '. thshpr_google_font_style_weight_split($small_italic['variation']) . 'line-height:'.esc_html($small_italic['line-height']).'px; }'
        .'.lead-text{ font-size:'.esc_html($article_lead['size']).'px; line-height:'.esc_html($article_lead['line-height']).'px; }'
		.'.tagcloud{ line-height:'.esc_html($categories_tags['line-height']).'px; }'
		.'.tagcloud a{ font-family:'.esc_html($categories_tags['family']).';'. thshpr_google_font_style_weight_split($categories_tags['variation']) . 'font-size:'.esc_html($categories_tags['size']).'px !important;'. 'color:'.esc_html($categories_tags['color']).';'. 'letter-spacing:'.esc_html($categories_tags['letter-spacing']).'px;'. 'line-height:'.esc_html($categories_tags['line-height']).'px; }'
    	.'.tagcloud a{ background-color:'.esc_html($categories_tags_background).';}'
    	.'.tagcloud a:hover{ background-color:'.esc_html($categories_tags_font_hover_color).';}'
    	.'.tagcloud a:hover{ background-color:'.esc_html($categories_tags_background_hover).';}'
		.'.tags, .tags a{ font-family:'.esc_html($categories_tags['family']).';'. thshpr_google_font_style_weight_split($categories_tags['variation']) . 'font-size:'.esc_html($categories_tags['size']).'px;'. 'color:'.esc_html($categories_tags['color']).';'. 'letter-spacing:'.esc_html($categories_tags['letter-spacing']).'px;'. 'line-height:'.esc_html($categories_tags['line-height']).'px; }'
    	.'.tags a{ background-color:'.esc_html($categories_tags_background).';}'
    	.'.tags a:hover{ background-color:'.esc_html($categories_tags_font_hover_color).';}'
    	.'.tags a:hover{ background-color:'.esc_html($categories_tags_background_hover).';}'
    .'}

    ';
	wp_add_inline_style( 'thshpr-style', esc_html($option_styles) );
}
add_action('wp_enqueue_scripts', 'thshpr_print_styles');


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
 * Generates a wp image given width, height and image id. If image already exists a new one won't be created
 * at those dimensions. Adds a "wp_image" class so it will be picked up by the lightbox javascript.
 * @requires $width,$height,$id
 */
function thshpr_generate_wp_image($width,$height,$id)
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

	$item_string='<img src="'.$image_url.'" width="'.$width.'" height="'.$height.'" class="wp-image">';
	return($item_string);
}

/**
 * Gets the full image.
 * @requires $id
 */
function thshpr_get_full_image($id)
{
	// Get upload directory info
	$upload_info = wp_upload_dir();
	$upload_dir  = $upload_info['basedir'];
	$upload_url  = $upload_info['baseurl'];

	// Get file path info
	//$attachment_id = get_post_thumbnail_id($id);
    //var_dump($attachment_id);
	$path = get_attached_file( $id );
	$path_info = pathinfo( $path );
	$ext = $path_info['extension'];
	$rel_path  = str_replace( array( $upload_dir, ".$ext" ), '', $path );

	//large image
	$image_url  = "{$upload_url}{$rel_path}.{$ext}";
	return($image_url);
}


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 1200; /* pixels */




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


add_theme_support( 'custom-logo' );



    //featured thumbnail


    add_image_size( 'prevnext', 100, 100, true );
    add_image_size( 'Small Responsive', 768, 9999, false );
    add_image_size( 'Large Responsive', 1200, 9999, false );


    function display_custom_image_sizes( $sizes )
    {
      global $_wp_additional_image_sizes;
      if ( empty($_wp_additional_image_sizes) )
        return $sizes;

      foreach ( $_wp_additional_image_sizes as $id => $data ) {
        if ( !isset($sizes[$id]) )
          $sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
      }

      return $sizes;
      var_dump($sizes);
    }
    add_filter( 'image_size_names_choose', 'display_custom_image_sizes' );

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
        'primary'  => __( 'Header Menu', 'naked' ),
    ) );



}
endif; // naked_setup
add_action( 'after_setup_theme', 'naked_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function thshpr_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'naked' ),
		'id'            => 'right-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

    if(function_exists( 'fw_get_db_customizer_option' ))
    {
        $extra_top_bar_widget=fw_get_db_customizer_option('opt_header_extra_top_bar_widgets');
        $footer_top_row_columns=fw_get_db_customizer_option('opt_footer_top_row_columns');
        $footer_main_row_columns=fw_get_db_customizer_option('opt_footer_main_row_columns');
        $footer_bottom_row_columns=fw_get_db_customizer_option('opt_footer_bottom_row_columns');

        if($extra_top_bar_widget)
        {
            $create_top_bar_widgets=2;
        }
    }
    else
    {
        $create_top_bar_widgets=2;
        $footer_top_row_columns=0;
        $footer_main_row_columns=3;
        $footer_bottom_row_columns=1;
    }

    /**
     * Extra Top Bar Widgets
     */
    if($create_top_bar_widgets==2)
    {
        register_sidebar( array(
    		'name'          => __( 'Extra Top Bar Left', 'thshpr' ),
    		'id'            => 'extra-top-bar-left',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="top-widget-title">',
    		'after_title'   => '</h3>',
    	) );
        register_sidebar( array(
    		'name'          => __( 'Extra Top Bar Right', 'thshpr' ),
    		'id'            => 'extra-top-bar-right',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="top-widget-title">',
    		'after_title'   => '</h3>',
    	) );
    }

    /**
     * Footer Top Row Widgets
     */
    if($footer_top_row_columns==1)
    {
        register_sidebar( array(
    		'name'          => __( 'Footer Top Row', 'thshpr' ),
    		'id'            => 'footer-top-row',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-top-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );
    }
    if($footer_top_row_columns==2)
    {
        register_sidebar( array(
    		'name'          => __( 'Footer Top Row Left', 'thshpr' ),
    		'id'            => 'footer-top-row-left',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-top-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Top Row Right', 'thshpr' ),
    		'id'            => 'footer-top-row-right',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-top-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );
    }
    if($footer_top_row_columns==3)
    {
        register_sidebar( array(
    		'name'          => __( 'Footer Top Row Left', 'thshpr' ),
    		'id'            => 'footer-top-row-left',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-top-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Top Row Middle', 'thshpr' ),
    		'id'            => 'footer-top-row-middle',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-top-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Top Row Right', 'thshpr' ),
    		'id'            => 'footer-top-row-right',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-top-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );
    }

    /**
     * Footer Bottom Row Widgets
     */
    if($footer_bottom_row_columns==1)
    {
        register_sidebar( array(
    		'name'          => __( 'Footer Bottom Row', 'thshpr' ),
    		'id'            => 'footer-bottom-row',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-bottom-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );
    }
    if($footer_bottom_row_columns==2)
    {
        register_sidebar( array(
    		'name'          => __( 'Footer Bottom Row Left', 'thshpr' ),
    		'id'            => 'footer-bottom-row-left',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-bottom-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Bottom Row Right', 'thshpr' ),
    		'id'            => 'footer-bottom-row-right',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-bottom-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );
    }
    if($footer_bottom_row_columns==3)
    {
        register_sidebar( array(
    		'name'          => __( 'Footer Bottom Row Left', 'thshpr' ),
    		'id'            => 'footer-bottom-row-left',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-bottom-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Bottom Row Middle', 'thshpr' ),
    		'id'            => 'footer-bottom-row-middle',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-bottom-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Bottom Row Right', 'thshpr' ),
    		'id'            => 'footer-bottom-row-right',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-bottom-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );
    }

    /**
     * Footer Main Row Widgets
     */
    if($footer_main_row_columns==1)
    {
        register_sidebar( array(
    		'name'          => __( 'Footer Main Row', 'thshpr' ),
    		'id'            => 'footer-main-row',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );
    }
    if($footer_main_row_columns==2)
    {
        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Left', 'thshpr' ),
    		'id'            => 'footer-main-row-left',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Right', 'thshpr' ),
    		'id'            => 'footer-main-row-right',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );
    }
    if($footer_main_row_columns==3)
    {
        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Left', 'thshpr' ),
    		'id'            => 'footer-main-row-left',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Middle', 'thshpr' ),
    		'id'            => 'footer-main-row-middle',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Right', 'thshpr' ),
    		'id'            => 'footer-main-row-right',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );
    }

    if($footer_main_row_columns==4)
    {
        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Left 1', 'thshpr' ),
    		'id'            => 'footer-main-row-left-1',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Left 2', 'thshpr' ),
    		'id'            => 'footer-main-row-left-2',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Right 1', 'thshpr' ),
    		'id'            => 'footer-main-row-right-1',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Right 2', 'thshpr' ),
    		'id'            => 'footer-main-row-right-2',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );
    }

    if($footer_main_row_columns==6)
    {
        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Left 1', 'thshpr' ),
    		'id'            => 'footer-main-row-left-1',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Left 2', 'thshpr' ),
    		'id'            => 'footer-main-row-left-2',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Left 3', 'thshpr' ),
    		'id'            => 'footer-main-row-left-3',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Right 1', 'thshpr' ),
    		'id'            => 'footer-main-row-right-1',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Right 2', 'thshpr' ),
    		'id'            => 'footer-main-row-right-2',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );

        register_sidebar( array(
    		'name'          => __( 'Footer Main Row Right 3', 'thshpr' ),
    		'id'            => 'footer-main-row-right-3',
    		'before_widget' => '<span id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</span>',
    		'before_title'  => '<h3 class="footer-main-row-widget-title">',
    		'after_title'   => '</h3>',
    	) );
    }



}

add_action( 'widgets_init', 'thshpr_widgets_init' );
/**
 * Enqueue scripts
 */
function thshpr_scripts() {


	//wp_enqueue_script( 'naked-fittext-js', get_template_directory_uri() . '/static/js/jquery.fittext.js', array('jquery'),'',true );

	// load theme js

    //wp_enqueue_script( 'naked-ssm-breakpoints', get_template_directory_uri() . '/static/js/ssm.js', array('jquery'),'',true );
	wp_register_script( 'thshpr-stellar', get_template_directory_uri() . '/static/js/jquery.stellar.min.js', array('jquery'),'',true );
	wp_register_script( 'thshpr-article-progress', get_template_directory_uri() . '/static/js/article-progress.js', array('jquery'),'',true );
	wp_enqueue_script( 'thshpr-comment-columns', get_template_directory_uri() . '/static/js/comment-columns.js', array('jquery'),'',true );
    wp_enqueue_script( 'thshpr-animate-modal', get_template_directory_uri() . '/static/js/animatedModal.min.js', array('jquery'),'',true );



    wp_enqueue_script( 'thshpr-magnific-popup', get_template_directory_uri() . '/static/js/magnific.popup.min.js', array('jquery'),'',true );
    wp_enqueue_script ( 'thshpr-sidr' , get_template_directory_uri() . '/static/js/jquery.sidr.min.js', array( 'jquery' ), '1', true );
    wp_enqueue_script ( 'thshpr-sticky' , get_template_directory_uri() . '/static/js/jquery.sticky.js', array( 'jquery' ), '1', true );
    wp_enqueue_script( 'thshpr-scripts', get_template_directory_uri() . '/static/js/scripts.js', array('jquery','thshpr-sidr','thshpr-magnific-popup','thshpr-animate-modal','thshpr-sticky'),'',true );
	//wp_enqueue_style ( 'sidrcss-dark' , get_template_directory_uri() . '/static/css/jquery.sidr.dark.css', '', '1', 'all' );
	//wp_enqueue_style ( 'sidrcss-light' , get_stylesheet_directory_uri() . '/css/jquery.sidr.light.css', '', '1', 'all' );



	if (is_singular())
	{
		wp_enqueue_script('thshpr-stellar');
		wp_enqueue_script('thshpr-article-progress');
		//dropcaps on single
		wp_enqueue_script( 'thshpr-dropcaps', get_template_directory_uri() . '/static/js/dropcap.min.js', array('jquery'),'',true );
		wp_enqueue_script( 'thshpr-post-scripts', get_template_directory_uri() . '/static/js/post-scripts.js', array('jquery','thshpr-dropcaps'),'',true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'naked-keyboard-image-navigation', get_template_directory_uri() . '/static/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'thshpr_scripts');

require get_template_directory() . '/widgets/image-upload.php';
/**
 * Load ad 125
 */
require get_template_directory() . '/widgets/ads.php';
/**
 * Load social icons widget
 */
require get_template_directory() . '/widgets/social-icons.php';

/**
 * Load featured posts widgets
 */
require get_template_directory() . '/widgets/featured-posts.php';

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
