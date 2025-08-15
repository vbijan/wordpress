<?php get_header();?>
<div class="container my-4">
    <div class="row g-4">
        <?php custom_breadcrumbs(); ?>
        <?php
            $query = new WP_Query('page_id=6');
            if($query->have_posts()):while($query->have_posts()):
                $query->the_post();
                $images= wp_get_attachment_image_src(get_post_thumbnail_id(), 'about_size');
                $content = get_the_content();?>
                    <p class="text"><?= get_the_excerpt();?></p>
                    <p><?php echo $content;?></p>
        <?php endwhile; endif; wp_reset_query();?>
    </div>
</div>
<?php get_footer(); ?>
