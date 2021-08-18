<?php
/**
 * Template Name: Post Sumbit
 * Template Post Tyep :page
 */
get_header();
?>

<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2><?php the_title();?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php breadcrumb();?>
    <div class="video-submit-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Video Submit Content -->
                    <div class="video-submit-content mb-50 p-30 bg-white box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5><?php esc_html_e("Submit your post","umag")?></h5>
                        </div>

                        <div class="video-info mt-30">
                            <?php if(is_user_logged_in()):?>
                            <form class="post-submits">
                                <div class="form-group">
                                    <label for="upload-file"><?php esc_html_e('Upload Your File','umag')?></label>
                                    <input name="upload-file" type="file" class="form-control-file" id="upload-file">
                                </div>
                                <div class="form-group">
                                    <label for="video-name"><?php esc_html_e('Post Title','umag')?></label>
                                    <input type="text" class="form-control" id="video-name" name="video-name" required>
                                </div>
                                <div class="form-group">
                                    <label for="umag-content"><?php esc_html_e('Video Description','umag')?></label>
                                    <?php wp_editor("","umag-content") ?>
                                </div>
                                <div class="form-group">
                                    <label for="video-tags"><?php esc_html_e("Tags","umag")?></label>
                                    <input type="text" class="form-control" name="video-tags" id="video-tags">
                                    <p><?php esc_html_e('separate tags with commas','umag')?></p>
                                </div>
                                <div class="form-group">
                                    <label for="video-catagory"><?php esc_html_e('Video Catagory','umag')?></label>
                                    <select name="umag-catagory" id="umag-catagory" class="form-control">
											<?php
                                            $cats_args=array(
                                                "hide_empty" => false
                                            );
											$cats = get_categories($cats_args);

											foreach ( $cats as $cat ) {
												echo '<option value="' . $cat->term_id . '">' . $cat->name . '</option>';
											}
											?>

                                        </select>
                                </div>
                                <button type="submit" class="btn mag-btn mt-30"><i class="fas fa-cloud-upload-alt"></i><?php esc_html_e(' Upload your Post','umag')?></button>
                                <?php wp_nonce_field( "post-submit" ,"field-post");?>
                            </form>
                            <?php else:?>
                                <div class="alert alert-warning"><?php printf(__("You must be <a href='%s'>logged in</a> to become a writer."),get_page_link( get_theme_mod("umag_login_page") ))?></div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();?>
