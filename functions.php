<?php

function portfolio_enqueue_styles(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', '4.4.1');
    wp_enqueue_style( 'font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', '5.15.3');
    wp_enqueue_style( 'portfolio-style', get_template_directory_uri() . '/style.css', array('bootstrap-css', 'font-awesome-css'), $version);
}
add_action( 'wp_enqueue_scripts', portfolio_enqueue_styles);

function portfolio_enqueue_scripts() {

    $version = wp_get_theme()->get('Version');
    // To avoid confusion with wordpress native Jquery, a 'portfolio' string was appended in the identifier
    wp_enqueue_script( 'jquery');
    wp_enqueue_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0');
    wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('popper', 'jquery'), '4.4.1');
    wp_enqueue_script( 'portfolio-js', get_template_directory_uri() . '/js/main.js', array('jquery'), $version);
}

add_action('wp_enqueue_scripts', portfolio_enqueue_scripts);

//Add widget areas
function portfolio_widget_areas(){
    register_sidebar( array(
        'name' => "First Section's body",
        'id' => 'section1-body',
        'before_title' => '',
        'after_title' => '',
        'before_widget' => '<ul class="mt-5">%3$s',
        'after_widget' => '</ul>'
    ) );
    register_sidebar( array(
        'name' => "Second Section's body",
        'id' => 'section2-body',
        'before_widget' => '<ul>%3$s',
        'after_widget' => '</ul>',
        'before_title' => '',
        'after_title' => ''
    ));
    register_sidebar( array('name' => 'Footer Area', 
    'id' => 'footer',
    'before_title' => '',
    'after_title' => '',
    'before_widget' => '',
    'after_widget' => '') );
}

add_action( 'widgets_init', portfolio_widget_areas);

// Add editable header content
function portfolio_custom_header($wp_customize) {
    $wp_customize->add_section('portfolio-header', array('title' => 'Headers'));
    // First line in the header
    $wp_customize->add_setting('portfolio-header-title', array('default' => 'My Portfolio'));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'portfolio-header-title-ctrl', array(
        'label' => 'Title',
        'section' => 'portfolio-header',
        'settings' => 'portfolio-header-title'
    )));
    // Second line in the header
    $wp_customize->add_setting('portfolio-header-description1', array('default' => 'A concise description'));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'portfolio-header-description1-ctrl', array(
        'label' => 'First Description',
        'section' => 'portfolio-header',
        'settings' => 'portfolio-header-description1'
    )));
    // Third line in the header
    $wp_customize->add_setting('portfolio-header-description2', array('default' => 'A second complementary description'));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'portfolio-header-description2-ctrl', array(
        'label' => 'Second Description',
        'section' => 'portfolio-header',
        'settings' => 'portfolio-header-description2'
    )));
    // Down arrow text
    $wp_customize->add_setting('portfolio-header-arrowtext', array('default' => 'View my qualifications'));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'portfolio-header-arrowtext-ctrl', array(
        'label' => 'Down Arrow Text',
        'section' => 'portfolio-header',
        'settings' => 'portfolio-header-arrowtext'
    )));
    // Second Section's title
    $wp_customize->add_setting('portfolio-header2-description', array('default' => 'My Qualifications'));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'portfolio-header2-description-ctrl', array(
        'label' => "Second Section's Heading",
        'settings' => 'portfolio-header2-description',
        'section' => 'portfolio-header'
    )));
}

add_action('customize_register', portfolio_custom_header);

// Prevent Wordpress from adding <p> tags automatically, which can break design
remove_filter('the_content', 'wpautop');
remove_filter('widget_text', 'wpautop');