<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package naked
 */


if(function_exists( 'fw_get_db_customizer_option' ))
{
    $extra_top_bar_widget=fw_get_db_customizer_option('opt_header_extra_top_bar_widgets');
    $footer_top_row_columns=fw_get_db_customizer_option('opt_footer_top_row_columns');
    $footer_main_row_columns=fw_get_db_customizer_option('opt_footer_main_row_columns');
    $footer_bottom_row_columns=fw_get_db_customizer_option('opt_footer_bottom_row_columns');

    $footer_top_row_cell_alignment=fw_get_db_customizer_option('opt_footer_top_row_cell_alignment');
    $footer_main_row_cell_alignment=fw_get_db_customizer_option('opt_footer_main_row_cell_alignment');
    $footer_bottom_row_cell_alignment=fw_get_db_customizer_option('opt_footer_bottom_row_cell_alignment');

    $footer_top_row_full_width=fw_get_db_customizer_option('opt_footer_top_row_full_width');
    $footer_main_row_full_width=fw_get_db_customizer_option('opt_footer_main_row_full_width');
    $footer_bottom_row_full_width=fw_get_db_customizer_option('opt_footer_bottom_row_full_width');

    $footer_top_row_background_color = fw_get_db_customizer_option('opt_footer_top_row_background_color');
    $footer_top_row_background_image = fw_get_db_customizer_option('opt_footer_top_row_background_image');
    $footer_top_row_background_position = fw_get_db_customizer_option('opt_footer_top_row_background_position');
    $footer_top_row_background_repeat = fw_get_db_customizer_option('opt_footer_top_row_background_repeat');
    $footer_top_row_background_size = fw_get_db_customizer_option('opt_footer_top_row_background_size');

    $footer_main_row_background_color = fw_get_db_customizer_option('opt_footer_main_row_background_color');
    $footer_main_row_background_image = fw_get_db_customizer_option('opt_footer_main_row_background_image');
    $footer_main_row_background_position = fw_get_db_customizer_option('opt_footer_main_row_background_position');
    $footer_main_row_background_repeat = fw_get_db_customizer_option('opt_footer_main_row_background_repeat');
    $footer_main_row_background_size = fw_get_db_customizer_option('opt_footer_main_row_background_size');

    $footer_bottom_row_background_color = fw_get_db_customizer_option('opt_footer_bottom_row_background_color');
    $footer_bottom_row_background_image = fw_get_db_customizer_option('opt_footer_bottom_row_background_image');
    $footer_bottom_row_background_position = fw_get_db_customizer_option('opt_footer_bottom_row_background_position');
    $footer_bottom_row_background_repeat = fw_get_db_customizer_option('opt_footer_bottom_row_background_repeat');
    $footer_bottom_row_background_size = fw_get_db_customizer_option('opt_footer_bottom_row_background_size');

    $footer_back_to_top_button = fw_get_db_customizer_option('opt_footer_back_to_top_button');

    $sidebar_header_accent=fw_get_db_customizer_option('opt_sidebar_header_accent');
    if($sidebar_header_accent==1)
    {
        $sidebar_header_class="fancy-header";
    }
    else
    {
        $sidebar_header_class="";
    }

}
else
{
    $create_top_bar_widgets=2;
    $footer_top_row_columns=0;
    $footer_main_row_columns=3;
    $footer_bottom_row_columns=1;

    $footer_top_row_full_width=0;
    $footer_main_row_full_width=0;
    $footer_bottom_row_full_width=0;

    $footer_top_row_cell_alignment=0;
    $footer_main_row_cell_alignment=0;
    $footer_bottom_row_cell_alignment=0;

    $footer_back_to_top_button=1;

}

/**
 * Cell Alignment Strings
 */
if($footer_top_row_cell_alignment==1)
{
    $footer_top_row_cells_alignment_string="footer-cell-center";
}
else
{
    $footer_top_row_cells_alignment_string="footer-cell-left";
}

if($footer_main_row_cell_alignment==1)
{
    $footer_main_row_cells_alignment_string="footer-cell-center";
}
else
{
    $footer_main_row_cells_alignment_string="footer-cell-left";
}

if($footer_bottom_row_cell_alignment==1)
{
    $footer_bottom_row_cells_alignment_string="footer-cell-center";
}
else
{
    $footer_bottom_row_cells_alignment_string="footer-cell-left";
}
/**
 * Top Row Style Strings
 */
