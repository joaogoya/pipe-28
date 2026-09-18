</main>

<button id="btnScrollTop" title="Voltar ao Topo"><i class="fas fa-chevron-up"></i></button>

<footer class="bg-dark text-white pt-5 pb-4 position-relative">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <a class="navbar-brand fw-bold fs-3 d-block mb-3" href="<?php echo esc_url( home_url( '/' ) ); ?>">PIPELINE DIGITAL</a>
                <p class="small opacity-75 pe-lg-5">
                    Conectamos seu trabalho com as pessoas que estão procurando por ele.
                    Nosso Pipeline Digital foi projetado para você vender mais todos os dias.
                </p>
                <div class="social-nav-footer d-flex gap-3 mt-4">


                    <a href="<?php echo get_afc_by_page_slug('instagram', 'home_config', 'informacoes-de-contato'); ?>"
                        target="_blank" class="social-icon-circle" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="https://wa.me/5551<?php echo get_afc_by_page_slug('whatsapp', 'home_config', 'informacoes-de-contato'); ?>"
                        target="_blank" class="social-icon-circle" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>

                    <a href="<?php echo get_afc_by_page_slug('youtube', 'home_config', 'informacoes-de-contato'); ?>"
                        target="_blank" class="social-icon-circle" title="YouTube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>

                    <a href="<?php echo get_afc_by_page_slug('facebook', 'home_config', 'informacoes-de-contato'); ?>"
                        target="_blank" class="social-icon-circle" title="YouTube">
                        <i class="fa-brands fa-facebook"></i>
                    </a>

                    <a href="<?php echo get_afc_by_page_slug('google', 'home_config', 'informacoes-de-contato'); ?>"
                        target="_blank" class="social-icon-circle" title="YouTube">
                        <i class="fa-brands fa-google"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-2">
                <h5 class="fw-bold mb-4 text-accent">Novidades</h5>

                <?php
                // Busca as categorias padrão do WordPress
                $categories = get_categories(array(
                    'orderby'    => 'name',
                    'order'      => 'ASC',
                    'hide_empty' => true, // Traz apenas categorias que possuem posts publicados
                    'exclude'    => array(1),
                ));

                if (! empty($categories)) : ?>
                    <ul class="list-unstyled footer-links">
                        <?php foreach ($categories as $category) :
                            // Pega o link nativo do arquivo (archive) da categoria
                            $category_link = get_category_link($category->term_id);
                        ?>
                            <li>
                                <a href="<?php echo esc_url($category_link); ?>">
                                    <?php echo esc_html($category->name); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>

                        <?php
                        $projetos_url = home_url('/sucesso-dos-clientes//');
                        ?>
                        <li>
                            <a href="<?php echo esc_url($projetos_url); ?>">
                                Cases de Sucesso
                            </a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="col-lg-6">
                <h5 class="fw-bold mb-4 text-accent">Sucesso dos Clientes</h5>
                <div class="row g-3">

                    <?php
                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                        'orderby'        => 'rand', // Ordena de forma aleatória
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'projetos',
                                'operator' => 'NOT EXISTS',
                            ),
                        ),
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                    ?>
                            <div class="col-md-6">
                                <a href="<?php the_permalink(); ?>" class="blog-footer-card d-flex align-items-center text-decoration-none">
                                    <div class="blog-thumb">

                                        <!-- img -->
                                        <?php echo pipe_get_img(get_the_ID(), true, 'thumbnail', 'img-fluid'); ?>
                                    </div>
                                    <div class="blog-info ms-3">
                                        <h6 class="mb-0 text-white small fw-bold">
                                            <?php the_title(); ?>
                                        </h6>
                                    </div>
                                </a>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata(); // Restaura os dados originais do post
                    else:
                        echo 'Nenhum post encontrado.';
                    endif;
                    ?>

                </div>
                <?php
                $blog_url = home_url('/blog//');
                ?>
                <a href="<?php echo esc_url($blog_url); ?>" class="btn btn-outline-light btn-sm mt-4 w-100 fw-bold border-opacity-25"
                    data-analytics="footer-btn-blog">VISITAR BLOG COMPLETO</a>
            </div>
        </div>

        <hr class="mt-5 opacity-10">

        <div class="row align-items-center pt-3">
            <div class="col-md-6 text-center text-md-start">
                <p class="small opacity-50 mb-0">&copy; 2026 Pipeline Digital - Todos os direitos reservados.</p>
            </div>
            <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                <p class="small opacity-50 mb-0">Feito com foco em Performance Local <i
                        class="fas fa-bolt text-accent"></i></p>
            </div>
        </div>
    </div>
</footer>

<button id="btnScrollTop" title="Voltar ao topo"><i class="fas fa-arrow-up"></i></button>

<?php wp_footer(); ?>
</body>

</html>