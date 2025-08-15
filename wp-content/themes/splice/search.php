<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
 get_header(); ?>
<div class="container my-4">
    <div class="row g-4">
        <?php custom_breadcrumbs(); ?>
        <?php if (have_posts()) : ?>

            <h2><?php _e('Search Results','splice'); ?></h2>

            <?php post_navigation(); ?>

            <?php while (have_posts()) : the_post(); ?>

                <article <?php post_class() ?> id="post-<?php the_ID(); ?>">

                    <h2><?php the_title(); ?></h2>

                    <?php posted_on(); ?>

                    <div class="entry">

                        <?php the_excerpt(); ?>

                    </div>

                </article>

            <?php endwhile; ?>

            <?php post_navigation(); ?>

        <?php else : ?>

		    <h2><?php _e('Nothing Found','splice'); ?></h2>

	    <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>