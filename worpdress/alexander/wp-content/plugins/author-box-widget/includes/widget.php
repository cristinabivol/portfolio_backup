<?php
// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

class Author_Box_Widget extends WP_Widget {

  private $itw_defaults = array();

  public function __construct() {
    parent::__construct(
      'Author_Box_Widget', __( 'Author Box', 'author-widget' ), array(
        'description' => __( 'Displays author image and text', 'author-widget' )
      )
    );

    $this->itw_defaults = array(
      'title'         => '',
      'image_id'      => 0,
      'page_position' => 'sidebar',
      'text'          => '',
      'size'          => 'thumbnail',
      'responsive'    => true
    );

    $this->m_widgyet_positions = array(
      'sidebar'    => __( 'Sidebar', 'author-box-widget' ),
      'horizontal' => __( 'Horizontal', 'author-box-widget' )
    );
  }

  public function widget( $args, $instance ) {
    if ( $instance['title'] !== '' ) {
      $title = $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];
    }
    $image = wp_get_attachment_image_src( $instance['image_id'] );
    $text  = apply_filters( 'itw_widget_text', $instance['text'] );
    $image = apply_filters( 'itw_widget_image', $image, $instance );

    if ( $instance['page_position'] !== $this->itw_defaults['page_position'] ) {
      $html = $args['before_widget'];
      $html .= '<div class="row author">';
      $html .= '<div class="col-md-3 horizontal">';
      $html .= '<img class="img-responsive img-centered d-block" src="' . $image[0] . '" alt >';
      $html .= '</div>';
      $html .= '<div class="col-md-9">';
      $html .= $title;
      $html .= '<p class="author-text">' . $text . '</p>';
      $html .= '</div>';
      $html .= '</div>';
      $html .= $args['after_widget'];
    } else {
      $html = $args['before_widget'];
      $html .= '<div class="author-img-container">';
      $html .= '<img class="img-fluid author-img d-block mx-auto" src="' . $image[0] . '" alt /></div>';
      $html .= '<div class="author-box">';
      $html .= $title;
      $html .= '<p class="author-text">' . $text . '</p>';
      $html .= '</div>';
      $html .= $args['after_widget'];
    }

    echo apply_filters( 'itw_widget_html', $html, $instance );
  }

  public function form( $instance ) {
    $image_id = (int) ( isset( $instance['image_id'] ) ? $instance['image_id'] : $this->itw_defaults['image_id'] );
    $image    = array();

    if ( $image_id !== 0 ) {
      $image = wp_get_attachment_image_src( $image_id, 'thumbnail', false );
    } else {
      $image[0] = '';
    }

    if ( ! $image ) {
      $image = wp_get_attachment_image_src( $image_id, 'full', false );
    }

    $html = '
		<div class="image-text-widget">
			<p class="label">' . __( 'Title', 'author-box-widget' ) . '</p>
			<input id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" type="text" value="' . esc_attr( isset( $instance['title'] ) ? $instance['title'] : $this->itw_defaults['title'] ) . '" />
			<p class="label">' . __( 'Image', 'author-box-widget' ) . '</p>
			<div>
				<div class="itw-image-buttons">
					<input class="itw_upload_image_id" type="hidden" name="' . $this->get_field_name( 'image_id' ) . '" value="' . $image_id . '" />
					<input class="itw_upload_image_button button button-secondary" type="button" value="' . __( 'Select image', 'author-box-widget' ) . '" />
					<input class="itw_turn_off_image_button button button-secondary" type="button" value="' . __( 'Remove image', 'author-box-widget' ) . '" ' . disabled( 0, $image_id, false ) . ' />
					<span class="itw-spinner"></span>
				</div>
				<div class="itw-image-preview">
					' . ( $image[0] !== '' ? '<img src="' . $image[0] . '" alt />' : '<img src="" alt="" style="display: none;" />' ) . '
				</div>
			</div>
			<input id="' . $this->get_field_id( 'responsive' ) . '" type="checkbox" name="' . $this->get_field_name( 'responsive' ) . '" value="" ' . checked( true, ( isset( $instance['responsive'] ) ? $instance['responsive'] : $this->itw_defaults['responsive'] ), false ) . ' /> <label for="' . $this->get_field_id( 'responsive' ) . '">' . __( 'Responsive', 'author-box-widget' ) . '</label>
			<p class="label">' . __( 'Text', 'author-box-widget' ) . '</p>
			<textarea id="' . $this->get_field_id( 'text' ) . '" name="' . $this->get_field_name( 'text' ) . '">' . ( isset( $instance['text'] ) ? $instance['text'] : $this->itw_defaults['text'] ) . '</textarea>';

    $html .= '
			<h5 class="label">' . __( 'Display type', 'widget-display-type' ) . '</h5>
			<select id="' . $this->get_field_id( 'page_position' ) . '" name="' . $this->get_field_name( 'page_position' ) . '">';

    foreach ( $this->m_widgyet_positions as $id => $page_position ) {
      $html .= '
				<option value="' . esc_attr( $id ) . '" ' . selected( $id, ( isset( $instance['page_position'] ) ? $instance['page_position'] : $this->itw_defaults['page_position'] ), false ) . '>' . $page_position . '</option>';
    }

    $html .= '
			</select>';

    $html .= '</div>';
    echo $html;
  }

  public function update( $new_instance, $old_instance ) {
    // checkboxes
    $old_instance['responsive'] = ( isset( $new_instance['responsive'] ) ? true : false );

    // image
    $old_instance['image_id'] = (int) ( isset( $new_instance['image_id'] ) ? $new_instance['image_id'] : $this->itw_defaults['image_id'] );

    // title
    $old_instance['title'] = sanitize_text_field( isset( $new_instance['title'] ) ? $new_instance['title'] : $this->itw_defaults['title'] );

    // text
    $old_instance['text'] = esc_textarea( isset( $new_instance['text'] ) ? $new_instance['text'] : $this->itw_defaults['text'] );

    // image position
    $old_instance['page_position'] = ( isset( $new_instance['page_position'] ) && in_array( $new_instance['page_position'], array_keys( $this->m_widgyet_positions ), true ) ? $new_instance['page_position'] : $this->itw_defaults['page_position'] );


    return $old_instance;
  }

}
