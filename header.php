<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package naked
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function theme_slug_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'theme_slug_render_title' );
}
?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>
<?php
 get_template_part( 'templates/header', 'compact-logo-nav' );
if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
{
/*	 if(is_front_page() )
	{
		$components=fw_get_db_settings_option('opt_header_rows_frontpage');
	}
	else if(is_home() || is_archive()||is_search()||is_404())
	{
		//$components=fw_get_db_settings_option('opt_header_functionality_archives');
		$components=fw_get_db_settings_option('opt_header_rows_frontpage');
	}
	else if(is_single())
	{
		$components=fw_get_db_settings_option('opt_header_functionality_singles');
		
		//override based on post options
		$components_override= fw_get_db_post_option(get_the_ID(), 'opt_meta_page_post_header');
		
		if($components_override['template']!=0) //only if its not set to default
		{
			$components=$components_override[1]['opt_meta_post_header_functionality'];
		}
		
	}
	else if(is_page() )
	{
		$components=fw_get_db_settings_option('opt_header_rows_frontpage');
	
	}*/
}
else
{
//	$components=array('Widget Area','Logo / Navigation Section', 'Featured Posts Slider', 'Extra Editor Area', 'Featured Posts Slider (text only)');
	//this needs changing now
}


	//var_dump($components);
