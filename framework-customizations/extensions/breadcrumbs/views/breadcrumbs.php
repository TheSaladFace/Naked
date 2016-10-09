<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * Breadcrumbs default view
 * Parameters:
 *
 * @var array $items , array with pages ordered hierarchical
 * $items = array(
 *      0 => array(
 *          'name'  => 'Item name',
 *          'url'   => 'Item URL'
 *      )
 * )
 * Each $items array will contain additional information about item, e.g.:
 * 'items' => array (
 *        0 => array (
 *            'name' => 'Homepage',
 *          'type' => 'front_page',
 *            'url' => 'http://yourdomain.com/',
 *        ),
 *        1 => array (
 *            'type' => 'taxonomy',
 *            'name' => 'Uncategorized',
 *            'id' => 1,
 *            'url' => 'http://yourdomain.com/category/uncategorized/',
 *            'taxonomy' => 'category',
 *        ),
 *        2 => array (
 *            'name' => 'Post Article',
 *            'id' => 4781,
 *            'post_type' => 'post',
 *            'type' => 'post',
 *            'url' => 'http://yourdomain.com/post-article/',
 *        ),
 *    ),
 * @var string $separator , the separator symbol
 */
?>

<?php
if ( ! empty( $items ) )
{
	$item_string.='<div class="breadcrumbs">';
		for ( $i = 0; $i < count( $items ); $i ++ )
        {
			if ( $i == ( count( $items ) - 1 ) )
            {
				$item_string.='<span class="last-item">'.$items[ $i ]['name'].'</span>';
            }
            elseif ( $i == 0 )
            {
				$item_string.='<span class="first-item">';
				if( isset( $items[ $i ]['url'] ) )
                {
					$item_string.='<a href="'.$items[ $i ]['url'].'">'.$items[ $i ]['name'].'</a></span>';
                }
                else
                {
                    $item_string.=$items[ $i ]['name'];
                }
				$item_string.='<span class="separator">'.$separator.'</span>';
			}
			else
            {
                $j=$i-1;
				$item_string.='<span class="'. $j ,'-item">';
					if( isset( $items[ $i ]['url'] ) )
                    {
						$item_string.='<a href="'.$items[ $i ]['url'].'">'.$items[ $i ]['name'].'</a></span>';
					}
                    else
                    {
                        $item_string.=$items[ $i ]['name'];
                    }
				$item_string.='<span class="separator">'.$separator.'</span>';
			}
		}
	$item_string.='</div>';
}
?>
