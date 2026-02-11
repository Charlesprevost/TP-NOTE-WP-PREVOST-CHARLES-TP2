<article <?php post_class('randonnee-carte'); ?>>

    <?php 
    $image = get_field('image');
    if ( $image ) : ?>
        <div class="carte-image">
            <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>">
        </div>
    <?php endif; ?>

    <div class="carte-content">

        <h2 class="car-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>

        <?php if ( get_field('distance_km') ) : ?>
            <p><strong>Distance :</strong> <?php the_field('distance_km'); ?> km</p>
        <?php endif; ?>

        <?php if ( get_field('duree') ) : ?>
            <p><strong>Durée :</strong> <?php the_field('duree'); ?></p>
        <?php endif; ?>

    </div>

</article>
