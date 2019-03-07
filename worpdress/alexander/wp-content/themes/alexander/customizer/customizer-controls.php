<?php
if (class_exists('WP_Customize_Control')) {

	class Alexander_Customize_Control_Sortable_Checkboxes extends WP_Customize_Control
	{

		/**
		 * Control Type
		 */
		public $type = 'ink-multicheck-sortable';

		/**
		 * Render Settings
		 */
		public function render_content()
		{

			/* if no choices, bail. */
			if (empty($this->choices)) {
				return;
			}
			if (!empty($this->label)) {
				?>
				<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
				<?php
			} // add label if needed.

			if (!empty($this->description)) {
				?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php
			} // add desc if needed.
			/* Data */
			$values = explode(',', $this->value());
			$choices = $this->choices;

			/* If values exist, use it. */
			$options = array();
			if ($values) {

				/* get individual item */
				foreach ($values as $value) {

					/* separate item with option */
					$value = explode(':', $value);

					/* build the array. remove options not listed on choices. */
					if (array_key_exists($value[0], $choices)) {
						$options[$value[0]] = $value[1] ? '1' : '0';
					}
				}
			}
			/* if there's new options (not saved yet), add it in the end. */
			foreach ($choices as $key => $val) {

				/* if not exist, add it in the end. */
				if (!array_key_exists($key, $options)) {
					$options[$key] = '0'; // use zero to deactivate as default for new items.
				}
			}
			?>

			<ul class="ink-multicheck-sortable-list">

				<?php foreach ($options as $key => $value) { ?>

					<li>
						<label>
							<input name="<?php echo esc_attr($key); ?>" class="ink-multicheck-sortable-item" type="checkbox"
										 value="<?php echo esc_attr($value); ?>" <?php checked($value); ?> />
							<?php echo esc_html($choices[$key]); ?>
						</label>
						<i class="dashicons dashicons-menu ink-multicheck-sortable-handle"></i>
					</li>

				<?php } // end choices.      ?>

				<li class="ink-hideme">
					<input type="hidden" class="ink-multicheck-sortable" <?php $this->link(); ?>
								 value="<?php echo esc_attr($this->value()); ?>"/>
				</li>

			</ul><!-- .ink-multicheck-sortable-list -->


			<?php
		}
	}

}

function theme_get_option($option_name, $default_value = '')
{
	$option_data = get_option('theme_options');
	if (isset($option_data[$option_name]) && $option_data[$option_name] != '') {
		return $option_data[$option_name];
	} elseif ($default_value) {
		return $default_value;
	} else {
		return false;
	}
}

