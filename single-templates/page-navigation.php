<?php
/**
 * Contains page nagivation for single posts
 * @requires $post_categories, $divider_uri, $components_elements, $category_tag_number,
 * $divider_type=$divider_uri **/



$prev_post = get_adjacent_post( true, '', true, 'category' );
$next_post = get_adjacent_post( true, '', false, 'category' );

if (!empty( $prev_post )||!empty( $next_post ) )
{
?>
<div class="post-navigation">
	<div class="nav-doubleflip thumb-doubleflip full-featured-buttons">

	<?php
	if (!empty( $prev_post ) )
	{
		$prev_post_id=$prev_post->ID;
		$prev_post_title=$prev_post->post_title;
		$prev_post_url=$prev_post->guid;
		$prev_hide_thumb_string="no-image";
		$prev_thumb="";
		if ( has_post_thumbnail($prev_post_id) )
		{
			$prev_thumb=get_the_post_thumbnail($prev_post_id,'prevnext' );
			$prev_hide_thumb_string="image";
		}

		?>

			<a class="prev featured-post-slider-prev" href="<?php echo $prev_post_url; ?>" id="full-prev">
				<span class="icon-wrap icon-wrap-left background-dark">❮</span>
				<div class="prev-preview-container <?php echo $prev_hide_thumb_string; ?>">
					<?php echo $prev_thumb; ?>
					<div class="title-container"><span class="title hidden-desc"><?php echo $prev_post_title; ?><br/>&#8594;</span></div>
				</div>
			</a>

		<?php
	}
	if (!empty( $next_post ) )
	{
		$next_post_id=$next_post->ID;
		$next_post_title=$next_post->post_title;
		$next_post_url=$next_post->guid;
		$next_hide_thumb_string="no-image";
		$next_thumb="";
		if ( has_post_thumbnail($next_post_id) )
		{
			$next_thumb=get_the_post_thumbnail($next_post_id,'prevnext' );
			$next_hide_thumb_string="image";
		}
		?>

		<a class="next featured-post-slider-next" href="<?php echo $next_post_url; ?>" id="full-next">
			<span class="icon-wrap icon-wrap-left background-dark">❯</span>
			<div class="next-preview-container <?php echo $next_hide_thumb_string; ?>">
				<?php echo $next_thumb; ?>
				<div class="title-container"><span class="title hidden-desc"><?php echo $next_post_title; ?><br/>&#8594;</span></div>
			</div>
		</a>

		<?php
	}
	?>
	</div>
</div>
<?php
}
