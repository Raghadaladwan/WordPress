<?php
/**
 * fog_lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fog-lite
 */
 /*
 */

if ( ! function_exists( 'fog_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fog_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fog_lite, use a find and replace
		 * to change 'fog-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fog-lite');

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'fog-lite' ),
			'new-menu'=> esc_html__( 'Footer Menu','fog-lite'),
		 ));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'fog_lite_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'fog_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fog_lite_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fog_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'fog_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fog_lite_widgets_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fog-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fog-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'fog_lite_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function fog_lite_scripts() {
	wp_enqueue_style( 'fog-lite-style', get_stylesheet_uri() );
	wp_enqueue_style( 'style', get_template_directory_uri().'/assets/fonts/stylesheet.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/icons/font-awesome-4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/plugins/css/bootstrap.min.css' );
	wp_enqueue_style( 'fog-lite-animate', get_template_directory_uri().'/assets/plugins/css/animate.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri().'/assets/plugins/css/owl.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri().'/assets/plugins/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'blogstyle', get_template_directory_uri().'/assets/css/blogstyle.css' );
	wp_enqueue_style( 'fog-lite-css-style', get_template_directory_uri().'/assets/css/styles.css' );
	wp_enqueue_style( 'fog-lite-responsive', get_template_directory_uri().'/assets/css/responsive.css' );
	
	wp_enqueue_script( 'fog-lite-poppermin', get_template_directory_uri() . '/assets/plugins/js/popper.min.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'bootstrapmin', get_template_directory_uri() . '/assets/plugins/js/bootstrap.min.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'waypointsmin', get_template_directory_uri() . '/assets/plugins/js/waypoints.min.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/assets/plugins/js/owl.carousel.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'fog-lite-wowmin', get_template_directory_uri() . '/assets/plugins/js/wow.min.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'fog-lite-jquerynav', get_template_directory_uri() . '/assets/plugins/js/jquery.nav.js', array('jquery'), null, true );
	
	
	wp_enqueue_script( 'fog-lite-custom-scripts', get_template_directory_uri() . '/assets/js/custom-scripts.js', array('jquery'), null, true );
	
	wp_enqueue_script( 'fog-lite-navigationsds', get_template_directory_uri() . '/js/navigation.js', array('jquery'), null, true );

	wp_enqueue_script( 'fog-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), null, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	add_editor_style( '/assets/css/custom-editor-style.css' );
	
}
add_action( 'wp_enqueue_scripts', 'fog_lite_scripts' );


/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function fog_lite_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'fog_lite_skip_link_focus_fix' );


 
function fog_lite_body_classes_front( $classes ) {
     if(is_front_page())
	{
		$classes[] = 'black-bg'; 
	}
	else 
	{
		$classes[] = 'black-bg blog'; 
	} 
    return $classes;
} 
add_filter( 'body_class', 'fog_lite_body_classes_front' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';




/**
	 * About page class
	 */
	require_once get_template_directory() . '/ti-about-page/class-ti-about-page.php';

	/*
	* About page instance
	*/
	$config = array(
		// Menu name under Appearance.
		'menu_name'           => __( 'About Fog Lite', 'fog-lite' ),
		// Page title.
		'page_name'           => __( 'About Fog Lite', 'fog-lite' ),
		// Main welcome title
		/* translators: Theme Name */
		'welcome_title'       => sprintf( __( 'Welcome to %s! - Version ', 'fog-lite' ), 'Fog Lite' ),
		// Main welcome content
		'welcome_content'     => esc_html__( 'Fog LITE is a free one page WordPress theme for photography niche . It`s also perfect for web agency business,corporate business,personal and parallax business portfolio, photography sites and freelancer.Is built on BootStrap with parallax support, is responsive, clean, modern, flat and minimal.  SEO Friendly and with parallax, full screen image is one of the best business themes.', 'fog-lite' ),
		/**
		 * Tabs array.
		 *
		 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
		 * the will be the name of the function which will be used to render the tab content.
		 */
		'tabs'                => array(
			'getting_started'     => __( 'Getting Started', 'fog-lite' ),
			'support'             => __( 'Support', 'fog-lite' ),
			'changelog'           => __( 'Changelog', 'fog-lite' ),
			'free_pro'            => __( 'Go For Pro', 'fog-lite' ),
		),
		// Support content tab.
		'support_content'     => array(
			'first'  => array(
				'title'        => esc_html__( 'Contact Support', 'fog-lite' ),
				'icon'         => 'dashicons dashicons-sos',
				'text'         => esc_html__( 'Our product support team always ready to help you . Please contact us for any support issue . we are ready to provide support 24/7 and our team will response you within 6 hour .', 'fog-lite' ),
				'button_label' => esc_html__( 'Contact Support', 'fog-lite' ),
				'button_link'  => esc_url( 'https://themeflux.com/support/' ),
				'is_button'    => true,
				'is_new_tab'   => true,
			),
			'second' => array(
				'title'        => esc_html__( 'Documentation', 'fog-lite' ),
				'icon'         => 'dashicons dashicons-book-alt',
				'text'         => esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use install and customize fog lite.', 'fog-lite' ),
				'button_label' => esc_html__( 'Read full documentation', 'fog-lite' ),
				'button_link'  => 'https://themeflux.com/fog-lite-documentation/',
				'is_button'    => false,
				'is_new_tab'   => true,
			),
			
		),
		// Getting started tab
		'getting_started'     => array(
			'first'  => array(
				'title'               => esc_html__( 'Recommended actions', 'fog-lite' ),
				'text'                => esc_html__( 'We have compiled a list of steps for you, to take make sure the experience you will have using one of our products is very easy to follow.', 'fog-lite' ),
				'button_label'        => esc_html__( 'Recommended actions', 'fog-lite' ),
				'button_link'         => esc_url('https://themeflux.com/fog-light-recommended-action/'),
				'is_button'           => false,
				'recommended_actions' => true,
				'is_new_tab'          => false,
			),
			'second' => array(
				'title'               => esc_html__( 'Read full documentation', 'fog-lite' ),
				'text'                => esc_html__( 'Please check our full documentation for detailed information on how to use install and customize fog lite .', 'fog-lite' ),
				'button_label'        => esc_html__( 'Documentation', 'fog-lite' ),
				'button_link'         => 'https://themeflux.com/fog-lite-documentation/',
				'is_button'           => false,
				'recommended_actions' => false,
				'is_new_tab'          => true,
			),
			'third'  => array(
				'title'               => esc_html__( 'Go to Customizer', 'fog-lite' ),
				'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'fog-lite' ),
				'button_label'        => esc_html__( 'Go to Customizer', 'fog-lite' ),
				'button_link'         => esc_url( admin_url( 'customize.php' ) ),
				'is_button'           => true,
				'recommended_actions' => false,
				'is_new_tab'          => true,
			),
		),
		// Free vs pro array.
		'free_pro'            => array(
			'pro_theme_link'      => 'https://themeflux.com/product/fog-lite-pro-version/',
			/* translators:Fog lite Pro name */
			'get_pro_theme_details'=>'Fog lite is a awesome fully customizable wordpress theme especially for photography websites . You can easily create a awesome look website with fog lite free version . But some features are missing in free version . So we encourage to use you pro version .',
			'get_pro_theme_label' => sprintf( __( 'Go For Pro','fog-lite' )),
		),
		// Plugins array.
		'recommended_plugins' => array(
			'already_activated_message' => esc_html__( 'Already activated', 'fog-lite' ),
			'version_label'             => esc_html__( 'Version: ', 'fog-lite' ),
			'install_label'             => esc_html__( 'Install and Activate', 'fog-lite' ),
			'activate_label'            => esc_html__( 'Activate', 'fog-lite' ),
			'deactivate_label'          => esc_html__( 'Deactivate', 'fog-lite' ),
			'content'                   => array(
				array(
					'slug' => 'translatepress-multilingual',
				),
				array(
					'slug' => 'siteorigin-panels',
				),
				array(
					'slug' => 'wp-product-review',
				),
				array(
					'slug' => 'intergeo-maps',
				),
				array(
					'slug' => 'visualizer',
				),
				array(
					'slug' => 'adblock-notify-by-bweb',
				),
				array(
					'slug' => 'nivo-slider-lite',
				),
			),
		),
		
	);
	fog_lite_TI_About_Page::init( $config );



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
function fog_lite_add_classes_on_li_custom($classes, $item, $args) {
  $classes[] = 'nav-item';
  return $classes;
}
add_filter('nav_menu_css_class','fog_lite_add_classes_on_li_custom',10,4);

function fog_lite_my_update_comment_fields( $fields ) {

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$label     = $req ? '*' : ' ' . __( '(optional)', 'fog-lite' );
	$aria_req  = $req ? "aria-required='true'" : '';

	$fields['author'] =
		'<p class="comment-form-author">
			<input id="author" name="author" type="text" placeholder="' . esc_attr__( "Name", "fog-lite" ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	$fields['email'] =
		'<p class="comment-form-email">
			<input id="email" name="email" type="email" placeholder="' . esc_attr__( "Email", "fog-lite" ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	$fields['url'] =
		'<p class="comment-form-url">
			<input id="url" name="url" type="url"  placeholder="' . esc_attr__( "Website", "fog-lite" ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" />
			</p>';

	return $fields;
}
add_filter( 'comment_form_default_fields', 'fog_lite_my_update_comment_fields' );

function fog_lite_my_update_comment_field( $comment_field ) {

  $comment_field =
    '<p class="comment-form-comment">
            <textarea required id="comment" name="comment" placeholder="' . esc_attr__( "Comment", "fog-lite" ) . '" cols="45" rows="8" aria-required="true"></textarea>
        </p>';

  return $comment_field;
}
add_filter( 'comment_form_field_comment', 'fog_lite_my_update_comment_field' );
add_filter( 'comment_form_fields', 'fog_lite_move_comment_field' );
function fog_lite_move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
	unset( $fields['cookies'] );
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
function fog_lite_custom_excerpt_more_link($more){
  return '...</p><a class="read-post" href="' . get_the_permalink() . '">'.__( 'Read More', 'fog-lite' ).'</a>';
  return '<a href="' . get_the_permalink() . '" rel="nofollow">&nbsp;[more]</a>';
}

add_filter('excerpt_more', 'fog_lite_custom_excerpt_more_link');

function fog_lite_set_custom_excerpt_length($length){
	if ( is_admin() ) {
       return $length;
	}
   return 25;
}
add_filter('excerpt_length', 'fog_lite_set_custom_excerpt_length', 10);


