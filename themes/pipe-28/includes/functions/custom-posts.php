<?php

/*******************************************************/
/******************** POSTTYPE HOME ********************/
/*******************************************************/


add_action('init', 'type_home_config');

function type_home_config()
{

    $descritivos = array(
        'name' => 'Home Config',
        'singular_name' => 'Configuração',
        'add_new' => 'Adicionar Nova configuração',
        'add_new_item' => 'Adicionar configuração',
        'edit_item' => 'Editar configuração',
        'new_item' => 'Nova configuração',
        'view_item' => 'Ver configurações',
        'search_items' => 'Procurar configuração',
        'not_found' =>  'Nenhum configuração encontrada',
        'not_found_in_trash' => 'Nenhum configuração na Lixeira',
        'parent_item_colon' => '',
        'menu_name' => 'Home Config'
    );

    $args = array(
        'labels' => $descritivos,
        'public' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-admin-home',
        'menu_position' => 36,
        'supports' => array('title', 'custom-fields', 'revisions')
    );

    register_post_type('home_config', $args);
    flush_rewrite_rules();
}



/*******************************************************/
/***************** POSTTYPE SERVICES *******************/
/*******************************************************/


add_action('init', 'type_services');

function type_services()
{

    $descritivos = array(
        'name' => 'Servicos',
        'singular_name' => 'Servico',
        'add_new' => 'Adicionar Novo servico',
        'add_new_item' => 'Adicionar servico',
        'edit_item' => 'Editar servico',
        'new_item' => 'Novo servico',
        'view_item' => 'Ver servicos',
        'search_items' => 'Procurar servico',
        'not_found' =>  'Nenhum servico encontrado',
        'not_found_in_trash' => 'Nenhum servico na Lixeira',
        'parent_item_colon' => '',
        'menu_name' => 'Servicos'
    );

    $args = array(
        'labels' => $descritivos,
        'public' => true,
        'hierarchical' => false,
        'menu_icon' => 'dashicons-store',
        'menu_position' => 37,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats')
    );

    register_post_type('services', $args);
    flush_rewrite_rules();
}


/*******************************************************/
/************* CUSTOM TAXONOMY PROJETOS ****************/
/*******************************************************/

function pd_registrar_taxonomia_projetos() {

    $labels = array(
        'name'              => 'Projetos',
        'singular_name'     => 'Projeto',
        'search_items'      => 'Buscar Projetos',
        'all_items'         => 'Todos os Projetos',
        'parent_item'       => 'Projeto Pai',
        'parent_item_colon' => 'Projeto Pai:',
        'edit_item'         => 'Editar Projeto',
        'update_item'       => 'Atualizar Projeto',
        'add_new_item'      => 'Adicionar Novo Projeto',
        'new_item_name'     => 'Novo Nome de Projeto',
        'menu_name'         => 'Projetos',
    );

    $args = array(
        'hierarchical'      => true, // true = estilo Categoria (checkboxes); false = estilo Tag (texto)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true, // Exibe a coluna do cliente na listagem do wp-admin
        'query_var'         => true,
        'show_in_rest'      => true, // OBRIGATÓRIO para funcionar no Editor de Blocos (Gutenberg)
        'rewrite'           => array( 'slug' => 'projetos', 'with_front' => false ),
    );

    // Registra a taxonomia 'cliente' e associa aos posts do Blog ('post') e ao CPT ('portfolio')
    register_taxonomy('projetos', array('post'), $args);
}
add_action( 'init', 'pd_registrar_taxonomia_projetos' );


/*******************************************************/
/***************** POSTTYPE CLIENTES ******************/
/*******************************************************/

function pd_registrar_cpt_clientes() {

    $labels = array(
        'name'               => 'Clientes',
        'singular_name'      => 'Cliente',
        'add_new_item'       => 'Adicionar Novo Cliente',
        'edit_item'          => 'Editar Cliente',
        'all_items'          => 'Todos os Clientes',
        'new_item'           => 'Novo Cliente',
        'view_item'          => 'Ver Clientes',
        'search_items'       => 'Procurar Cliente',
        'not_found'          => 'Nenhum Cliente encontrado',
        'not_found_in_trash' => 'Nenhum Cliente na Lixeira',
        'parent_item_colon'  => 'Cliente Pai:',
        'menu_name'          => 'Clientes',
    );

    $args = array(
        'labels'          => $labels,
        'public'          => true,
        'has_archive'     => true,
        'hierarchical'    => false, // Mudar para false remove o 'post_parent' desnecessário
        'show_in_rest'    => true,
        'menu_icon'       => 'dashicons-groups',
        'menu_position'   => 38,
        'supports'        => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' ),
        'rewrite'         => array( 'slug' => 'clientes', 'with_front' => false ),
    );

    register_post_type( 'clientes', $args );
}
add_action( 'init', 'pd_registrar_cpt_clientes' );


/*******************************************************/
/********************* POSTTYPE FAQ ********************/
/*******************************************************/

function pd_registrar_cpt_faq() {

    $labels = array(
        'name'               => 'FAQ',
        'singular_name'      => 'Pergunta',
        'add_new_item'       => 'Adicionar Nova Pergunta',
        'edit_item'          => 'Editar Pergunta',
        'all_items'          => 'Todas as Perguntas',
        'new_item'           => 'Nova Pergunta',
        'view_item'          => 'Ver Perguntas',
        'search_items'       => 'Procurar Pergunta',
        'not_found'          => 'Nenhuma Pergunta encontrada',
        'not_found_in_trash' => 'Nenhuma Pergunta na Lixeira',
        'parent_item_colon'  => 'Pergunta Pai:',
        'menu_name'          => 'FAQ',
    );

    $args = array(
        'labels'          => $labels,
        'public'          => true,
        'has_archive'     => true,
        'hierarchical'    => false, // Mudar para false remove o 'post_parent' desnecessário
        'show_in_rest'    => true,
        'menu_icon'       => 'dashicons-editor-help',
        'menu_position'   => 39,
        'supports'        => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'post-formats' ),
        'rewrite'         => array( 'slug' => 'faq', 'with_front' => false ),
    );

    register_post_type( 'faq', $args );
}
add_action( 'init', 'pd_registrar_cpt_faq' );


