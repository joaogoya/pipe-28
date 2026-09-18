
<?php get_header(); ?>

<main class="container my-5">
    <div class="row g-4">
        <!-- Coluna Principal / Posts -->
        <div class="col-lg-8">
            <?php if (have_posts()) : ?>
                <div class="row g-4">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-md-6">
                            <article id="post-<?php the_ID(); ?>" <?php post_class('card h-100 shadow-sm'); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', array('class' => 'card-img-top img-fluid')); ?>
                                    </a>
                                <?php endif; ?>
                                <div class="card-body d-flex flex-column">
                                    <h2 class="card-title h5">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <div class="card-text text-muted small mb-3">
                                        Por <?php the_author(); ?> em <?php echo get_the_date(); ?>
                                    </div>
                                    <div class="card-text mb-3">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm mt-auto">Leia mais</a>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- Paginação -->
                <div class="mt-5 d-flex justify-content-center">
                    <?php
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => __('&laquo; Anterior', 'textdomain'),
                        'next_text' => __('Próximo &raquo;', 'textdomain'),
                        'class'     => 'pagination',
                    ));
                    ?>
                </div>

            <?php else : ?>
                <div class="alert alert-info" role="alert">
                    Nenhum post encontrado.
                </div>
            <?php endif; ?>
        </div>

        <!-- Sidebar / Barra Lateral -->
        <aside class="col-lg-4">
            <div class="p-4 bg-light rounded shadow-sm">
                <h4 class="fw-bold mb-3">Sobre</h4>
                <p><?php bloginfo('description'); ?></p>
            </div>
        </aside>
    </div>
</main>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php get_footer(); ?>