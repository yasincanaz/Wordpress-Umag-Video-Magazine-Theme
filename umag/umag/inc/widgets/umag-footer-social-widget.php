<?php
if(! defined("ABSPATH")){
    return;
}
// Adds widget: umag footer social link
class Umag_Footer_Social_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'umag_footer_social_widget',
			esc_html__( 'umag footer social link', 'umag' ),
			array( 'description' => esc_html__( 'leave blank the fields you want to remove', 'umag' ), ) // Args
		);
	}
    public function footer_widget(){
        return  array(
            array(
                'label' => 'Facebook Url',
                'id' => 'fac_url',
                'default' => '#',
                'type' => 'text',
            ),
            array(
                'label' => 'instagram Url',
                'id' => 'ins_url',
                'default' => '#',
                'type' => 'text',
            ),
            array(
                'label' => 'Twitter Url',
                'id' => 'twitter_url',
                'default' => '#',
                'type' => 'text',
            ),
            array(
                'label' => 'Youtube Url',
                'id' => 'youtube_url',
                'default' => '#',
                'type' => 'text',
            ),
            array(
                'label' => 'Pinterest Url',
                'id' => 'pin_url',
                'default' => '#',
                'type' => 'text',
            ),
            array(
                'label' => 'Linkedin Url',
                'id' => 'link_url',
                'default' => '#',
                'type' => 'text',
            ),
            array(
                'label' => 'Discord Url',
                'id' => 'dis_url',
                'default' => '#',
                'type' => 'text',
            ),
            array(
                'label' => 'Whatsapp Url',
                'id' => 'what_url',
                'default' => '#',
                'type' => 'text',
            ),
        );
    }
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
            echo '<div class="footer-social-info">';

                    if(! empty($instance['fac_url'])):
                        echo '<a href="'.$instance['fac_url'].'" class="facebook"><i class="fab fa-facebook-f"></i></a>';
                    endif;
                    if(! empty($instance['ins_url'])):
                        echo '<a href="'.$instance['twitter_url'].'" class="instagram"><i class="fab fa-instagram"></i></a>';
                    endif;
                    if(! empty($instance['twitter_url'])):
                        echo '<a href="'.$instance['youtube_url'].'" class="twitter"><i class="fab fa-twitter"></i></a>';
                    endif;
                    if(! empty($instance['youtube_url'])):
                        echo '<a href="'.$instance['youtube_url'].'" class="google-plus"><i class="fab fa-youtube"></i></a>';
                    endif;
                    if(! empty($instance['pin_url'])):
                        echo '<a href="'.$instance['pin_url'].'" class="instagram-fallowers"><i class="fab fa-pinterest"></i></a>';
                    endif;
                    if(! empty($instance['link_url'])):
                        echo '<a href="'.$instance['link_url'].'" class="linkedin"><i class="fab fa-linkedin-in"></i></a>';
                    endif;
                    if(! empty($instance['dis_url'])):
                        echo '<a href="'.$instance['dis_url'].'" class="discord-friends"><i class="fab fa-discord"></i></a>';
                    endif;
                    if(! empty($instance['what_url'])):
                        echo '<a href="'.$instance['what_url'].'" class="whatsapp-fallowers"><i class="fab fa-whatsapp"></i></a>';
                    endif;

            echo '</div>';
		echo $args['after_widget'];
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->footer_widget() as $widget_field ) {
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
		foreach ( $this->footer_widget() as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_Umag_Footer_Social_Widget() {
	register_widget( 'Umag_Footer_Social_Widget' );
}
add_action( 'widgets_init', 'register_Umag_Footer_Social_Widget' );