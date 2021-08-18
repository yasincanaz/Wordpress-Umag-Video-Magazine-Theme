<?php
if(! defined("ABSPATH")){
    return;
}
// Adds widget: umag footer tags
class Umag_Footer_Tags extends WP_Widget {

	function __construct() {
		parent::__construct(
			'umag_footer_tags',
			esc_html__( 'umag footer tags', 'umag' )
		);
	}

	public function tags_fields(){
        return array(
		array(
			'label' => 'count',
			'id' => 'count',
			'default' => '15',
			'type' => 'number',
		),
	);
}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
        
        $count=! empty($instance['count']) ? $instance['count'] : 15;
        $footer_tags_args=array(
            "taxonomy" => "post_tag",
            "orderby"  => "count",
            "number"   => $count,
            "hide_empty" => false
        );
        $footer_tags= get_terms($footer_tags_args);
        echo ' <ul class="footer-tags">';
        foreach($footer_tags as $tag){
            echo '<li><a href="'.get_term_link($tag->term_id).'">'.$tag->name.'</a></li>';
        }
        echo '</ul>';
		// Output generated fields
		echo $args['after_widget'];
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->tags_fields() as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'umag' );
			switch ( $widget_field['type'] ) {
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'umag' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'umag' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'umag' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->tags_fields() as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_Umag_Footer_Tags() {
	register_widget( 'Umag_Footer_Tags' );
}
add_action( 'widgets_init', 'register_Umag_Footer_Tags' );