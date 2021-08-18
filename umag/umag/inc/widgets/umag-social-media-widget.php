<?php
if (!defined("ABSPATH")) {
    return;
}
// Adds widget: Number of social media followers
class Umag_Social_Media_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'umag_social_media_widget',
            esc_html__('umag social media followers', 'umag')
        );
    }

    public function social_fieled()
    {
        return array(
            array(
                'label' => esc_html__('Number of Facebook followers', 'umag'),
                'id' => 'facebook_fal',
                'default' => '5000',
                'type' => 'number',
            ),
            array(
                'label' => esc_html__('Facebook Link', 'umag'),
                'id' => 'facebook_url',
                'default' => '#',
                'type' => 'text',
            ),
            array(
                'label' => esc_html__('Number of twitter followers', 'umag'),
                'id' => 'twitter_fal',
                'default' => '5000',
                'type' => 'number',
            ),
            array(
                'label' => esc_html__('Twitter Link', 'umag'),
                'id' => 'twitter_url',
                'default' => '#',
                'type' => 'text',
            ),
            array(
                'label' => esc_html__('Number of youtube followers', 'umag'),
                'id' => 'youtube_fal',
                'default' => '5000',
                'type' => 'number',
            ),
            array(
                'label' => esc_html__('Youtube Link', 'umag'),
                'id' => 'youtube_url',
                'default' => '#',
                'type' => 'text',
            ),
            array(
                'label' => esc_html__('Number of pinterest followers', 'umag'),
                'id' => 'pinterest_fal',
                'default' => '5000',
                'type' => 'number',
            ),
            array(
                'label' => esc_html__('Pinterest Link', 'umag'),
                'id' => 'pinterest_url',
                'default' => '#',
                'type' => 'text',
            ),
            array(
                'label' => esc_html__('Number of Linkedin connection', 'umag'),
                'id' => 'linkedin_fal',
                'default' => '5000',
                'type' => 'number',
            ),
            array(
                'label' => esc_html__('Linkedin Link', 'umag'),
                'id' => 'linkedin_url',
                'default' => '#',
                'type' => 'text',
            ),
            array(
                'label' => esc_html__('Number of Discord Friends', 'umag'),
                'id' => 'discord_fal',
                'default' => '5000',
                'type' => 'number',
            ),
            array(
                'label' => esc_html__('Discord Link', 'umag'),
                'id' => 'discord_url',
                'default' => '#',
                'type' => 'text',
            ),
            array(
                'label' => esc_html__('Number of instagram Fallowers', 'umag'),
                'id' => 'instagram_fal',
                'default' => '5000',
                'type' => 'number',
            ),
            array(
                'label' => esc_html__('Instagram Link', 'umag'),
                'id' => 'instagram_url',
                'default' => '#',
                'type' => 'text',
            ),
            array(
                'label' => esc_html__('Number of whatsapp Fallowers', 'umag'),
                'id' => 'whatsapp_fal',
                'default' => '5000',
                'type' => 'number',
            ),
            array(
                'label' => esc_html__('Whatsapp Link', 'umag'),
                'id' => 'whatsapp_url',
                'default' => '#',
                'type' => 'text',
            ),
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
?>
        <div class="social-followers-info">
            <?php
            // Output generated fields
            if (!empty($instance['facebook_fal'])) {
                echo '<a href="' . $instance['facebook_url'] . '" class="facebook-fans"><i class="fab fa-facebook-f"></i>' . $instance['facebook_fal'] . '<span>' . esc_html(' Fans', 'umag') . '</span></a>';
            }
            if (!empty($instance['twitter_fal'])) {
                echo '<a href="' . $instance['twitter_url'] . '" class="twitter-followers"><i class="fab fa-twitter"></i>' . $instance['twitter_fal'] . '<span>' . esc_html(' Fallowers', 'umag') . '</span></a>';
            }
            if (!empty($instance['youtube_fal'])) {
                echo '<a href="' . $instance['youtube_url'] . '" class="youtube-subscribers"><i class="fab fa-youtube"></i>' . $instance['youtube_fal'] . '<span>' . esc_html(' Subscribers', 'umag') . '</span></a>';
            }
            if (!empty($instance['pinterest_fal'])) {
                echo '<a href="' . $instance['pinterest_url'] . '" class="pinterest-post"><i class="fab fa-pinterest-p"></i>' . $instance['pinterest_fal'] . '<span>' . esc_html(' Fallowers', 'umag') . '</span></a>';
            }
            if (!empty($instance['linkedin_fal'])) {
                echo '<a href="' . $instance['linkedin_url'] . '" class="linkedin-connection"><i class="fab fa-linkedin-in"></i>' . $instance['linkedin_fal'] . '<span>' . esc_html(' Connection', 'umag') . '</span></a>';
            }
            if (!empty($instance['discord_fal'])) {
                echo '<a href="' . $instance['discord_url'] . '" class="discord-friends"><i class="fab fa-discord"></i>' . $instance['discord_fal'] . '<span>' . esc_html(' Friends', 'umag') . '</span></a>';
            }
            if (!empty($instance['instagram_fal'])) {
                echo '<a href="' . $instance['instagram_url'] . '" class="instagram-fallowers"><i class="fab fa-instagram"></i>' . $instance['instagram_fal'] . '<span>' . esc_html(' Fallowers', 'umag') . '</span></a>';
            }
            if (!empty($instance['whatsapp_fal'])) {
                echo '<a href="' . $instance['whatsapp_url'] . '" class="whatsapp-fallowers"><i class="fab fa-whatsapp"></i>' . $instance['whatsapp_fal'] . '<span>' . esc_html(' Customer', 'umag') . '</span></a>';
            }
            ?>
        </div>
    <?php
        echo $args['after_widget'];
    }

    public function field_generator($instance)
    {
        $output = '';
        foreach ($this->social_fieled() as $widget_field) {
            $default = '';
            if (isset($widget_field['default'])) {
                $default = $widget_field['default'];
            }
            $widget_value = !empty($instance[$widget_field['id']]) ? $instance[$widget_field['id']] : esc_html__($default, 'umag');
            switch ($widget_field['type']) {
                default:
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'umag') . ':</label> ';
                    $output .= '<input class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" type="' . $widget_field['type'] . '" value="' . esc_attr($widget_value) . '">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('', 'umag');
    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:',); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
<?php
        $this->field_generator($instance);
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        foreach ($this->social_fieled() as $widget_field) {
            switch ($widget_field['type']) {
                default:
                    $instance[$widget_field['id']] = (!empty($new_instance[$widget_field['id']])) ? strip_tags($new_instance[$widget_field['id']]) : '';
            }
        }
        return $instance;
    }
}

function umag_register_social_media()
{
    register_widget('Umag_Social_Media_widget');
}
add_action('widgets_init', 'umag_register_social_media');
