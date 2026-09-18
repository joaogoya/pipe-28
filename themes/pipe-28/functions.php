<?php


/*******************************************************/
/******************* THEME SUPORT **********************/
/*******************************************************/

//Titulo dinamico
add_theme_support('title-tag');

// side bar
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name'            => 'Sidebar',
        'id'              => 'idebar-1',
        'before_widget'    => '<div class="widget">',
        'after_widget'    => '</div>',
        'before_title'    => '<h3>',
        'after_title'    => '</h3>',
    ));
}

//tamanhos diferentes de imgs na galeria
add_theme_support('post-thumbnails');

//ecerpt pages
add_post_type_support('page', 'excerpt');

// esconde a versao do wp
add_filter('the_generator', 'function_name');
function function_name()
{
    return;
}


/*******************************************************/
/************************* MENU ************************/
/*******************************************************/
add_action('init', 'register_main_menu');

function register_main_menu()
{
    register_nav_menu('main-menu', 'Menu principal do header');
}


function get_custom_menu($id)
{
    $menuLocations = get_nav_menu_locations();
    $menuID = $menuLocations[$id];
    $navbar_items = wp_get_nav_menu_items($menuID);
    $child_items = [];

    foreach ($navbar_items as $key => $item) {
        if ($item->menu_item_parent) {
            array_push($child_items, $item);
            unset($navbar_items[$key]);
        }
    }

    foreach ($navbar_items as $item) {
        foreach ($child_items as $key => $child) {
            if ($child->menu_item_parent == $item->post_name) {
                if (!$item->child_items) {
                    $item->child_items = [];
                }
                array_push($item->child_items, $child);
                unset($child_items[$key]);
            }
        }
    }

    return $navbar_items;
}



/*******************************************************/
/************************ ASSETS ***********************/
/*******************************************************/

function pipe_add_scripts() {
    // 1. Desativa o jQuery nativo do WordPress para evitar duplicidade e conflitos
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_deregister_script('jquery-migrate');
    }

    $dist_path = get_stylesheet_directory_uri() . '/assets/dist';
    $dist_dir  = get_stylesheet_directory() . '/assets/dist';

    // Cache Busting (Gera uma nova versão toda vez que você salvar o arquivo)
    $css_ver = file_exists($dist_dir . '/style.min.css') ? filemtime($dist_dir . '/style.min.css') : '1.0.0';
    $js_ver  = file_exists($dist_dir . '/scripts.min.js') ? filemtime($dist_dir . '/scripts.min.js') : '1.0.0';

    // 2. Carrega o CSS Unificado
    wp_enqueue_style('pipe-main-style', $dist_path . '/style.min.css', array(), $css_ver);

    // 3. Carrega o JS Unificado (jQuery já está lá dentro!)
    wp_enqueue_script('pipe-main-script', $dist_path . '/scripts.min.js', array(), $js_ver, true);
}
add_action('wp_enqueue_scripts', 'pipe_add_scripts');



/*******************************************************/
/************************ DUMP *************************/
/*******************************************************/

function print_var($var)
{
    print("<pre>" . print_r($var, true) . "</pre>");
}

/*******************************************************/
/******************* GET CATEGORIES ********************/
/*******************************************************/

function get_page_categories_by_slug($title, $post_type)
{

    $page = get_page_by_title($title, OBJECT, $post_type);

    return get_the_category($page->ID);
}

/*******************************************************/
/******************* HAS CHILDREN **********************/
/*******************************************************/

function category_has_children($id_post)
{

    $categories = wp_get_post_categories($id_post);

    foreach ($categories as $c) {

        $cat = get_category($c);

        $children =  get_categories(array(
            'orderby' => 'name',
            'parent' => $cat->term_id
        ));

        if (empty($children)) {

            return ($cat->slug);
        }
    }
    return '';
}



/*******************************************************/
/********** CATEGORIA PRINCIPAL DO POST ****************/
/*******************************************************/

function get_post_primary_category($post_id) {

    // 1. Pega o ID do post atual no loop
    $post_id = get_the_ID();

    // 2. Busca todas as categorias vinculadas a este post de forma nativa
    $all_categories = get_the_category( $post_id );

    $primary_category = null;

    if ( ! empty( $all_categories ) ) {
        
        // 3. Verifica se o Yoast SEO está ativo e se a classe existe
        if ( class_exists( 'WPSEO_Primary_Term' ) ) {
            
            // Instancia o objeto da categoria principal do Yoast para o post
            $wpseo_primary_term = new WPSEO_Primary_Term( 'category', $post_id );
            $primary_cat_id     = $wpseo_primary_term->get_primary_term();
            
            // Se o usuário tiver selecionado uma categoria como principal no painel
            if ( $primary_cat_id ) {
                $yoast_term = get_term( $primary_cat_id );
                
                // Garante que não há erros no retorno antes de definir
                if ( ! is_wp_error( $yoast_term ) && $yoast_term ) {
                    $primary_category = $yoast_term;
                }
            }
        }
        
        // 4. Fallback (Reserva): Se o Yoast não estiver ativo ou se o post não tiver 
        // uma categoria marcada como principal, escolhe o primeiro item do array
        if ( ! $primary_category ) {
            $primary_category = $all_categories[0];
        }
    }

    return $primary_category;
}



/*******************************************************/
/***************** GET ID BY SLUG  *********************/
/*******************************************************/
function get_post_id_by_slug($slug, $post_type)
{

    $args = array(
        'name'        => $slug,
        'post_type'   => $post_type,
        'post_status' => 'publish',
        'numberposts' => 1
    );

    $my_posts = get_posts($args);

    return $my_posts[0]->ID;
}

/*******************************************************/
/**************** GET TITLE BY SLUG  *******************/
/*******************************************************/
function get_post_title_by_slug($slug, $post_type)
{

    $args = array(
        'name'        => $slug,
        'post_type'   => $post_type,
        'post_status' => 'publish',
        'numberposts' => 1
    );

    $my_posts = get_posts($args);

    return $my_posts[0]->post_title;
}

/*******************************************************/
/************* GET PAGE INFORMATIONS *******************/
/*******************************************************/

function get_page_data_by_slug($slug, $post_type)
{

    /*
        Busca as informações de uma página específica pelo título
        retorna uma query para ser loopada
    */

    $id = get_post_id_by_slug($slug, $post_type);

    $args = array(
        'p'         => $id,
        'post_type' => $post_type
    );

    $my_post = new WP_Query($args);

    wp_reset_postdata();

    return $my_post;
}


/*******************************************************/
/***************** GET PAGE BY TITLE *******************/
/*******************************************************/

function get_page_data_by_title($title, $post_type)
{

   
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => 5,
        'orderby' => 'title',
        'title' => $title
    );

    $my_post = new WP_Query($args);
    //print_var($my_post);

    wp_reset_postdata();

    return $my_post;
}

/*******************************************************/
/******************* SEARCH ONLY POSTS *****************/
/*******************************************************/

/*
    A searchbar traz, por default, posts types, páginas, ...
    Essa function restringe a pesquisa apenas aos posts do blog
*/

function search_filter($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        }
    }
}

add_action('pre_get_posts', 'search_filter');
/* Fim search only posts */


require('includes/functions/custom-posts.php');
require('includes/functions/img_handle/index.php');
require('includes/functions/acf_utils.php');


