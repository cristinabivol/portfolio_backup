<?php
if ( class_exists( 'WP_Customize_Control' ) ) {

	class Millefiori_Customize_Control_Sortable_Checkboxes extends WP_Customize_Control {

		/**
		 * Control Type
		 */
		public $type = 'ink-multicheck-sortable';

		/**
		 * Render Settings
		 */
		public function render_content() {

			/* if no choices, bail. */
			if ( empty( $this->choices ) ) {
				return;
			}
			if ( ! empty( $this->label ) ) {
				?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php
			} // add label if needed.

			if ( ! empty( $this->description ) ) {
				?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php
			} // add desc if needed.
			/* Data */
			$values  = explode( ',', $this->value() );
			$choices = $this->choices;

			/* If values exist, use it. */
			$options = array();
			if ( $values ) {

				/* get individual item */
				foreach ( $values as $value ) {

					/* separate item with option */
					$value = explode( ':', $value );

					/* build the array. remove options not listed on choices. */
					if ( array_key_exists( $value[0], $choices ) ) {
						$options[ $value[0] ] = $value[1] ? '1' : '0';
					}
				}
			}
			/* if there's new options (not saved yet), add it in the end. */
			foreach ( $choices as $key => $val ) {

				/* if not exist, add it in the end. */
				if ( ! array_key_exists( $key, $options ) ) {
					$options[ $key ] = '0'; // use zero to deactivate as default for new items.
				}
			}
			?>

			<ul class="ink-multicheck-sortable-list">

				<?php foreach ( $options as $key => $value ) { ?>

					<li>
						<label>
							<input name="<?php echo esc_attr( $key ); ?>" class="ink-multicheck-sortable-item" type="checkbox"
										 value="<?php echo esc_attr( $value ); ?>" <?php checked( $value ); ?> />
							<?php echo esc_html( $choices[ $key ] ); ?>
						</label>
						<i class="dashicons dashicons-menu ink-multicheck-sortable-handle"></i>
					</li>

				<?php } // end choices.      ?>

				<li class="ink-hideme">
					<input type="hidden" class="ink-multicheck-sortable" <?php $this->link(); ?>
								 value="<?php echo esc_attr( $this->value() ); ?>"/>
				</li>

			</ul><!-- .ink-multicheck-sortable-list -->


			<?php
		}
	}

}

/**
 * Services
 * list of available sharing services
 */
function sections() {

	$sections                       = array();
	$sections['latestpost_section'] = array(
		'id'       => 'latestpost_section',
		'label'    => __( 'Latest Post', 'mille-fiori' ),
		'callback' => [ 'include_template', 'latestpost' ],
	);

	$sections['story_section'] = array(
		'id'       => 'story_section',
		'label'    => __( 'Our Story', 'mille-fiori' ),
		'callback' => [ 'include_template', 'story' ],
	);

	$sections['blog_section'] = array(
		'id'       => 'blog_section',
		'label'    => __( 'Blog', 'mille-fiori' ),
		'callback' => [ 'include_template', 'blog' ],
	);

	$sections['team_section'] = array(
		'id'       => 'team_section',
		'label'    => __( 'Our Team', 'mille-fiori' ),
		'callback' => [ 'include_template', 'team' ],
	);

	$sections['quote_section'] = array(
		'id'       => 'quote_section',
		'label'    => __( 'Qoute', 'mille-fiori' ),
		'callback' => [ 'include_template', 'quote' ],
	);

	$sections['services_section'] = array(
		'id'       => 'services_section',
		'label'    => __( 'Services', 'mille-fiori' ),
		'callback' => [ 'include_template', 'services' ],
	);

	$sections['newsletter_section'] = array(
		'id'       => 'newsletter_section',
		'label'    => __( 'Newsletter', 'mille-fiori' ),
		'callback' => [ 'include_template', 'newsletter' ],
	);

	$sections['portfolio_section'] = array(
		'id'       => 'portfolio_section',
		'label'    => __( 'Portfolio', 'mille-fiori' ),
		'callback' => [ 'include_template', 'portfolio' ],
	);

	$sections['partners_section'] = array(
		'id'       => 'partners_section',
		'label'    => __( 'Partners', 'mille-fiori' ),
		'callback' => [ 'include_template', 'partners' ],
	);

	$sections['testimonials_section'] = array(
		'id'       => 'testimonials_section',
		'label'    => __( 'Testimonials', 'mille-fiori' ),
		'callback' => [ 'include_template', 'testimonials' ],
	);

	$sections['contact_section'] = array(
		'id'       => 'contact_section',
		'label'    => __( 'Contact Us Section', 'mille-fiori' ),
		'callback' => [ 'include_template', 'contact' ],
	);

	return apply_filters( 'sections', $sections );
}

/**
 * Utility: Default Services to use in customizer default value
 * @return string
 */
function sections_default() {
	$default  = array();
	$sections = sections();
	foreach ( $sections as $section ) {
		$default[] = $section['id'] . ':1'; /* activate all as default. */
	}

	return apply_filters( 'sections_default', implode( ',', $default ) );
}

/**
 * Share Template Tags
 * the final function with the conditional.
 */
function section_show() {

	/* Get the options */
	$option = get_option( 'theme_options' );
	/* Check Services */
	$sections = sections_default();
	if ( isset( $option['millefiori_sort'] ) ) {
		$sections = $option['millefiori_sort'];
	}
	if ( ! $sections ) {
		return;
	}

	/* render button */

	return apply_filters( 'section_show', millefiori_get_section( $sections ) );
}

/**
 * Return Share buttons HTML based on Options
 *
 * @param $options string formatted active services
 */
function millefiori_get_section( $options ) {

	/* bail if empty. */
	if ( ! $options ) {
		return;
	}

	/* available services */
	$sections = sections();

	/* var. */
	$buttons = array();

	/* make array */
	$options = explode( ',', $options );

	/* loop load */
	foreach ( $options as $option ) {
		$option = explode( ':', $option );
		if ( isset( $option[0] ) && isset( $option[1] ) && array_key_exists( $option[0], $sections ) && '1' == $option[1] ) {
			$buttons[] = $option[0];
		}
	}

	/* bail if not found. */
	if ( ! $buttons ) {
		return;
	}
	foreach ( $buttons as $button ) {
		$fn_callback = $sections[ $button ]['callback'];
		if ( function_exists( $fn_callback[0] ) ) {
			call_user_func( $fn_callback[0], $fn_callback[1] );
		}
	}
}

function include_template( $param ) {
	get_template_part( 'templates/millefiori', $param );
}

