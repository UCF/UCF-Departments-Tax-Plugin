<?php
/**
 * Place common functions here.
 **/
if ( ! class_exists( 'UCF_Departments_Common' ) ) {
	class UCF_Departments_Common {
		/**
		 * Displays a department's name wrapped in a link to its website.
		 * Will return just the department's name if no website is available.
		 *
		 * @author Jo Dickson
		 * @since 1.0.1
		 * @param $dept object | WP_Term object
		 * @return Mixed | Department name+website HTML string, department name string, or false
		 **/
		public static function get_website_link( $dept ) {
			if ( !$dept->name || !$dept->term_id ) { return false; }

			$name_or_alias = $self::get_name_or_alias( $dept );

			ob_start();
		?>
			<?php if ( $website = get_term_meta( $dept->term_id, 'departments_website', true ) ): ?>
			<a href="<?php echo $website; ?>"><?php echo $name_or_alias; ?></a>
			<?php else: ?>
			<?php echo $name_or_alias; ?>
			<?php endif; ?>
		<?php
			return ob_get_clean();
		}


		/**
		 * Returns a department's alias, if available, or term name.
		 *
		 * @author Jo Dickson
		 * @since 1.0.1
		 * @param $dept WP_Term | The term object
		 * @return Mixed | alias or name string, or false
		 **/
		public static function get_name_or_alias( $dept ) {
			if ( !$dept->name || !$dept->term_id ) { return false; }

			$retval = get_term_meta( $dept->term_id, 'departments_alias', true ) ?: $dept->name;
			return $retval;
		}
	}
}
