<?php get_header(); ?>

<main class="single-default">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article <?php post_class(); ?>>

        <h1><?php the_title(); ?></h1>

        <?php if ( has_post_thumbnail() ) :
            the_post_thumbnail('large');
        endif; ?>

        <?php the_content(); ?>

    </article>

<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
