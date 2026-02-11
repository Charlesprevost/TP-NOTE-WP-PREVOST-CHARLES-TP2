<?php get_header(); ?>

<main class="archive-randonnee">

    <h1 class="page-title">
        <?php post_type_archive_title(); ?>
    </h1>

    <div class="randonnee-grid">

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part('templates/carte', 'randonnee'); ?>

            <?php endwhile; ?>
        <?php else : ?>
            <p>Aucune randonnée trouvée.</p>
        <?php endif; ?>

    </div>

</main>

<?php get_footer(); ?>