$footer_top_section_style_string="";
if (!empty($footer_top_row_background_color)){ $footer_top_section_style_string.= 'background-color:' . $footer_top_row_background_color . ';';}
if (!empty($footer_top_row_background_image)&&!empty($footer_top_row_background_image['data']['icon']))
{
    $footer_top_section_style_string.= 'background-image:url(' . $footer_top_row_background_image['data']['icon'] . ');';
    if (!empty($footer_top_row_background_position)){$footer_top_section_style_string.= 'background-position:' . $footer_top_row_background_position .';';}
    if (!empty($footer_top_row_background_repeat)){$footer_top_section_style_string.= 'background-repeat:' . $footer_top_row_background_repeat .';';}
    if (!empty($footer_top_row_background_size)){$footer_top_section_style_string.= 'background-size:' . $footer_top_row_background_size .';';}
}

/**
 * Main Row Style Strings
 */
$footer_main_section_style_string="";
if (!empty($footer_main_row_background_color)){ $footer_main_section_style_string.= 'background-color:' . $footer_main_row_background_color . ';';}
if (!empty($footer_main_row_background_image)&&!empty($footer_main_row_background_image['data']['icon']))
{
    $footer_main_section_style_string.= 'background-image:url(' . $footer_main_row_background_image['data']['icon'] . ');';
    if (!empty($footer_main_row_background_position)){$footer_main_section_style_string.= 'background-position:' . $footer_main_row_background_position .';';}
    if (!empty($footer_main_row_background_repeat)){$footer_main_section_style_string.= 'background-repeat:' . $footer_main_row_background_repeat .';';}
    if (!empty($footer_main_row_background_size)){$footer_main_section_style_string.= 'background-size:' . $footer_main_row_background_size .';';}
}

/**
 * Bottom Row Style Strings
 */
$footer_bottom_section_style_string="";
if (!empty($footer_bottom_row_background_color)){ $footer_bottom_section_style_string.= 'background-color:' . $footer_bottom_row_background_color . ';';}
if (!empty($footer_bottom_row_background_image)&&!empty($footer_bottom_row_background_image['data']['icon']))
{
    $footer_bottom_section_style_string.= 'background-image:url(' . $footer_bottom_row_background_image['data']['icon'] . ');';
    if (!empty($footer_bottom_row_background_position)){$footer_bottom_section_style_string.= 'background-position:' . $footer_bottom_row_background_position .';';}
    if (!empty($footer_bottom_row_background_repeat)){$footer_bottom_section_style_string.= 'background-repeat:' . $footer_bottom_row_background_repeat .';';}
    if (!empty($footer_bottom_row_background_size)){$footer_bottom_section_style_string.= 'background-size:' . $footer_bottom_row_background_size .';';}
}

if($extra_top_bar_widget)
{
    $create_top_bar_widgets=2;
}

/**
 * Row full width / boxed strings
 */
if($footer_top_row_full_width)
{
    $footer_top_row_width_string="fw-container-fluid";
}
else
{
    $footer_top_row_width_string="fw-container";
}

if($footer_main_row_full_width)
{
    $footer_main_row_width_string="fw-container-fluid";
}
else
{
    $footer_main_row_width_string="fw-container";
}

if($footer_bottom_row_full_width)
{
    $footer_bottom_row_width_string="fw-container-fluid";
}
else
{
    $footer_bottom_row_width_string="fw-container";
}

