<?php

/**
 * Template Name: Home
 * Template Post Type: page
 */
get_header();
?>
<?php
$home_slide_default = get_theme_mod("umag_slider_default", true);
if ($home_slide_default) {
    $big_slider_arg = array(
        "author_name"=> "yasincanaz",
        "order"         => "DESC",
        "posts_per_page" => get_theme_mod("umag_slide_count", 3),
        "category__in"  => get_theme_mod("umag_category_filter", array()),
    );

    $umag_slide_category_sırala = get_theme_mod("umag_slide_category_sırala", "date");

    if ($umag_slide_category_sırala === "views") {
        $big_slider_arg["orderby"] = "meta_value_num";
        $big_slider_arg["meta_key"] = "views";
    }


    if ($umag_slide_category_sırala === "random") {
        $big_slider_arg["orderby"] = "rand";
    }
    if ($umag_slide_category_sırala === "comments") {
        $big_slider_arg["orderby"] = "comment_count";
    }
    $big_slider = new WP_Query($big_slider_arg);

    if ($big_slider->have_posts()) {
?>
        <div class="hero-area owl-carousel">
            <?php
            while ($big_slider->have_posts()) {
                $big_slider->the_post();
                get_template_part("template-parts/home", "slider");
            }
            ?>
        </div>
<?php
    }else{
        if(current_user_can("manage_options")){
            echo '<div class="alert alert-danger" >Yazı Bulunmadı!!!</div>';
        }
    }
}
wp_reset_postdata();
?>

