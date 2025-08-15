<?php if (!defined('ABSPATH')) exit; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<!-- Bootstrap 5 CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome for hamburger icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="<?= get_template_directory_uri();?>/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><img src="<?= get_template_directory_uri();?>/assets/images/logo.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <?php
            wp_nav_menu([
                'menu' => 'header', 
                'menu_class'     => 'navbar-nav ms-auto',
                'container'      => false,
                'depth'          => 2,
                'fallback_cb'    => '__return_false',
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'walker'         => new class extends Walker_Nav_Menu {
                    function start_lvl(&$output, $depth = 0, $args = null) {
                        $indent = str_repeat("\t", $depth);
                        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
                    }
                    function end_lvl(&$output, $depth = 0, $args = null) {
                        $indent = str_repeat("\t", $depth);
                        $output .= "$indent</ul>\n";
                    }
                    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                        $has_children = in_array('menu-item-has-children', $item->classes);
                        $classes = $has_children ? 'nav-item dropdown' : 'nav-item';

                        if ($depth === 0) {
                            // Top-level link
                            $link_class = $has_children ? 'nav-link dropdown-toggle' : 'nav-link';
                            $aria = $has_children ? ' role="button" data-bs-toggle="dropdown" aria-expanded="false"' : '';
                        } else {
                            // Submenu link
                            $link_class = 'dropdown-item';
                            $aria = '';
                        }

                        $output .= '<li class="' . $classes . '">';
                        $output .= '<a class="' . $link_class . '" href="' . esc_url($item->url) . '"' . $aria . '>' . esc_html($item->title) . '</a>';
                    }
                    function end_el(&$output, $item, $depth = 0, $args = null) {
                        $output .= "</li>\n";
                    }
                }
            ]);
            ?>
            <form class="d-flex" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="s" value="<?php echo get_search_query(); ?>">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

