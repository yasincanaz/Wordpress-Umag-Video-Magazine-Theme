<div class="row">
                <div class="col-12">
                    <div class="single-video-area bg-white mb-30 box-shadow">
                        <?php echo get_post_meta( get_the_ID(),"video_link", true )?>
                        <!-- Video Meta Data -->
                        <div class="video-meta-data d-flex align-items-center justify-content-between">
                            <?php if(umag_views_count()>=0):?>
                            <h6 class="total-views"><?php printf(esc_html__("%s Views"),umag_views_count()) ?></h6>
                            <?php endif;?>
                            <div class="like-dislike d-flex align-items-center">
                                <button type="button"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></button>
                                <?php printf(__(umag_like_count_button())) ?>
                                <p><i class="fa fa-comments-o" aria-hidden="true"></i><?php printf(__(get_comments_number( get_the_ID())." %s"),"Comments")?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>