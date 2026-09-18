<?php get_header(); ?>

<main id="primary" class="site-main container my-5">

    <header class="page-header mb-5 text-center">
        <h1 class="page-title display-4 fw-bold">Todos os Projetos</h1>
        <p class="lead text-muted">Confira nosso portfólio completo de cases e trabalhos realizados.</p>
    </header>

    <?php if ( have_posts() ) : ?>

        <div class="row g-4">
            <?php 
            while ( have_posts() ) : the_post(); 
            ?>
                <div class="col-md-4">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card h-100 shadow-sm'); ?>>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
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
                                <?php echo wp_trim_words( get_the_excerpt(), 15 ); ?>
                            </div>
                        </div>

                        <div class="card-footer bg-transparent border-0 pb-3">
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-sm">
                                Ver Projeto
                            </a>
                        </div>

                    </article>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="pagination-wrapper mt-5 d-flex justify-content-center">
            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( '&laquo; Anterior', 'text-domain' ),
                'next_text' => __( 'Próximo &raquo;', 'text-domain' ),
            ) );
            ?>
        </div>

    <?php else : ?>

        <p class="text-center">Nenhum projeto encontrado no portfólio.</p>

    <?php endif; ?>

</main>

<?php get_footer(); ?>