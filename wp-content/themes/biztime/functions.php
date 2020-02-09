<?php

/**
 *  Biztime functions and definitions
 *  @package Biztime
 *
*/

/* Set the content width in pixels, based on the theme's design and stylesheet.
*/
function biztime_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'biztime_content_width', 980 );
}
add_action( 'after_setup_theme', 'biztime_content_width', 0 );


if( ! function_exists( 'biztime_theme_setup' ) ) {	
	
	function biztime_theme_setup() {
		load_theme_textdomain( 'biztime', get_template_directory() . '/languages' );
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
		// Add title tag 
		add_theme_support( 'title-tag' );
		
		// Add default logo support		
        add_theme_support( 'custom-logo');

        add_theme_support('post-thumbnails');
        add_image_size('biztime-page-thumbnail',750,460, true);
        add_image_size('biztime-project-thumbnail',555,325, true);       
            
        
		// Add theme support for Semantic Markup
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) ); 

		$defaults = array(
			'default-image'          => get_template_directory_uri() .'/assets/img/header.jpg',
			'width'                  => 1920,
			'height'                 => 600,
			'uploads'                => true,
		);
		add_theme_support( 'custom-header', $defaults );

		// Menus
		register_nav_menus(array(
			'primary' => esc_html__('Primary Menu', 'biztime'),
		));
		// add excerpt support for pages
        add_post_type_support( 'page', 'excerpt' );
		
        if ( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
        }
		// Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Custom Backgrounds
   		add_theme_support( 'custom-background', array(
  			'default-color' => 'ffffff',
    	) );

    	// To use additional css
 	    add_editor_style( 'assets/css/editor-style.css' );
	}
	add_action( 'after_setup_theme', 'biztime_theme_setup' );
}

// Register Nav Walker class_alias
require get_template_directory(). '/class-wp-bootstrap-navwalker.php';

/**
 * Functions hooked to core hooks.
 *
 */

if ( ! function_exists( 'biztime_customize_search_form' ) ) :

	/** Customize search form.
	 **/
	function biztime_customize_search_form() {

		$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
			<input type="search" class="search-query form-control" placeholder="' . esc_attr_x( 'Search', 'placeholder', 'biztime' ) . '" value="' . get_search_query() . '" name="s" />
			<button type="submit" class="search-submit button" ><i class="fa fa-search"></i></button></form>';

		return $form;
    }
	
	endif;
add_filter( 'get_search_form', 'biztime_customize_search_form', 15 );

/**
 * Enqueue CSS stylesheets
 */		
if( ! function_exists( 'biztime_enqueue_styles' ) ) {
	function biztime_enqueue_styles() {	
	
	    wp_enqueue_style('biztime-font', '//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800|Open+Sans:400,400i,600,700|Raleway:400,500,600,700,800');
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
		wp_enqueue_style('owl-carousel', get_template_directory_uri() .'/assets/css/owl.carousel.css');
		wp_enqueue_style('owl-theme', get_template_directory_uri() .'/assets/css/owl.transitions.css');		
		wp_enqueue_style('meanmenu', get_template_directory_uri() .'/assets/css/meanmenu.css');
		wp_enqueue_style('font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css');
		wp_enqueue_style('linearicons', get_template_directory_uri() .'/assets/css/linearicons.css');
		
		
		// main style
		wp_enqueue_style( 'biztime-style', get_stylesheet_uri() );
		
		//responsive css
		wp_enqueue_style('biztime-responsive', get_template_directory_uri() .'/assets/css/responsive.css');
				
	}
	add_action( 'wp_enqueue_scripts', 'biztime_enqueue_styles' );
}

/**
 * Enqueue JS scripts
 */

if( ! function_exists( 'biztime_enqueue_scripts' ) ) {
	function biztime_enqueue_scripts() {   
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js',array(),'', true);
		wp_enqueue_script('carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js',array(),'', true);
		wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/js/waypoints.js',array(),'', true);
		wp_enqueue_script('stellar', get_template_directory_uri() . '/assets/js/jquery.stellar.js',array(),'', true);
		wp_enqueue_script('meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.js',array(),'', true);
		wp_enqueue_script('scrollup', get_template_directory_uri() . '/assets/js/scrollup.js',array(),'', true);
		wp_enqueue_script('biztime-main', get_template_directory_uri() . '/assets/js/main.js',array(),'', true);
	}
	add_action( 'wp_enqueue_scripts', 'biztime_enqueue_scripts' );
}
/**
 * Register sidebars for Biztime
*/
function biztime_sidebars() {

	// Blog Sidebar
	
	register_sidebar(array(
		'name' => esc_html__( 'Blog Sidebar', "biztime"),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Sidebar on the blog layout.', "biztime"),
		'before_widget' => '<div id="%1$s" class="widget left-blog">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="sidebar-title">',
		'after_title' => '</h4>',
	));
  	

	// Footer Sidebar
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 1', "biztime"),
		'id' => 'biztime-footer-widget-area-1',
		'description' => esc_html__( 'The footer widget area 1', "biztime"),
		'before_widget' => ' <div class="widget">',
		'after_widget' => '</div> ',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 2', "biztime"),
		'id' => 'biztime-footer-widget-area-2',
		'description' => esc_html__( 'The footer widget area 2', "biztime"),
		'before_widget' => '<div class="widget"> ',
		'after_widget' => ' </div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 3', "biztime"),
		'id' => 'biztime-footer-widget-area-3',
		'description' => esc_html__( 'The footer widget area 3', "biztime"),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 4', "biztime"),
		'id' => 'biztime-footer-widget-area-4',
		'description' => esc_html__( 'The footer widget area 4', "biztime"),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));		
}

add_action( 'widgets_init', 'biztime_sidebars' );
/**
 * Comment layout
 */
function biztime_comments( $comment, $args, $depth ) { ?>
	<div <?php comment_class('comments-list'); ?> id="<?php comment_ID() ?>">
		<ul>
		<?php if ($comment->comment_approved == '0') : ?>
			<li>
				<div class="alert alert-info">
				  <p><?php esc_html__( 'Your comment is awaiting moderation.', 'biztime' ) ?></p>
				</div>
			</li>
		<?php endif; ?>
		<li>
			<div class="comments-details">
				<div class="comments-list-img"><?php echo get_avatar( $comment,'50', null,'User', array( 'class' => array( '') )); ?></div>
				<div class="comments-content-wrap">
					<span>
						<b><?php 
						/* translators: '%1$s %2$s: edit term */
						printf(esc_html__( '%1$s %2$s', 'biztime' ), get_comment_author_link(), edit_comment_link(esc_html__( '(Edit)', 'biztime' ),'  ','') ) ?></b>
						<span datetime="<?php echo comment_time('Y-m-j'); ?>"><?php comment_time(esc_html__( 'F jS, Y', 'biztime' )); ?></span>
						<a class="reply-link"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a>
					</span>
					<?php comment_text() ;?>
					
				</div>
			</div>
		</li>
		</ul>
	</div>
<?php
} 

  
/**
 * Customizer additions.
 */
  require get_template_directory(). '/include/customizer.php';
?>