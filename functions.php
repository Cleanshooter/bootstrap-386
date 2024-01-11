<?php
/**
 * Initilization Operations
 *
 */
function bs386_init() {
	//Register the menus
	register_nav_menus( array(
		'site-navbar-menu' => 'Site Navbar Menu'
	));
	
	//Content_width requirment
	//This should not be necessary for fliud themes - Joe
	if ( ! isset( $content_width ) ) $content_width = 1200;
	
	//Add support for automatic-feed-links
	add_theme_support( 'automatic-feed-links' );
	
	//Register jQuery and other javascript files
	add_action( 'wp_enqueue_scripts', 'bs386_scripts' );

}
add_action( 'init', 'bs386_init' );

require(get_template_directory() . '/include/bs386_options.php');

/*
 * Create a basic menu upon activation
 *
 */
function bs386_activated($oldname, $oldtheme=false) {
	//Create the main menu
	// Check if the menu exists
	$main_nav_menu = wp_get_nav_menu_object('Main Menu' );

	// If it doesn't exist, let's create it.
	if( !$main_nav_menu){
		$main_nav_menu = wp_create_nav_menu('Main Menu');
	
		wp_update_nav_menu_item($main_nav_menu_id, 0, array(
			'menu-item-title' =>  __('Home', 'bootstrap-386'),
			'menu-item-classes' => 'home',
			'menu-item-url' => home_url( '/' ), 
			'menu-item-status' => 'publish'
		));
	}
	
	//Set the new menu to the nav location
	$locations = get_theme_mod( 'nav_menu_locations' );
	$locations['site-navbar-menu'] = $main_nav_menu;
	set_theme_mod ( 'nav_menu_locations', $locations );
	
	//Set tempalte default settings
	update_option('bs386_theme_options', array("high-contrast" => "use-high-contrast"));
}
add_action("after_switch_theme", "bs386_activated", 10 , 2); 

/**
 * Global Scripts and Styles 
 *
 */
function bs386_scripts(){
	//For some reason wordpress puts styles in the footer if queued from a class...
	//Until WP fixes the bug (or I find a better work around) it will need to be queued every time instead of conditionaly... :(
	
	wp_enqueue_script(
		'bootstrap',
		get_template_directory_uri() . '/assets/js/bootstrap.js',
		array('jquery'),	# dependencies
		'3.1.1',			# version
		true				# in footer
	);
	
	wp_enqueue_script(
		'jsascii',
		get_template_directory_uri() . '/assets/js/jsascii.js',
		array(),	# dependencies
		'0.1',			# version
		true				# in footer
	);
	
	wp_enqueue_script(
		'bs386-template-core-js',
		get_template_directory_uri() . '/assets/js/template-core.js',
		array('jquery'),	# dependencies
		'0.1',				# version
		true				# in footer
	);
	
}

/**
 * Sidebar/Widget Registration
 *
 */
function bs386_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Column', 'bootstrap-386' ),
		'id'            => 'right-column',
		'description'   => __( 'Appears on the right hand side of the site.', 'bootstrap-386' ),
		'before_widget' => '<aside id="%1$s" class="%2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Left Column ', 'bootstrap-386' ),
		'id'            => 'left-column',
		'description'   => __( 'Appears on the left hand side of the site.', 'bootstrap-386' ),
		'before_widget' => '<aside id="%1$s" class="%2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bs386_widgets_init' );


/**
 * Bootstrap Navbar Walker 
 *
 */
require(get_template_directory() . '/include/wp_bootstrap_navwalker.php');

/**
 * Display modified Bootstrap CSS in editor
 *
 */
 
 // Load modified Bootstrap CSS from plugin folder
function bootstrap_386_editor_styles() {
    add_editor_style( '/assets/css/bootstrap.min.css' );
}
add_action( 'after_setup_theme', 'bootstrap_386_editor_styles' );

/**
 * Display navigation to next/previous set of posts when applicable.
 *
 */
if ( ! function_exists( 'bs386_paging_nav' ) ) :
function bs386_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<?php if ( get_next_posts_link() ) : ?>
        <div class="pull-right"><?php next_posts_link( __( 'Next <span class="glyphicon glyphicon-arrow-right"></span>', 'bootstrap-386' ) ); ?></div>
        <?php endif; ?>

        <?php if ( get_previous_posts_link() ) : ?>
        <div class="pull-left"><?php previous_posts_link( __( '<span class="glyphicon glyphicon-arrow-left"></span> Previous', 'bootstrap-386' ) ); ?></div>
        <?php endif; ?>
	</nav><!-- .navigation -->
    <p></p>
	<?php
}
endif;

/**
 * Display navigation to next/previous post when applicable.
*
*/
if ( ! function_exists( 'bs386_post_nav' ) ) :

function bs386_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation clearfix" role="navigation">
        <div class="pull-left">
        <?php previous_post_link( '%link', _x( '&lt;&lt;&lt; %title', 'Previous post link', 'bootstrap-386' ) ); ?>
        </div>
        <div class="pull-right">
        <?php next_post_link( '%link', _x( '%title &gt;&gt;&gt;', 'Next post link', 'bootstrap-386' ) ); ?>
        </div>
	</nav><!-- .navigation -->
	<?php
}
endif;

add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
	return '<a class="more-link btn" href="' . get_permalink() . '">Continue reading...</a>';
}
?>