<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor controls manager.
 *
 * Elementor controls manager handler class is responsible for registering and
 * initializing all the supported controls, both regular controls and the group
 * controls.
 *
 * @since 1.0.0
 */
class Controls_Manager {

	/**
	 * Content tab.
	 */
	const TAB_CONTENT = 'content';

	/**
	 * Style tab.
	 */
	const TAB_STYLE = 'style';

	/**
	 * Advanced tab.
	 */
	const TAB_ADVANCED = 'advanced';

	/**
	 * Responsive tab.
	 */
	const TAB_RESPONSIVE = 'responsive';

	/**
	 * Layout tab.
	 */
	const TAB_LAYOUT = 'layout';

	/**
	 * Settings tab.
	 */
	const TAB_SETTINGS = 'settings';

	/**
	 * Text control.
	 */
	const TEXT = 'text';

	/**
	 * Number control.
	 */
	const NUMBER = 'number';

	/**
	 * Textarea control.
	 */
	const TEXTAREA = 'textarea';

	/**
	 * Select control.
	 */
	const SELECT = 'select';

	/**
	 * Switcher control.
	 */
	const SWITCHER = 'switcher';

	/**
	 * Button control.
	 */
	const BUTTON = 'button';

	/**
	 * Hidden control.
	 */
	const HIDDEN = 'hidden';

	/**
	 * Heading control.
	 */
	const HEADING = 'heading';

	/**
	 * Raw HTML control.
	 */
	const RAW_HTML = 'raw_html';

	/**
	 * Popover Toggle control.
	 */
	const POPOVER_TOGGLE = 'popover_toggle';

	/**
	 * Section control.
	 */
	const SECTION = 'section';

	/**
	 * Tab control.
	 */
	const TAB = 'tab';

	/**
	 * Tabs control.
	 */
	const TABS = 'tabs';

	/**
	 * Divider control.
	 */
	const DIVIDER = 'divider';

	/**
	 * Color control.
	 */
	const COLOR = 'color';

	/**
	 * Media control.
	 */
	const MEDIA = 'media';

	/**
	 * Slider control.
	 */
	const SLIDER = 'slider';

	/**
	 * Dimensions control.
	 */
	const DIMENSIONS = 'dimensions';

	/**
	 * Choose control.
	 */
	const CHOOSE = 'choose';

	/**
	 * WYSIWYG control.
	 */
	const WYSIWYG = 'wysiwyg';

	/**
	 * Code control.
	 */
	const CODE = 'code';

	/**
	 * Font control.
	 */
	const FONT = 'font';

	/**
	 * Image dimensions control.
	 */
	const IMAGE_DIMENSIONS = 'image_dimensions';

	/**
	 * WordPress widget control.
	 */
	const WP_WIDGET = 'wp_widget';

	/**
	 * URL control.
	 */
	const URL = 'url';

	/**
	 * Repeater control.
	 */
	const REPEATER = 'repeater';

	/**
	 * Icon control.
	 */
	const ICON = 'icon';

	/**
	 * Gallery control.
	 */
	const GALLERY = 'gallery';

	/**
	 * Structure control.
	 */
	const STRUCTURE = 'structure';

	/**
	 * Select2 control.
	 */
	const SELECT2 = 'select2';

	/**
	 * Date/Time control.
	 */
	const DATE_TIME = 'date_time';

	/**
	 * Box shadow control.
	 */
	const BOX_SHADOW = 'box_shadow';

	/**
	 * Text shadow control.
	 */
	const TEXT_SHADOW = 'text_shadow';

	/**
	 * Entrance animation control.
	 */
	const ANIMATION = 'animation';

	/**
	 * Hover animation control.
	 */
	const HOVER_ANIMATION = 'hover_animation';

	/**
	 * Order control.
	 *
	 * @deprecated 2.0.0
	 */
	const ORDER = 'order';

	/**
	 * Controls.
	 *
	 * Holds the list of all the controls. Default is `null`.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @var Base_Control[]
	 */
	private $controls = null;

	/**
	 * Control groups.
	 *
	 * Holds the list of all the control groups. Default is an empty array.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @var Group_Control_Base[]
	 */
	private $control_groups = [];

	/**
	 * Control stacks.
	 *
	 * Holds the list of all the control stacks. Default is an empty array.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @var array
	 */
	private $stacks = [];

