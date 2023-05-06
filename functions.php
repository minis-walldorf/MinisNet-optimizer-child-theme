<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ), null);
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_separate', trailingslashit( get_stylesheet_directory_uri() ) . 'ctc-style.css', array( 'chld_thm_cfg_parent','optimizer-style','optimizer-style-core','optimizer-icons' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 15 );

// END ENQUEUE PARENT ACTION



/* * * * * * * * * * * * * *
 *     DISABLE COMMENTS    *
 * * * * * * * * * * * * * */

add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

//function to restrict access to event

function restrict_access_to_event($event_id){

//user event_id to get array of category IDs of this event
    $post_category_ids = tribe_get_event_cat_ids( $event_id );
//relevent category IDs for role based access
    $leiter_only_cat_id = 41;
    $public_cat_id = 42;
    $internal_cat_id = 43;

//check if user is not logged in AND event is not public, then include "access denied" page with reason "not-logged-in" and exit
    if(!is_user_logged_in() && !in_array($public_cat_id, $post_category_ids)){
        get_template_part("error_page/access_denied", "event", array(
            "reason" => "not-logged-in"
        ));
        exit;

    } else {
        //if user is logged in or event is public
        if(is_user_logged_in()) {
            //get user's roles
            $user = wp_get_current_user();
            $roles = ( array )$user->roles;

            //define slug of role to access leiter_only events
            $leiter_only_role = "leiter";
            //if post is leiter_only and user does not have leiter_only_role, then include "access denied" page with reason "insufficient role" and exit
            if ( !in_array($leiter_only_role, $roles) && in_array($leiter_only_cat_id, $post_category_ids)) {
                get_template_part("error_page/access_denied", "event", array(
                    "reason" => "insufficient-role"
                ));
                exit;
            }
        }
    }

}