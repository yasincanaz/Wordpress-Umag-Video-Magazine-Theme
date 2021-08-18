                    <!-- Single Blog Post -->
                    <div class="single-blog-post style-4">
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail("umag_mid_slider_big")?>
                            <?php if(get_post_format() === "video"):?>
                            <a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a>
                            <?php
                            $video_duration=get_post_meta( get_the_ID(),"video_duration",true );
                            if(!empty($video_duration)):
                            ?>
                            <span class="video-duration"><?php esc_html_e($video_duration);?></span>
                            <?php endif; endif;?>
                        </div>
                        <div class="post-content">
                            <a href="<?php the_permalink();?>" class="post-title"><?php the_title();?></a>
                            <div class="post-meta d-flex">
                            <?php if(umag_views_count() >= 0):?>
                                        <a href="#">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            <?php esc_html_e(umag_views_count());?>
                                        </a>
                                        <?php endif;?>
                                        <?php if(umag_like_count()>=0):?>
                                        <a href="#">
                                            <i class="far fa-thumbs-up"></i>
                                            <?php esc_html_e(umag_like_count());?>
                                            </a>
                                        <?php endif;?>
                                        <a href="<?php echo get_permalink()."#respond"?>"><i class="fas fa-comments" aria-hidden="true"></i><?php echo get_comments_number();?></a>
                            </div>
                        </div>
                    </div>