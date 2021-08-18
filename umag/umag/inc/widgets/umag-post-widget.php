<?php
// Adds widget: # Featured post
if(! defined("ABSPATH")){
	die();
}
class Featuredpost_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'featuredpost_widget',
			esc_html__( 'umag Featured post', 'umag' ),
			array( 'description' => esc_html__( 'You can select your featured posts here', 'umag' ), ) // Args
		);
	}

	public function fields(){
        return array(
		 array(
			'label' => esc_html__('Post count','umag'),
			'id' => 'post_count',
			'default' => '5',
			'type' => 'number',
		),
		array(
			'label' => esc_html__('Arrangement','umag'),
			'id' => 'arrangement',
			'default' => 'date',
			'type' => 'select',
			'options' => array(
			 'date'     =>	esc_html__('date','umag'),
			 'views'    =>	esc_html__('views','umag'),
			 'random'   =>	esc_html__('random','random'),
			 'comments' =>  esc_html__('comments','umag'),
			),
		),
		array(
			'label' => esc_html__('category','umag'),
			'id' => 'category',
			'type' => 'text',
		),
	);
}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		/* Output generated fields
		echo '<p>'.$instance['post_count'].'</p>';
		echo '<p>'.$instance['arrangement'].'</p>';
		echo '<p>'.$instance['category'].'</p>';*/
        $widget_post_count = ! empty($instance['post_count']) ? $instance['post_count'] : 5 ;
        $widget_cat_filter = ! empty($instance['category']) ? explode(",",$instance['category']):array();
        $widget_posts_args=array(
            "order" => "DESC",
            "posts_per_page" =>$widget_post_count,
            "category__in" => $widget_cat_filter,
        );
        $widget_sorgu=$instance["arrangement"];
        if($widget_sorgu === "views"){
            $widget_posts_args["orderby"] = "meta_value_num";
            $widget_posts_args["meta_key"] = "views";
        }
        if($widget_sorgu === "random"){
            $widget_posts_args["orderby"] = "rand";
        }
        if($widget_sorgu === "comments"){
            $widget_posts_args["orderby"] = "comment_count";
        }
        $widget_posts=new WP_Query($widget_posts_args);
        if($widget_posts->have_posts()):

        while($widget_posts->have_posts()){
            $widget_posts->the_post();
            get_template_part( "template-parts/widget","post");
        }

        endif;
        if(! $widget_posts->have_posts()){
            echo '<div class="alert alert-danger" >Yazı Bulunmadı!!!</div>';
        }
		echo $args['after_widget'];
	}
	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->fields() as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'umag' );
			switch ( $widget_field['type'] ) {
				case 'select':
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
					$output .= '<select id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'">';
					foreach ($widget_field['options'] as $key => $value) {
						if ($widget_value == $value) {
							$output .= '<option value="'.$key.'" selected>'.$value.'</option>';
						} else {
							$output .= '<option value="'.$key.'">'.$value.'</option>';
						}
					}
					$output .= '</select>';
					$output .= '</p>';
					break;
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->fields() as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function umag_register_post_widget() {
	register_widget( 'Featuredpost_Widget' );
}
add_action( 'widgets_init', 'umag_register_post_widget' );