	/**
	 * Tabs.
	 *
	 * Holds the list of all the tabs.
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var array
	 */
	private static $tabs;

	/**
	 * Init tabs.
	 *
	 * Initialize control tabs.
	 *
	 * @since 1.6.0
	 * @access private
	 * @static
	 */
	private static function init_tabs() {
		self::$tabs = [
			self::TAB_CONTENT => __( 'Content', 'elementor' ),
			self::TAB_STYLE => __( 'Style', 'elementor' ),
			self::TAB_ADVANCED => __( 'Advanced', 'elementor' ),
			self::TAB_RESPONSIVE => __( 'Responsive', 'elementor' ),
			self::TAB_LAYOUT => __( 'Layout', 'elementor' ),
			self::TAB_SETTINGS => __( 'Settings', 'elementor' ),
		];
	}

	/**
	 * Get tabs.
	 *
	 * Retrieve the tabs of the current control.
	 *
	 * @since 1.6.0
	 * @access public
	 * @static
	 *
	 * @return array Control tabs.
	 */
	public static function get_tabs() {
		if ( ! self::$tabs ) {
			self::init_tabs();
		}

		return self::$tabs;
	}

	/**
	 * Add tab.
	 *
	 * This method adds a new tab to the current control.
	 *
	 * @since 1.6.0
	 * @access public
	 * @static
	 *
	 * @param string $tab_name  Tab name.
	 * @param string $tab_label Tab label.
	 */
	public static function add_tab( $tab_name, $tab_label ) {
		if ( ! self::$tabs ) {
			self::init_tabs();
		}

		if ( isset( self::$tabs[ $tab_name ] ) ) {
			return;
		}

		self::$tabs[ $tab_name ] = $tab_label;
	}

