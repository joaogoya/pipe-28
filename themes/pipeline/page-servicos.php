<?php get_header(); ?>

<section class="blog-brand-list py-5">
    <div class="container">

        <div class="title-elaborado-center mb-5">
            <span class="subtitle-tag d-block text-center">Soluções Completas</span>
            <h2 class="display-5 fw-bold text-center">
                Nossos <b>Serviços</b>
            </h2>
        </div>

        <div class="row g-4">
            <?php
            // Instancia a nova query buscando TODOS os serviços do CPT
            $args = array(
                'post_type'      => 'services',
                'posts_per_page' => -1, // -1 traz todos os serviços cadastrados
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
                'meta_query'     => array(
                    array(
                        'key'     => 'destaque_home',
                        'value'   => '0',
                        'compare' => '='
                    )
                )
            );

            $servicos_query = new WP_Query($args);

            if ($servicos_query->have_posts()) :
                while ($servicos_query->have_posts()) : $servicos_query->the_post();
            ?>

            <div class="col-lg-4 col-md-6 col-12">
                <article class="card-servico-box p-4 h-100 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Ícone e Título -->
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="card-servico-icone d-flex align-items-center justify-content-center">
                                <i
                                    class="<?php echo esc_attr(get_field('icone_fontawesome') ?: 'fas fa-check-circle'); ?>"></i>
                            </div>
                            <h3 class="card-servico-titulo m-0"><?php the_title(); ?></h3>
                        </div>

                        <!-- Descrição / Parágrafo -->
                        <p class="card-servico-texto mb-4">
                            <?php echo get_the_excerpt(); ?>
                        </p>
                    </div>

                    <!-- Link Direto para o WhatsApp -->
                    <div class="pt-2 border-top">
                        <a href="https://wa.me/5551<?php echo get_afc_by_page_slug('whatsapp', 'home_config', 'informacoes-de-contato'); ?>?text=Olá!%20Gostaria%20de%20saber%20mais%20sobre%20o%20serviço%20de%20<?php echo urlencode(get_the_title()); ?>"
                            target="_blank" rel="noopener noreferrer"
                            class="link-servico-zap d-inline-flex align-items-center gap-2"
                            data-analytics="cta-zap-card-servico">
                            <i class="fab fa-whatsapp"></i>
                            <strong>FALAR NO ZAP</strong>
                            <i class="fas fa-chevron-right arrow-icon"></i>
                        </a>
                    </div>
                </article>
            </div>

            <?php 
                endwhile;
                wp_reset_postdata(); // Sempre reseta a query global ao finalizar!
            endif; 
            ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>