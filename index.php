<?php get_header(); ?>

<main class="home-creations">

    <h1>Randonnées</h1>

    <?php
    $args = array(
        'post_type'      => 'randonnee',
        'posts_per_page' => 6,
        'orderby'        => 'date',
        'order'          => 'DESC'
    );

    $randonnees = new WP_Query($args);

    if ( $randonnees->have_posts() ) :
    ?>

        <div class="rando-grid">

        <?php while ( $randonnees->have_posts() ) : $randonnees->the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('randonnee-item'); ?>>

                <a href="<?php the_permalink(); ?>">

                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('medium'); ?>
                    <?php endif; ?>

                    <h2><?php the_title(); ?></h2>

                </a>

            </article>

        <?php endwhile; ?>

        </div>

    <?php
        wp_reset_postdata();
    else :
        echo '<p>Aucune rando trouvée.</p>';
    endif;
    ?>

    <h2>Randonnées niveau moyen</h2>

    <?php
    $args_moyen = array(
        'post_type'      => 'randonnee',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'tax_query'      => array(
            array(
                'taxonomy' => 'difficulte',
                'field'    => 'slug',
                'terms'    => 'moyen',
            ),
        ),
    );

    $randonnees_moyen = new WP_Query($args_moyen);

    if ( $randonnees_moyen->have_posts() ) :
    ?>

        <div class="rando-grid">

        <?php while ( $randonnees_moyen->have_posts() ) : $randonnees_moyen->the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('randonnee-item'); ?>>

                <a href="<?php the_permalink(); ?>">

                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('medium'); ?>
                    <?php endif; ?>

                    <h2><?php the_title(); ?></h2>

                </a>

            </article>

        <?php endwhile; ?>

        </div>

    <?php
        wp_reset_postdata();
    else :
        echo '<p>Aucune randonnée de niveau moyen trouvée.</p>';
    endif;
    ?>

</main>

<?php get_footer(); ?>
