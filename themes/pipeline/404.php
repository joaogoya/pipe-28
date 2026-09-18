<?php get_header(); ?>

<section class="blog-brand-list py-5">
    <div class="container">
        <br><br>
        <div class="title-elaborado-center mb-5">
            <span class="subtitle-tag d-block text-center"> Página </span>
            <h2 class="display-5 fw-bold text-center">
                <b>Não Encontrada</b>
            </h2>
        </div>
        <br><br>
        <div class="row g-4 text-center">
            <p>
                A pá,gina que você procura não foi encnontrada.
            </p>
            <p>
                <a class="text-warning" href="<?php echo esc_url(home_url('/')); ?>"><b>Voltar para a página
                        inicial</b></a>
            </p>
        </div>
        <br><br>
    </div>
</section>

<?php get_footer(); ?>