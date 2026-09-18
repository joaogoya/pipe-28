<?php get_header(); ?>


    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-wrapper container'); ?>>
        <div class="row justify-content-center">
            <div class="col-lg-8">                
                <header class="entry-header mb-4 text-center">   
                    <time class="text-red fw-bold small text-uppercase mb-2 d-block">
                        <br><br>                          
                        <?php echo get_the_date(); ?>
                    </time>
                    <h1 class="entry-title display-5 fw-bold"><?php the_title(); ?></h1>        
                    
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail mt-4 shadow-sm rounded overflow-hidden">
                            <?php // the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
                             <?php echo pipe_get_img(get_the_ID(), true, 'medium_large', 'img-fluid'); ?>
                        </div>
                    <?php endif; ?>
                </header>
                <br><br>

                <div class="entry-content lh-lg fs-5">
                    <?php 
                        the_content(); 
                        
                        // Paginação interna se o post for muito longo
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Páginas:', 'text-domain' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div>

                <footer class="entry-footer mt-5 pt-4 border-top">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="post-tags">
                            <?php the_tags('<span class="badge bg-secondary me-1">#', '</span><span class="badge bg-secondary me-1">#', '</span>'); ?>
                        </div>
                    </div>
                </footer>

                <div class="cta-post-container rounded-5 mt-5 p-4 p-md-5 text-white shadow-2 text-center">
                    <h3 class="fw-bold mb-3">Quer levar o marketing do seu negócio para o próximo nível?</h3>
                    <p class="mb-4">Conecte sua empresa a clientes que já estão procurando pelo seu serviço.</p>
                    <a 
                        href="https://wa.me/555197863963"
                        target="_blank"
                        class="btn btn-nav-accent btn-lg px-4 fw-bold"
                        rel="noopener"                    
                        aria-label="Fale conosco pelo Whastapp"
                        data-analytics="bt-whats-blog-detalhe"
                    >
                        <i class="fab fa-whatsapp me-2" aria-hidden="true"></i> Fale Conosco
                    </a>
                </div>

            </div>
        </div>

    </article>

<?php get_footer(); ?>