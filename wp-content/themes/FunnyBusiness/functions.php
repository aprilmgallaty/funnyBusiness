<?php
/**
 * FunnyBusiness theme functions and definitions
 *
 * @package FunnyBusiness
 * @subpackage BuddyPress
 * @since 1.0
 */

require_once('fb_header.php');
require_once('fb_footer.php');
require_once('_php/fb_fullcalendar.php');

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Overrides the BuddyPress inline CSS for the admin header
 *
 * Referenced via add_custom_image_header() in bp_dtheme_setup().
 *
 * @since 1.0
 */
function bp_dtheme_admin_header_style() {
}

/**
 * Overrides the BuddyPress inline CSS for the custom background
 *
 * Referenced via add_custom_background() in bp_dtheme_setup().
 *
 * @see _custom_background_cb()
 * @since 1.0
 */
function bp_dtheme_custom_background_style() {
}

/**
 * Overrides the BuddyPress inline CSS for the post and page header
 *
 * Referenced via add_custom_image_header() in bp_dtheme_setup().
 *
 * @since 1.0
 */
function bp_dtheme_header_style() {
}

/*
 * Hook the BuddyPress header and footer
 */
 
/* Located in fb_header.php */
add_action('bp_before_header','fb_before_header');
add_action('bp_header','fb_header');

/* Located in fb_footer.php */
add_action('bp_before_footer','fb_before_footer');
add_action('bp_footer','fb_footer');
add_action('bp_after_footer','fb_after_footer');

/*
 * Add a BuddyPress filtering level of "nobody"
 */
function fb_xprofile_get_visibility_levels($visibility_levels) {
	$visibility_levels['nobody'] = array(
		'id'	=> 'nobody',
		'label'	=> __( 'Nobody but me', 'buddypress' )
	);
	return $visibility_levels;
}
add_filter('bp_xprofile_get_visibility_levels', 'fb_xprofile_get_visibility_levels');

/*
 * Filter out the custom level of "nobody"
 */
function fb_xprofile_get_hidden_fields_for_user($hidden_fields, $displayed_user_id, $current_user_id) {

	if ( $current_user_id && ( $displayed_user_id == $current_user_id ) ) {
		// If you're viewing your own profile, nothing's private, so make no changes
		$final_hidden_fields = $hidden_fields;
	} else {
		// Get all the fields set to "nobody" and append to current array of hidden fields
		$hidden_levels = array( 'nobody' );
		$my_hidden_fields = bp_xprofile_get_fields_by_visibility_levels( $displayed_user_id, $hidden_levels );
		$final_hidden_fields = array_merge($hidden_fields, $my_hidden_fields);
	}

	return $final_hidden_fields;
}
add_filter('bp_xprofile_get_hidden_fields_for_user', 'fb_xprofile_get_hidden_fields_for_user', 10, 3);

/*
 * Add a "Book Now" button to the member list
 */
function fb_add_booknow() {
	?>
	
<form class="bookNowForm" method="post" action="<?php echo bp_core_get_root_domain(); ?>/book">
	<input type="hidden" name="fb_fullcalendar" value="true" />
	<input type="hidden" name="clown_id" value="<?php echo bp_member_user_id(); ?>" />
	<input type="hidden" name="calendar_slug" value="book" />
	<input type="hidden" name="calendar_event_title" value="My event" />
	<input type="hidden" name="calendar_load_action" value="loadData" />
	<input class="bookNowButton" type="submit" value="Book Now" />
</form>
	
	<?php
}
add_action('bp_directory_members_actions','fb_add_booknow');

/*
 * Enqueue scripts and styles for any page that uses FullCalendar
 */
function fb_add_fullcalendar_scripts() {
	wp_enqueue_script( 
		'fb-fullcalendar', 
		get_stylesheet_directory_uri() . '/_js/fullcalendar.min.js', 
		array( 
			'jquery',
			'jquery-ui-core', 
			'jquery-ui-widget', 
			'jquery-ui-mouse', 
			'jquery-ui-draggable', 
			'jquery-ui-resizable' 
			), 
		"20130317"
		);
}
add_action( 'wp_enqueue_scripts', 'fb_add_fullcalendar_scripts' );

function fb_add_fullcalendar_styles() {
	wp_enqueue_style( 
		'fb-fullcalendar', 
		get_stylesheet_directory_uri() . '/_css/fullcalendar.css', 
		false, 
		"20130317" 
		);
}
add_action( 'wp_enqueue_scripts', 'fb_add_fullcalendar_styles' );

/*
 * Add hook for FullCalendar processing
 *
 * Located in _php/fb_fullcalendar.php
 */
add_action( 'wp_head', 'fb_add_fullcalendar_load' );

/*
 * Add custom menus 
 */
function fb_add_menus() {
	$locations = array(
		'fb_not_logged_in' => 'Not Logged In',
		'fb_customer_logged_in' => 'Customer Logged In',
		'fb_clown_logged_in' => 'Clown Logged In'
	);

	register_nav_menus( $locations );
}
add_action( 'init', 'fb_add_menus' );

/*
 * Determine which menu to show
 */
function fb_get_menu() {
	$menu = 'fb_not_logged_in';
	if ( is_user_logged_in() ) {
		if (buatp_get_user_type(get_current_user_id()) == 'Customer') {
			$menu = 'fb_customer_logged_in';
		} else if (buatp_get_user_type(get_current_user_id()) == 'Clown') {
			$menu = 'fb_clown_logged_in';
		}
	}
	return $menu;
}


/*
 * Add an appointments tab to the BuddyPress profile.
 */
function fb_add_appts_tab()
{
	function fb_appts_screen() {
		function fb_appts_title() {
			echo 'Appointments';
		}
		
		add_action('bp_template_title', 'fb_appts_title');
		add_action('bp_template_content', 'fb_fullcalendar_show_appts');
		bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
	}
	
	bp_core_new_nav_item(array(
		'name' => 'Appointments',
		'slug' => 'appointments',
		'show_for_displayed_user' => false, 
		'screen_function' => 'fb_appts_screen',
		'position' => 39,
		'item_css_id' => 'appointments'
	));
}
add_action('bp_setup_nav', 'fb_add_appts_tab');

/*
 * Redirect logins to the current page rather than the dashboard
 */
function my_login_redirect( $redirect_to, $request, $user ){
    return home_url();
}
add_filter("login_redirect", "my_login_redirect", 10, 3);
	
?>
