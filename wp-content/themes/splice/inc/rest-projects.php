<?php
if (!defined('ABSPATH')) exit;

add_action('rest_api_init', function () {
  register_rest_route('splice/v1', '/projects', [
    'methods'  => 'GET',
    'callback' => 'splice_rest_get_projects',
    'permission_callback' => '__return_true',
  ]);
});

function splice_rest_get_projects(\WP_REST_Request $req) {
  $q = new WP_Query([
    'post_type'      => 'projects',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);

  $data = [];
  while ($q->have_posts()) {
    $q->the_post();
    $id = get_the_ID();
    $data[] = [
      'title'      => get_the_title(),
      'url'        => get_post_meta($id, 'project_url', true),
      'start_date' => get_post_meta($id, 'start_date', true),
      'end_date'   => get_post_meta($id, 'end_date', true),
      'permalink'  => get_permalink($id),
    ];
  }
  wp_reset_postdata();
  return rest_ensure_response($data);
}