	/**
	 * Register controls.
	 *
	 * This method creates a list of all the supported controls by requiring the
	 * control files and initializing each one of them.
	 *
	 * The list of supported controls includes the regular controls and the group
	 * controls.
	 *
	 * External developers can register new controls by hooking to the
	 * `elementor/controls/controls_registered` action.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function register_controls() {
		$this->controls = [];

		$available_controls = [
			self::TEXT,
			self::NUMBER,
			self::TEXTAREA,
			self::SELECT,
			self::SWITCHER,

			self::BUTTON,
			self::HIDDEN,
			self::HEADING,
			self::RAW_HTML,
			self::POPOVER_TOGGLE,
			self::SECTION,
			self::TAB,
			self::TABS,
			self::DIVIDER,

			self::COLOR,
			self::MEDIA,
			self::SLIDER,
			self::DIMENSIONS,
			self::CHOOSE,
			self::WYSIWYG,
			self::CODE,
			self::FONT,
			self::IMAGE_DIMENSIONS,

			self::WP_WIDGET,

			self::URL,
			self::REPEATER,
			self::ICON,
			self::GALLERY,
			self::STRUCTURE,
			self::SELECT2,
			self::DATE_TIME,
			self::BOX_SHADOW,
			self::TEXT_SHADOW,
			self::ANIMATION,
			self::HOVER_ANIMATION,

			self::ORDER,
		];

		foreach ( $available_controls as $control_id ) {
			$control_filename = str_replace( '_', '-', $control_id );

			$control_filename = ELEMENTOR_PATH . "includes/controls/{$control_filename}.php";

			require( $control_filename );

			$class_name = __NAMESPACE__ . '\Control_' . ucwords( $control_id );

			$this->register_control( $control_id, new $class_name() );
		}

		// Group Controls
		$this->control_groups['background'] = new Group_Control_Background();
		$this->control_groups['border']     = new Group_Control_Border();
		$this->control_groups['typography'] = new Group_Control_Typography();
		$this->control_groups['image-size'] = new Group_Control_Image_Size();
		$this->control_groups['box-shadow'] = new Group_Control_Box_Shadow();
		$this->control_groups['css-filter'] = new Group_Control_Css_Filter();
		$this->control_groups['text-shadow'] = new Group_Control_Text_Shadow();

		/**
		 * After controls registered.
		 *
		 * Fires after Elementor controls are registered.
		 *
		 * @since 1.0.0
		 *
		 * @param Controls_Manager $this The controls manager.
		 */
		do_action( 'elementor/controls/controls_registered', $this );
	}

	/**
	 * Register control.
	 *
	 * This method adds a new control to the controls list. It adds any given
	 * control to any given control instance.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param string       $control_id       Control ID.
	 * @param Base_Control $control_instance Control instance, usually the
	 *                                       current instance.
	 */
	public function register_control( $control_id, Base_Control $control_instance ) {
		$this->controls[ $control_id ] = $control_instance;
	}

	/**
	 * Unregister control.
	 *
	 * This method removes control from the controls list.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param string $control_id Control ID.
	 *
	 * @return bool True if the control was removed, False otherwise.
	 */
	public function unregister_control( $control_id ) {
		if ( ! isset( $this->controls[ $control_id ] ) ) {
			return false;
		}

		unset( $this->controls[ $control_id ] );

		return true;
	}

	/**
	 * Get controls.
	 *
	 * Retrieve the controls list from the current instance.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Base_Control[] Controls list.
	 */
	public function get_controls() {
		if ( null === $this->controls ) {
			$this->register_controls();
		}

		return $this->controls;
	}

	/**
	 * Get control.
	 *
	 * Retrieve a specific control from the current controls instance.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param string $control_id Control ID.
	 *
	 * @return bool|Base_Control Control instance, or False otherwise.
	 */
	public function get_control( $control_id ) {
		$controls = $this->get_controls();

		return isset( $controls[ $control_id ] ) ? $controls[ $control_id ] : false;
	}

	/**
	 * Get controls data.
	 *
	 * Retrieve all the registered controls and all the data for each control.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array {
	 *    Control data.
	 *
	 *    @type array $name Control data.
	 * }
	 */
	public function get_controls_data() {
		$controls_data = [];

		foreach ( $this->get_controls() as $name => $control ) {
			$controls_data[ $name ] = $control->get_settings();
		}

		return $controls_data;
	}

	/**
	 * Render controls.
	 *
	 * Generate the final HTML for all the registered controls using the element
	 * template.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function render_controls() {
		foreach ( $this->get_controls() as $control ) {
			$control->print_template();
		}
	}

	/**
	 * Get control groups.
	 *
	 * Retrieve a specific group for a given ID, or a list of all the control
	 * groups.
	 *
	 * If the given group ID is wrong, it will return `null`. When the ID valid,
	 * it will return the group control instance. When no ID was given, it will
	 * return all the control groups.
	 *
	 * @since 1.0.10
	 * @access public
	 *
	 * @param string $id Optional. Group ID. Default is null.
	 *
	 * @return null|Group_Control_Base|Group_Control_Base[]
	 */
	public function get_control_groups( $id = null ) {
		if ( $id ) {
			return isset( $this->control_groups[ $id ] ) ? $this->control_groups[ $id ] : null;
		}

		return $this->control_groups;
	}

	/**
	 * Add group control.
	 *
	 * This method adds a new group control to the control groups list. It adds
	 * any given group control to any given group control instance.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param string               $id       Group control ID.
	 * @param Group_Control_Base[] $instance Group control instance, usually the
	 *                                       current instance.
	 *
	 * @return Group_Control_Base[] Group control instance.
	 */
	public function add_group_control( $id, $instance ) {
		$this->control_groups[ $id ] = $instance;

		return $instance;
	}

	/**
	 * Enqueue control scripts and styles.
	 *
	 * Used to register and enqueue custom scripts and styles used by the control.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function enqueue_control_scripts() {
		foreach ( $this->get_controls() as $control ) {
			$control->enqueue();
		}
	}

	/**
	 * Open new stack.
	 *
	 * This method adds a new stack to the control stacks list. It adds any
	 * given stack to the current control instance.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param Controls_Stack $controls_stack Controls stack.
	 */
	public function open_stack( Controls_Stack $controls_stack ) {
		$stack_id = $controls_stack->get_unique_name();

		$this->stacks[ $stack_id ] = [
			'tabs' => [],
			'controls' => [],
		];
	}

	/**
	 * Add control to stack.
	 *
	 * This method adds a new control to the stack.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param Controls_Stack $element      Element stack.
	 * @param string         $control_id   Control ID.
	 * @param array          $control_data Control data.
	 * @param array          $options      Optional. Control additional options.
	 *                                     Default is an empty array.
	 *
	 * @return bool True if control added, False otherwise.
	 */
	public function add_control_to_stack( Controls_Stack $element, $control_id, $control_data, $options = [] ) {
		if ( ! is_array( $options ) ) {
			_deprecated_argument( __FUNCTION__, '1.7.0', sprintf( 'Use `[ \'overwrite\' => %s ]` instead.', var_export( $options, true ) ) );

			$options = [
				'overwrite' => $options,
			];
		}

		$default_options = [
			'overwrite' => false,
			'index' => null,
		];

		$options = array_merge( $default_options, $options );

		$default_args = [
			'type' => self::TEXT,
			'tab' => self::TAB_CONTENT,
		];

		$control_data['name'] = $control_id;

		$control_data = array_merge( $default_args, $control_data );

		$control_type_instance = $this->get_control( $control_data['type'] );

		if ( ! $control_type_instance ) {
			_doing_it_wrong( sprintf( '%1$s::%2$s', __CLASS__, __FUNCTION__ ), sprintf( 'Control type "%s" not found.', $control_data['type'] ), '1.0.0' );
			return false;
		}

		if ( $control_type_instance instanceof Base_Data_Control ) {
			$control_default_value = $control_type_instance->get_default_value();

			if ( is_array( $control_default_value ) ) {
				$control_data['default'] = isset( $control_data['default'] ) ? array_merge( $control_default_value, $control_data['default'] ) : $control_default_value;
			} else {
				$control_data['default'] = isset( $control_data['default'] ) ? $control_data['default'] : $control_default_value;
			}
		}

		$stack_id = $element->get_unique_name();

		if ( ! $options['overwrite'] && isset( $this->stacks[ $stack_id ]['controls'][ $control_id ] ) ) {
			_doing_it_wrong( sprintf( '%1$s::%2$s', __CLASS__, __FUNCTION__ ), sprintf( 'Cannot redeclare control with same name "%s".', $control_id ), '1.0.0' );

			return false;
		}

		$tabs = self::get_tabs();

		if ( ! isset( $tabs[ $control_data['tab'] ] ) ) {
			$control_data['tab'] = $default_args['tab'];
		}

		$this->stacks[ $stack_id ]['tabs'][ $control_data['tab'] ] = $tabs[ $control_data['tab'] ];

		$this->stacks[ $stack_id ]['controls'][ $control_id ] = $control_data;

		if ( null !== $options['index'] ) {
			$controls = $this->stacks[ $stack_id ]['controls'];

			$controls_keys = array_keys( $controls );

			array_splice( $controls_keys, $options['index'], 0, $control_id );

			$this->stacks[ $stack_id ]['controls'] = array_merge( array_flip( $controls_keys ), $controls );
		}

		return true;
	}

	/**
	 * Remove control from stack.
	 *
	 * This method removes a control a the stack.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param string $stack_id   Stack ID.
	 * @param string $control_id The ID of the control to remove.
	 *
	 * @return bool|\WP_Error True if the stack was removed, False otherwise.
	 */
	public function remove_control_from_stack( $stack_id, $control_id ) {
		if ( is_array( $control_id ) ) {
			foreach ( $control_id as $id ) {
				$this->remove_control_from_stack( $stack_id, $id );
			}

			return true;
		}

		if ( empty( $this->stacks[ $stack_id ]['controls'][ $control_id ] ) ) {
			return new \WP_Error( 'Cannot remove not-exists control.' );
		}

		unset( $this->stacks[ $stack_id ]['controls'][ $control_id ] );

		return true;
	}

	/**
	 * Get control from stack.
	 *
	 * Retrieve a specific control for a given a specific stack.
	 *
	 * If the given control does not exist in the stack, or the stack does not
	 * exist, it will return `WP_Error`. Otherwise, it will retrieve the control
	 * from the stack.
	 *
	 * @since 1.1.0
	 * @access public
	 *
	 * @param string $stack_id   Stack ID.
	 * @param string $control_id Control ID.
	 *
	 * @return array|\WP_Error The control, or an error.
	 */
	public function get_control_from_stack( $stack_id, $control_id ) {
		if ( empty( $this->stacks[ $stack_id ]['controls'][ $control_id ] ) ) {
			return new \WP_Error( 'Cannot get a not-exists control.' );
		}

		return $this->stacks[ $stack_id ]['controls'][ $control_id ];
	}

	/**
	 * Update control in stack.
	 *
	 * This method updates the control data for a given stack.
	 *
	 * @since 1.1.0
	 * @access public
	 *
	 * @param Controls_Stack $element      Element stack.
	 * @param string         $control_id   Control ID.
	 * @param array          $control_data Control data.
	 * @param array          $options      Optional. Control additional options.
	 *                                     Default is an empty array.
	 *
	 * @return bool True if control updated, False otherwise.
	 */
	public function update_control_in_stack( Controls_Stack $element, $control_id, $control_data, array $options = [] ) {
		$old_control_data = $this->get_control_from_stack( $element->get_unique_name(), $control_id );

		if ( is_wp_error( $old_control_data ) ) {
			return false;
		}

		if ( ! empty( $options['recursive'] ) ) {
			$control_data = array_replace_recursive( $old_control_data, $control_data );
		} else {
			$control_data = array_merge( $old_control_data, $control_data );
		}

		return $this->add_control_to_stack( $element, $control_id, $control_data, [
			'overwrite' => true,
		] );
	}

	/**
	 * Get stacks.
	 *
	 * Retrieve a specific stack for the list of stacks.
	 *
	 * If the given stack is wrong, it will return `null`. When the stack valid,
	 * it will return the the specific stack. When no stack was given, it will
	 * return all the stacks.
	 *
	 * @since 1.7.1
	 * @access public
	 *
	 * @param string $stack_id Optional. stack ID. Default is null.
	 *
	 * @return null|array A list of stacks.
	 */
	public function get_stacks( $stack_id = null ) {
		if ( $stack_id ) {
			if ( isset( $this->stacks[ $stack_id ] ) ) {
				return $this->stacks[ $stack_id ];
			}

			return null;
		}

		return $this->stacks;
	}

	/**
	 * Get element stack.
	 *
	 * Retrieve a specific stack for the list of stacks from the current instance.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param Controls_Stack $controls_stack  Controls stack.
	 *
	 * @return null|array Stack data if it exist, `null` otherwise.
	 */
	public function get_element_stack( Controls_Stack $controls_stack ) {
		$stack_id = $controls_stack->get_unique_name();

		if ( ! isset( $this->stacks[ $stack_id ] ) ) {
			return null;
		}

		return $this->stacks[ $stack_id ];
	}

	/**
	 * Add custom CSS controls.
	 *
	 * This method adds a new control for the "Custom CSS" feature. The free
	 * version of elementor uses this method to display an upgrade message to
	 * Elementor Pro.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param Controls_Stack $controls_stack.
	 * @param string $tab The panel tab.
	 */
	public function add_custom_css_controls( Controls_Stack $controls_stack, $tab = self::TAB_ADVANCED ) {
		$controls_stack->start_controls_section(
			'section_custom_css_pro',
			[
				'label' => __( 'Custom CSS', 'elementor' ),
				'tab' => $tab,
			]
		);

		$controls_stack->add_control(
			'custom_css_pro',
			[
				'type' => self::RAW_HTML,
				'raw' => '<div class="elementor-nerd-box">' .
						'<i class="elementor-nerd-box-icon eicon-hypster" aria-hidden="true"></i>
						<div class="elementor-nerd-box-title">' .
							__( 'Meet Our Custom CSS', 'elementor' ) .
						'</div>
						<div class="elementor-nerd-box-message">' .
							__( 'Custom CSS lets you add CSS code to any widget, and see it render live right in the editor.', 'elementor' ) .
						'</div>
						<div class="elementor-nerd-box-message">' .
							__( 'This feature is only available on Elementor Pro.', 'elementor' ) .
						'</div>
						<a class="elementor-nerd-box-link elementor-button elementor-button-default elementor-go-pro" href="' . Utils::get_pro_link( 'https://elementor.com/pro/?utm_source=panel-custom-css&utm_campaign=gopro&utm_medium=wp-dash' ) . '" target="_blank">' .
							__( 'Go Pro', 'elementor' ) .
						'</a>
						</div>',
			]
		);

		$controls_stack->end_controls_section();
	}
}
