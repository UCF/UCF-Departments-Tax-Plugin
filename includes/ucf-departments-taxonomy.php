<?php
/**
 * Responsible for resgitering the taxonomy
 **/
if ( ! class_exists( 'UCF_Departments_Taxonomy' ) ) {
	class UCF_Departments_Taxonomy {
		/**
		 * Registers the Departments custom taxonomy
		 * @author Jim Barnes
		 * @since 1.0.0
		 **/
		public static function register() {
			$labels = apply_filters(
				'ucf_departments_labels',
				array(
					'singular' => 'Department',
					'plural'   => 'Departments',
					'slug'     => 'departments'
				)
			);

			$post_types = post_type_exists( 'degree' ) ? array( 'degree' ) : null;

			register_taxonomy( 'departments', $post_types, self::args( $labels ) );
		}

		/**
		 * Returns an array of labels for the custom taxonomy.
		 * @author Jim Barnes
		 * @since 1.0.0
		 * @param $singular string | The singular form for the CPT labels.
		 * @param $plural string | The plural form for the CPT labels.
		 * @return Array
		 **/
		public static function labels( $singular, $plural ) {
			return array(
				'name'                       => _x( $plural, 'Taxonomy General Name', 'ucf_departments' ),
				'singular_name'              => _x( $singular, 'Taxonomy Singular Name', 'ucf_departments' ),
				'menu_name'                  => __( $plural, 'ucf_departments' ),
				'all_items'                  => __( 'All ' . $plural, 'ucf_departments' ),
				'parent_item'                => __( 'Parent ' . $singular, 'ucf_departments' ),
				'parent_item_colon'          => __( 'Parent :' . $singular, 'ucf_departments' ),
				'new_item_name'              => __( 'New ' . $singular . ' Name', 'ucf_departments' ),
				'add_new_item'               => __( 'Add New ' . $singular, 'ucf_departments' ),
				'edit_item'                  => __( 'Edit ' . $singular, 'ucf_departments' ),
				'update_item'                => __( 'Update ' . $singular, 'ucf_departments' ),
				'view_item'                  => __( 'View ' . $singular, 'ucf_departments' ),
				'separate_items_with_commas' => __( 'Separate ' . strtolower( $plural ) . ' with commas', 'ucf_departments' ),
				'add_or_remove_items'        => __( 'Add or remove ' . strtolower( $plural ), 'ucf_departments' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'ucf_departments' ),
				'popular_items'              => __( 'Popular ' . strtolower( $plural ), 'ucf_departments' ),
				'search_items'               => __( 'Search ' . $plural, 'ucf_departments' ),
				'not_found'                  => __( 'Not Found', 'ucf_departments' ),
				'no_terms'                   => __( 'No items', 'ucf_departments' ),
				'items_list'                 => __( $plural . ' list', 'ucf_departments' ),
				'items_list_navigation'      => __( $plural . ' list navigation', 'ucf_departments' ),
			);
		}

		public static function args( $labels ) {
			$singular = $labels['singular'];
			$plural   = $labels['plural'];
			$slug     = $labels['slug'];

			$args = array(
				'labels'                     => self::labels( $singular, $plural ),
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
				'rewrite'                    => array(
					'slug'         => $slug,
					'hierarchical' => true,
					'ep_mask'      => EP_PERMALINK | EP_PAGES
				)
			);

			$args = apply_filters( 'ucf_departments_args', $args );

			return $args;
		}
	}
}
