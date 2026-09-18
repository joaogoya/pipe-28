<section id="servicos" class="section-padding bg-light-gray py-5 position-relative">
    <div class="container">

        <div class="title-elaborado-center mb-5">
            <span class="subtitle-tag d-block text-center">Conheça nosso processo</span>
            <h2 class="display-5 fw-bold text-center">
                Nosso <span class="text-accent">Pipeline</span> para você <span class="text-accent">Vender Mais</span>
            </h2>

        </div>

        <div class="row g-4 mt-2 justify-content-center">

            <!--linha com os 4 cards -->
            <?php
            $args = array(
                'post_type'      => 'services',
                'posts_per_page' => 4,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
                'meta_query'     => array(
                    array(
                        'key'     => 'destaque_home',
                        'value'   => '1',
                        'compare' => '='
                    )
                )
            );

            $servicos_query = new WP_Query($args);

            if ($servicos_query->have_posts()) :
                while ($servicos_query->have_posts()) : $servicos_query->the_post(); 
            ?>

            <div class="col-md-12 col-lg-6">
                <div class="pipeline-card">

                    <div class="pipeline-img-wrapper">

                        <!-- img -->
                        <?php echo pipe_get_img(get_the_ID(), true, 'medium_large', 'img-fluid'); ?>

                        <span class="pipeline-badge"> <?php echo get_field('badge'); ?></span>
                    </div>

                    <div class="pipeline-content">
                        <span class="pipeline-sub"> <?php echo get_field('subtitulo'); ?></span>
                        <h3 class="pipeline-title"> <?php the_title(); ?></h3>
                        <p class="pipeline-text">
                            <?php the_content(); ?>
                        </p>

                        <div class="pipeline-footer">
                            <a href="https://wa.me/5551<?php echo get_afc_by_page_slug('whatsapp', 'home_config', 'informacoes-de-contato'); ?>" class="pipeline-btn">
                                        <span>Saiba Mais</span> <i class="fab fa-whatsapp  ms-2"></i>
                                      
                                    </a>
                            <span class="pipeline-number">
                                <?php echo sprintf('%02d', ($servicos_query->post->menu_order + 1)); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo 'Nenhum serviço encontrado.';
            endif;
            ?>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'servicos' ) ) ); ?>"
                    class="btn-veja-todos-servicos">
                    <span>Veja todos os serviços</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>

        <br><br>

        <!-- CTA PÓS-SERVIÇOS (BANNER PREMIUM COM ESTRUTURA DE FASES) cta com lista -->
        <?php get_template_part('includes/home/pipeline'); ?>

        <br><br>
    </div>
</section>