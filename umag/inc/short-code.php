<?php
if (!defined("ABSPATH")) {
    die();
}
function umag_list_wrapper_shortcode($atts, $content = '')
{
    return "<ul>" . do_shortcode($content) . "</ul>";
}
add_shortcode("umag-list-wrapper", "umag_list_wrapper_shortcode");
function umag_list_shortcode($atts, $content = '')
{
    $atts = shortcode_atts(array(
        "icon" => "check",
    ), $atts, "umag-list");
    return "<li><i class='fas fa-" . $atts["icon"] . "'></i>" . $content . "</li>";
}
add_shortcode("umag-list", "umag_list_shortcode");

function umag_title_shortcode($atts, $content = '')
{
    return '<div class="section-heading"><h5>' . $content . '<h5></div>';
}
add_shortcode("umag-title", "umag_title_shortcode");


function umag_team_shortcode($atts, $content)
{
    $team_args = array(
        "order" => "DESC",
        "posts_per_page" => -1,
        "post_type" => "team",
    );
    $team = new WP_Query($team_args);
    ob_start();
    if ($team->have_posts()) {
        while ($team->have_posts()) {
            $team->the_post();
            get_template_part("template-parts/our", "team");
        }
    }
    return ob_get_clean();
}
add_shortcode("umag-team", "umag_team_shortcode");

function umag_contact_info_shortcode($atts, $content='')
{
    $atts = shortcode_atts( array(
        "title" => '',
        "icon" => ''
    ), $atts, "umag-contact" );
    ob_start();
?>
    <div class="single-contact-info d-flex align-items-center">
        <div class="icon mr-15">
            <i class="<?php echo $atts["icon"]?>" aria-hidden="true"></i>
        </div>
        <div class="text">
            <p><?php echo $atts["title"]?></p>
            <h6><?php echo $content?></h6>
        </div>
    </div>
<?php
return ob_get_clean();
}

add_shortcode( "umag-contact", "umag_contact_info_shortcode" );
