              <!-- Thumbnail -->
              <div class="single-featured-post">
              <div class="post-thumbnail mb-50">
                            <?php the_post_thumbnail("umag_six_slider_big")?>
                            <?php if("video" === get_post_format()):?>
                            <a href="video-post.html" class="video-play"><i class="fa fa-play"></i></a>
                            <?php endif;?>
                        </div>
                        <!-- Post Contetnt -->
                        <div class="post-content">
                            <div class="post-meta">
                                <a href="<?php the_permalink();?>"><?php the_date();?></a>
                                <a href="<?php the_permalink();?>"><?php the_category(" ");?></a>
                            </div>
                            <a href="<?php the_permalink();?>" class="post-title"><?php the_title();?></a>
                            <p><?php echo wp_trim_words( get_the_content(),30 )?></p>
                        </div>
                        <!-- Post Share Area -->
                        <div class="post-share-area d-flex align-items-center justify-content-between">
                            <!-- Post Meta -->
                            <div class="post-meta pl-3">
                                <?php if(umag_views_count()>=0):?>
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i><?php esc_html_e(umag_views_count());?></a>
                                <?php endif;?>
                                <?php if(umag_like_count()>=0):?>
                                <a href="#"><i class="far fa-thumbs-up" aria-hidden="true"></i><?php esc_html_e(umag_like_count());?></a>
                                <?php endif;?>
                                <a href="<?php echo get_permalink()."#respond"?>"><i class="fas fa-comments" aria-hidden="true"></i><?php echo get_comments_number(get_the_ID());?></a>
                            </div>
                            <!-- Share Info -->
                            <div class="share-info">
                                <a href="#" class="sharebtn"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                <div class="all-share-btn d-flex">
                                    <?php
                                    
                                    echo umag_sharer_button();
                                    
                                    ?>
                                </div>
                            </div>
                        </div>
                        </div>