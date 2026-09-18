<?php
/**
 * Bootstrap do Tema Pipeline
 */

$includes = array(
    '/includes/functions/setup.php',
    '/includes/functions/helpers.php',
    '/includes/functions/safe-configs.php',
    '/includes/functions/acf_utils.php',
    '/includes/functions/img_handle/index.php',
);

foreach ($includes as $file) {
    $filepath = get_template_directory() . $file;
    if (file_exists($filepath)) {
        require_once $filepath;
    }
}