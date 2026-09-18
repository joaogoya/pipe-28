<?php
/**
 * Funções Utilitárias e Helpers de Busca/Query
 */

// Helper para Debug
function print_var($var) {
    print("<pre>" . print_r($var, true) . "</pre>");
}

// Manipulação de Menus Customizados
function get_custom_menu($id) {
    $menuLocations = get_nav_menu_locations();
    if (!isset($menuLocations[$id])) return [];

    $menuID = $menuLocations[$id];
    $navbar_items = wp_get_nav_menu_items($menuID);
    $child_items = [];

    if (!$navbar_items) return [];

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

// Helpers de Posts, Páginas e Categorias
function get_page_categories_by_slug($title, $post_type) {
    $page = get_page_by_title($title, OBJECT, $post_type);
    return $page ? get_the_category($page->ID) : [];
}

function category_has_children($id_post) {
    $categories = wp_get_post_categories($id_post);
    foreach ($categories as $c) {
        $cat = get_category($c);
        $children = get_categories(array(
            'orderby' => 'name',
            'parent'  => $cat->term_id
        ));
        if (empty($children)) {
            return ($cat->slug);
        }
    }
    return '';
}

function get_post_id_by_slug($slug, $post_type) {
    $args = array(
        'name'        => $slug,
        'post_type'   => $post_type,
        'post_status' => 'publish',
        'numberposts' => 1
    );
    $my_posts = get_posts($args);
    return !empty($my_posts) ? $my_posts[0]->ID : null;
}

function get_post_title_by_slug($slug, $post_type) {
    $args = array(
        'name'        => $slug,
        'post_type'   => $post_type,
        'post_status' => 'publish',
        'numberposts' => 1
    );
    $my_posts = get_posts($args);
    return !empty($my_posts) ? $my_posts[0]->post_title : '';
}

function get_page_data_by_slug($slug, $post_type) {
    $id = get_post_id_by_slug($slug, $post_type);
    $args = array(
        'p'         => $id,
        'post_type' => $post_type
    );
    $my_post = new WP_Query($args);
    wp_reset_postdata();
    return $my_post;
}

function get_page_data_by_title($title, $post_type) {
    $args = array(
        'post_type'      => $post_type,
        'posts_per_page' => 5,
        'orderby'        => 'title',
        'title'          => $title
    );
    $my_post = new WP_Query($args);
    wp_reset_postdata();
    return $my_post;
}