<?php
/*
Plugin Name: UCF Departments Taxonomy
Version: 1.0.0
Author: UCF Web Communications
Description: Provides a "Departments" taxonomy.
*/
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'UCF_DEPARTMENTS__FILE', __FILE__ );

include_once 'includes/ucf-departments-taxonomy.php';
include_once 'includes/ucf-departments-fields.php';
include_once 'includes/ucf-departments-common.php';

if ( ! function_exists( 'ucf_departments_activation' ) ) {
	function ucf_departments_activation() {
		UCF_Departments_Taxonomy::register();
		flush_rewrite_rules();
	}

	register_activation_hook( 'ucf_departments_activation', UCF_DEPARTMENTS__FILE );
}

if ( ! function_exists( 'ucf_departments_deactivation' ) ) {
	function ucf_departments_deactivation() {
		flush_rewrite_rules();
	}

	register_deactivation_hook( 'ucf_departments_deactivation', UCF_DEPARTMENTS__FILE );
}

// Run base actions inside of 'plugins_loaded' hook so we
// can check for the existence of other post_types and taxonomies
if ( ! function_exists( 'ucf_departments_init' ) ) {
	function ucf_departments_init() {
		// Resgiter custom taxonomy
		add_action( 'init', array( 'UCF_Departments_Taxonomy', 'register' ), 10, 0 );
		// Register custom meta fields
		add_action( 'init', array( 'UCF_Departments_Fields', 'register_meta_fields' ), 10, 0 );
	}

	add_action( 'plugins_loaded', 'ucf_departments_init' );
}
