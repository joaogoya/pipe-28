<?php get_header(); ?>

<main class="container my-5">
    <div class="row g-4">
        <!-- Coluna Principal do Post -->
        <div class="col-lg-8">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white p-4 p-md-5 rounded shadow-sm'); ?>>
                    
                    <!-- Cabeçalho do Post -->
                    <header class="mb-4">
                        <div class="mb-2">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) :
                                foreach ($categories as $cat) :
                            ?>
                                    <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="badge bg-primary text-decoration-none me-1">
                                        <?php echo esc_html($cat->name); ?>
                                    </a>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>

                        <h1 class="display-5 fw-bold text-dark mb-3">
                            <?php the_title(); ?>
                        </h1>

                        <div class="text-muted small d-flex align-items-center gap-3 border-bottom pb-3">
                            <span>Por <strong><?php the_author(); ?></strong></span>
                            <span>&bull;</span>
                            <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                        </div>
                    </header>

                    <!-- Imagem Destacada -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="mb-4">
                            <?php the_post_thumbnail('full', array('class' => 'img-fluid rounded w-100 h-auto')); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Conteúdo Principal -->
                    <div class="entry-content lh-lg text-secondary mb-5">
                        <?php the_content(); ?>
                    </div>

                    <!-- Tags do Post -->
                    <?php if (has_tag()) : ?>
                        <div class="border-top pt-3 mb-4">
                            <span class="fw-bold me-2">Tags:</span>
                            <?php the_tags('', ' ', ''); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Navegação entre Posts (Anterior / Próximo) -->
                    <nav class="border-top border-bottom py-3 my-4">
                        <div class="row g-2">
                            <div class="col-6 text-start">
                                <?php previous_post_link('%link', '&laquo; %title', true); ?>
                            </div>
                            <div class="col-6 text-end">
                                <?php next_post_link('%link', '%title &raquo;', true); ?>
                            </div>
                        </div>
                    </nav>

                    <!-- Seção de Comentários -->
                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>

                </article>

            <?php endwhile; endif; ?>
        </div>

        <!-- Sidebar Lateral -->
        <aside class="col-lg-4">
            <div class="p-4 bg-light rounded shadow-sm mb-4">
                <h4 class="fw-bold mb-3 h5">Sobre o Autor</h4>
                <p class="mb-0 text-muted"><?php the_author_meta('description') ?: 'Autor do post no site.'; ?></p>
            </div>

            <div class="p-4 bg-light rounded shadow-sm">
                <h4 class="fw-bold mb-3 h5">Categorias</h4>
                <ul class="list-unstyled mb-0">
                    <?php wp_list_categories(array('title_li' => '')); ?>
                </ul>
            </div>
        </aside>
    </div>
</main>

<?php get_footer(); ?>