
                            <!-- Single Blog Post -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="single-blog-post style-4 mb-30">
                                    <div class="post-thumbnail">
                                       <?php the_post_thumbnail("umag_mid_slider_big")?>
                                        <?php  if(get_post_format() === "video"):?>
                                        <a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a>
                                        <span class="video-duration"><?php echo get_post_meta( get_the_ID() , "video_duration", true )?></span>
                                        <?php endif;?>
                                    </div>
                                    <div class="post-content">
                                        <a href="<?php the_permalink();?>" class="post-title"><?php the_title();?></a>
                                        <div class="post-meta d-flex">
                                            <?php if(umag_views_count()>=0):?>
                                            <a href="<?php echo get_permalink() . "#respond";?>"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo umag_views_count();?></a>
                                            <?php endif;?>
                                            <?php if(umag_like_count()>=0):?>
                                            <a href="<?php echo get_permalink().".post_like_button"?>"><i class="far fa-thumbs-up" aria-hidden="true"></i> <?php echo umag_like_count();?></a>
                                            <?php endif;?>
                                            <a href="<?php the_permalink()?>"><i class="fas fa-comments" aria-hidden="true"></i> <?php echo get_comments_number( get_the_ID() )?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>