/*	if ($components)
	{	
		foreach ($components as $key=>$value) 
		{
			//var_dump($value['opt_header_element_type']['template']);
			
		    switch($value['opt_header_element_type']['template']) 
		    {
		    	    
			case 'Widget Row (Single Column)':
				
				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$layout="Single Column";
					$first_widget_name=$value['opt_header_element_type']['Widget Row (Single Column)']["widget_first"];
					$widget_area_class=$value['opt_header_element_type']['Widget Row (Single Column)']["widget_area_class"];
					$first_widget_id=str_replace(" ", "-", $first_widget_name);
					include(locate_template('templates/widget-row.php'));
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
					$widget_area_class=$value['opt_header_element_type']['Widget Row (1/2-1/2)']["widget_area_class"];
					$first_widget_id=str_replace(" ", "-", $first_widget_name);
					$second_widget_id=str_replace(" ", "-", $second_widget_name);
					include(locate_template('templates/widget-row.php'));
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
					$widget_area_class=$value['opt_header_element_type']['Widget Row (1/3-1/3-1/3)']["widget_area_class"];
					$first_widget_id=str_replace(" ", "-", $first_widget_name);
					$second_widget_id=str_replace(" ", "-", $second_widget_name);
					$third_widget_id=str_replace(" ", "-", $third_widget_name);
					include(locate_template('templates/widget-row.php'));
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
					$widget_area_class=$value['opt_header_element_type']['Widget Row (1/4-1/4-1/2)']["widget_area_class"];
					$first_widget_id=str_replace(" ", "-", $first_widget_name);
					$second_widget_id=str_replace(" ", "-", $second_widget_name);
					$third_widget_id=str_replace(" ", "-", $third_widget_name);
					include(locate_template('templates/widget-row.php'));
				}
				else
				{
					
				}
				
			break;
			
			case 'Widget Row (1/2-1/4-1/4)':
				
				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$layout="1/2-1/4-1/4";
					$first_widget_name=$value['opt_header_element_type']['Widget Row (1/2-1/4-1/4)']["widget_first"];
					$second_widget_name=$value['opt_header_element_type']['Widget Row (1/2-1/4-1/4)']["widget_second"];
					$third_widget_name=$value['opt_header_element_type']['Widget Row (1/2-1/4-1/4)']["widget_third"];
					$widget_area_class=$value['opt_header_element_type']['Widget Row (1/2-1/4-1/4)']["widget_area_class"];
					$first_widget_id=str_replace(" ", "-", $first_widget_name);
					$second_widget_id=str_replace(" ", "-", $second_widget_name);
					$third_widget_id=str_replace(" ", "-", $third_widget_name);
					include(locate_template('templates/widget-row.php'));
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
					$widget_area_class=$value['opt_header_element_type']['Widget Row (1/4-1/4-1/4-1/4)']["widget_area_class"];
					$first_widget_id=str_replace(" ", "-", $first_widget_name);
					$second_widget_id=str_replace(" ", "-", $second_widget_name);
					$third_widget_id=str_replace(" ", "-", $third_widget_name);
					$fourth_widget_id=str_replace(" ", "-", $fourth_widget_name);
					include(locate_template('templates/widget-row.php'));
				}
				else
				{
					
				}
				
			break;
					 
			case 'Logo / Navigation Row': 
				get_template_part( 'templates/header', 'compact-logo-nav' );
			break;
			
			case 'Featured Posts Slider Row': 
				
				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$post_categories=$value['opt_header_element_type']['Featured Posts Slider Row']["opt_header_thumbslider_categories"];
					$post_category=array_values($post_categories);
	
					//this converts the options into a string so the loop will accept the categories.
					$strcats="";
					if(count($post_category)>1)
					{
						foreach($post_category as $value)
						{
							$strcats.=$value.",";
						}
					} 
					else if(count($post_category)==1)
					{
						$strcats=$post_category[0];
					}
					else
					{
						$strcats=1;
					}
					$post_category=$strcats;
					$max_posts=$value['opt_header_element_type']['Featured Posts Slider Row']["opt_header_thumbslider_number_posts"];
					$order_by=$value['opt_header_element_type']['Featured Posts Slider Row']["opt_header_thumbslider_ordering"];
					$thumbnail_size='featured_slider';
					$category_tag_number=$value['opt_header_element_type']['Featured Posts Slider Row']["opt_header_thumbslider_number_categories"];
					$components_elements=$value['opt_header_element_type']['Featured Posts Slider Row']["opt_header_thumbslider_functionality"];
					
					$has_thumbnail=0;
					foreach ($components_elements as $key=>$value) 
					{								
						switch($value['opt_header_thumbslider_rows']) 
						 {										 
							case 'Thumbnail': 
								$has_thumbnail=1;
							break;
						 }
					}

					if($has_thumbnail){$no_thumbnail_class="";}
					else{$no_thumbnail_class="nothumbnail";}
					
					//var_dump($components);

					$hover_icon=fw_get_db_settings_option('opt_image_icon');
					$hover_item='<i class="'.$hover_icon.' js-option-type-icon-item  active" data-value="'.$hover_icon.'" style="display: block;"></i>';
					
					//top hover item
					$opt_image_hover_item_top= fw_get_db_settings_option('opt_image_hover_item_1');
					if($opt_image_hover_item_top['template']==0) //nothing
					{
					}
					else if($opt_image_hover_item_top['template']==1)//text
					{
						$hover_top=$opt_image_hover_item_top['1']['opt_image_hover_item_1_text'];	
					}
					else if($opt_image_hover_item_top['template']==2)//icon
					{
						$hover_top='<i class="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'" data-value="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'"></i>';
					}
					else if($opt_image_hover_item_top['template']==3)//image
					{
						$hover_top='<img src="'.$opt_image_hover_item_top['3']['opt_image_hover_item_1_image']['url'].'">';	
					}
					
					//bottom hover item
					$opt_image_hover_item_bottom= fw_get_db_settings_option('opt_image_hover_item_2');
					if($opt_image_hover_item_bottom['template']==0) //nothing
					{
					}
					else if($opt_image_hover_item_bottom['template']==1)//text
					{
						$hover_bottom=$opt_image_hover_item_bottom['1']['opt_image_hover_item_2_text'];	
					}
					else if($opt_image_hover_item_bottom['template']==2)//icon
					{
						$hover_bottom='<i class="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'" data-value="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'"></i>';
					}
					else if($opt_image_hover_item_bottom['template']==3)//image
					{
						$hover_bottom='<img src="'.$opt_image_hover_item_bottom['3']['opt_image_hover_item_2_image']['url'].'">';	
					}	
					
					include(locate_template('templates/featured-posts-slider.php'));
				}
				else
				{
					$post_category=1;
					$max_posts=27;
					$order_by='date';
					$thumbnail_size='featured_slider';
					$category_tag_number=2;
					$components=array("Thumbnail","Title", "Categories");
					$hover_top='N';
					$hover_bottom='';
				}
				
				//get_template_part( 'templates/header', 'featured-thumbnail-slider' );
			break;
			
			case 'Posts Grid (5 Posts, Focus Post Left)': 
				
				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$post_categories=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Left)']["opt_header_featuredposts_categories"];
					$post_category=array_values($post_categories);
	
					$row_title=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Left)']["opt_header_featuredposts_title"];
				
					//this converts the options into a string so the loop will accept the categories.
					$strcats="";
					if(count($post_category)>1)
					{
						foreach($post_category as $value)
						{
							$strcats.=$value.",";
						}
					} 
					else if(count($post_category)==1)
					{
						$strcats=$post_category[0];
					}
					else
					{
						$strcats=1;
					}
					$post_category=$strcats;
					$max_posts=5;
					$order_by=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Left)']["opt_header_featuredposts_ordering"];
					$icon=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Left)']["opt_header_featuredposts_title_icon"];
					if($value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Left)']["opt_header_featuredposts_title_icon"])
					{
						$row_icon='<i class="'.$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Left)']["opt_header_featuredposts_title_icon"].' header-icon"></i>';
					}
					else
					{
						$row_icon='';
					}
					
					$normal_thumbnail='grid_small_image';
					$focus_thumbnail='grid_focus_image';
					$category_tag_number=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Left)']["opt_header_featuredposts_number_categories"];
					$components_elements=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Left)']["opt_header_featuredposts_functionality"];
					
					//var_dump($components);

					$hover_icon=fw_get_db_settings_option('opt_image_icon');
					$hover_item='<i class="'.$hover_icon.' js-option-type-icon-item  active" data-value="'.$hover_icon.'" style="display: block;"></i>';
					
					//top hover item
					$opt_image_hover_item_top= fw_get_db_settings_option('opt_image_hover_item_1');
					if($opt_image_hover_item_top['template']==0) //nothing
					{
					}
					else if($opt_image_hover_item_top['template']==1)//text
					{
						$hover_top=$opt_image_hover_item_top['1']['opt_image_hover_item_1_text'];	
					}
					else if($opt_image_hover_item_top['template']==2)//icon
					{
						$hover_top='<i class="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'" data-value="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'"></i>';
					}
					else if($opt_image_hover_item_top['template']==3)//image
					{
						$hover_top='<img src="'.$opt_image_hover_item_top['3']['opt_image_hover_item_1_image']['url'].'">';	
					}
					
					//bottom hover item
					$opt_image_hover_item_bottom= fw_get_db_settings_option('opt_image_hover_item_2');
					if($opt_image_hover_item_bottom['template']==0) //nothing
					{
					}
					else if($opt_image_hover_item_bottom['template']==1)//text
					{
						$hover_bottom=$opt_image_hover_item_bottom['1']['opt_image_hover_item_2_text'];	
					}
					else if($opt_image_hover_item_bottom['template']==2)//icon
					{
						$hover_bottom='<i class="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'" data-value="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'"></i>';
					}
					else if($opt_image_hover_item_bottom['template']==3)//image
					{
						$hover_bottom='<img src="'.$opt_image_hover_item_bottom['3']['opt_image_hover_item_2_image']['url'].'">';	
					}	
					
				}
				else
				{
					$post_category=1;
					$max_posts=5;
					$order_by='date';
					$normal_thumbnail='grid_small_image';
					$focus_thumbnail='grid_focus_image';
					$category_tag_number=2;
					$components=array("Thumbnail","Title", "Categories");
					$hover_top='N';
					$hover_bottom='';
					$row_title='';
				}
				include(locate_template('templates/featured-posts-grid-5-l.php'));
				//get_template_part( 'templates/header', 'featured-thumbnail-slider' );
			break;
			
			case 'Posts Grid (5 Posts, Focus Post Right)': 
				
				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$post_categories=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Right)']["opt_header_featuredposts_categories"];
					$post_category=array_values($post_categories);
	
					$row_title=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Right)']["opt_header_featuredposts_title"];
				
					//this converts the options into a string so the loop will accept the categories.
					$strcats="";
					if(count($post_category)>1)
					{
						foreach($post_category as $value)
						{
							$strcats.=$value.",";
						}
					} 
					else if(count($post_category)==1)
					{
						$strcats=$post_category[0];
					}
					else
					{
						$strcats=1;
					}
					$post_category=$strcats;
					$max_posts=5;
					$order_by=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Right)']["opt_header_featuredposts_ordering"];
					$icon=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Right)']["opt_header_featuredposts_title_icon"];
					if($value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Right)']["opt_header_featuredposts_title_icon"])
					{
						$row_icon='<i class="'.$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Right)']["opt_header_featuredposts_title_icon"].' header-icon"></i>';
					}
					else
					{
						$row_icon='';
					}
					
					$normal_thumbnail='grid_small_image';
					$focus_thumbnail='grid_focus_image';
					$category_tag_number=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Right)']["opt_header_featuredposts_number_categories"];
					$components_elements=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Right)']["opt_header_featuredposts_functionality"];
					
					//var_dump($components);

					$hover_icon=fw_get_db_settings_option('opt_image_icon');
					$hover_item='<i class="'.$hover_icon.' js-option-type-icon-item  active" data-value="'.$hover_icon.'" style="display: block;"></i>';
					
					//top hover item
					$opt_image_hover_item_top= fw_get_db_settings_option('opt_image_hover_item_1');
					if($opt_image_hover_item_top['template']==0) //nothing
					{
					}
					else if($opt_image_hover_item_top['template']==1)//text
					{
						$hover_top=$opt_image_hover_item_top['1']['opt_image_hover_item_1_text'];	
					}
					else if($opt_image_hover_item_top['template']==2)//icon
					{
						$hover_top='<i class="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'" data-value="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'"></i>';
					}
					else if($opt_image_hover_item_top['template']==3)//image
					{
						$hover_top='<img src="'.$opt_image_hover_item_top['3']['opt_image_hover_item_1_image']['url'].'">';	
					}
					
					//bottom hover item
					$opt_image_hover_item_bottom= fw_get_db_settings_option('opt_image_hover_item_2');
					if($opt_image_hover_item_bottom['template']==0) //nothing
					{
					}
					else if($opt_image_hover_item_bottom['template']==1)//text
					{
						$hover_bottom=$opt_image_hover_item_bottom['1']['opt_image_hover_item_2_text'];	
					}
					else if($opt_image_hover_item_bottom['template']==2)//icon
					{
						$hover_bottom='<i class="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'" data-value="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'"></i>';
					}
					else if($opt_image_hover_item_bottom['template']==3)//image
					{
						$hover_bottom='<img src="'.$opt_image_hover_item_bottom['3']['opt_image_hover_item_2_image']['url'].'">';	
					}	
					
				}
				else
				{
					$post_category=1;
					$max_posts=5;
					$order_by='date';
					$normal_thumbnail='grid_small_image';
					$focus_thumbnail='grid_focus_image';
					$category_tag_number=2;
					$components=array("Thumbnail","Title", "Categories");
					$hover_top='N';
					$hover_bottom='';
					$row_title='';
				}
				include(locate_template('templates/featured-posts-grid-5-r.php'));
			break;
			
			case 'Posts Grid (5 Posts, Focus Post Middle)': 
				
				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$post_categories=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Middle)']["opt_header_featuredposts_categories"];
					$post_category=array_values($post_categories);
	
					$row_title=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Middle)']["opt_header_featuredposts_title"];
				
					//this converts the options into a string so the loop will accept the categories.
					$strcats="";
					if(count($post_category)>1)
					{
						foreach($post_category as $value)
						{
							$strcats.=$value.",";
						}
					} 
					else if(count($post_category)==1)
					{
						$strcats=$post_category[0];
					}
					else
					{
						$strcats=1;
					}
					$post_category=$strcats;
					$max_posts=5;
					$order_by=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Middle)']["opt_header_featuredposts_ordering"];
					$icon=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Middle)']["opt_header_featuredposts_title_icon"];
					if($value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Middle)']["opt_header_featuredposts_title_icon"])
					{
						$row_icon='<i class="'.$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Middle)']["opt_header_featuredposts_title_icon"].' header-icon"></i>';
					}
					else
					{
						$row_icon='';
					}
					
					$normal_thumbnail='grid_small_image';
					$focus_thumbnail='grid_focus_image';
					$category_tag_number=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Middle)']["opt_header_featuredposts_number_categories"];
					$components_elements=$value['opt_header_element_type']['Posts Grid (5 Posts, Focus Post Middle)']["opt_header_featuredposts_functionality"];
					
					//var_dump($components);

					$hover_icon=fw_get_db_settings_option('opt_image_icon');
					$hover_item='<i class="'.$hover_icon.' js-option-type-icon-item  active" data-value="'.$hover_icon.'" style="display: block;"></i>';
					
					//top hover item
					$opt_image_hover_item_top= fw_get_db_settings_option('opt_image_hover_item_1');
					if($opt_image_hover_item_top['template']==0) //nothing
					{
					}
					else if($opt_image_hover_item_top['template']==1)//text
					{
						$hover_top=$opt_image_hover_item_top['1']['opt_image_hover_item_1_text'];	
					}
					else if($opt_image_hover_item_top['template']==2)//icon
					{
						$hover_top='<i class="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'" data-value="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'"></i>';
					}
					else if($opt_image_hover_item_top['template']==3)//image
					{
						$hover_top='<img src="'.$opt_image_hover_item_top['3']['opt_image_hover_item_1_image']['url'].'">';	
					}
					
					//bottom hover item
					$opt_image_hover_item_bottom= fw_get_db_settings_option('opt_image_hover_item_2');
					if($opt_image_hover_item_bottom['template']==0) //nothing
					{
					}
					else if($opt_image_hover_item_bottom['template']==1)//text
					{
						$hover_bottom=$opt_image_hover_item_bottom['1']['opt_image_hover_item_2_text'];	
					}
					else if($opt_image_hover_item_bottom['template']==2)//icon
					{
						$hover_bottom='<i class="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'" data-value="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'"></i>';
					}
					else if($opt_image_hover_item_bottom['template']==3)//image
					{
						$hover_bottom='<img src="'.$opt_image_hover_item_bottom['3']['opt_image_hover_item_2_image']['url'].'">';	
					}	
					
				}
				else
				{
					$post_category=1;
					$max_posts=5;
					$order_by='date';
					$normal_thumbnail='grid_small_image';
					$focus_thumbnail='grid_focus_image';
					$category_tag_number=2;
					$components=array("Thumbnail","Title", "Categories");
					$hover_top='N';
					$hover_bottom='';
					$row_title='';
				}
				include(locate_template('templates/featured-posts-grid-5-m.php'));
			break;
			
			
			case '2 Column Grid (Focus First)': 
				
				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$post_categories_left=$value['opt_header_element_type']['2 Column Grid (Focus First)']["opt_header_featuredposts_categories_left"];
					$post_category_left=array_values($post_categories_left);
					
					$post_categories_right=$value['opt_header_element_type']['2 Column Grid (Focus First)']["opt_header_featuredposts_categories_right"];
					$post_category_right=array_values($post_categories_right);
					
					$row_title=$value['opt_header_element_type']['2 Column Grid (Focus First)']["opt_header_featuredposts_title"];
				
					//this converts the options into a string so the loop will accept the categories.
					//left
					$strcats="";
					if(count($post_category_left)>1)
					{
						foreach($post_category_left as $value)
						{
							$strcats.=$value.",";
						}
					} 
					else if(count($post_category_left)==1)
					{
						$strcats=$post_category_left[0];
					}
					else
					{
						$strcats=1;
					}
					$post_category_left=$strcats;
					
					//right
					$strcats="";
					if(count($post_category_right)>1)
					{
						foreach($post_category_right as $value)
						{
							$strcats.=$value.",";
						}
					} 
					else if(count($post_category_right)==1)
					{
						$strcats=$post_category_right[0];
					}
					else
					{
						$strcats=1;
					}
					$post_category_right=$strcats;
					$max_posts=$value['opt_header_element_type']['2 Column Grid (Focus First)']["opt_header_featuredposts_number_posts"];
					$order_by=$value['opt_header_element_type']['2 Column Grid (Focus First)']["opt_header_featuredposts_ordering"];
					$icon=$value['opt_header_element_type']['2 Column Grid (Focus First)']["opt_header_featuredposts_title_icon"];
					if($value['opt_header_element_type']['2 Column Grid (Focus First)']["opt_header_featuredposts_title_icon"])
					{
						$row_icon='<i class="'.$value['opt_header_element_type']['2 Column Grid (Focus First)']["opt_header_featuredposts_title_icon"].' header-icon"></i>';
					}
					else
					{
						$row_icon='';
					}
					
					$normal_thumbnail='grid_tiny_image';
					$focus_thumbnail='grid_focus_image';
					$category_tag_number=$value['opt_header_element_type']['2 Column Grid (Focus First)']["opt_header_featuredposts_number_categories"];
					$components_elements=$value['opt_header_element_type']['2 Column Grid (Focus First)']["opt_header_featuredposts_functionality"];
					
					//var_dump($components);

					$hover_icon=fw_get_db_settings_option('opt_image_icon');
					$hover_item='<i class="'.$hover_icon.' js-option-type-icon-item  active" data-value="'.$hover_icon.'" style="display: block;"></i>';
					
					//top hover item
					$opt_image_hover_item_top= fw_get_db_settings_option('opt_image_hover_item_1');
					if($opt_image_hover_item_top['template']==0) //nothing
					{
					}
					else if($opt_image_hover_item_top['template']==1)//text
					{
						$hover_top=$opt_image_hover_item_top['1']['opt_image_hover_item_1_text'];	
					}
					else if($opt_image_hover_item_top['template']==2)//icon
					{
						$hover_top='<i class="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'" data-value="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'"></i>';
					}
					else if($opt_image_hover_item_top['template']==3)//image
					{
						$hover_top='<img src="'.$opt_image_hover_item_top['3']['opt_image_hover_item_1_image']['url'].'">';	
					}
					
					//bottom hover item
					$opt_image_hover_item_bottom= fw_get_db_settings_option('opt_image_hover_item_2');
					if($opt_image_hover_item_bottom['template']==0) //nothing
					{
					}
					else if($opt_image_hover_item_bottom['template']==1)//text
					{
						$hover_bottom=$opt_image_hover_item_bottom['1']['opt_image_hover_item_2_text'];	
					}
					else if($opt_image_hover_item_bottom['template']==2)//icon
					{
						$hover_bottom='<i class="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'" data-value="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'"></i>';
					}
					else if($opt_image_hover_item_bottom['template']==3)//image
					{
						$hover_bottom='<img src="'.$opt_image_hover_item_bottom['3']['opt_image_hover_item_2_image']['url'].'">';	
					}	
					
				}
				else
				{
					$post_category_left=1;
					$post_category_right=1;
					$max_posts=5;
					$order_by='date';
					$normal_thumbnail='grid_small_image';
					$focus_thumbnail='grid_focus_image';
					$category_tag_number=2;
					$components=array("Thumbnail","Title", "Categories");
					$hover_top='N';
					$hover_bottom='';
					$row_title='';
				}
				include(locate_template('templates/featured-posts-grid-2-col.php'));
			break;
			
			case 'Posts Grid Standard': 
				
				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$post_categories=$value['opt_header_element_type']['Posts Grid Standard']["opt_header_featuredposts_categories"];
					$post_category=array_values($post_categories);
	
					$row_title=$value['opt_header_element_type']['Posts Grid Standard']["opt_header_featuredposts_title"];
				
					//this converts the options into a string so the loop will accept the categories.
					$strcats="";
					if(count($post_category)>1)
					{
						foreach($post_category as $value)
						{
							$strcats.=$value.",";
						}
					} 
					else if(count($post_category)==1)
					{
						$strcats=$post_category[0];
					}
					else
					{
						$strcats=1;
					}
					$post_category=$strcats;
					$max_posts=$value['opt_header_element_type']['Posts Grid Standard']["opt_header_featuredposts_number_posts"];
					$order_by=$value['opt_header_element_type']['Posts Grid Standard']["opt_header_featuredposts_ordering"];
					$icon=$value['opt_header_element_type']['Posts Grid Standard']["opt_header_featuredposts_title_icon"];
					if($value['opt_header_element_type']['Posts Grid Standard']["opt_header_featuredposts_title_icon"])
					{
						$row_icon='<i class="'.$value['opt_header_element_type']['Posts Grid Standard']["opt_header_featuredposts_title_icon"].' header-icon"></i>';
					}
					else
					{
						$row_icon='';
					}
					
					$normal_thumbnail='grid_small_image';
					$focus_thumbnail='grid_focus_image';
					$category_tag_number=$value['opt_header_element_type']['Posts Grid Standard']["opt_header_featuredposts_number_categories"];
					$components_elements=$value['opt_header_element_type']['Posts Grid Standard']["opt_header_featuredposts_functionality"];
					
					//var_dump($components);

					$hover_icon=fw_get_db_settings_option('opt_image_icon');
					$hover_item='<i class="'.$hover_icon.' js-option-type-icon-item  active" data-value="'.$hover_icon.'" style="display: block;"></i>';
					
					//top hover item
					$opt_image_hover_item_top= fw_get_db_settings_option('opt_image_hover_item_1');
					if($opt_image_hover_item_top['template']==0) //nothing
					{
					}
					else if($opt_image_hover_item_top['template']==1)//text
					{
						$hover_top=$opt_image_hover_item_top['1']['opt_image_hover_item_1_text'];	
					}
					else if($opt_image_hover_item_top['template']==2)//icon
					{
						$hover_top='<i class="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'" data-value="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'"></i>';
					}
					else if($opt_image_hover_item_top['template']==3)//image
					{
						$hover_top='<img src="'.$opt_image_hover_item_top['3']['opt_image_hover_item_1_image']['url'].'">';	
					}
					
					//bottom hover item
					$opt_image_hover_item_bottom= fw_get_db_settings_option('opt_image_hover_item_2');
					if($opt_image_hover_item_bottom['template']==0) //nothing
					{
					}
					else if($opt_image_hover_item_bottom['template']==1)//text
					{
						$hover_bottom=$opt_image_hover_item_bottom['1']['opt_image_hover_item_2_text'];	
					}
					else if($opt_image_hover_item_bottom['template']==2)//icon
					{
						$hover_bottom='<i class="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'" data-value="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'"></i>';
					}
					else if($opt_image_hover_item_bottom['template']==3)//image
					{
						$hover_bottom='<img src="'.$opt_image_hover_item_bottom['3']['opt_image_hover_item_2_image']['url'].'">';	
					}	
					
				}
				else
				{
					$post_category=1;
					$max_posts=9;
					$order_by='date';
					$normal_thumbnail='grid_small_image';
					$focus_thumbnail='grid_focus_image';
					$category_tag_number=2;
					$components=array("Thumbnail","Title", "Categories");
					$hover_top='N';
					$hover_bottom='';
					$row_title='';
				}
				include(locate_template('templates/featured-posts-grid-standard.php'));
			break;
			
			case 'Visual Editor Row': 
				if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
				{
					$extra_editor_content=$value['opt_header_element_type']['Visual Editor Row']["opt_header_extra_editor"];
					include(locate_template('templates/extra-editor.php'));
				}
				else
				{
					
				}
			break;
			
			
			 
		    }
		 
		}
	}*/


?>
<div id="search" class="full-height">
				<form class="morphsearch-form">
					<input type="search" class="morphsearch-input" placeholder="Search ..." value="" name="s" title="Search for:">
					<div class="morphsearch-label">Type your keywords above and press enter to search. Press Esc to cancel.</div>
				</form>
				<div class="close-button"><i class="icon-cancel"></i></div>
</div>


		

