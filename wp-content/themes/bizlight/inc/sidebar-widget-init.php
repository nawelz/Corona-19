<?php

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bizlight_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'bizlight' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ) );


        register_sidebar(array(
            'name' => __('Footer Column One', 'bizlight'),
            'id' => 'footer-col-one',
            'description' => __('Displays items on footer section.','bizlight'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
        register_sidebar(array(
            'name' => __('Footer Column Two', 'bizlight'),
            'id' => 'footer-col-two',
            'description' => __('Displays items on footer section.','bizlight'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
        register_sidebar(array(
            'name' => __('Footer Column Three', 'bizlight'),
            'id' => 'footer-col-three',
            'description' => __('Displays items on footer section.','bizlight'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
}
add_action( 'widgets_init', 'bizlight_widgets_init' );