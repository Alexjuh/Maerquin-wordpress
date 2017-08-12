<?php

/**
 * TMaerquin_Alexandra functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @package maerquin_alexandra
 */

if ( ! function_exists( 'maerquin_alexandra_setup' ) ) :
function maerquin_alexandra_starter_setup() {
    load_theme_textdomain( 'maerquin_alexandra', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
		/* 'primary' => esc_html__( 'Primary menu'),*/
    'mega_menu' => 'Mega Menu'
	) );
  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
  ) );
  add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
  ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
    function maerquin_alexandra_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'after_setup_theme', 'maerquin_alexandra_starter_setup');
    add_action( 'admin_init', 'maerquin_alexandra_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'maerquin_alexandra_starter_setup' );
function maerquin_alexandra_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'maerquin_alexandra_content_width', 1170 );
}

function maerquin_alexandra_init() {
    $location = 'mega_menu';
    $css_class = 'has-mega-menu';
    $locations = get_nav_menu_locations();
    if ( isset( $locations[ $location ] ) ) {
        $menu = get_term( $locations[ $location ], 'nav_menu' );
        if ( $items = wp_get_nav_menu_items( $menu->name ) ) {
            foreach ( $items as $item ) {
                if ( in_array( $css_class, $item->classes ) ) {
                    register_sidebar( array(
                      'id'   => 'mega-menu-widget-area-' . $item->ID,
                      'name' => $item->title . ' - Mega Menu',
                      'before_widget' => '',
                      'after_widget' => '',
                    ) );
                }
            }
        }
    }
}
add_action( 'widgets_init', 'maerquin_alexandra_init' );

add_action( 'after_setup_theme', 'maerquin_alexandra_content_width', 0 );

function maerquin_alexandra_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'maerquin_alexandra' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'maerquin_alexandra' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    }
add_action( 'widgets_init', 'maerquin_alexandra_widgets_init' );

function maerquin_alexandra_scripts() {
	wp_enqueue_style( 'maerquin_alexandra-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'maerquin_alexandra-css', get_template_directory_uri() . '/style.css' );
  // laden javascript
  wp_enqueue_script('maerquin_alexandra-jqueryjs', get_template_directory_uri() . '/js/jquery.min.js', array() );

  // Remove WP Version From Styles
  add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
  // Remove WP Version From Scripts
  add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );
  // Function to remove version numbers
  function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;

}

wp_enqueue_script('jquery');
    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );
    wp_enqueue_script('maerquin_alexandra-bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'maerquin_alexandra_scripts' );

function maerquin_alexandra_js() {
  wp_enqueue_script('maerquin_alexandra-add_classjs', get_stylesheet_directory_uri() . '/js/add_class.js');
}
add_action( 'wp_enqueue_scripts', 'maerquin_alexandra_js');

function maerquin_alexandra_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "maerquin_alexandra" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "maerquin_alexandra" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "maerquin_alexandra" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter( 'the_password_form', 'maerquin_alexandra_password_form' );

add_filter('the_content', 'remove_empty_p', 20, 1);
function remove_empty_p($content){
    $content = force_balance_tags($content);
    return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}

?>
