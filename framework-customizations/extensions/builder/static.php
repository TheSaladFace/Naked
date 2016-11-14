<?php if (!defined('FW')) die('Forbidden');

if (!is_admin()) {
    wp_enqueue_style(
        'thshpr-frontend-grid',
        get_template_directory_uri() .'/framework-customizations/extensions/builder/static/css/frontend-grid.css',
        fw()->theme->manifest->get_version()
    );
}
if (is_admin()) {
   wp_enqueue_style(
        'thshpr-backend-grid',
        get_template_directory_uri() .'/framework-customizations/extensions/builder/static/css/backend-grid.css',
        array('fw'),
        fw()->theme->manifest->get_version()
    );
}
