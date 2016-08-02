<?php

/**
 * Generates date+comments+author
 * @requires $excerpt_length
 */

/* Get upload directory info*/
$upload_info=wp_upload_dir();
$upload_dir=$upload_info['basedir'];
$upload_url=$upload_info['baseurl'];
if(!isset($excerpt_length)){$excerpt_length=11;} //might not be set when large excerpt is used

/*Get file path info*/
$attachment_id=get_post_thumbnail_id( get_the_ID() );
$image_path=get_attached_file( $attachment_id );
$item_string.='
<div class="social-share-boxes share-boxes featured-posts-grid-paragraph component-element">
    <div class="absolute-container">
        <i class="fa fa-share-alt start-icon background-accent share"></i><span class="share-label">'.__( 'Share This ', 'thshpr' ).'</span><!--
         --><span class="social-box facebook"><a class="inner facebook-inner" href="https://www.facebook.com/sharer/sharer.php?u='.urlencode(get_permalink()).'"><i class="fa fa-facebook icon"></i></a></span><!--
         --><span class="social-box twitter"><a class="inner twitter-inner" href="https://twitter.com/home?status='.urlencode(get_permalink()).'"><i class="fa fa-twitter icon"></i></a></span><!--
         --><span class="social-box google-plus"><a class="inner google-plus-inner" href="https://plus.google.com/share?url='.urlencode(get_permalink()).'"><i class="fa fa-google-plus icon"></i></a></span><!--
         --><span class="social-box linked-in"><a class="inner linked-in-inner" href="https://www.linkedin.com/shareArticle?mini=true&url='.urlencode(get_permalink()).'&title='.urlencode(get_the_title()).'&summary='.thshpr_stripped_excerpt($excerpt_length).'&source="><i class="fa fa-linkedin icon"></i></a></span><!--
         --><span class="social-box pinterest"><a class="inner pinterest-inner" href="https://pinterest.com/pin/create/button/?url='.urlencode(get_permalink()).'&media='.urlencode($image_path).'&description='.thshpr_stripped_excerpt($excerpt_length).'"><i class="fa fa-pinterest icon"></i></a></span>
    </div>
</div>';

?>
