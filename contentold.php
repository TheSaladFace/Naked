<?php
/**
* The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package naked
 */
 
 global $nude_options;
 $image_size=$nude_options['opt_blog_featured_thumbnail_size'];
 $offset=$nude_options['opt_blog_offset'];
 $content_size=12-$offset;
 $layout=$nude_options['opt_blog_layout']['enabled']; //sorter from options for the blog rows
 $shares=$nude_options['opt_blog_share_buttons']; //sorter from options for the social share icons
 $share_text=$nude_options['opt_blog_share_text'];	
 $offset_black_line=$nude_options['opt_blog_offset_black_line'];
 ?>
 

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php
	if ($layout)
	{	
		foreach ($layout as $key=>$value) 
		{
		    switch($key) 
		    {
		 
			case 'title': 
				if($offset_black_line && $offset>=1 )
				{
					$black_line_class='black-line';
					$black_line_adjust='black-line-adjust';
				}
				
				?>				
				<div class="row blog-row no-gutter <?php echo $black_line_class; ?>">
					<div class="col-sm-0 col-md-<?php echo  $offset; ?>" >
					</div>
					<div class="col-sm-12 col-md-<?php echo  $content_size; ?> <?php echo $black_line_adjust; ?>">
					<?php
			
						if ( is_single() )
						{
							the_title( '<h1 class="entry-title">', '</h1>' );
						}
						else
						{
							the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
						}
					
					?>
					</div>
				</div>
				<?php
				
			break;
		 
			case 'postmeta': 
				
				?>
				<div class="row blog-row no-gutter">
					<div class="col-sm-0 col-md-<?php echo  $offset; ?>">
					</div>
					<div class="col-sm-12 col-md-<?php echo  $content_size; ?>">
						<div class="entry-meta">
							<?php
								if ( 'post' == get_post_type() )
								{
									naked_posted_on();
								}
				
								if ( ! post_password_required() && ( comments_open() || get_comments_number() ) )
								{
								?>
									 <span class="comments-link"><i class="icon-comment-2 meta-icon"></i><?php comments_popup_link( __( 'Leave a comment', 'naked' ), __( '1 Comment', 'naked' ), __( '% Comments', 'naked' ) ); ?></span>
								<?php
								}
				
								edit_post_link( __( 'Edit', 'naked' ), '  <i class="icon-pencil-squared meta-icon"></i><span class="edit-link">', '</span>' );
								
							?>
						</div>
					</div>
				</div>
				
				<?php				
				
			break;
			
			case 'categories': 
				
				?>
				
				<div class="row blog-row no-gutter">
					<div class="col-sm-0 col-md-<?php echo  $offset; ?>">
					</div>
					<div class="col-sm-12 col-md-<?php echo  $content_size; ?>">
					
						<?php
						$categories = get_the_category();
							$separator = ' ';
								
							if($categories)
							{
								echo'<p class="meta-categories meta-paragraph entry-meta-categories">';
								foreach($categories as $category) 
								{
									echo'<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
								}
								echo'</p>';
							}
						?>
					
					</div>
				</div>
				
				<?php
				
				
			break;
			
			case 'tags':
				
				?>
				
				<div class="row blog-row no-gutter">
					<div class="col-sm-0 col-md-<?php echo  $offset; ?>">
					</div>
					<div class="col-sm-12 col-md-<?php echo  $content_size; ?>">
					
						<?php					
						$posttags = get_the_tags();
						$separator = ' ';
						if ($posttags) 
						{
							echo'<p class="meta-tags meta-paragraph entry-meta-tags">';					
							  foreach($posttags as $tag) 
							  {
								 
								  echo'<a href="'.get_tag_link($tag->term_id).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $tag->name ) ) . '">'.$tag->name.'</a>'.$separator;
						
							 }
							  echo'</p>';
						}
						?>
					
					</div>
				</div>
				
				<?php
				
			break;
			/**
			* Content is in here. This will alter depending on template. I don't like replicating the entire file many times.
			**/
			case 'content':
				
				?>
				
				<div class="row blog-row no-gutter">
					<div class="col-sm-0 col-md-<?php echo  $offset; ?>">
					</div>
					<div class="col-sm-12 col-md-<?php echo  $content_size; ?>">
						<div class="the-content the-excerpt">
					
						<?php
						if(is_single())
						{
							the_content();
						}
						else
						{
							the_excerpt();
						}
						?>
						
						</div>
					</div>
				</div>
				
				<?php
				
			break;
			
			case 'image':
				
				?>
				
				<div class="row blog-row no-gutter">
					<div class="col-sm-0">
					</div>
					<div class="col-sm-12">
						
						<a href="'.get_permalink().'">
							<div class="grid">											
								<div class="effect-1"><?php the_post_thumbnail( $image_size ); ?>
									
									<div class="item-2 large">
										<p><span class="centered"><i class="icon-link"></i></span></p>
									</div>	
									<div class="item-1 large">
										<p><span class="centered"><i class="icon-link"></i></span></p>
									</div>
																	
								</div>
							</div>
						</a>
						<p class="featured-thumbnail-slider-paragraph extra-margin"></p>
						<p class="spacer-20"></p>
					
						
						
					</div>
				</div>
				
				<?php
				
			break;
			
			
			case 'socialshares':
				
				?>
				
					<div class="row blog-row no-gutter">
						<div class="col-sm-0 col-md-<?php echo  $offset; ?>">
						</div>
						<div class="col-sm-12 col-md-<?php echo  $content_size; ?>">
							<?php
							if($share_text)
							{
								echo'<div class="share-label">'.$share_text.'</div>';
							}
							?>
							 <div class="share-holder">
							 <?php
							 foreach ($shares as &$value) 
							 {
								 switch($value) {
									case 'twitter':
										?><a rel="external nofollow" class="share share-twitter" href="http://twitter.com/intent/tweet/?text=<?php echo urlencode(get_the_title()); ?>&url=<?php echo  esc_url( get_permalink() ); ?>" target="_blank"><i class="icon-twitter"></i></a> <?php
									break;
						
									case 'facebook':
										?><a rel="external nofollow" class="share share-facebook" href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo  urlencode( get_permalink() ); ?>&p[title]=<?php echo urlencode(get_the_title()); ?>" target="_blank" ><i class="icon-facebook"></i></a> <?php
									break;
						
									case 'googlePlus':
										?><a rel="external nofollow" class="share share-googleplus" href="https://plus.google.com/share?url=<?php echo  urlencode( get_permalink() ); ?>" target="_blank" ><i class="icon-gplus-squared"></i></a> <?php
									break;
									
									case 'linkedin':
										?><a rel="external nofollow" class="share share-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo  urlencode( get_permalink() ); ?>&title=<?php echo urlencode(get_the_title()); ?>&summary=&source= " target="_blank" ><i class="icon-linkedin"></i></a> <?php
									break;
									
									case 'tumblr':
										?><a rel="external nofollow" class="share share-tumblr" href="http://www.tumblr.com/share/link?url=<?php echo  urlencode( get_permalink() ); ?>&name=<?php echo urlencode(get_the_title()); ?>&description=" target="_blank" ><i class="icon-tumblr"></i></a> <?php
									break;
									
									case 'reddit':
										?><a rel="external nofollow" class="share share-reddit" href="http://www.reddit.com/submit?url=<?php echo  urlencode( get_permalink() ); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank" ><i class="icon-reddit-squared"></i></a> <?php
									break;
									
									case 'digg':
										?><a rel="external nofollow" class="share share-digg" href="http://digg.com/submit?url=<?php echo  urlencode( get_permalink() ); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank" ><i class="icon-digg"></i></a> <?php
									break;
									
									case 'stumbleupon':
										?><a rel="external nofollow" class="share share-stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php echo  urlencode( get_permalink() ); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank" ><i class="icon-stumbleupon-circled"></i></a> <?php
									break;
									
									case 'email':
										?><a rel="external nofollow" class="share share-email" href="mailto:?&subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo  urlencode( get_permalink() ); ?>" target="_blank" ><i class="icon-email"></i></a> <?php
									break;
								 }
							}
							?>
							</div>
					</div>
				</div>
					
				<?php
				
			break;
			
			
			case 'extraexcerpt':
				
				?>
				
				<div class="row blog-row no-gutter">
					<div class="col-sm-0 col-md-<?php echo  $offset; ?>">
					</div>
					<div class="second-excerpt col-sm-12 col-md-<?php echo  $content_size; ?>">
						<?php
						the_field( "second_excerpt" );
						?>
					</div>
				</div>
				
				<?php
				
			break;
			
			case 'spacera':
				
				?><div class="row blog-row spacer-small"><div class="col-sm-12"></div></div><?php
				
			break;
			
			case 'spacerb':
				
				?><div class="row blog-row  spacer-medium"><div class="col-sm-12"></div></div><?php
				
			break;
			
			case 'spacerc':
				
				?><div class="row blog-row  spacer-large"><div class="col-sm-12"></div></div><?php
				
			break;
			
			case 'spacerb1':
				
				?><div class="row blog-row spacer-small"><div class="col-sm-12"></div></div><?php
				
			break;
			
			case 'spacerb2':
				
				?><div class="row blog-row  spacer-medium"><div class="col-sm-12"></div></div><?php
				
			break;
			
			case 'spacerb3':
				
				?><div class="row blog-row  spacer-large"><div class="col-sm-12"></div></div><?php
				
			break;
			
			case 'spacerc1':
				
				?><div class="row blog-row spacer-small"><div class="col-sm-12"></div></div><?php
				
			break;
			
			case 'spacerc2':
				
				?><div class="row blog-row  spacer-medium"><div class="col-sm-12"></div></div><?php
				
			break;
			
			case 'spacerc3':
				
				?><div class="row blog-row  spacer-large"><div class="col-sm-12"></div></div><?php
				
			break;
			
			case 'spacerd1':
				
				?><div class="row blog-row"><div class="col-sm-0 col-md-<?php echo  $offset; ?>"></div><div class="col-sm-12 col-md-<?php echo  $content_size; ?>"><div class="spacer-divider"></div></div></div><?php
				
			break;
			
			case 'spacerd2':
				
				?><div class="row blog-row"><div class="col-sm-0 col-md-<?php echo  $offset; ?>"></div><div class="col-sm-12 col-md-<?php echo  $content_size; ?>"><div class="spacer-divider"></div></div></div><?php
				
			break;
			 
		    }
		 
		}
	}

	
	?>
	
</article><!-- #post-## -->
