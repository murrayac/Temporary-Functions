
//* Reduce the Primary navigation menu to one level depth
add_filter( 'wp_nav_menu_args', 'ns_primary_menu_args' );
function ns_primary_menu_args( $args ){

	if( 'primary' != $args['theme_location'] )
	return $args;

	$args['depth'] = 1;
	return $args;

}

// Register and Hook Footer Navigation Menu
add_action('genesis_before_footer', 'sample_footer_menu', 10);
	function sample_footer_menu() {

	register_nav_menu( 'footer', 'Footer Navigation Menu' );
	
	genesis_nav_menu( array(
		'theme_location' => 'footer',
		'menu_class'     => 'menu genesis-nav-menu menu-footer',
	) );
}

// Add footer menu just above footer widget area
add_action( 'genesis_footer', 'ns_footer_menu', 9 );
function ns_footer_menu() {
  
	genesis_nav_menu( array(
		'theme_location' => 'footer',
		'container'       => 'div',
		'container_class' => 'wrap',
		'menu_class'     => 'menu genesis-nav-menu menu-secondary',
		'depth'           => 1
	) );
}
