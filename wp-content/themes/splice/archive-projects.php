<?php get_header(); ?>

<div class="container my-5">
    <!-- Archive title -->
    <h1 class="mb-4 text-center"><?php post_type_archive_title(); ?></h1>
    <?php custom_breadcrumbs(); ?>

    <?php if (have_posts()): 
        $id = get_the_ID();
        $start = get_post_meta($id, 'start_date', true);
        $end   = get_post_meta($id, 'end_date', true);
    ?>
        <div class="row g-4">
            <form method="GET" class="row g-3 mb-4">
                <div class="col-md-4">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo esc_attr($_GET['start_date'] ?? ''); ?>">
                </div>
                <div class="col-md-4">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo esc_attr($_GET['end_date'] ?? ''); ?>">
                </div>
                <div class="col-md-4 align-self-end">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>
            <?php while (have_posts()): the_post(); ?>
                <div class="col-sm-6 col-md-4">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card h-100 shadow-sm'); ?>>

                        <!-- Featured Image -->
                        <?php if (has_post_thumbnail()): ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium_large', ['class' => 'card-img-top img-fluid']); ?>
                            </a>
                        <?php endif; ?>

                        <!-- Card body -->
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>
                            <p class="project-dates">
                                <strong><?php if ($start):?>Start: </strong><?php echo $start; endif;?>
                                <strong><?php if ($end):?>| End: </strong><?php echo $end; endif;?>
                            </p> 
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Project</a>
                        </div>
                    </article>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            <?php
            the_posts_pagination([
                'mid_size'  => 2,
                'prev_text' => __('&laquo; Prev', 'stellar'),
                'next_text' => __('Next &raquo;', 'stellar'),
                'screen_reader_text' => ' ',
            ]);
            ?>
        </div>

    <?php else: ?>
        <p class="text-center"><?php esc_html_e('No projects found.', 'stellar'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
