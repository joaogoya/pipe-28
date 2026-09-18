<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
?>
        <br><br> <br><br>
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-wrapper container'); ?>>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <header class="entry-header mb-4 text-center">
                        <time class="text-red fw-bold small text-uppercase mb-2 d-block">
                            <?php echo get_the_date(); ?>
                        </time>
                        <h1 class="entry-title display-5 fw-bold"><?php the_title(); ?></h1>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail mt-4 shadow-sm rounded overflow-hidden">
                                <?php echo pipe_get_img(get_the_ID(), true, 'medium_large', 'img-fluid'); ?>
                            </div>
                        <?php endif; ?>
                    </header>

                    <div class="entry-content lh-lg fs-5 my-4">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Páginas:', 'text-domain'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>

                    <footer class="entry-footer mt-5 pt-4 border-top">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="post-tags">
                                <?php the_tags('<span class="badge bg-secondary me-1">#', '</span><span class="badge bg-secondary me-1">#', '</span>'); ?>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

            <!-- LOOP SECUNDÁRIO: PÁGINAS FILHAS DO CASE -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row">

                        <?php

                        //print_var(get_post_field( 'post_name', get_the_ID() ));


                        $args = array(
                            'post_type'      => 'post',             // Puxa os posts normais do Blog
                            'posts_per_page' => 3,                  // Traz apenas 3 posts
                            'orderby'        => 'date',
                            'order'          => 'DESC',             // 'DESC' traz os 3 mais recentes (mude para 'ASC' se quiser os mais antigos)
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => 'sucesso_dos_clientes',        // Slug da Custom Taxonomy
                                    'field'    => 'slug',           // Filtra pelo slug do termo
                                    'terms'    => get_post_field( 'post_name' ),  // Slug hardcoded do cliente
                                ),
                            ),
                        );

                        $loop_filhos = new WP_Query($args);

                        if ($loop_filhos->have_posts()) :
                            while ($loop_filhos->have_posts()) : $loop_filhos->the_post(); ?>

                                <div class="col-md-4">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('card h-100 shadow-sm'); ?>>

                                        <?php if (has_post_thumbnail()) : ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                                            </a>
                                        <?php endif; ?>

                                        <div class="card-body">
                                            <h2 class="card-title h5">
                                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h2>
                                            <div class="card-text text-muted small">
                                                <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                            </div>
                                        </div>

                                        <div class="card-footer bg-transparent border-0 pb-3">
                                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-sm">
                                                Ver Projeto
                                            </a>
                                        </div>

                                    </article>
                                </div>

                        <?php
                            endwhile;
                            wp_reset_postdata(); // RESTAURA O POST GLOBAL ORIGINAL DA PÁGINA PAI
                        endif;
                        ?>
                        <br><br>
                        <!-- <a href="<?php echo esc_url(get_post_type_archive_link('portfolio')); ?>" class="btn btn-primary">
                            Ver todos os projetos
                        </a> -->
                        <br><br>

                            <?php
                            // Pega os termos da taxonomia 'sucesso_dos_clientes' associados a este projeto do portfólio
                            $termos = get_the_terms(get_the_ID(), 'sucesso_dos_clientes');
                           // print_var($termos);

                            if ($termos && ! is_wp_error($termos)) :
                                // Pega o primeiro cliente vinculado (ex: '2A Automotiva')
                                $cliente = $termos[0];

                                // Gera a URL nativa da taxonomia (/cliente/2a-automotiva/)
                                $link_arquivo_cliente = get_term_link($cliente);
                            ?>

                            <div class="text-center mt-4">
                        <a href="<?php echo esc_url($link_arquivo_cliente); ?>" class="btn btn-primary btn-lg">
                            Ver todos os posts de <?php echo esc_html($cliente->name); ?>
                            <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>

                <?php endif; ?>



                
                </div>
                 <br><br>
            </div>
            </div>

            <br><br> <br><br>
        </article>

<?php
    endwhile;
endif;

get_footer();
?>