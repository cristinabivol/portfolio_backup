<?php
/*
Plugin Name: Author Box Widget
Description: Author Box Widget is an easy to use plugin that uses the native WordPress media manager and text fields to add author box widgets to your site.
Note: This widget is an adjustments of Image & Text Widget plugin developed by dFactory
Version: 0.0.1
License: MIT License
License URI: http://opensource.org/licenses/MIT
Text Domain: author-widget
*/

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

define( 'AUTHOR_WIDGET_URL', plugins_url( '', __FILE__ ) );
define( 'AUTHOR_WIDGET_PATH', plugin_dir_path( __FILE__ ) );

new Author_Widget_Plugin();

class Author_Widget_Plugin {

  private $defaults = array(
    'version' => '0.0.1'
  );

  public function __construct() {
    register_activation_hook( __FILE__, array( &$this, 'activation' ) );
    register_deactivation_hook( __FILE__, array( &$this, 'deactivation' ) );

    // update plugin version
    update_option( 'author_box_widget_version', $this->defaults['version'], '', 'no' );

    // actions
    add_action( 'plugins_loaded', array( &$this, 'load_textdomain' ) );
    add_action( 'admin_enqueue_scripts', array( &$this, 'admin_scripts_styles' ) );
    add_action( 'widgets_init', array( &$this, 'register_widget' ) );
  }

  /**
   *
   */
  public function register_widget() {
    include_once( AUTHOR_WIDGET_PATH . 'includes/widget.php' );

    register_widget( 'Author_Box_Widget' );
  }

  /**
   * Plugin activation function
   */
  public function activation() {
    add_option( 'author_box_widget_version', $this->defaults['version'], '', 'no' );
  }

  /**
   * Plugin deactivation function
   */
  public function deactivation() {
    delete_option( 'author_box_widget_version' );
  }

  /**
   * Load textdomain
   */
  public function load_textdomain() {
    load_plugin_textdomain( 'author-box-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
  }

  /**
   * Admin scripts and styles
   */
  public function admin_scripts_styles( $page ) {
    if ( $page === 'widgets.php' ) {
      wp_enqueue_media();

      wp_register_script(
        'author-box-widget-admin', AUTHOR_WIDGET_URL . '/js/admin.js', array( 'jquery' )
      );

      wp_enqueue_script( 'author-box-widget-admin' );

      wp_localize_script(
        'author-box-widget-admin', 'myArgs', array(
          'title'    => __( 'Select image', 'author-box-widget' ),
          'button'   => array( 'text' => __( 'Add image', 'author-box-widget' ) ),
          'frame'    => 'select',
          'multiple' => false
        )
      );

      wp_register_style(
        'author-box-widget-admin', AUTHOR_WIDGET_URL . '/css/admin.css'
      );

      wp_enqueue_style( 'author-box-widget-admin' );
    }
  }

}
