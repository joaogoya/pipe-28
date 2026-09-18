<?php
/**
 * Setup do Tema: Menus, Scripts e Performance de Assets
 */

/*******************************************************/
/******************* THEME SUPPORT *********************/
/*******************************************************/

// Título dinâmico
add_theme_support('title-tag');

// Suporte a thumbnails
add_theme_support('post-thumbnails');

// Suporte a resumo nas páginas
add_post_type_support('page', 'excerpt');

// Sidebar
function pipe_register_sidebars() {
    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'pipe_register_sidebars');


/*******************************************************/
/**************** REGRAS DE PESQUISA *******************/
/*******************************************************/

// Restringe a busca pública apenas para 'posts'
function search_filter($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_search) {
        $query->set('post_type', 'post');
    }
}
add_action('pre_get_posts', 'search_filter');


// Registro de Menus
function register_main_menu() {
    register_nav_menu('main-menu', 'Menu principal do header');
}
add_action('init', 'register_main_menu');

// Enfileiramento de CSS e JS
function pipe_add_scripts() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_deregister_script('jquery-migrate');
    }

    $dist_path = get_stylesheet_directory_uri() . '/assets/dist';
    $dist_dir  = get_stylesheet_directory() . '/assets/dist';

    $css_ver = file_exists($dist_dir . '/style.min.css') ? filemtime($dist_dir . '/style.min.css') : '1.0.0';
    $js_ver  = file_exists($dist_dir . '/scripts.min.js') ? filemtime($dist_dir . '/scripts.min.js') : '1.0.0';

    wp_enqueue_style('pipe-main-style', $dist_path . '/style.min.css', array(), $css_ver);
    wp_enqueue_script('pipe-main-script', $dist_path . '/scripts.min.js', array(), $js_ver, true);
}
add_action('wp_enqueue_scripts', 'pipe_add_scripts');

// Otimização de CSS (Preload)
function pipe_optimize_main_css($tag, $handle) {
    if ('pipe-main-style' === $handle) {
        preg_match('/href=\'(.*?)\'/', $tag, $matches);
        if (isset($matches[1])) {
            $href = $matches[1];
            $preload = "<link rel='preload' href='$href' as='style'>\n";
            $new_tag = str_replace("rel='stylesheet'", "rel='stylesheet' fetchpriority='high'", $tag);
            return $preload . $new_tag;
        }
    }
    return $tag;
}
add_filter('style_loader_tag', 'pipe_optimize_main_css', 10, 2);