<?php

function wpjb_register_styles()
{
    $theme_version = wp_get_theme()->get('Version');
    
    // External Libraries
    wp_enqueue_style('custom-bs', get_stylesheet_directory_uri() . '/css/custom-bs.css', array(), $theme_version);
    wp_enqueue_style('jquery-fancybox', get_stylesheet_directory_uri() . '/css/jquery.fancybox.min.css', array(), $theme_version);
    wp_enqueue_style('bootstrap-select', get_stylesheet_directory_uri() . '/css/bootstrap-select.min.css', array(), $theme_version);
    wp_enqueue_style('icomoon', get_stylesheet_directory_uri() . '/fonts/icomoon/style.css', array(), $theme_version);
    wp_enqueue_style('line-icons', get_stylesheet_directory_uri() . '/fonts/line-icons/style.css', array(), $theme_version);
    wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array(), $theme_version);
    wp_enqueue_style('animate', get_stylesheet_directory_uri() . '/css/animate.min.css', array(), $theme_version);
    wp_enqueue_style('wpjb', get_stylesheet_directory_uri() . '/css/style.css', array(), $theme_version);
    
    // Load style.css
    wp_enqueue_style('wpjb-custom', get_stylesheet_uri(), array(), $theme_version);
}
add_action('wp_enqueue_scripts', 'wpjb_register_styles');

function wpjb_register_scripts()
{
    $theme_version = wp_get_theme()->get('Version');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), $theme_version, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), $theme_version, true);
    wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), $theme_version, true);
    wp_enqueue_script('stickyfill', get_template_directory_uri() . '/js/stickyfill.min.js', array(), $theme_version, true);
    wp_enqueue_script('jquery-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), $theme_version, true);
    wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), $theme_version, true);
    
    wp_enqueue_script('jquery-waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array(), $theme_version, true);
    wp_enqueue_script('jquery-animateNumber', get_template_directory_uri() . '/js/jquery.animateNumber.min.js', array(), $theme_version, true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), $theme_version, true);
    
    wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/js/bootstrap-select.min.js', array(), $theme_version, true);
    
    wp_enqueue_script('wpjb-custom', get_template_directory_uri() . '/js/custom.js', array(), $theme_version, true);
}
add_action('wp_enqueue_scripts', 'wpjb_register_scripts');

function wpjb_template_redirect()
{
    global $post;

    // Implementar o redirect do aplicar para vaga
    // para usuários não logados
    if ( is_page('aplicar') && ! is_user_logged_in() ) {
        $redirect_to = add_query_arg( 
            'apply_job_message',
            'Faça login em sua conta para aplicar para uma vaga. Caso não tenha, crie sua conta.',
            home_url('/entrar')
        );

        wp_safe_redirect( $redirect_to );
        exit;
    }

    // Usuario deslogado tentanto publicar vaga
    if ( is_page('publicar-vaga') && ! is_user_logged_in() ) {

        $redirect_to = add_query_arg( 
            'publish_job_message',
            'Faça login em sua conta para publicar uma vaga. Caso não tenha, crie sua conta.',
            home_url('/entrar')
        );

        wp_safe_redirect( $redirect_to );
        exit;
    }
}
add_action( 'wp', 'wpjb_template_redirect' );

function wpjb_vaga_cpt()
{
    $labels = [
        'name' => 'Vagas',
        'singular_name' => 'Vaga',
        'menu_name' => 'Vagas'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-groups',
        'rewrite' => ['slug' => 'vagas'],
        'capability_type' => 'post',
        'supports' => [ 'title', 'editor', 'author', 'thumbnail' ],
    ];

    register_post_type( 'wpjb_vaga', $args );
}
add_action( 'init', 'wpjb_vaga_cpt' );

function wpjb_acf_form_init() {

    // Check function exists.
    if( function_exists('acf_register_form') ) {

        // Register form.
        acf_register_form(array(
            'id'       => 'publish-job',
            'post_id'  => 'new_post',
            'new_post' => array(
                'post_type'   => 'wpjb_vaga',
                'post_status' => 'publish'
            ),
            'post_title'  => true,
            'post_content'=> true,
            'submit_value' => __("Publicar Vaga", 'acf'),
            'html_submit_button'  => '<input type="submit" class="btn btn-block btn-primary btn-md" value="%s" />',
            'return' => '%post_url%',
        ));
    }
}
add_action('acf/init', 'wpjb_acf_form_init');

function wpjb_acf_job_title_label( $field ) {
	
    $field['label'] = "Título da Vaga";

    return $field;
    
}
add_filter('acf/prepare_field/name=_post_title', 'wpjb_acf_job_title_label');

function wpjb_acf_job_description_label( $field ) {
	
    $field['label'] = "Descrição da Vaga";

    return $field;
    
}
add_filter('acf/prepare_field/name=_post_content', 'wpjb_acf_job_description_label');

function wpjb_change_post_content_type( $field ) { 
    if($field['type'] == 'wysiwyg') {
        $field['tabs'] = 'visual';
        $field['toolbar'] = 'basic';
        $field['media_upload'] = 0;
    }
    return $field;
}
add_filter( 'acf/get_valid_field', 'wpjb_change_post_content_type');

function wpjb_after_password_reset()
{
    $redirect_to = add_query_arg(
        'password_reset',
        'Senha alterada com sucesso!',
        home_url('/entrar')
    );
    wp_safe_redirect( $redirect_to );
    exit;
}
add_action( 'after_password_reset', 'wpjb_after_password_reset' );
