<?php
/**
 * Initial_Value Class File
 *
 * Role of this class is like RC configuration files in application. If you need
 * to initial value to start your plugin or need them for each time that WordPress
 * run your plugin, you can use from this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.0
 */

namespace Plugin_Name_Name_Space\Includes\Config;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Initial_Value.
 * If you need to initial value to start your plugin or need them for
 * each time that WordPress run your plugin, you can use from this class.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 */
class Initial_Value {

	/**
	 * Initial values to create new custom post type
	 *
	 * @access public
	 * @static
	 * @return array It returns all of arguments that needs for register a post type.
	 */
	public static function args_for_sample_post_type() {
		$labels = [
			'name'               => _x( 'Name', 'post type general name', PLUGIN_NAME_TEXTDOMAIN ),
			'singular_name'      => _x( 'Name', 'post type singular name', PLUGIN_NAME_TEXTDOMAIN ),
			'menu_name'          => _x( 'Names', 'admin menu', PLUGIN_NAME_TEXTDOMAIN ),
			'name_admin_bar'     => _x( 'Name', 'add new on admin bar', PLUGIN_NAME_TEXTDOMAIN ),
			'add_new'            => _x( 'Add New', 'name', PLUGIN_NAME_TEXTDOMAIN ),
			'add_new_item'       => __( 'Add New Name', PLUGIN_NAME_TEXTDOMAIN ),
			'new_item'           => __( 'New Name', PLUGIN_NAME_TEXTDOMAIN ),
			'edit_item'          => __( 'Edit Name', PLUGIN_NAME_TEXTDOMAIN ),
			'view_item'          => __( 'View Name', PLUGIN_NAME_TEXTDOMAIN ),
			'all_items'          => __( 'All Names', PLUGIN_NAME_TEXTDOMAIN ),
			'search_items'       => __( 'Search Names', PLUGIN_NAME_TEXTDOMAIN ),
			'parent_item_colon'  => __( 'Parent Names:', PLUGIN_NAME_TEXTDOMAIN ),
			'not_found'          => __( 'No names found.', PLUGIN_NAME_TEXTDOMAIN ),
			'not_found_in_trash' => __( 'No names found in Trash', PLUGIN_NAME_TEXTDOMAIN ),
		];

		$args = [
			'labels'             => $labels,
			'description'        => __( 'Description.', PLUGIN_NAME_TEXTDOMAIN ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'msn-new-post-type' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 8,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		];

		$post_type_name = 'msn-new-post-type';

		return [
			'args'           => $args,
			'post_type_name' => $post_type_name,
		];
	}

	/**
	 * Initial values to create admin menu page.
	 *
	 * @access public
	 * @return array It returns all of arguments that add_menu_page function needs.
	 * @see    Includes/Abstract/Admin_Menu
	 */
	public function sample_menu_page() {
		$initial_value = [
			'page_title'        => esc_html__( 'Msn Plugin', PLUGIN_NAME_TEXTDOMAIN ),
			'menu_title'        => esc_html__( 'Msn Plugin', PLUGIN_NAME_TEXTDOMAIN ),
			'capability'        => 'manage_options',
			'menu_slug'         => 'plugin-name-option-page-url',
			'callable_function' => 'management_panel_handler',//it can be null
			'icon_url'          => 'dashicons-welcome-widgets-menus',
			'position'          => 2,
			'identifier'        => 'plugin_menu_page1'
		];

		return $initial_value;
	}

	/**
	 * Initial values to create admin submenu page (submenu1).
	 *
	 * @access public
	 * @return array It returns all of arguments that add_submenu_page function needs.
	 * @see    Includes/Abstract/Admin_Sub_Menu
	 */
	public function sample_sub_menu_page1() {
		$initial_value = [
			'parent-slug'       => 'plugin-name-option-page-url',
			'page_title'        => esc_html__( 'Plugin Submenu 1', PLUGIN_NAME_TEXTDOMAIN ),
			'menu_title'        => esc_html__( 'Plugin Submenu 1', PLUGIN_NAME_TEXTDOMAIN ),
			'capability'        => 'manage_options',
			'menu_slug'         => 'plugin-name-option-page-url',
			'callable_function' => 'sub_menu1_panel_handler',
		];

		return $initial_value;
	}

	/**
	 * Initial values to create admin submenu page (submenu1).
	 *
	 * @access public
	 * @return array It returns all of arguments that add_submenu_page function needs.
	 * @see    Includes/Abstract/Admin_Sub_Menu
	 */
	public function sample_sub_menu_page2() {
		$initial_value = [
			'parent-slug'       => 'plugin-name-option-page-url',
			'page_title'        => esc_html__( 'Plugin Submenu 2', PLUGIN_NAME_TEXTDOMAIN ),
			'menu_title'        => esc_html__( 'Plugin Submenu 2', PLUGIN_NAME_TEXTDOMAIN ),
			'capability'        => 'manage_options',
			'menu_slug'         => 'plugin-name-option-page-url-2',
			'callable_function' => 'sub_menu2_panel_handler',
		];

		return $initial_value;
	}

	/**
	 * Initial values to create meta box 1.
	 *
	 * @access public
	 * @see    https://developer.wordpress.org/reference/functions/get_post_meta/
	 * @see    https://developer.wordpress.org/reference/functions/add_meta_box/
	 * @return array It returns all of arguments that add_meta_box function needs.
	 */
	public function sample_meta_box3() {
		$initial_value = [

			'id'            => 'meta_box_3_id',
			'title'         => esc_html__( 'Meta box3 Headline', PLUGIN_NAME_TEXTDOMAIN ),
			'callback'      => 'render_content',
			'screens'       => array( 'post', 'page' ),//null - optional
			'context'       => 'advanced', //optional
			'priority'      => 'high', //optional
			'callback_args' => null, //optional
			'meta_key'      => '_msn_plugin_boilerplate_meta_box_key_3',
			'single'        => true, //the result of get_post_meta Will be an array if $single is false
			'action'        => 'msn_oop_boilerplate_meta_box3',
			'nonce_name'    => 'msn_oop_boilerplate_meta_box3_nonce'

		];

		return $initial_value;
	}

	/**
	 * Initial values to create meta box 1.
	 *
	 * @access public
	 * @see    https://developer.wordpress.org/reference/functions/get_post_meta/
	 * @see    https://developer.wordpress.org/reference/functions/add_meta_box/
	 * @return array It returns all of arguments that add_meta_box function needs.
	 */
	public function sample_meta_box4() {
		$initial_value = [

			'id'            => 'meta_box_4_id',
			'title'         => esc_html__( 'Meta box4 Headline', PLUGIN_NAME_TEXTDOMAIN ),
			'callback'      => 'render_content',
			'screens'       => array( 'post', 'page' ),//null - optional
			'context'       => 'side', //optional
			'priority'      => 'high', //optional
			'callback_args' => null, //optional
			'meta_key'      => '_msn_plugin_boilerplate_meta_box_key_4',
			'single'        => false, //the result of get_post_meta Will be an array if $single is false
			'action'        => 'msn_oop_boilerplate_meta_box4',
			'nonce_name'    => 'msn_oop_boilerplate_meta_box4_nonce'

		];

		return $initial_value;
	}
}
