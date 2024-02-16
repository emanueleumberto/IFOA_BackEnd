<?php

# Hook predefiniti di wordpress per inserire fogli di stile o script esterni

# wp_enqueue_style
# https://developer.wordpress.org/reference/functions/wp_enqueue_style/

function load_bootstrap() {
    // carica lo stile css di bootstrap
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/custom-style.css'); // vado a leggere un eventuale file CSS custom
}

# wp_enqueue_script
# https://developer.wordpress.org/reference/functions/wp_enqueue_script/

function load_bootstrap_scripts() {
    // carica lo script js di bootstrap
	wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js');
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/custom-script.js'); // vado a leggere un eventuale file CSS custom
}

// Hook predefiniti di wordpress per aggiunre azioni al nostro template
add_action('wp_enqueue_scripts', 'load_bootstrap');
add_action('wp_enqueue_scripts', 'load_bootstrap_scripts' );

// =======================================
// Customize Menus
// =======================================

// Classe predefinita di Wordpress per la gestione diun menu con Bootstrap
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        if ($depth > 0) {
            return;
        }
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        if (strcasecmp($item->attr_title, 'divider') == 0 && $depth === 1) {
            $output .= '<li class="dropdown-divider">';
            return;
        }
        elseif (strcasecmp($item->title, 'divider') == 0 && $depth === 1) {
            $output .= '<li class="dropdown-divider">';
            return;
        }

        if (strcasecmp($item->attr_title, 'dropdown-header') == 0 && $depth === 1) {
            $output .= '<li class="dropdown-header">' . esc_attr($item->title);
            return;
        }
        elseif (strcasecmp($item->title, 'dropdown-header') == 0 && $depth === 1) {
            $output .= '<li class="dropdown-header">' . esc_attr($item->title);
            return;
        }

        parent::start_el($output, $item, $depth, $args);
    }
}

// Funzione che serve per registrare i menu diponibili per il template
function register_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu' ),
            'footer-menu'  => __( 'Footer Menu'),
            'sidebar-menu'  => __( 'Sidebar Menu'),
        )
    );
}

add_action('init', 'register_menus');

// Ability to add classes to wp_nav_menu LI tags

add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class))
    {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
 
// A tags

add_filter( 'nav_menu_link_attributes', 'add_link_atts');

function add_link_atts($atts) 
{ 
     $atts['class'] = "nav-link"; 
     return $atts;
}
