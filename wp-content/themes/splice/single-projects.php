<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post();
  $id = get_the_ID();
  $start = get_post_meta($id, 'start_date', true);
  $end   = get_post_meta($id, 'end_date', true);
  $url   = get_post_meta($id, 'project_url', true);
?>
<div class="project-container">
    <div class="project-card">
         <?php if(has_post_thumbnail()) : ?>
            <div class="project-image">
                 <?php the_post_thumbnail('medium_large'); ?>
              </div>
          <?php endif; ?> 
          <div class="project-content">
              <h3 class="project-title"><?php the_title(); ?></h3>
              <div class="project-excerpt"><?= get_the_content(); ?></div>
              <p class="project-dates">
                <strong><?php if ($start):?>Start: </strong><?php echo $start; endif;?>
                <strong><?php if ($end):?>| End: </strong><?php echo $end; endif;?>
              </p> 
              <strong><?php if ($url):?>URL: </strong><a href="#"><?php echo $url; endif;?></a>
          </div>
      </div>
    <?php endwhile; endif;?>
</div>

<?php get_footer(); ?>