<?php get_header(); ?>

<div class="container my-4">
    <div class="row g-4">
        <h1 class="display-1">404</h1>
        <h2><?php esc_html_e('Oops! Page not found.', 'your-theme'); ?></h2>
        <p><?php esc_html_e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'your-theme'); ?></p>

        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary mt-3">
            <?php esc_html_e('Go to Homepage', 'your-theme'); ?>
        </a>
    </div>
</div>

<?php get_footer(); ?>
