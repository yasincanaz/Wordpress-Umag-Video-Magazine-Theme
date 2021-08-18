<?php
if(! defined("ABSPATH")){
    return;
}
// Adds widget: # umag Category
class Umag_Footer_Category extends WP_Widget {

	function __construct() {
		parent::__construct(
			'umag_footer_category',
			esc_html__( 'umag Footer Category', 'umag' ),
			array( 'description' => esc_html__( 'Shows categories and content count', 'umag' ), ) // Args
		);
	}

    public function cat_widget_field(){
        return array(
            array(
                'label' => esc_html__('Category number','umag'),
                'id' => 'cat_num',
                'default' => '7',
                'type' => 'number',
            ),
            array(
                'label' => esc_html__(' Sort categories','umag'),
                'id' => 'sort_cat',
                'default' => 'date',
                'type' => 'select',
                'options' => array(
                    'name'    =>'By name',
                    'populer' => 'By Popularty',
                ),
            ),
            array(
                'label' => esc_html__('Hide empty categories','umag'),
                'id' => 'hide_empty_cat',
                'default' => 'yes',
                'type' => 'checkbox',
            ),
            array(
                'label' => esc_html__('Hide Number of Posts','umag'),
                'id' => 'hide_number_post',
                'default' => 'yes',
                'type' => 'checkbox',
            )
			);
    }
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		$cat_num=! empty($instance['cat_num']) ? $instance['cat_num'] : 7;
		$show_empty_cat= ! empty($instance['hide_empty_cat']) ? $instance['hide_empty_cat'] : false;
		$category_tax_args=array(
			"taxonomy" => "category",
			"number"   =>$cat_num,
			"hide_empty" => $show_empty_cat,

		);
		if($instance["sort_cat"] === "populer"){
			$category_tax_args["orderby"] = "count";
		}
		$category_tax=get_terms($category_tax_args);
		?>
        <nav class="footer-widget-nav">
		<ul>
                    <?php foreach($category_tax as $category):?>
						<?php
				$cat_sort=! empty($instance['hide_number_post']) ? '' : '<span>'.$category->count.'</span>';
							
							?>
                    
						<li><a href="<?php echo get_term_link( $category ->term_id )?>"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i><?php echo ' '.$category->name?></span><?php echo $cat_sort?></a></li>

					<?php endforeach;?>
        </ul>
        </nav>
		<?php
		echo $args['after_widget'];
	}
	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->cat_widget_field() as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'umag' );
			switch ( $widget_field['type'] ) {
				case 'checkbox':
					$output .= '<p>';
					$output .= '<input class="checkbox" type="checkbox" '.checked( $widget_value, true, false ).' id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" value="1">';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'umag' ).'</label>';
					$output .= '</p>';
					break;
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'umag' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->cat_widget_field() as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_umag_footer_category() {
	register_widget( 'Umag_Footer_Category' );
}
add_action( 'widgets_init', 'register_umag_footer_category' );