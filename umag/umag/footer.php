<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mag
 */

?>
<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
        <div class="container">
            <div class="row">
                <?php
                $i=0;
                if(is_active_sidebar("home-footer-1")){
                    $i++;
                }
                if(is_active_sidebar("home-footer-2")){
                    $i++;
                }
                if(is_active_sidebar("home-footer-3")){
                    $i++;
                }
                if(is_active_sidebar("home-footer-4")){
                    $i++;
                }
                if($i>0):
                ?>
                <?php if(is_active_sidebar("home-footer-1")):?>
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-<?php echo 12/$i?>">
                    <div class="footer-widget">
                        <?php dynamic_sidebar("home-footer-1")?>
                    </div>
                </div>
                <?php endif;?>

                <?php if(is_active_sidebar("home-footer-2")):?>
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-<?php echo 12/$i?>">
                    <div class="footer-widget">
                    <?php dynamic_sidebar("home-footer-2")?>
                    </div>
                </div>
                <?php endif;?>

                <?php if(is_active_sidebar("home-footer-3")):?>
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-<?php echo 12/$i?>">
                    <div class="footer-widget">
                    <?php dynamic_sidebar("home-footer-3")?>
                    </div>
                </div>
                <?php endif;?>

                <?php if(is_active_sidebar("home-footer-4")):?>
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-<?php echo 12/$i?>">
                    <div class="footer-widget">
                    <?php dynamic_sidebar("home-footer-4")?>
                    </div>
                </div>
                <?php endif;endif;?>

            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-area">
            <div class="container">
                <div class="row">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-sm-7">
                        <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <?php echo get_theme_mod("umag_footer_text","All rights reserved | This template is made with ")?> <i class="far fa-heart" aria-hidden="true"></i> by <a href="<?php echo esc_url(get_theme_mod("umag_footer_link","https://yasincanaz.com"))?>" target="_blank"><?php esc_html_e(get_theme_mod("umag_footer_link_text","YasinCanaz"))?></a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                    <div class="col-12 col-sm-5">
                        <nav class="footer-nav">
                            <?php
                            if(has_nav_menu("footer")){
                                $nav_menu_args=array(
										"menu" =>"footer",
                                        "depth" => 1
									);
									wp_nav_menu($nav_menu_args);
                            }else{
                                if(current_user_can( "manage_options")){
                                    printf(
                                        /**translators: %s: add menu link */
                                        __("there is no menu in the footer, create it right <a href='%s'>here</a>","umag"),admin_url()."nav-menus.php");
                                }
                            }
                            
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
