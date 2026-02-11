<?php get_header(); ?>

<main class="single-randonnee">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article <?php post_class(); ?>>

        <h1><?php the_title(); ?></h1>


        <?php 
        $image = get_field('image');
        if ( $image ) : ?>
            <div class="randonnee-image">
                <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>">
            </div>
        <?php endif; ?>

        <div class="randonnee-infos">
            <?php if ( get_field('distance_km') ) : ?>
                <p><strong>Distance :</strong> <?php the_field('distance_km'); ?> km</p>
            <?php endif; ?>

            <?php if ( get_field('duree') ) : ?>
                <p><strong>Durée :</strong> <?php the_field('duree'); ?></p>
            <?php endif; ?>
        </div>

        <?php if ( have_rows('points_interets') ) : ?>
            <div class="randonnee-points">
                <h2>Points d’intérêt</h2>
                <ul>
                    <?php while ( have_rows('points_interets') ) : the_row(); 
                        $nom = get_sub_field('nom');
                        $acces = get_sub_field('access');
                    ?>
                        <li>
                            <?php echo esc_html($nom); ?>
                            <?php if ( $acces ) : ?>
                                <strong>(Accès difficile)</strong>
                            <?php endif; ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="randonnee-content">
            <?php the_content(); ?>
        </div>

    </article>

<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