<!-- ##### Mag Posts Area Start ##### -->
<section class="mag-posts-area d-flex flex-wrap">

    <!-- >>>>>>>>>>>>>>>>>>>>
         Post Left Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
    <?php if(is_active_sidebar("home-left")):?>
    <div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">
        <?php dynamic_sidebar("home-left"); ?>
    </div>
    <?php endif;?>

    <!-- >>>>>>>>>>>>>>>>>>>>
             Main Posts Area
        <<<<<<<<<<<<<<<<<<<<< -->
    <div class="mag-posts-content mt-30 mb-30 p-30 box-shadow">
        <?php
        $liddle_slider_default = get_theme_mod("umag_liddle_slider_default", true);
        if ($liddle_slider_default) :
        ?>
            <?php
            $liddle_slider_args = array(
                "order"  => "DESC",
                "posts_per_page" => get_theme_mod("umag_liddle_slide_count", 3),
                "category__in"   => get_theme_mod("umag_liddle_cat_filter", array()),
            );
            $umag_liddle_slide_category = get_theme_mod("umag_liddle_slide_category", "date");
            if ($umag_liddle_slide_category === "views") {
                $liddle_slider_args["orderby"]  = "meta_value_num";
                $liddle_slider_args["meta_key"] = "views";
            }
            if ($umag_liddle_slide_category === "random") {
                $liddle_slider_args["orderby"] = "rand";
            }
            if ($umag_liddle_slide_category === "comments") {
                $liddle_slider_args["orderby"] = "comment_count";
            }
            $liddle_slider = new WP_Query($liddle_slider_args);
            if ($liddle_slider->have_posts()) :
            ?>
                <!-- Trending Now Posts Area -->
                <div class="trending-now-posts mb-30">

                    <div class="section-heading">
                        <h5><?php esc_html_e(get_theme_mod("umag_liddle_text", "TRENDING NOW")); ?></h5>
                    </div>

                    <div class="trending-post-slides owl-carousel">

                        <?php while ($liddle_slider->have_posts()) {
                            $liddle_slider->the_post();
                            get_template_part("template-parts/liddle", "slider");
                        }

                        ?>


                    </div>
                </div>
            <?php endif;
              if(! $liddle_slider->have_posts()){
                if(current_user_can( "manage_options" )){
                    echo '<div class="alert alert-danger" >Yazı Bulunmadı!!!</div>';
                }
            }
            ?>
            <?php endif;
        wp_reset_postdata();
        $umag_six_slider_default = get_theme_mod("umag_six_slider_default", true);
        $umag_six_text = get_theme_mod("umag_six_text", "FEATURED VİDEOS");
        if ($umag_six_slider_default) :
            $six_slider_args = array(
                "order"           => "DESC",
                "posts _per_page" => get_theme_mod("umag_six_slide_count", 6),
                "category__in"    => get_theme_mod("umag_six_cat_filter", array()),
            );
            $umag_six_slide_category = get_theme_mod("umag_six_slide_category", "date");
            if ($umag_six_slide_category === "views") {
                $six_slider_args["orderby"] = "meta_value_num";
                $six_slider_args["meta_key"] = "views";
            }
            if ($umag_six_slide_category === "random") {
                $six_slider_args["orderby"] = "rand";
            }
            if ($umag_six_slide_category === "comments") {
                $six_slider_args["orderby"] = "comment_count";
            }
            $six_slider = new WP_Query($six_slider_args);
            if ($six_slider->have_posts()) :
            ?>
                <!-- Feature Video Posts Area -->
                <div class="feature-video-posts mb-30">
                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5><?php esc_html_e($umag_six_text); ?></h5>
                    </div>
                    <div class="featured-video-posts">
                        <div class="row">
                            <?php
                            $i = 1;
                            while ($six_slider->have_posts()) {
                                $six_slider->the_post();
                                if ($i === 1) {
                                    echo ' <div class="col-12 col-lg-7">';
                                    get_template_part("template-parts/six-slide", "big");
                                    echo "</div>";
                                } else {
                                    if ($i === 2) {
                                        echo '<div class="col-12 col-lg-5">';
                                        echo '<div class="featured-video-posts-slide owl-carousel">';
                                        echo '<div class="single--slide">';
                                    }
                                    get_template_part("template-parts/six-slide", "liddle");
                                    if ($i % 6 === 0 && $i !== $six_slider->post_count) {
                                        echo "</div>";
                                        echo  '<div class="single--slide">';
                                    }
                                    if ($i === $six_slider->post_count) {
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                }
                                $i++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif;
              if(! $six_slider->have_posts()){
                if(current_user_can( "manage_options" )){
                    echo '<div class="alert alert-danger" >Yazı Bulunmadı!!!</div>';
                }
            }
        endif;
        wp_reset_postdata();

        $umag_mid_slider_default = get_theme_mod("umag_mid_slider_default", true);
        if ($umag_mid_slider_default) :
            $mid_slider_args = array(
                "order" => "DESC",
                "posts_per_page" => get_theme_mod("umag_mid_slide_count", 3),
                "category__in"   => get_theme_mod("umag_mid_cat_filter", array()),
            );
            $umag_mid_slide_category = get_theme_mod("umag_mid_slide_category", "date");
            if ($umag_mid_slide_category === "views") {
                $mid_slider_args["orderby"]  = "meta_value_num";
                $mid_slider_args["meta_key"] = "views";
            }
            if ($umag_mid_slide_category === "random") {
                $mid_slider_args["orderby"] = "rand";
            }
            if ($umag_mid_slide_category === "comments") {
                $mid_slider_args["orderby"] = "comment_count";
            }
            $mid_slider = new WP_Query($mid_slider_args);
            if ($mid_slider->have_posts()) :
            ?>
                <div class="most-viewed-videos mb-30">
                    <!-- Section Title -->
                    <div class="section-heading">
                        <h5><?php esc_html_e(get_theme_mod("umag_mid_text", "MOST VİEWED VİDEOS")) ?></h5>
                    </div>
                    <div class="most-viewed-videos-slide owl-carousel">
                        <?php
                        while ($mid_slider->have_posts()) {
                            $mid_slider->the_post();
                            get_template_part("template-parts/mid", "slider");
                        }
                        ?>
                    </div>
                </div>
        <?php endif;
          if(! $mid_slider->have_posts()){
           if(current_user_can( "manage_options")){
            echo '<div class="alert alert-danger" >Yazı Bulunmadı!!!</div>';
           }
        }
        endif;
        wp_reset_postdata(); ?>
        <!-- Sports Videos -->
        <?php 
        $umag_bottom_slider_default=get_theme_mod("umag_bottom_slider_default",true);
        $umag_bottom_text=get_theme_mod("umag_bottom_text","Sports Videos");
        if($umag_bottom_slider_default):
        ?>
        <div class="sports-videos-area">
            <!-- Section Title -->
            <div class="section-heading">
                <h5><?php esc_html_e($umag_bottom_text);?></h5>
            </div>
            <?php 
            $big_slider_big_args = array(
                "order"     => "DESC",
                "posts_per_page" => get_theme_mod("umag_bottom_slide_count",2),
                "category__in" => get_theme_mod("umag_bottom_cat_filter",array()),
            );
            $umag_bottom_slide_category=get_theme_mod("umag_bottom_slide_category","date");
            if($umag_bottom_slide_category === "views") {
                $big_slider_big_args["orderby"]="meta_value_num";
                $big_slider_big_args["meta_key"] = "views";
            }
            if($umag_bottom_slide_category === "random"){
                $big_slider_big_args["orderby"] = "rand";
            }
            if($umag_bottom_slide_category === "comments"){
                $big_slider_big_args["orderby"] = "comment_count";
            }
            $big_slider_big = new WP_Query($big_slider_big_args);
            if ($big_slider_big->have_posts()) : ?>
                <div class="sports-videos-slides owl-carousel mb-30">
                    <!-- Single Featured Post -->
                    <?php
                    while ($big_slider_big->have_posts()) {
                        $big_slider_big->the_post();
                        get_template_part("template-parts/bottom-slider", "big");
                    }
                    ?>
                </div>
            <?php endif;
              if(! $big_slider_big->have_posts()){
                if(current_user_can( "manage_options")){
                    echo '<div class="alert alert-danger" >Yazı Bulunmadı!!!</div>'; 
                }
            }
            wp_reset_postdata();

            $big_slider_liddle_arg=array(
                "order"     => "DESC",
                "posts_per_page" =>4,
                "category__in" => get_theme_mod("umag_bottom_cat_filter_2",array()),
            );
            $umag_bottom_slide_category_2=get_theme_mod("umag_bottom_slide_category_2","date");
            if($umag_bottom_slide_category_2 === "views"){
                $big_slider_liddle_arg["orderby"] = "meta_value_num";
                $big_slider_liddle_arg["meta_key"] = "views";
            }
            if($umag_bottom_slide_category_2 === "random"){
                $big_slider_liddle_arg["orderby"] = "rand";
            }
            if($umag_bottom_slide_category_2 === "comments"){
                $big_slider_liddle_arg["orderby"] ="comment_count";
            }
            $big_slider_liddle=new WP_Query($big_slider_liddle_arg);
            if($big_slider_liddle->have_posts()):
            ?>
            <div class="row">
                <?php
                while($big_slider_liddle->have_posts()){
                    $big_slider_liddle->the_post();
                    get_template_part( "template-parts/bottom-slider", "liddle" );
                }
                ?>
            </div>
            <?php endif;
              if(! $big_slider_liddle->have_posts()){
                if(current_user_can( "manage_options")){
                    echo '<div class="alert alert-danger" >Yazı Bulunmadı!!!</div>';
                }
            }
            ?>
        </div>
        <?php endif;?>
    </div>
    <?php if(is_active_sidebar("home-right")):?>
    <div class="post-sidebar-area right-sidebar mt-30 mb-30 box-shadow">
    <?php dynamic_sidebar("home-right"); ?>
    </div>
    <?php endif;?>
</section>
<!-- ##### Mag Posts Area End ##### -->
<?php
get_footer();