if($footer_top_row_columns>0||$footer_main_row_columns>0||$footer_bottom_row_columns>0)
{
    echo'<footer>';

    if($footer_back_to_top_button)
    {
        echo'<a href="#" id="scroll-to-top" class="background-dark background-dark-hover"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>';
    }

    /**
     * Footer Top Row Widgets
     */
    if($footer_top_row_columns>0)
    {
        echo'<section style="'.$footer_top_section_style_string.'">
        <div class="'.$footer_top_row_width_string.'"><div class="fw-row footer-top-row">';

        if($footer_top_row_columns==1)
        {

            echo'<div class="fw-col-lg-12"><div class="sidebar footer-cell '.$footer_top_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-top-row' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-top-row' );
            }

            echo'</div></div>';
        }
        else if($footer_top_row_columns==2)
        {
            echo'<div class="fw-col-lg-6"><div class="sidebar footer-cell '.$footer_top_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-top-row-left' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-top-row-left' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-lg-6"><div class="sidebar footer-cell '.$footer_top_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-top-row-right' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-top-row-right' );
            }

            echo'</div></div>';
        }
        else if($footer_top_row_columns==3)
        {
            echo'<div class="fw-col-lg-4"><div class="sidebar footer-cell '.$footer_top_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-top-row-left' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-top-row-left' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-lg-4"><div class="sidebar footer-cell '.$footer_top_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-top-row-middle' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-top-row-middle' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-lg-4"><div class="sidebar footer-cell '.$footer_top_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-top-row-right' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-top-row-right' );
            }

            echo'</div></div>';
        }

        echo'</div></div></section>';
    }

    /**
     * Footer Main Row Widgets
     */
    if($footer_main_row_columns>0)
    {
        echo'<section style="'.$footer_main_section_style_string.'"><div class="'.$footer_main_row_width_string.'"><div class="fw-row footer-main-row">';

        if($footer_main_row_columns==1)
        {
            echo'<div class="fw-col-lg-12"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row' );
            }

            echo'</div></div>';
        }
        else if($footer_main_row_columns==2)
        {
            echo'<div class="fw-col-sm-6"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row-left' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row-left' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-sm-6"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row-right' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row-right' );
            }

            echo'</div></div>';
        }
        else if($footer_main_row_columns==3)
        {
            echo'<div class="fw-col-sm-4"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row-left' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row-left' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-sm-4"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row-middle' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row-middle' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-sm-4"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row-right' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row-right' );
            }

            echo'</div></div>';
        }
        else if($footer_main_row_columns==4)
        {
            echo'<div class="fw-col-md-3"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row-left-1' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row-left-1' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-md-3"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row-left-2' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row-left-2' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-md-3"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row-right-1' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row-right-1' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-md-3"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'Footer Main Row Right 2' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'Footer Main Row Right 2' );
            }

            echo'</div></div>';
        }
        else if($footer_main_row_columns==6)
        {
            echo'<div class="fw-col-lg-2"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row-left-1' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row-left-1' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-lg-2"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row-left-2' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row-left-2' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-lg-2"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row-left-3' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row-left-3' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-lg-2"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row-right-1' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row-right-1' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-lg-2"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row-right-2' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row-right-2' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-lg-2"><div class="sidebar footer-cell '.$footer_main_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-main-row-right-3' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-main-row-right-3' );
            }

            echo'</div></div>';
        }

        echo'</div></div></section>';
    }

    /**
     * Footer Bottom Row Widgets
     */
    if($footer_bottom_row_columns>0)
    {
        echo'<section style="'.$footer_bottom_section_style_string.'"><div class="'.$footer_bottom_row_width_string.'"><div class="fw-row footer-bottom-row">';

        if($footer_bottom_row_columns==1)
        {
            echo'<div class="fw-col-lg-12"><div class="sidebar footer-cell '.$footer_bottom_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-bottom-row' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-bottom-row' );
            }

            echo'</div></div>';
        }
        else if($footer_bottom_row_columns==2)
        {
            echo'<div class="fw-col-sm-6"><div class="sidebar footer-cell '.$footer_bottom_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-bottom-row-left' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-bottom-row-left' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-sm-6"><div class="sidebar footer-cell '.$footer_bottom_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-bottom-row-right' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-bottom-row-right' );
            }

            echo'</div></div>';
        }
        else if($footer_bottom_row_columns==3)
        {
            echo'<div class="fw-col-sm-4"><div class="sidebar footer-cell '.$footer_bottom_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-bottom-row-left' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-bottom-row-left' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-sm-4"><div class="sidebar footer-cell '.$footer_bottom_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-bottom-row-middle' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-bottom-row-middle' );
            }

            echo'</div></div>';

            echo'<div class="fw-col-sm-4"><div class="sidebar footer-cell '.$footer_bottom_row_cells_alignment_string.' '.$sidebar_header_class.'">';

            if ( is_active_sidebar( 'footer-bottom-row-right' ))
            {
                do_action( 'before_sidebar' );
                dynamic_sidebar( 'footer-bottom-row-right' );
            }

            echo'</div></div>';
        }

        echo'</div></div></section>';
    }

    echo'</footer>';
}

wp_footer();
?>
</body>
</html>
